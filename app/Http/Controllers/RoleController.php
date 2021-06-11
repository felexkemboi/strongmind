<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
public function index(){
                                                                                                                                                                                                                                //dd(Auth::user()->customer);                                                                                                                                                                                                                                                                                                                                                                                                                                                                     $gross_orders = Auth::user()->customer->orders()->latest()->get();                                                                                                                                                                           //dd($gross_orders);                                                                                                                                                                                                                         $gross_orders->transform(function ($item) {                                                                                                                                                                                                      return [                                                                                                                                                                                                                                         'id' => $item->id,                                                                                                                                                                                                                           'customer' => $item->customer->full_name,                                                                                                                                                                                                    'service_type' => $item->service_type->name,                                                                                                                                                                                                 'paper_type' => $item->paper_type->name,                                                                                                                                                                                                     'citation' => $item->citation->name,                                                                                                                                                                                                         'academic_level' => $item->academic_level->name,                                                                                                                                                                                             'subject' => $item->subject->name,                                                                                                                                                                                                           'deadline' => $item->deadline->name,                                                                                                                                                                                                         'total' => $item->order_total,                                                                                                                                                                                                               'pages' => $item->no_of_pages,                                                                                                                                                                                                               'status' => $item->order_status->name,                                                                                                                                                                                                       'topic' => $item->topic,                                                                                                                                                                                                                     'details' => $item->paper_details,                                                                                                                                                                                                           'completed' => $item->completed,                                                                                                                                                                                                             'order_date' => $item->created_at,                                                                                                                                                                                                       ];                                                                                                                                                                                                                                       });                                                                                                                                                                                                                                          //  dd($gross_orders);                                                                                                                                                                                                                       $orders = collect(json_decode(json_encode($gross_orders, FALSE)));                                                                                                                                                                           return $orders;                                                                                                                                                                                                                              }                                                                                                                                                                                                                                            catch(\Exception $e){                                                                                                                                                                                                                        return  [];                                                                                                                                                                                                                                  }
}
}
