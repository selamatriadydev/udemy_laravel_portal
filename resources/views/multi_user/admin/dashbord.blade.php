@include('multi_user.admin.nav')

<h1>Welcome dashboard admin page</h1> 
<p>Hi {{ Auth::guard('admin')->user()->name }}, welcome to dashbord</p>