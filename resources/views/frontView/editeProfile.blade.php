@extends('layout.master')
@section('title','Edit profile')

@section('style')

.pic img{
	width: 260px;
    height: 260px;
    border-radius: 50%;
    border: 3px outset #d6d6d6;
}
.pic {
	width: 270px;
	margin:54px auto;
}
.profile_left {
    margin: 16px 0;
    height: 100%;
}

.profile_right {
    background: #efefef;
    padding: 0 !important;}

h2{
    text-align: center;
    color: #444;
}

			.buttonBlue{
				padding: 7px 22px;
				background: #007bff;
				border:#007bff;
				border-radius: 6px;
				color: white;
				
			}
			
			.buttonBlue:hover{
				background: #2890ff;
				border:#2890ff;
				border-radius: 6px;
			}
			
			.buttonOrang{
				background: #ff4141 !important;
				margin-right:41px;
			}
			
			
.basic{
    margin-top: 44px;
}
 h4{
    color:#333;
}
.basic p{
    margin-bottom:7px !important;
}
.basic .span{
    margin-right:61px !important;
}
.edit{
    color: #333;
	font-size:26px;
    transition: 1s;
}
.edit:hover{
    color: #ff632f;
    transition: .5s;
}

.createPost{
	
    margin-top: 0px !important;
    overflow: hidden;
    padding-bottom: 20px !important;
    border-radius: 0px 0px 6px 6px !important;	
}
.createPostTextarea{
    width: 81%;
    border: 2px solid #eaeaea;
    border-radius: 17px;
    padding: 12px 16px;
    font-size: 20px;
    resize: none !important;
	margin-bottom: 9px;
}

.profile{
    width: 55px;
    height: 55px;
    border-radius: 50%;
    border: 1px solid #bcbdbf;
    float: left;
    margin: 12px 6px;
    margin-right: 19px;
}


#input_file{
	 width: 194px;
}

#input_file::before {
    content: '\f03e   Chose a image';
    font-family: FontAwesome,'Roboto';
    font-size: 20px;
    margin-right: 65px;
    color: #007bff;
}

.PostSubmit{
	float:right;
	
}
.postFot{
	padding:0 85px;
}			
.name{
	
    font-size: 22px;
    padding-top: 4px;
}			
			
	
.PostTextarea{
    width: 100%;
    
    border: none;
    border-radius: 17px;
    padding: 12px 16px;
    font-size: 20px;
    resize: none;
	cursor: pointer;
}

.box{
    background: white;
    margin: 10px 6px;
    padding: 5px 13px;
    border-radius: 6px;
}			
	
.icon{
	color: #d8d8d8;
    font-size: 23px;
}
.iconTex{
	color: #5f5f5f;
}


@endsection


@section('content')

<main>
	<div class="container">
		<div class="row">
			<div class="col-md-4 profile_left">
			
				<div class="pic">
					<img src="{{asset('image/'.$data->image)}}" alt="" />
				</div>
				
				<h2>{{$data->name}}</h2>
				
				<div class="flow">
				<br />
					<a class="buttonOrang buttonBlue" type="button" href=""><i class="fas fa-user-plus"></i> Follow</a>
					<a class="buttonBlue" type="button" href=""><i class="fas fa-comment-dots"></i> massage</a>
				</div>
				<br />
				<div class="basic">
					<h4><i class="fas fa-info-circle"></i> Basic info</h4>
					<hr />
					<p class="span" >Followers : <b>{{$data->Followers}}</b></p>
					<p>Following : <b>{{$data->Following}}</b></p>
					
					<p>Gender : <b>{{$data->gender}}</b></p>
					<p>Address: <b>{{$data->address}}</b> </p>
					<p>Profile link: <b></b> </p>
					<br />
					<br />
					
					
									
			@if(Sentinel::check() AND Sentinel::getUser()->code== $data->code)
					<a class="edit" href="/profile/edit/{{Sentinel::getUser()->code}}"><i class="fas fa-user-edit"></i> Edite profile</a>
					<br />
					<br />
			@endif 

					
					
				</div>
				
			</div>
			<div class="profile_right col-md-8">
			
			@include('messages.message')
				<div class="box createPost">
				<br />
				<h4>Posts</h4>
				
				
			@if(Sentinel::check() AND Sentinel::getUser()->code== $data->code)
				<hr />
				
					<form action="/profile/edit/{{Sentinel::getUser()->code}}" method="POST" enctype="multipart/form-data" > 
						{{csrf_field()}}
					
						<div class="form-group">
						  <label for="profile">Update profile picture </label>
						  <input  onchange="loadFile(event)"style="height:auto !important;" type="file"  value="{{$data->image}}" class="uplode form-control" id="profile" placeholder="Enter verify code" name="image">
						</div>
						
						<div class="cropImg"></div>
					
					
						<div class="form-group">
						  <label for="email">Name </label>
						  <input type="text" value="{{$data->name}}" class="form-control" id="email" placeholder="Enter verify code" name="name">
						</div>
					
						<div class="form-group">
						  <label for="gender">Gender </label>
						  
						  
						<select class="form-control valid" name="gender" id="gender">
							<option value="0">========================================= Select gender =================================== </option>

						
						<option  selected="" value="{{$data->gender}}">{{$data->gender}}</option>
						
						@if($data->gender=="Female")
							
						<option value="Male">Male</option>
						
						@elseif($data->gender=="Male")
						
						<option value="Female">Female</option>
						
						@endif
						
						</select>
								  
						</div>
					
						<input class="buttonBlue PostSubmit" type="submit" value="Update" />
					</form>
					
			@else
					
				<h1>Something went wrong</h1>
			@endif 
									
					
				</div>
				
				
			</div>
		</div>
	</div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
<script type="text/javascript">

$('.PostTextarea').each(function () {
  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px !important;');
});



var loadFile = function(event) {
	$('.cropImg').append('<img id="output" src="" height=200  /><br /><br />');

	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};




/*         var p = $("#output");
 
        $("body").on("change", ".uplode", function(){
			
            var imageReader = new FileReader();
            imageReader.readAsDataURL(document.querySelector(".uplode").files[0]);
 
            imageReader.onload = function (oFREvent) {
                p.attr('src', oFREvent.target.result).fadeIn();
            };
        });
 
        $('#p').imgAreaSelect({
            onSelectEnd: function (img, selection) {
                $('input[name="x1"]').val(selection.x1);
                $('input[name="y1"]').val(selection.y1);
                $('input[name="w"]').val(selection.width);
                $('input[name="h"]').val(selection.height);            
            }
        });
 */
/* 
 viewport: {
        width: 150,
        height: 200
    }

 */

</script>

@endsection