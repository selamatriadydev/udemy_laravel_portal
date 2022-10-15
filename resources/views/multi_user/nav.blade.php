<a href="{{ route('home') }}">Home</a> -
@if (Auth::guard()->user())
    @if (Auth::guard()->user()->role == 2)
        <a href="{{ route('dashboard_user') }}">Dashboard User</a> -
    @endif
    @if (Auth::guard()->user()->role == 1)
        <a href="{{ route('dashboard_admin') }}">Dashboard Admin</a> -
        <a href="{{ route('settings') }}">Setting</a> -
    @endif
<a href="{{ route('logout') }}">Logout</a> 
@endif
@if (!Auth::guard()->user())
    <a href="{{ route('register') }}">Register</a> - 
    <a href="{{ route('login') }}">Login</a> 
@endif