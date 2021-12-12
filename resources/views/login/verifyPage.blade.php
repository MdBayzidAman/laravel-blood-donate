@extends('layout.master')
@section('title','Verify')

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
<br />
@include('messages.message')
	<div class="row">
		<div class="col-md-3"></div>
		<div class="mt-4 col-md-6">
		
<!-- login -->
			
			<h2 class="mt-2" style="text-alaign:center;text-align: center;font-family: cursive;font-weight: 600;font-size: 40px;color: #fc3f00;">Verify your account</h2>
			
			<form class="mt-5 form-contact contact_form"  method="POST"  action="/verify">
			<span>We send a verify code to your email. <span class="signup_btn"> please chack your email. </span></span><br /><br />
				{{csrf_field()}}
				<div class="form-group">
                   <input class="form-control valid" name="code" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter verify code'" placeholder="Enter verify code">
                </div>
				
				
				<div class="form-group">
                <!--  <input class="form-control valid" name="password" type="hidden" value="<?php //echo $_REQUEST["email"];?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your password'" placeholder="Enter your password"> -->
				  
				   <a class="ml-1 signup_btn" href="/resent?email=<?php echo $_REQUEST["email"];?>&name=<?php echo $_REQUEST["name"];?>" >Resend verify code ?</a>
				   
				   {{$name ?? ''}}
				   </br> </br>
				<input value="Verify" type="submit" class="button button-contactForm boxed-btn"/><br />
                </div>
				
				
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
<br /><br /><br />
@endsection
