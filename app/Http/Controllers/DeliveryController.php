<?php

namespace App\Http\Controllers;

use App\Models\delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'error' => false,
            'delivery'  => delivery::all(),
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'deliveryDate'=> 'required',
            'description'=> 'required',
            'novelties'=> 'required',
        ]);

        $delivery = new delivery;
        $delivery->name = $request->input('name');
        $delivery->deliveryDate = $request->input('deliveryDate');
        $delivery->description = $request->input('description');
        $delivery->novelties = $request->input('novelties');
      

        $delivery->save();
        return response()->json([
            'data' => [
                'delivery' => $delivery
            ]     
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $delivery = delivery::findOrFail($id);
        return response()->json([
            'data' =>[
                'delivery' => $delivery
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'deliveryDate'=> 'required',
            'description'=> 'required',
            'novelties'=> 'required',
        ]);
        $delivery = delivery::findOrFail($id);
        $delivery->name = $request->input('name');
        $delivery->deliveryDate = $request->input('deliveryDate');
        $delivery->description = $request->input('description');
        $delivery->novelties = $request->input('novelties');
      

        $delivery->save();
        return response()->json([
            'data' => [
                'delivery' => $delivery
            ]     
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(delivery $delivery)
    {
        $delivery = delivery::findOrFail($id);
        $delivery->delete();
        return response()->json(['message'=>'Entrega quitada', 'Entrega'=>$delivery],200);
    }
}
