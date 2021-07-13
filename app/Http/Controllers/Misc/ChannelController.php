<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChannelResource;
use App\Models\Misc\Channel;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ChannelController
 * @package App\Http\Controllers\Misc
 * @group Misc
 */
class ChannelController extends Controller
{
    /**
     * All Channels
     * @return JsonResponse
     * @authenticated
     */
    public function index(): JsonResponse
    {
        $channels = Channel::query()->select(['id', 'name', 'slug'])->get();
        return $this->commonResponse(true, 'success', $channels, Response::HTTP_OK);

    }

    /**
     * Create Channel
     * @param Request $request
     * @return JsonResponse
     * @bodyParam  name string required Channel Name.Example web channel
     * @authenticated
     */
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->commonResponse(false, Arr::flatten($validator->messages()->get('*')), '', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            try {
                $slug = Str::slug($request->get('name'));
                $channel_exists = Channel::firstWhere('slug', $slug);
                if ($channel_exists) {
                    return $this->commonResponse(false, 'Channel already exists!', '', Response::HTTP_UNPROCESSABLE_ENTITY);
                } else {
                    $channel = Channel::create([
                        'name' => $request->get('name'),
                        'slug' => $slug,
                    ]);
                    return $this->commonResponse(true, 'Record created successfully!', new ChannelResource($channel), Response::HTTP_CREATED);
                }
            } catch (QueryException $ex) {
                return $this->commonResponse(false, $ex->errorInfo[2], '', Response::HTTP_UNPROCESSABLE_ENTITY);
            } catch (Exception $ex) {
                return $this->commonResponse(false, $ex->getMessage(), '', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
    }

    /**
     * Update Channel
     * @return JsonResponse
     * @authenticated
     */
    public function update(Request $request)
    {

    }

    /**
     * Delete Channel
     * @return JsonResponse
     * @authenticated
     */
    public function delete()
    {

    }
}
