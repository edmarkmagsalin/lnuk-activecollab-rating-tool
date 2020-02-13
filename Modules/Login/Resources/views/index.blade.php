@extends('login::layouts.master')

@section('content')
    <div class="login-form-container">
        <div class="logo"><img src="http://ctechasset.com/rating/ratingtool/images/logo.png" alt="" width="100"></div>
        <h1>Active Collab<br /> Login</h1>
        <form action="https://www.facebook.com" method="post">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Password">
            <input type="submit" value="Login" class="btn btn-primary">
            <!-- <input type="button" value="Sign in with Google" class="btn btn-primary"> -->
        </form>
    </div>
    
@endsection
