@extends('admin.DashbordLayout.master')
@section('title','New cetagories')

@section('style')


h1{
	text-align:center;
}	
	
select,input,textarea{
	width: 100%;
    padding: 5px 9px;
    font-size: 19px;
	border:1px solid #333;
}

table{
    width: 970px !important;
	
	    margin: auto;
}


@endsection

@section('content')


<br>
<br>

<h1>Add bloge</h1>
<br>

	@include('messages.message')

<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-9 mx-2">
		
			<form class="blog" action="/add_blog" enctype="multipart/form-data" method="POST"  >
				{{csrf_field()}}
				
				<input name="tittle" placeholder="Tittle" type="text" /><br /><br />
				
				
				
				<select name="cetagory" id="cetagory">
					<option value="1">================================= Select one ================================= </option>
					<option value="Information">Information</option>
					<option value="Thalasamiya">Thalasamiya</option>
					<option value="Aids">Aids</option>
					<option value="Anemia">Anemia</option>
					<option value="Blood">Blood</option>
					<option value="Blood diseases">Blood diseases</option>
				</select>
				
				<br /><br />
				
				<input name="image" type="file" /><br /><br />
				
				<textarea name="details" placeholder="Details........." id="" cols="70" rows="7"></textarea><br /><br />
				
				<input type="submit" value="Create" />
				
				<br /><br /><br /><br />
				
			</form>
			
			<div class="col-md-1"></div>
		</div>
	</div>
</div>


@endsection




