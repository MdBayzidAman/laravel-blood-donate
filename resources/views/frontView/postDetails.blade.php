@extends('layout.master')
@section('title','Post')

@section('style')


.top_image{
	height:400px;
}

.bottom_image{
	height: 155px;
}

.right_image{
	width: 126px;
    height: 95px;
	    color: #ddd;
    font-size: 105px
}

.icon{
	color: #d8d8d8;
    font-size: 23px;
}
.iconTex{
	color: #5f5f5f;
}

.commant{
	width: max-content;
    background: #ededed;
    padding: 6px 16px;
    border-radius: 0px 8px 8px 8px;
	max-width: 100%;
}

			.userPic{
				width: 48px !important;
				height: 48px;
			}
			
#PostTextarea{
    width: 100%;
    
    border: none;
    border-radius: 17px;
    padding: 12px 16px;
    font-size: 20px;
    resize: none;
	
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
.name{
	color:#333;
    font-size: 22px;
    padding-top: 4px;
}			
		
			
			

@endsection

@section('content')



    <main>
        <!-- About US Start -->
        <div class="about-area">
            <div class="container">
                    <!-- Hot Aimated News Tittle-->
                    <div class="row">
                        <div class="col-lg-12">
                        </div>
                    </div>
					
				@include('messages.message')	
                   <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Tittle -->
					<div class="profileSec">
					<?php $user=App\user::where('id',$data->user_id)->first();  ?>
					<a href="/profile/{{$user->code}}">
					
					
						<img class="profile" src="{{asset('image/'.$user->image)}}" alt="" />
						<br />
						<span class="name">{{$user->name}}</span>
						
						</a>
					</div>
							
                            <div class="about-right mb-90">
                                <div class="about-img">
                                    <img class="" src="{{asset('image/'.$data->image)}}" alt="">
                                </div>
								
                              <!--  <div style="text-align:justify;" class="about-prea"> {{$data->details}} </div> -->
								
								<textarea id="PostTextarea" readonly="readonly" name="" id="" cols="30" rows="">{{$data->post}}</textarea>
								
                                <div class="social-share ">
								<br /><hr />
                                    <div class="section-tittle">
                                        <h3 class="mr-20">Share:</h3>
                                        <ul>
                                            <li><a href="#"><img src="{{asset('bloodFile/img/news/icon-fb.png')}}" alt=""></a></li>
                                            <li><a href="#"><img src="{{asset('bloodFile/img/news/icon-ins.png')}}" alt=""></a></li>
                                            <li><a href="#"><img src="{{asset('bloodFile/img/news/icon-tw.png')}}" alt=""></a></li>
                                            <li><a href="#"><img src="{{asset('bloodFile/img/news/icon-yo.png')}}" alt=""></a></li>
                                            <li> </li>
                                            <li> </li>
                                            <li> </li>
                                            <li> </li>
                                            <li><i class="icon far fa-comment"> </i> <span class="iconTex" > {{$data->comment}} comment </span></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li><i class="icon fas fa-eye"> </i> 
											<span class="iconTex" > {{$data->view}} view</span></li>
                                        </ul>
                                    </div>
									<hr />
                                </div>
                            </div>
							
							<div class="mb-5 row">
							
							@foreach($comment as $commentData)
							
							
								<div class="mb-5 pr-0 col-lg-1">
									<div class="pic">
										<img class="userPic" src="{{asset('image/user.png')}}" alt="" />
									</div>
								</div>
								
								<div class="mb-5 col-lg-7">
									<div class="commant">
										<p><b>{{$commentData->name}}</b> - {{$commentData->created_at}}</p>
										<span>{{$commentData->comment}}</span>
									</div>
								</div>
								<div class="mb-5 col-lg-4"></div>
							@endforeach	
							</div>
							<hr />
							<h4>Add your comment</h4>
							<br />
                            <!-- From -->
                            <div class="row">
                                <div class="col-lg-8">
                                    <form class="form-contact contact_form mb-80" action="/comment" method="post" >
									
									{{csrf_field()}}

									
                                        <div class="row">
						 @if(Sentinel::check() AND Sentinel::getUser()->roles()->first()->slug=="visitor")
						 
						<input value="{{Sentinel::getUser()->id}}" name="user_id" type="hidden" />

						@endif 
										
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control w-100 error" name="comment" id="message" cols="30" rows="5" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter comment'" placeholder="Enter comment"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control error" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control error" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                                </div>
                                            </div>
                                             <input class="form-control error" name="post_id" value="{{$data->code}} " id="subject" type="hidden">
                                        </div>
                                        <div class="form-group mt-3">
                                            <button type="submit" class="button button-contactForm boxed-btn">Comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-40">
                                <h3>Share :</h3>
                            </div>
                            <!-- Flow Socail -->
                <div class="single-follow mb-45">
                    <div class="single-box">
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a target="blank" href="https://www.facebook.com/mdbayzid.aman"><img src="{{asset('bloodFile/img/news/icon-fb.png')}}" alt=""></a>
                            </div>
                            <div class="follow-count">  
                                <span>Facebook</span>
                                
                            </div>
                        </div> 
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a target="blank" href="https://twitter.com/MdBayzidAman1" ><img src="{{asset('bloodFile/img/news/icon-tw.png')}}" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>Twitter</span>
                                
                            </div>
                        </div>
                            <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a target="blank" href="#"><img src="{{asset('bloodFile/img/news/icon-ins.png')}}" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>Instragram</span>
                                
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a target="blank" href="#"><img src="{{asset('bloodFile/img/news/icon-yo.png')}}" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>Youtube</span>
                                
                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="trending-area fix">
					<div class="trending-main">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-40">
                                <h3>Recent public post</h3>
                            </div>
                            <!-- Flow Socail -->
					@foreach(App\publicPost::orderBy('id','desc')->paginate(7) as $postData)
					
					
                        <div class="trand-right-single d-flex">
						<a href="/post/{{$postData->code}}">
                            <div class="trand-right-img">
							
							@if($postData->image == "post.jpg")
								<i class="right_image far fa-image"></i>
							
							@else
							
                                <img class="right_image" src="{{asset('image/'.$postData->image)}}" alt="">
								
							@endif
                            </div>
                            <div class="trand-right-cap">
                                <a href="/post/{{$postData->code}}"><p>{{substr($postData->post,0,80)}} ...</p></a>
                            </div>
							</a>
                        </div>
						
						@endforeach
                        </div>
                        </div>
                        </div>
                   </div>
				   
            </div>
        </div>
        <!-- About US End -->
    </main>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
<script type="text/javascript">

document.getElementById('PostTextarea').readOnly = true;

$('#PostTextarea').each(function () {
  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px !important;');
})
</script>


@endsection