<?php

namespace App\Http\Controllers;

use App\Model\Brand;
use App\Model\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllBrand(){
        $brands = Brand::all();
        return response()->json([
            'brands' => $brands
        ],200);
    }

    public function mutipleDelete(Request $request)
    {
       foreach($request->all() as $Brand){
           Brand::find($Brand['id'])->delete();
       }
    }
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return response()->json([
            'brands' => $brands
        ],200);
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
           'name' => 'required'
       ]);

       Brand::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $Brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $Brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $Brand)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $Brand->update($request->all());
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $Brand)
    {
       $Brand->delete();
       return $this->index();
    }
}
