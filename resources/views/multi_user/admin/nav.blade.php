@if (Auth::guard('admin')->user())
    <a href="{{ route('dashboard_admin') }}">Dashboard</a> -
    <a href="{{ route('settings_admin') }}">Setting</a> -
    <a href="{{ route('logout_admin') }}">Logout</a> 
@endif