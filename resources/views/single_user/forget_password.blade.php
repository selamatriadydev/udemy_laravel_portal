@include('single_user.nav')

<h1>Welcome Forget Password page</h1>

<form action="{{ route('forget_password_submit') }}" method="post">
    @csrf
    <div>
        Email Addres
    </div>
    <div>
        <input type="text" name="email">
    </div>
    <div style="margin-top: 10px">
        <input type="submit" value="forget password">
        <br><a href="{{ route('login') }}">login</a>
    </div>
</form>