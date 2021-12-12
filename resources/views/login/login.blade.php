@extends('layout.master')
@section('title','Login')

@section('style')
.signup_btn{
    color: #fc3f00;
    outline: medium none;
}
.signup_btn:hover{
    color: #ff6533;
    outline: medium none;
}


	
@endsection

@section('content')
<div class="container">
@include('messages.message')

	<div class="row">
		<div class="col-md-3"></div>
		<div class="mt-4 col-md-6">
<!-- login -->
			
			<h2 class="mt-2" style="text-alaign:center;text-align: center;font-family: cursive;font-weight: 600;font-size: 40px;color: #fc3f00;">Login your account</h2>
			
			<form class="mt-5 form-contact contact_form"  method="POST"  action="/login">
			<span>Don't have an account yet? <a class="signup_btn" href="/create_new_account"> Create new account.</a></span><br /><br />
				{{csrf_field()}}
				<div class="form-group">
                   <input class="form-control valid" name="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your email'" placeholder="Enter your email">
                </div>
				<div class="form-group">
                   <input class="form-control valid" name="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your password'" placeholder="Enter your password">
				   <br><a class="ml-1 signup_btn" href="#">Forgot your password?</a></br>
				   <br />
                <input value="Login" type="submit" class="button button-contactForm boxed-btn"/>
				   
                </div>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
<br /><br /><br />
@endsection
