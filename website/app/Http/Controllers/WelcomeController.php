<?php

namespace App\Http\Controllers;

use Parsedown;
use Laravel\Spark\Spark;

class WelcomeController extends Controller
{
    /**
     * Show the application splash screen.
     *
     * @return Response
     */
    public function show()
    {
        $welcomeFile = file_exists(resource_path('content/welcome.' . app()->getLocale() . '.md'))
            ? resource_path('content/welcome.' . app()->getLocale() . '.md')
            : resource_path('content/welcome.md');

        return view('spark::welcome', [
            'content' => (new Parsedown)->text(file_get_contents($welcomeFile))
        ]);
    }
}
