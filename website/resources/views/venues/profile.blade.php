@extends('spark::layouts.app')

@section('content')

    <div class="container">

        <!-- This is an individual venues profile -->

        <div class="row">
            <div id="venue-profile-header" class="col-xs-12 p-none">

@include('venues.profile-public')

            </div>
        </div>

        <div class="row">

            <!-- This is an individual venues profile summary -->

            <div id="venue-profile-summary" class="hidden-xs col-sm-6 p-none">

                <div class="amg">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            The venues profile summary, showing stuff like venues, handicaps, etc.
                        </div>
                    </div>
                </div>

            </div>

            <!-- This is an individual venues timeline -->

            <div id="venue-profile-timeline" class="col-xs-12 col-sm-6 p-none">

{{-- Loop through the $posts collection, passing each element as var post --}}
{{-- @each('timeline.panel', $posts, 'post') --}}

            </div>

        </div>
    </div>

@endsection
