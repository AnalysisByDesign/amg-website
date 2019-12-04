@extends('spark::layouts.app')

@section('content')

    <div class="container">

        <!-- This is an individual users profile -->

        <div class="row">
            <div id="user-profile-header" class="col-xs-12 p-none">

@include('users.profile-public')

            </div>
        </div>

        <div class="row">

            <!-- This is an individual users profile summary -->

            <div id="user-profile-summary" class="hidden-xs col-sm-6 p-none">

                <div class="amg">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            The users profile summary, showing stuff like venues, handicaps, etc.
                        </div>
                    </div>
                </div>

            </div>

            <!-- This is an individual users timeline -->

            <div id="user-profile-timeline" class="col-xs-12 col-sm-6 p-none">

{{-- Loop through the $posts collection, passing each element as var post --}}
{{-- @each('cards.round-summary', $posts, 'post') --}}

            </div>

        </div>
    </div>

@endsection
