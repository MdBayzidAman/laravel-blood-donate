@extends('layout.master')
@section('title','Profile')

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
				
<!--				<div class="flow">
				<br />
					<a class="buttonOrang buttonBlue" type="button" href=""><i class="fas fa-user-plus"></i> Follow</a>
					<a class="buttonBlue" type="button" href=""><i class="fas fa-comment-dots"></i> massage</a>
				</div>
-->				
				
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
					<img class="profile" src="{{asset('image/'.$data->image)}}" alt="" />
				
					<form action="/create_post" method="POST" enctype="multipart/form-data" > 
						{{csrf_field()}}
					
					<textarea class="createPostTextarea" name="post" id="" cols="30"></textarea>
					
					<input  name="user_id" value="{{Sentinel::getUser()->id}}" type="hidden" />
					
					
					<div class="postFot">
					
					<span>
						<input id="input_file" name="image" value="" type="file" />
					</span>
					
					
					
					<input class="buttonBlue PostSubmit" type="submit" value="Share your mind" />
					
					</div>
					
					
					</form>
			@endif 

				
					
					
				</div>
				
				
				@foreach(App\publicPost::where('user_id','=',$data->id)->get() as $post)
				
				<div class="box publicPost">
					<div class="profileSec">
						<img class="profile" src="{{asset('image/'.$data->image)}}" alt="" />
						<br />
							<span class="name">{{$data->name}}</span>
						
						
					</div>
					
					<a href="/post/{{$post->code}}">
					<textarea class="PostTextarea" readonly="readonly" name="" cols="30" rows="">{{$post->post}}</textarea>
					
					<div class="post_image">
						<img style="width:100%" src="{{asset('image/'.$post->image)}}" alt="" />
					</div>
					</a>
                                <div class="social-share">
								<hr style="margin: 0px 0 !important;" />
                                    <div style="padding-top: 26px;padding-bottom: 13px;" class="section-tittle">
                                        <h3 class="ml-3 mr-20">Share:</h3>
                                        <ul>
                                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://127.0.0.1:8000/post/{{$post->code}}"><img src="{{asset('bloodFile/img/news/icon-fb.png')}}" alt=""></a></li>
                                            <li><a href="#"><img src="{{asset('bloodFile/img/news/icon-ins.png')}}" alt=""></a></li>
                                            <li><a href="https://twitter.com/intent/tweet?text=https://127.0.0.1:8000/post/{{$post->code}}"><img src="{{asset('bloodFile/img/news/icon-tw.png')}}" alt=""></a></li>
                                            <li> </li>
                                            <li> </li>
                                            <li> </li>
                                            <li> </li>
                                            <li> </li>
                                            <li><a href="/post/{{$post->code}}"><i style="cursor: pointer;" class="icon far fa-comment"> </i> <span style="cursor: pointer;" class="iconTex" >{{$post->comment}}  comment </span></a></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li><i class="icon fas fa-eye"> </i> 
											<span class="iconTex" >{{$post->view}}  view</span></li>
                                        </ul>
                                    </div>
                                </div>
				</div>
				
				
				@endforeach
				
				
			</div>
		</div>
	</div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
<script type="text/javascript">

$('.PostTextarea').each(function () {
  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px !important;');
});




</script>

@endsection