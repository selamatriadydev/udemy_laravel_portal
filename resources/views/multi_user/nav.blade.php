<a href="{{ route('home') }}">Home</a> -
@if (Auth::guard()->user())
<a href="{{ route('dashboard') }}">Dashboard</a> -
<a href="{{ route('logout') }}">Logout</a> 
@endif
@if (!Auth::guard()->user())
    <a href="{{ route('register') }}">Register</a> - 
    <a href="{{ route('login') }}">Login</a> 
@endif