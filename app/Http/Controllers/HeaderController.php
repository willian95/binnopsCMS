<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;
use App\Http\Requests\HeaderRequest;

class HeaderController extends Controller
{
    
    function update(HeaderRequest $request){

        try{

            $header = Header::first();
            $header->image = $request->image;
            $header->update();

            return response()->json(["success" => true]);

        }catch(\Exception $e){  

            return response()->json(["success" => false]);

        }

    }

}
