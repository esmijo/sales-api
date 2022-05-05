<?php

namespace App\Http\Controllers;

use App\Models\System;
use App\Models\Transaction;
use App\Models\Inventory;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Transaction::orderBy('trans_date', 'desc')->limit(1000)->get();
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function by_date($date_from, $date_to)
    {
        return Transaction::whereBetween('datetime_created', [$date_from, $date_to])->orderBy('trans_date', 'desc')->limit(1000)->get();
    }
    

    public function TransactionWithBranch()
    {
        return Transaction::orderBy('trans_date', 'desc')->limit(1000)->get();
    }

    /**
     * Display a listing of selected fields of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selected_fields()
    {
        return  Transaction::orderBy('trans_date', 'desc')->limit(500)->get(['trans_id', 'trans_customer_name', 'trans_date', 'trans_amount']);
    }

    public function trans_sum()
    {
        $trans_sum = Transaction::orderBy('trans_date', 'desc')->limit(500)->get(['trans_id', 'trans_customer_name', 'trans_date', 'trans_amount']);
        return $trans_sum->sum('trans_amount');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function show(System $system)
    {
        return Transaction::where('trans_id', 2031944)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, System $system)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function destroy(System $system)
    {
        // return Transaction::where('trans_customer_name', 'like', '%' . $customer . '%')->first();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function search($customer)
    {
        return Transaction::where('trans_customer_name', 'like', '%' . $customer . '%')->get();
    }
}
