@extends('spark::layouts.app')

@section('content')
<div class="container">
    <!-- Application Dashboard -->
    <div class="row justify-content-center">
        <div class="col-xs-8 col-xs-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Analyse my Golf</div>

                <div class="panel-body">
                    <p>
                        Thanks for registering!
                    </p>
                    <p>
                        We are going to let the first 500 players
                        who register have free lifetime access to our premium service. 
                        If you are asked to enter payment details when your free trial expires,
                        please ignore these for now - you will be upgraded automatically before long.
                    </p>
                    <p>
                        There's not much to show you at the moment, but we will let you 
                        know when new functionality is released. In the meantime, have a 
                        browse around and see what we have to offer.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
