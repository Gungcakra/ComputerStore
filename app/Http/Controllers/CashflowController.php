<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
use App\Http\Requests\StoreCashflowRequest;
use App\Http\Requests\UpdateCashflowRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CashflowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cashin = Cashflow::where('type','Cash In')->sum('Amount');
        $cashout = Cashflow::where('type','Cash Out')->sum('Amount');
        $income = $cashin - $cashout;
        // dd($income);
        return view('admin.cashflow',[
            'title' => 'Manage Cashflow',
            'data' => Order::all(),
            'income'=>$income,
            'cashin'=>$cashin,
            'cashout'=>$cashout,
            'cash'=>Cashflow::paginate(5)
        ]);
    }
    public function cashflowadd(Request $request)
    {
        $data = $request;
        // dd($data);
        Cashflow::create($data->all());
        return redirect()->route('cashflow')->with('addcashflow','CashFlow Data Has Been Added');
    }

    public function filtercashflow(Request $request)
    {
            $startdate = $request->startdate;
            $enddate = $request->enddate;

            $cashflow = Cashflow::when($startdate,function($query) use ($startdate){
                        return $query->where('created_at','>=',$startdate);
            })->when($enddate,function ($query) use ($enddate){
                        return $query->where('created_at','<=',$enddate);
            })->paginate(3);
            $cashin = Cashflow::when($startdate,function($query) use ($startdate){
                        return $query->where('created_at','>=',$startdate);
            })->when($enddate,function ($query) use ($enddate){
                        return $query->where('created_at','<=',$enddate);
            })->where('type','Cash In')->sum('Amount');
            $cashout = Cashflow::when($startdate,function($query) use ($startdate){
                        return $query->where('created_at','>=',$startdate);
            })->when($enddate,function ($query) use ($enddate){
                        return $query->where('created_at','<=',$enddate);
            })->where('type','Cash Out')->sum('Amount');
        
            $income = $cashin - $cashout;
            return view ('admin.cashflow',[
                'title'=> 'Manage Cashflow',
                'cash'=>$cashflow,
                'data' => Order::all(),
                'income'=>$income,
                'cashin'=>$cashin,
                'cashout'=>$cashout,
                
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
    public function store(StoreCashflowRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cashflow $cashflow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cashflow $cashflow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCashflowRequest $request, Cashflow $cashflow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cashflow $cashflow)
    {
        //
    }
}
