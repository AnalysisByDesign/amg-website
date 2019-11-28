<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThanksController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
        
        // We do not need a paid subscription to view this page
        //$this->middleware('subscribed');
    }
    
    /**
    * Show the search content
    *
    * @return Response
    */
    public function show()
    {
        return view('thanks');
    }
}