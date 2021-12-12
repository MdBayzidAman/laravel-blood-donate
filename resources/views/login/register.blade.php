@extends('layout.master')
@section('title','Register')

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
		<div class="mt-5 col-md-6">
<!-- login -->
			
			<h2 class="mt-2" style="text-alaign:center;text-align: center;font-family: cursive;font-weight: 600;font-size: 40px;color: #fc3f00;">Create new account</h2>
			
			
			<form class="mt-5 form-contact contact_form" method="POST" action="/create_new_account">
			{{csrf_field()}}
			<span>You have an account yet? <a class="signup_btn" href="/login"> Login.</a></span><br /><br />
			
				
				<div class="form-group">
                   <input class="form-control valid" name="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                </div>
				<div class="form-group">
                   <input class="form-control valid" name="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your email'" placeholder="Enter your email">
                </div>
				<div class="form-group">
                   <input class="form-control valid" name="number" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your number'" placeholder="Enter your number">
                </div>
				
				
				<div class="form-group">
				<select class="form-control valid" name="gender" id="">
					<option value="0">==================== Select gender =================== </option>
				
				
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				
				
				</select>
                </div>
				
				<div class="form-group">
                   <input class="form-control valid" name="address" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your address'" placeholder="Enter your address">
                </div>
				
				<div class="form-group">
                   <input class="form-control valid" name="password"type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'password'" placeholder="password">
                </div>
				
				
				<div class="form-group">
                   <input class="form-control valid" name="confirmPassword"type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm your password'" placeholder="Confirm your password">
                </div>
				  
                <input value="Register" type="submit" class="button button-contactForm boxed-btn"/>
				   
				
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
<br /><br /><br />
@endsection
