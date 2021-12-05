<?php

namespace App\Http\Controllers;
use App\Item;
use App\User;
use App\Bid;
use Auth;
use Validator;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    
    public function apply (Item $item){
        return view('purchase',['item'=>$item]);
    }
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(),[
            'max_price' => 'required',
            'message' => 'required',
            'payment' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect ()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $bids = new Bid;
        $bids->user_id = $request->user_id;
        $bids->item_id = $request->item_id;
        $bids->max_price = $request->max_price;
        $bids->message = $request->message;
        $bids->payment = $request->payment;
        $bids->bid_time = now();
        $bids->save();

        return redirect('/item/'.$request->item_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    // public function bid($item_id) 
    // {
    //     $validator = Validator::make($request->all(),[
    //         'max_price' => 'required|max:8',
    //         'message' => 'required|max:400',
    //         'payment' => 'required|max:1',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect ()->back()
    //             ->withInput()
    //             ->withErrors($validator);
    //     }
        
    //     $user = Auth:user();
    //     $item = Item::find($item_id);
    //     $item->bid_user()->attach($user);

    //     return redirect('/item/.$item_id');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
