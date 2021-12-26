<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    //get all gift
    public function allGift()
    {
        $gift = Gift::all();
        return response()->json([
            'success' => true,
         
            'data' =>  $gift,
           ]);
    }

}