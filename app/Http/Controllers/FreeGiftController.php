<?php

namespace App\Http\Controllers;

use App\Models\Free_Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FreeGiftController extends Controller
{
    //

    public function index()
    {
       return free_gift::all();

    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'qty'=> 'required',
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

    public function update(Request $request, $id)
    {
        $freeGift = free_gift::find($id);
        $freeGift->update($request->all());
        return $freeGift;
    }

    public function destroy($id){
        $freeGift = free_gift::find($id);
        return $freeGift->delete();
    }

    

}
