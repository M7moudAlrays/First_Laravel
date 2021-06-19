<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Models\video;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function getViewers()
    {
        $vedio = video::first() ;
        event(new VideoViewer($vedio)) ;
        return view ('video',['data' =>$vedio]) ;
    }
}
