<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $sites = Site::all();
        return view('welcome', compact('sites'));
    }
}
