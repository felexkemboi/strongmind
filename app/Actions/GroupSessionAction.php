<?php


namespace App\Actions;


use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroupSessionAction
{
    use ApiResponser;

    public function listSessions(): JsonResponse
    {

    }

    public function createSession(): JsonResponse
    {

    }

    public function viewSessionDetails(int $id): JsonResponse
    {

    }

    public function updateSession(Request $request, int $id): JsonResponse
    {

    }

    public function deleteSession(int $id): JsonResponse
    {

    }

    public function recordSessionAttendance(int $id): JsonResponse
    {

    }

    public function listSessionAttendance(int $id): JsonResponse
    {

    }
}
