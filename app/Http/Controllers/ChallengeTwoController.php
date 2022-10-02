<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengeTwoController extends Controller
{
    public function checkArray(Request $request){
        $array = array_map('intval', explode(',', $request->array));    
        $values = array_count_values($array);
        return response()->json($values,200);
    }
}
