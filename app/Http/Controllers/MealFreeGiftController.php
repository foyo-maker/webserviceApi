<?php

namespace App\Http\Controllers;

use App\Models\Meal_Free_Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MealFreeGiftController extends Controller
{
    //
    
    public function index()
    {
        return $mealfreeGifts= meal_free_gift::all();
    
    }
    

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'meal_id'=> 'required',
            'freegift_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ],422);
        }else{
            $mealfreeGift = meal_free_Gift::create([
                'meal_id'=>$request->meal_id,
                'freegift_id'=>$request->freegift_id,           
            ]);
        }

    }

    public function show($id){
        $mealfreeGift = meal_free_gift::find($id);
        return $mealfreeGift;
    }

    public function update(Request $request, $id)
    {
        $mealfreeGift = meal_free_gift::find($id);
        $mealfreeGift->update($request->all());
        return $mealfreeGift;
    }

    public function destroy($id){
        $mealfreeGift = meal_free_gift::find($id);
        return $mealfreeGift->delete();
    }

    
}
