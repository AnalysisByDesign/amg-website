<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Analysis by Design Ltd',
        'product' => 'Analyse my Golf',
        'street' => 'Pear Tree Barn, Long Hyde Road',
        'location' => 'South Littleton, Worcs, UK, WR11 8TH',
        'phone' => '',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = "support@analysemy.golf";

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        "dave@analysisbydesign.co.uk",
        'dave@analysemy.golf'
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        Spark::chargeTeamsPerMember();
        Spark::identifyTeamsByPath();
        Spark::collectEuropeanVat('GB');

        Spark::noCardUpFront()->trialDays(30);
        Spark::noCardUpFront()->teamTrialDays(30);

        Spark::freePlan('Trial')
            ->features([
                'Up to 3 rounds per month',
                'Handicap calculations',
                'Round analysis',
                'Performance trends'
            ]);

        Spark::freeTeamPlan('Group Trial')
            ->features([
                'Up to 4 group events',
                'Handicap calculations',
                'Round analysis',
                'Performance trends'
            ]);

        Spark::plan('Premium', 'plan_GGOHuoYHmEpuFV')
            ->price(5)
            ->features([
                'All regular features, plus',
                'Unlimited golf rounds',
                'Enhanced analysis'
            ]);

        Spark::plan('Premium', 'plan_GGOHRuR1KHexO0')
            ->price(50)
            ->yearly()
            ->features([
                'All regular features, plus',
                'Unlimited golf rounds',
                'Enhanced analysis',
                '2 months free'
            ]);


        Spark::teamPlan('Group', 'plan_GGOIJq4Gs85AzV')
            ->price(3)
            ->maxTeamMembers(40)
            ->features([
                'Group events',
                'Event scoring',
                'Handicap adustments',
                'Suggested teams',
                'Multi-day events'
            ]);

        Spark::teamPlan('Group', 'plan_GGOJEJqRcCYY0n')
            ->price(30)
            ->maxTeamMembers(40)
            ->yearly()
            ->features([
                'Group events',
                'Event scoring',
                'Handicap adustments',
                'Suggested teams',
                'Multi-day events'
            ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
        Spark::prefixTeamsAs('group');
    }
}
