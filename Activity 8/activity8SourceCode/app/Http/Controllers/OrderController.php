<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function getCustomer($cusId, $name, $addr)
    {
        return view('Customer', compact('cusId', 'name', 'addr'));
    }

    public function getItem($itemNo, $name, $price)
    {
        return view('Item', compact('itemNo', 'name', 'price'));
    }

    public function getOrder($cusId, $name, $orderNo, $date)
    {
        return view('Order', compact('cusId', 'name', 'orderNo', 'date'));
    }

    public function getOrderDetails($transNo, $orderNo, $itemId, $name, $price, $qty)
    {
        return view('OrderDetails', compact('transNo', 'orderNo', 'itemId', 'name', 'price', 'qty'));
    }
}
