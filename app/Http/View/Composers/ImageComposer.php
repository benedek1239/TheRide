<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class ImageComposer
{


    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if(auth()->check()){
            $user = auth()->user();
            $imgSrc = $user->hasMedia('profile') ? url('/') . '/' . $user->getMedia('profile')->first()->getDiskPath() : asset('images/blank.jpg');
        } else {
            $imgSrc = asset('images/blank.jpg');
        }

        $view->with('imgSrc', $imgSrc);
    }
}