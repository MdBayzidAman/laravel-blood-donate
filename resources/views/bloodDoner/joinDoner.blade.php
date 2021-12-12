@extends('layout.master')
@section('title','Join doner')

@section('style')
.signup_btn{
    color: #fc3f00;
    outline: medium none;
}
.signup_btn:hover{
    color: #ff6533;
    outline: medium none;
}

.select{
    display: inline-block;
    width: 32%;
    padding: 0;
}
.selectMar{
    margin-right: 1.3%;
}
.label{
	margin-top:-13px;
}
.labelDiv{
	padding: 0; font-size:18px! important;color: #333;
}

	
@endsection

@section('content')
<div class="container">
<br />
@include('messages.message')
	<div class="row">
	
	
		<div class="col-md-2"></div>
		
		<div  class="labelDiv col-md-1">
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
			<div class="">Name :</div><br /><br />
			<div class="">Email :</div><br /><br />
			<div class="">Phone :</div><br /><br />
			<div class="">Blood :</div><br /><br />
			<div class="label">Birth day :</div><br /><br />
			<div class="">address :</div><br /><br />
			<div class="">Age :</div><br /><br />
		</div>
		
		<div class="mt-5 col-md-6">
<!-- login -->
			
			<h2 class="mt-2" style="text-alaign:center;text-align: center;font-family: cursive;font-weight: 600;font-size: 40px;color: #fc3f00;">Join a blood doner.</h2>
			
			
			<form class="mt-5 form-contact contact_form" method="POST" action="/join-blood-doner">
			{{csrf_field()}}
			
				
				<div class="form-group">
                   <input class="form-control valid" name="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                </div>
				<div class="form-group">
                   <input class="form-control valid" name="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your email'" placeholder="Enter your email">
                </div>
				<div class="form-group">
                   <input class="form-control valid" name="phone" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your number'" placeholder="Enter your number">
                </div>
				
				<div class="form-group">
				<select class="form-control valid" name="blood" id="">
					<option value="0">==================== Select blood group =================== </option>
				@foreach(App\blood::all() as $blood)
				
				<option value="{{$blood->blood_group}}">{{$blood->blood_group}}</option>
				
				@endforeach
				</select>
                </div>
				  
				<div class="form-group">
				   
				   <input name="birth" type="text" class="form-control valid"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your birthday'" placeholder="Enter your birthday" />
                </div>
				
				<div class="form-group">
				
					<select class="select selectMar form-control valid" name="division" id="division">
						<option value="1">Select a division</option>
						@foreach(App\division::all() as $data)
						<option value="{{$data->id}}">{{$data->division}}</option>
						@endforeach
						
					</select>
					
					<select class="select selectMar form-control valid" name="district" id="district">
						<option value="0">-----------------------------</option>
												
					</select>
					
					<select class="select form-control valid" name="thana" id="thana">
						<option value="0">----------------------------</option>
						
					</select>
					
                </div>
				
				
				<div class="form-group">
				   
				   <input name="age" class="form-control valid" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Age'" placeholder="Enter your Age"/>
                </div>
				
				  
                <input value="Join" type="submit" class="button button-contactForm boxed-btn"/>
				   
				
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
<br /><br /><br /><br /><br /><br /><br />





<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script type="text/javascript">
               
                $('#division').on('change',function(e){
                    console.log(e);

                    var division=e.target.value;

                    $.get('/districts?division=' + division,function(data){
                        console.log(data);

                     $('#district').empty();
          $('#district').append('<option value="0" disable="true" selected="true">Select Districts</option>');

          $.each(data, function(index, districtsObj){
            $('#district').append('<option value="'+ districtsObj.id +'">'+ districtsObj.district +'</option>');
          });

                    });
                });

				
				
                 $('#district').on('change',function(e){
                    console.log(e);

                    var district= e.target.value;

                    $.get('/json-thana?district=' + district,function(data){
                        console.log(data);

                     $('#thana').empty();
          $('#thana').append('<option value="0" disable="true" selected="true">Select upozila</option>');

          $.each(data, function(index, districtsObj){
            $('#thana').append('<option value="'+ districtsObj.id +'">'+ districtsObj.thana +'</option>');
          });

                    });
                });
            </script>

@endsection
