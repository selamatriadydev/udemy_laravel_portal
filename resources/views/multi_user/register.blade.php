@include('single_user.nav')

<h1>Welcome Register page</h1>
 
<form action="{{ route('register_submit') }}" method="post">
    @csrf
    <div>
       Name
    </div>
    <div>
        <input type="text" name="name">
    </div>
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
    <div>
        Retype Password
    </div>
    <div>
        <input type="password" name="retype_password">
    </div>
    <div style="margin-top: 10px"><input type="submit" value="Register"></div>
</form>