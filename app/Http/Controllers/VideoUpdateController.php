<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VideoUpdateRequest;
use App\Models\Video;

class VideoUpdateController extends Controller
{
    
    function update(VideoUpdateRequest $request){

        try{

            $video = Video::first();
            $video->link = $request->link;
            $video->update();

            return response()->json(["success" => true]);
            
        }catch(Exception $e){

            return response()->json(["success" => false]);

        }

    }

}
