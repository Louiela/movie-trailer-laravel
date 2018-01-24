<?php 
$m_upcoming = json_decode($m_upcoming);
$m_popular = json_decode($m_popular);
$m_top_rated = json_decode($m_top_rated);
$m_now_playing = json_decode($m_now_playing);
$t_airing_today = json_decode($t_airing_today);
$t_popular = json_decode($t_popular);
$t_top_rated = json_decode($t_top_rated);
$movie_video = json_decode($movie_video);
$celebrities = json_decode($celebrities);
?>
@extends('layouts.master')

@section('title')
	777movies
@endsection

@section('headContent')
	<div class="slider movie-items">
		<div class="container">
			<div class="row">
				<div class="social-link">
					<p>Follow us: </p>
					<a href="#"><i class="ion-social-facebook"></i></a>
					<a href="#"><i class="ion-social-twitter"></i></a>
					<a href="#"><i class="ion-social-googleplus"></i></a>
					<a href="#"><i class="ion-social-youtube"></i></a>
				</div>
		    	<div  class="slick-multiItemSlider">
			    	@foreach($m_upcoming as $item)
			    		<div class="movie-item">
			    			<div class="mv-img">
			    				<a href="#"><img src="http://image.tmdb.org/t/p/w500{{$item->poster_path}}" alt=""></a>
			    			</div>
			    			<div class="title-in">
			    				<div class="cate">
			    					<!-- <span class="blue"><a href="#">Sci-fi</a></span> -->
			    				</div>
			    				<h6><a href="#">{{$item->title}}</a></h6>
			    				<p><i class="ion-android-star"></i><span>{{$item->vote_average}}</span> /10</p>
			    			</div>
			    		</div>
		    		@endforeach
		    	</div>
		    </div>
		</div>
	</div>
@endsection

@section('content')
	<div class="movie-items">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8">
				<div class="title-hd">
					<h2>Movies</h2>
					<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="tabs">
					<ul class="tab-links">
						<li class="active"><a href="#tab1">#Coming soon</a></li>
						<li><a href="#tab2">#Popular</a></li>
						<li><a href="#tab3"> #Top rated</a></li>                        
					</ul>
				    <div class="tab-content">
				        <div id="tab1" class="tab active">
				            <div class="row">
				            	<div class="slick-multiItem">
				            		@foreach($m_upcoming as $item)
					            		<div class="movie-item">
					            			<div class="mv-img">
					            				<img src="http://image.tmdb.org/t/p/w500{{$item->poster_path}}" alt="">
					            			</div>
					            			<div class="hvr-inner">
					            				<a  href="/movie/{{$item->id}}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href="#">{{$item->title}}</a></h6>
					            				<p><i class="ion-android-star"></i><span>{{$item->vote_average}}</span> /10</p>
					            			</div>
					            		</div>
				            		@endforeach
				            	</div>
				            </div>
				        </div>
				        <div id="tab2" class="tab">
				            <div class="row">
				            	<div class="slick-multiItem">
				            		@foreach($m_popular as $item)
					            		<div class="movie-item">
					            			<div class="mv-img">
					            				<img src="http://image.tmdb.org/t/p/w500{{$item->poster_path}}" alt="">
					            			</div>
					            			<div class="hvr-inner">
					            				<a  href="/movie/{{$item->id}}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href="#">{{$item->title}}</a></h6>
					            				<p><i class="ion-android-star"></i><span>{{$item->vote_average}}</span> /10</p>
					            			</div>
					            		</div>
				            		@endforeach
				            	</div>
				            </div>
				        </div>
				        <div id="tab3" class="tab">
				        	<div class="row">
				            	<div class="slick-multiItem">
					            	@foreach($m_top_rated as $item)
					            		<div class="movie-item">
					            			<div class="mv-img">
					            				<img src="http://image.tmdb.org/t/p/w500{{$item->poster_path}}" alt="">
					            			</div>
					            			<div class="hvr-inner">
					            				<a  href="/movie/{{$item->id}}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href="#">{{$item->title}}</a></h6>
					            				<p><i class="ion-android-star"></i><span>{{$item->vote_average}}</span> /10</p>
					            			</div>
					            		</div>
					            	@endforeach
				            	</div>
				            </div>
			       	 	</div>
			       	 	
				    </div>
				</div>
				<div class="title-hd">
					<h2>on tv</h2>
					<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="tabs">
					<ul class="tab-links-2">
						<li class="active"><a href="#tab21">#Airing Today</a></li>
						<li><a href="#tab22"> #Popular</a></li>
						<li><a href="#tab23">  #Top rated  </a></li>                   
					</ul>
				    <div class="tab-content">
				        <div id="tab21" class="tab">
				            <div class="row">
				            	<div class="slick-multiItem">
				            		@foreach($t_airing_today as $item)
					            		<div class="movie-item">
					            			<div class="mv-img">
					            				<img src="http://image.tmdb.org/t/p/w500{{$item->poster_path}}" alt="">
					            			</div>
					            			<div class="hvr-inner">
					            				<a  href="/tv/{{$item->id}}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href="#">{{$item->name}}</a></h6>
					            				<p><i class="ion-android-star"></i><span>{{$item->vote_average}}</span> /10</p>
					            			</div>
					            		</div>
				            		@endforeach
				            	</div>
				            </div>
				        </div>
				        <div id="tab22" class="tab active">
				           <div class="row">
				            	<div class="slick-multiItem">
				            		@foreach($t_popular as $item)
					            		<div class="movie-item">
					            			<div class="mv-img">
					            				<img src="http://image.tmdb.org/t/p/w500{{$item->poster_path}}" alt="">
					            			</div>
					            			<div class="hvr-inner">
					            				<a  href="/tv/{{$item->id}}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href="#">{{$item->name}}</a></h6>
					            				<p><i class="ion-android-star"></i><span>{{$item->vote_average}}</span> /10</p>
					            			</div>
					            		</div>
				            		@endforeach
				            	</div>
				            </div>
				        </div>
				        <div id="tab23" class="tab">
				        	<div class="row">
				            	<div class="slick-multiItem">
				            		@foreach($t_top_rated as $item)
					            		<div class="movie-item">
					            			<div class="mv-img">
					            				<img src="http://image.tmdb.org/t/p/w500{{$item->poster_path}}" alt="">
					            			</div>
					            			<div class="hvr-inner">
					            				<a  href="/tv/{{$item->id}}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href="#">{{$item->name}}</a></h6>
					            				<p><i class="ion-android-star"></i><span>{{$item->vote_average}}</span> /10</p>
					            			</div>
					            		</div>
				            		@endforeach
				            	</div>
				            </div>
			       	 	</div>
				    </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="ads">
						<img src="images/uploads/ads1.png" alt="">
					</div>
					<div class="celebrities">
						<h4 class="sb-title">Spotlight Celebrities</h4>
						<?php $x = 0; ?>
						@foreach($celebrities as $item)
							<div class="celeb-item">
								<a class="img-lightbox"  data-fancybox-group="gallery" href="http://image.tmdb.org/t/p/w500{{$item->profile_path}}"><img src="http://image.tmdb.org/t/p/w500{{$item->profile_path}}" alt=""></a>
								<div class="celeb-author">
									<h6><a href="#">{{$item->name}}</a></h6>
								</div>
							</div>
							<?php $x++; if($x == 4){break;} ?>
						@endforeach
						<a href="#" class="btn">See all celebrities<i class="ion-ios-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="trailers">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-12">
				<div class="title-hd">
					<h2>in theater</h2>
					<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="videos">
				 	<div class="slider-for-2 video-ft">
				 		@foreach($movie_video as $item)
					 		<div>
						    	<iframe class="item-video" src="https://www.youtube.com/embed/{{$item->key}}"></iframe>
						    </div>
					    @endforeach
						
						
					</div>
					<div class="slider-nav-2 thumb-ft">
						@foreach($movie_video as $item)
							<div class="item">
								<div class="trailer-img">
									<img src="http://image.tmdb.org/t/p/w500{{$item->backdrop_path}}"  alt="photo by Barn Images">
								</div>
								<div class="trailer-infor">
		                        	<h4 class="desc">{{$item->title}}</h4>
		                        </div>
							</div>
						@endforeach
					</div>
				</div>   
			</div>
		</div>
	</div>
</div>
<!-- latest new v1 section-->
<div class="latestnew">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8">
				<div class="ads">
					<img src="images/uploads/ads2.png" alt="">
				</div>
				<div class="title-hd">
					<h2>Latest news</h2>
				</div>
				<div class="tabs">
					<ul class="tab-links-3">
						<li class="active"><a href="#tab31">#Movies </a></li>
						<li><a href="#tab32"> #TV Shows </a></li>              
						<li><a href="#tab33">  # Celebs</a></li>                       
					</ul>
				    <div class="tab-content">
				        <div id="tab31" class="tab active">
				            <div class="row">
				            	<div class="blog-item-style-1">
				            		<img src="images/uploads/blog-it1.jpg" alt="">
				            		<div class="blog-it-infor">
				            			<h3><a href="#">Brie Larson to play first female white house candidate Victoria Woodull in Amazon film</a></h3>
				            			<span class="time">13 hours ago</span>
				            			<p>Exclusive: <span>Amazon Studios </span>has acquired Victoria Woodhull, with Oscar winning Room star <span>Brie Larson</span> polsed to produce, and play the first female candidate for the presidency of the United States. Amazon bought it in a pitch package deal. <span> Ben Kopit</span>, who wrote the Warner Bros film <span>Libertine</span> that has...</p>
				            		</div>
				            	</div>
				            </div>
				        </div>
				        <div id="tab32" class="tab">
				           <div class="row">
				            	<div class="blog-item-style-1">
				            		<img src="images/uploads/blog-it2.jpg" alt="">
				            		<div class="blog-it-infor">
				            			<h3><a href="#">Tab 2</a></h3>
				            			<span class="time">13 hours ago</span>
				            			<p>Exclusive: <span>Amazon Studios </span>has acquired Victoria Woodhull, with Oscar winning Room star <span>Brie Larson</span> polsed to produce, and play the first female candidate for the presidency of the United States. Amazon bought it in a pitch package deal. <span> Ben Kopit</span>, who wrote the Warner Bros film <span>Libertine</span> that has...</p>
				            		</div>
				            	</div>
				            </div>
				        </div>
				        <div id="tab33" class="tab">
				        	<div class="row">
				            	<div class="blog-item-style-1">
				            		<img src="images/uploads/blog-it1.jpg" alt="">
				            		<div class="blog-it-infor">
				            			<h3><a href="#">Tab 3</a></h3>
				            			<span class="time">13 hours ago</span>
				            			<p>Exclusive: <span>Amazon Studios </span>has acquired Victoria Woodhull, with Oscar winning Room star <span>Brie Larson</span> polsed to produce, and play the first female candidate for the presidency of the United States. Amazon bought it in a pitch package deal. <span> Ben Kopit</span>, who wrote the Warner Bros film <span>Libertine</span> that has...</p>
				            		</div>
				            	</div>
				            </div>
			       	 	</div>
				    </div>
				</div>
				<div class="morenew">
					<div class="title-hd">
						<h3>More news on Blockbuster</h3>
						<a href="#" class="viewall">See all Movies news<i class="ion-ios-arrow-right"></i></a>
					</div>
					<div class="more-items">
						<div class="left">
							<div class="more-it">
								<h6><a href="#">Michael Shannon Frontrunner to play Cable in “Deadpool 2”</a></h6>
								<span class="time">13 hours ago</span>
							</div>
							<div class="more-it">
								<h6><a href="#">French cannibal horror “Raw” inspires L.A. theater to hand out “Barf Bags”</a></h6>
								
								<span class="time">13 hours ago</span>
							</div>
						</div>
						<div class="right">
							<div class="more-it">
								<h6><a href="#">Laura Dern in talks to join Justin Kelly’s biopic “JT Leroy”</a></h6>
								<span class="time">13 hours ago</span>
							</div>
							<div class="more-it">
								<h6><a href="#">China punishes more than 300 cinemas for box office cheating</a></h6>
								<span class="time">13 hours ago</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="sb-facebook sb-it">
						<h4 class="sb-title">Find us on Facebook</h4>
						<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhaintheme%2F%3Ffref%3Dts&amp;tabs=timeline&amp;width=300&amp;height=315px&amp;small_header=true&amp;adapt_container_width=false&amp;hide_cover=false&amp;show_facepile=true&amp;appId" width="300" height="315" style="border:none;overflow:hidden" ></iframe>
					</div>
					<div class="sb-twitter sb-it">
						<h4 class="sb-title">Tweet to us</h4>
						<div class="slick-tw">
							<div class="tweet item" id="599202861751410688">
							</div>
							<div class="tweet item" id="297462728598122498">
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
