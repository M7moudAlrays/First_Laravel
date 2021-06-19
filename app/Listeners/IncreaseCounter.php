<?php

namespace App\Listeners;

use App\Events\VideoViewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class IncreaseCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(VideoViewer $event)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(VideoViewer $event)
    {
        if(! session()->has('VideoVisited'))
        {
            $this ->updateviewer ($event ->Vedio) ;
        }
    }

    public function updateviewer ($ourvideo)
    {         
        $ourvideo -> viewers = $ourvideo -> viewers +1 ;
        $ourvideo -> save();

        session()->put('VideoVisited',$ourvideo->id) ;
    }
}
