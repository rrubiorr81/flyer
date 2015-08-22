<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        //to be able to use the [$signedIn, $user] variables in the views...
        view()->share('signedIn', Auth::check());
        view()->share('user', Auth::user());
    }

}
