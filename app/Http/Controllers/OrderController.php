<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Order;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return inertia::render('AllOrders', ['orders' => Order::all(), 'back' => 'pricelist', 'referrer'=>'order']);
        // return Order::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        dd('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $filePath = null;
         $file = '';
        if ($request->file('file') !== null) {
            $filePath = $request->file('file')->getClientOriginalName();
            $file = $request->file('file')->storeAs('orders',$filePath);
         }

        $order = Order::create([
            'size' => $request->input('size'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'times' => $request->input('times'),
            'text' => $request->input('text'),
            'comments' => $request->input('comments'),
            'file_path' => $filePath,
            'price' => $request->price
        ]);
        Mail::to(RouteServiceProvider::ADMIN)->send(
            new OrderMail(
                $order,
                $file
            )
        );
        return redirect('/pricelist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        dd('order show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
        dd('order edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
        dd('order edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, String $id)
    {
        //
        $order = DB::table('orders')->where('id',$id)->first();
        DB::table('orders')->where('id',$id)->delete();
        Storage::delete('orders/'.$order->file_path);
        return redirect('/order');
        
    }
}
