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
        return response()->json( delivery::all()
      );
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
        

        $delivery = new delivery;
        $delivery->name = $request->input('name');
        $delivery->deliveryDate = $request->input('deliveryDate');
        $delivery->description = $request->input('description');
        $delivery->novelties = $request->input('novelties');
      

        $delivery->save();
        return response()->json( $delivery    
        );
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
        return response()->json(
             $delivery
            
        );
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
      
        $delivery = delivery::findOrFail($id);
        $delivery->name = $request->input('name');
        $delivery->deliveryDate = $request->input('deliveryDate');
        $delivery->description = $request->input('description');
        $delivery->novelties = $request->input('novelties');
      

        $delivery->save();
        return response()->json(
                $delivery    
       );
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
