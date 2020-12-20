<?php

namespace App\Http\Controllers;


use App\User;
use App\Model\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    
    public function index()
    {   
        $user_id = Auth::guard('web')->user()->id;
        $wishlists = Wishlist::latest()->where('user_id', $user_id)->paginate(10);
        return response()->json([
            'wishlists' => $wishlists
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
        $wishlist = new Wishlist;
        $wishlist = $wishlist->create($request->all());
        return response()->json($wishlist);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
