@include('multi_user.nav')

<h1>Welcome Login page</h1>

<form action="{{ route('login_submit') }}" method="post">
    @csrf
    <div>
        Email Addres
    </div>
    <div>
        <input type="text" name="email">
    </div>

    <div>
        Password
    </div>
    <div>
        <input type="password" name="password">
    </div>
    <div style="margin-top: 10px">
        <input type="submit" value="login">
        <br><a href="{{ route('forget_password') }}">Forget Password</a>
    </div>
</form>