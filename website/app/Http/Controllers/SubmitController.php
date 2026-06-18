<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmitController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // We need a paid subscription to view this page
        $this->middleware('subscribed');
    }

    /**
     * Show the submit new round form
     *
     * @return Response
     */
    public function show()
    {
        return view('submit');
    }
}
