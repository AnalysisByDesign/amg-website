<!-- Right Side Of Navbar -->
@if( ! Spark::user()->subscribed() )
    <li class="nav-item"><a href="/pricing" class="nav-link">{{__('Pricing')}}</a></li>
@endif
