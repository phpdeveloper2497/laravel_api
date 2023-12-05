<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeStatusOrderRequest;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusOrderController extends Controller
{
    public function store(Status $status, ChangeStatusOrderRequest $request)
    {
        $order = Order::findOrFail($request['order_id']);
        $order->update(['status_id' => $status->id]);

        return response(['success' => true, 'message' => 'Status updated successfully']);
    }
}
