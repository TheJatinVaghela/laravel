<?php

namespace App\Http\Controllers;

use App\Models\seller;
use App\Http\Requests\StoresellerRequest;
use App\Http\Requests\UpdatesellerRequest;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       $answer = TRY_CHATCH(function (){
            $data = seller::all();
            return $data;
        });
        return response()->json($answer);
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
    public function store(StoresellerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(seller $seller , $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesellerRequest $request, seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(seller $seller)
    {
        //
    }
}
