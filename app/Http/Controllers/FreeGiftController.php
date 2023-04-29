<?php

namespace App\Http\Controllers;

use App\Models\Free_Gift;
use Illuminate\Http\Request;

class FreeGiftController extends Controller
{
    //

    public function index()
    {
       $freeGifts= free_gift::all();

       if($freeGifts->count()>0){
        return response()->json([
            'status'=>200,
            'freeGifts'=>$freeGifts
        ],200);
       }else{
        return response()->json([
            'status'=>404,
            'message'=>'No Records Found'
        ],404);
       }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:100',
            'qty'=> 'required|numeric',
            'description'=>'required',
            'image'=>'required',
            'status'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ],422);
        }else{
            $freeGift = Free_Gift::create([
                'name'=>$request->name,
                'qty'=>$request->qty,
                'description'=>$request->description,
                'image'=> $request->image,
                'status'=>$request->status,
            ]);
        }

    }

    public function show($id){
        $freeGift = free_gift::find($id);
        return $freeGift;
    }

    

}
