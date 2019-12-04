<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VwTimelineRounds;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('subscribed');

        // $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function show(Request $request)
    {
        // Get the list of rounds events for this user
        $rounds = VwTimelineRounds::orderBy('theTime', 'desc')
            ->limit(20)
            ->get();

        // Has a specific round been highlighted?
        $highlight_round_id = $request->query('highlight_round');
        $highlight_round_id = $highlight_round_id != "" ? $highlight_round_id : $rounds[0]->round_id;

        // Get the full details of the highlighted round
        $highlight_round = VwTimelineRounds::where('round_id', $highlight_round_id)->get();

        // And some validation...
        if (count($highlight_round) != 1) {
            $highlight_round_id = $rounds[0]->round_id;
            $highlight_round = VwTimelineRounds::where('round_id', $highlight_round_id)->get();
        }

        // Prepare this for display
        $highlight_round = $highlight_round[0];

        return view('home', [
            'rounds' => $rounds,
            'highlight_round_id' => $highlight_round_id,
            'highlight_round' => $highlight_round
        ]);
    }
}

//    /**
//      * Show the application dashboard.
//      *
//      * @return \Illuminate\Contracts\Support\Renderable
//      */
//     public function index()
//     {
//         return view('home');
//     }
