@extends('admin.DashbordLayout.master')
@section('title','New cetagories')

@section('style')

form{
    margin: auto;
    width: 213px;
}

h1{
	text-align:center;
}	
	
select,input{
	    width: 293px;
    padding: 5px 9px;
    font-size: 19px;
}


table{
    width: 910px !important;
	
	    margin: auto;
}

@endsection

@section('content')


<br>
<br>

<h1>view blood doner</h1>
<br>

	@include('messages.message')


	<form action="/students" method="POST" enctype="multipart/form-data">

		{{csrf_field()}}

			<select id="blood" name="blood">
				<option value="0"> Search blood group </option>
				
				
				@foreach(App\blood::all() as $blood)
				
				<option value="{{$blood->id}}">{{$blood->blood_group}}</option>
				
				@endforeach
				
			</select><br /><br />




		</form>


		<table class="table table-striped table-active">
			<thead class="thead-dark">
					<tr>
					  <th scope="col">Sl</th>
					  <th scope="col">Name</th>
					  <th scope="col">Email</th>
					  <th scope="col">Mobile</th>
					  <th scope="col">Blood</th>
					  <th scope="col">Birth</th>
					  <th scope="col">Address</th>
					  <th scope="col">Age</th>
					</tr>
				  </thead>
				  <tbody id="viewList">
				  @foreach($data as $sl=>$datas)
					<tr class="" >
					  <td>{{++$sl}}</td>
					  <td>{{$datas->name}}</td>
					  <td>{{$datas->email}}</td>
					  <td>{{$datas->phone}}</td>
					  <td>{{$datas->blood_group}}</td>
					  <td>{{$datas->birth}}</td>
					  <td>{{$datas->address}}</td>
					  <td>{{$datas->Age}}</td>
					  
					  
				   
					</tr>
				  @endforeach
				  </tbody>
				</table>



				
				
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

            <script type="text/javascript">
               
                $('#blood').on('change',function(e){
                    console.log(e);

                    var blood= e.target.value;
					
					
					if(blood > 0){
						
                    $.get('/searchBloodDoner?blood='+ blood,function(data){
                        console.log(data);
 
                     $('#viewList').empty();
/*          $('#viewList').append('<option value="0" disable="true" selected="true">===== View Student =====</option>');
 */


		$.each(data, function(index, stdObj){
			
			var x=1;
				x += index;
            $('#viewList').append('<tr class="" ><td>'+ x +'</td><td>'+ stdObj.name +'</td><td>'+ stdObj.email +'</td><td>'+ stdObj.phone +'</td><td>'+ stdObj.blood_group +'</td> <td>'+ stdObj.birth +'</td><td>'+ stdObj.address +'</td><td>'+ stdObj.Age +'</td></tr>');
          });

                    });
                
						
						
					}else{
						$('#viewList').empty();
						
						$('#viewList').append('@foreach($data as $sl=>$datas)<tr class="" ><td>{{++$sl}}</td><td>{{$datas->name}}</td>  <td>{{$datas->email}}</td><td>{{$datas->phone}}</td><td>{{$datas->blood_group}}</td><td>{{$datas->birth}}</td><td>{{$datas->address}}</td><td>{{$datas->Age}}</td></tr>@endforeach');
						
					}

				
				});
				

            </script>




				
@endsection




