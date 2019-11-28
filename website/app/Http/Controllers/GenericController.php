<?php

namespace App\Http\Controllers;

use Parsedown;
use Laravel\Spark\Spark;

class GenericController extends Controller
{
    /**
     * Show the terms of service for the application.
     *
     * @return Response
     */
    public function features()
    {
        $featuresFile = file_exists(resource_path('content/features.' . app()->getLocale() . '.md'))
            ? resource_path('content/features.' . app()->getLocale() . '.md')
            : resource_path('content/features.md');

        return view('spark::features', [
            'content' => (new Parsedown)->text(file_get_contents($featuresFile))
        ]);
    }

    /**
     * Show the terms of service for the application.
     *
     * @return Response
     */
    public function pricing()
    {
        $pricingFile = file_exists(resource_path('content/pricing.' . app()->getLocale() . '.md'))
            ? resource_path('content/pricing.' . app()->getLocale() . '.md')
            : resource_path('content/pricing.md');

        return view('spark::pricing', [
            'content' => (new Parsedown)->text(file_get_contents($pricingFile))
        ]);
    }

    /**
     * Show the terms of service for the application.
     *
     * @return Response
     */
    public function about()
    {
        $aboutFile = file_exists(resource_path('content/about.' . app()->getLocale() . '.md'))
            ? resource_path('content/about.' . app()->getLocale() . '.md')
            : resource_path('content/about.md');

        return view('spark::about', [
            'content' => (new Parsedown)->text(file_get_contents($aboutFile))
        ]);
    }

    /**
     * Show the terms of service for the application.
     *
     * @return Response
     */
    public function terms()
    {
        $termsFile = file_exists(resource_path('content/terms.' . app()->getLocale() . '.md'))
            ? resource_path('content/terms.' . app()->getLocale() . '.md')
            : resource_path('content/terms.md');

        return view('spark::terms', [
            'content' => (new Parsedown)->text(file_get_contents($termsFile))
        ]);
    }

    /**
     * Show the terms of service for the application.
     *
     * @return Response
     */
    public function privacy()
    {
        $privacyFile = file_exists(resource_path('content/privacy.' . app()->getLocale() . '.md'))
            ? resource_path('content/privacy.' . app()->getLocale() . '.md')
            : resource_path('content/privacy.md');

        return view('spark::privacy', [
            'content' => (new Parsedown)->text(file_get_contents($privacyFile))
        ]);
    }

    /**
     * Show the terms of service for the application.
     *
     * @return Response
     */
    public function status()
    {
        $statusFile = file_exists(resource_path('content/status.' . app()->getLocale() . '.md'))
            ? resource_path('content/status.' . app()->getLocale() . '.md')
            : resource_path('content/status.md');

        return view('spark::status', [
            'content' => (new Parsedown)->text(file_get_contents($statusFile))
        ]);
    }
}
