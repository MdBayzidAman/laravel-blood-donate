@extends('layout.master')
@section('title','Home')

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
}


@endsection

@section('content')






 <main>
    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>
                                    <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                    <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
						
						
                        <div class="trending-top mb-30">
						<a href="/details/{{$topPost->code}}">
                            <div class="trend-top-img">
                                <img class="top_image" src="{{asset('image/'.$topPost->image)}}" alt="">
                                <div class="trend-top-cap">
                                    <span>{{$topPost->cetagory}}</span>
                                    <h2><a href="/details/{{$topPost->code}}">{{$topPost->tittle}}</a></h2>
                                </div>
                            </div>
							</a>
                        </div>
						
						
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
							
							@foreach($data as $valu)
                                <div class="col-lg-4">
                                <div class="single-bottom mb-35">
								<a href="/details/{{$valu->code}}">
                                    <div class="trend-bottom-img mb-30">
                                        <img class="bottom_image" src="{{asset('image/'.$valu->image)}}" alt="">
                                    </div>
                                    <div class="trend-bottom-cap">
                                        <span class="color1">{{$valu->cetagory}}</span>
                                        <h4><a href="/details/{{$valu->code}}">{{$valu->tittle}}</a></h4>
                                    </div>
									</a>
                                </div>
                                </div>
							@endforeach	
								
                            </div>
                        </div>
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
					
					@foreach($BlogRight as $data)
                        <div class="trand-right-single d-flex">
						<a href="/details/{{$data->code}}">
                            <div class="trand-right-img">
                                <img class="right_image" src="{{asset('image/'.$data->image)}}" alt="">
                            </div>
                            <div class="trand-right-cap">
                                <span class="color1">{{$data->cetagory}}</span>
                                <h4><a href="/details/{{$data->code}}">{{$data->tittle}}</a></h4>
                            </div>
							</a>
                        </div>
						
						@endforeach
						
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!--   Weekly-News start -->
    <div class="weekly-news-area pt-50">
        <div class="container">
           <div class="weekly-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Weekly Top News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly-news-active dot-style d-flex dot-style">
						
						@foreach(App\blog::orderBy('id','desc')->paginate(7) as $post)
                            <div class="weekly-single">
							<a href="/details/{{$post->code}}">
                                <div class="weekly-img">
                                    <img src="{{asset('image/'.$post->image)}}" alt="">
                                </div>
                                <div class="weekly-caption">
                                    <span class="color1">{{$post->cetagory}}</span>
                                    <h4><a href="</a>">{{$post->tittle}}</a></h4>
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

	
	
    <div class="recent-articles">
        <div class="container">
           <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Recent Articles</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
						@foreach(App\publicPost::orderBy('id','desc')->paginate(7) as $publicPost)
                            <div class="single-recent mb-100">
                                <div class="what-img">
                                    <img src="{{asset('image/'.$publicPost->image)}}" alt="">
                                </div>
                                <div class="what-cap">
                                    <span class="color1">{{$post->name}}</span>
                                    <h4><a href="#">{{$post->post}}</a></h4>
                                </div>
                            </div>
							
							@endforeach
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>           
    <!--Recent Articles End -->
    <!-- End pagination  -->
    </main>
    
@endsection