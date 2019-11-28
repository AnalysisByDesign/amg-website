@extends('spark::layouts.app')

@section('title')
AmG &#x2799; {{__('Privacy and Confidentiality')}}
@endsection

@section('content')
<div class="general-features h-full mx-auto max-w-1000">

    <div class="mx-3 px-4 pt-4 bg-white border-b border-gray-600">

        <h1>{{__('Privacy and Confidentiality')}}</h1>

    </div>
    <div class="mx-3 p-4 bg-white shadow-xl">

            {!! $content !!}

    </div>

</div>
    
@endsection
