@extends('spark::layouts.app')

@section('content')

<div class="container">

        <!-- This is an individual courses profile -->

        <div class="row">
            <div id="course-profile-header" class="col-xs-12 p-none">

@include('courses.profile-public')

            </div>
        </div>

        <div class="row">

            <!-- This is an individual courses profile summary -->

            <div id="course-profile-summary" class="hidden-xs col-sm-6 p-none">

                <div class="amg">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            The courses profile summary, showing stuff like venues, handicaps, etc.
                        </div>
                    </div>
                </div>

            </div>

            <!-- This is an individual courses timeline -->

            <div id="course-profile-timeline" class="col-xs-12 col-sm-6 p-none">

{{-- Loop through the $posts collection, passing each element as var post --}}
{{-- @each('timeline.panel', $posts, 'post') --}}

            </div>

        </div>
    </div>

@endsection
