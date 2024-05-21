<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::paginate(5);
        return view('admin.order',[
            'title'=> 'Manage Order'
            ],compact('data'));
    }
    public function editorder(Request $request, $id)
    {
        $data = Order::find($id);
        $data->update($request->all());
        return redirect()->route('adminorder')->with('updateorder','Order Status Has Been Changed');
    }
    public function filterorderdate(Request $request)
    {
        $status = $request->input('status');
        // dd($status);
        $limit = $request->input('limit',5);
        $start = $request->startdate;
        $end = $request->enddate;
        $data = Order::when($start,function($query) use($start){
                return $query->where('created_at','>=',$start);
        })->when($end, function($query) use ($end){
                return $query->where('created_at','<=',$end);
        })->when($status, function($query) use($status){
                return $query->where('delivery_status',$status);
        })->paginate($limit);
        
        // $data = Order::whereDate('created_at','>=', $start)
        //                 ->whereDate('created_at','<=',$end)->paginate($limit);

        return view('admin.order',[
            'title' => 'Manage Order',
            'data'=>$data
        ]);
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
