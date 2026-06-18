@extends('spark::layouts.app')

@section('title')
Analyse my Golf
@endsection

@section('content')

<div class="general-features h-full mx-auto max-w-1000">

    <div class="mx-3 px-4 pt-4 bg-white border-b border-gray-600">

        <h1>Improving your game takes just 3 easy steps</h1>

    </div>

    <div class="flex flex-wrap mx-3">

        <div class="flex-grow md:flex-1 mx-0 mb-10 px-10 bg-white shadow-xl">
            {!! $content !!}
        </div>
        <br>
        <div class="flex-grow md:flex-0 mx-0 mb-10 p-4 bg-white shadow-xl min-w-300 md:max-w-300">
            <p class="text-center">
                Improve your game with<br><b>Analyse my Golf</b>
            </p>
            <p class="text-center">
                <a class="btn btn-lg btn-success" href="/register">Register Your Interest</a>
            </p>
        </div>

    </div>

</div>

@endsection
