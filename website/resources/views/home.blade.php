@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>

    <div class="h-full mx-auto max-w-1000">

        <div class="flex">
    
            <div class="flex-1 mx-auto max-w-500">
                {{-- Loop through the $rounds collection, passing each element as var post --}}
                @foreach($rounds as $round)
                    @include('cards.round-summary')
                @endforeach
            </div>
    
            <div class="hidden lg:block lg:flex-1">
                @if( $highlight_round_id != "" )
                    @include('cards.round-detail')
                @endif
            </div>
    
        </div>
    </div>
    
</home>
@endsection
