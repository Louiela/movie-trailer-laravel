<?php
$m_details = json_decode($m_details);
$m_videos = json_decode($m_videos);
$m_images = json_decode($m_images);
$m_reviews = json_decode($m_reviews);
$m_cast = json_decode($m_cast);
$m_crew = json_decode($m_crew);
$m_genres = json_decode($m_genres);
setlocale(LC_ALL, '');
$bud = $m_details->budget;
$rev = $m_details->revenue;
$locale = localeconv();
?>

@extends('layouts.master')

@section('title')
	777movies
@endsection

@section('headContent')
<div class="hero mv-single-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> -->
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="page-single movie-single movie_single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="movie-img sticky-sb">
					<img src="http://image.tmdb.org/t/p/w500{{$m_details->poster_path}}" alt="">
					<div class="movie-btn">	
						<div class="btn-transform transform-vertical red">
							<div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Watch Trailer</a></div>
							<div><a href="https://www.youtube.com/embed/{{$o_trailer}}" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
						</div><!-- 
						<div class="btn-transform transform-vertical">
							<div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i> Buy ticket</a></div>
							<div><a href="#" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
						</div> -->
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 class="bd-hd">{{$m_details->title}} <span>{{date('Y', strtotime($m_details->release_date))}}</span></h1>
					<div class="social-btn">
						<a href="#" class="parent-btn"><i class="ion-heart"></i> Add to Favorite</a>
						<div class="hover-bnt">
							<a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>share</a>
							<div class="hvr-item">
								<a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
								<a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
								<a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
								<a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
							</div>
						</div>		
					</div>
					<div class="movie-rate">
						<div class="rate">
							<i class="ion-android-star"></i>
							<p><span>{{$m_details->vote_average}}</span> /10<br>
								<span class="rv">{{count($m_reviews)}} Reviews</span>
							</p>
						</div>
						<div class="rate-star">
							<p>Rate This Movie:  </p>
							<i class="ion-ios-star-outline"></i>
							<i class="ion-ios-star-outline"></i>
							<i class="ion-ios-star-outline"></i>
							<i class="ion-ios-star-outline"></i>
							<i class="ion-ios-star-outline"></i>
							<i class="ion-ios-star-outline"></i>
							<i class="ion-ios-star-outline"></i>
							<i class="ion-ios-star-outline"></i>
							<i class="ion-ios-star-outline"></i>
						</div>
					</div>
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
								<li class="active"><a href="#overview">Overview</a></li>
								<li><a href="#reviews"> Reviews</a></li>
								<li><a href="#cast">  Cast & Crew </a></li>
								<li><a href="#media"> Media</a></li> 
								<li><a href="#moviesrelated"> Related Movies</a></li>                        
							</ul>
						    <div class="tab-content">
						        <div id="overview" class="tab active">
						            <div class="row">
						            	<div class="col-md-8 col-sm-12 col-xs-12">
						            		<p>{{$m_details->overview}}</p>
						            		<div class="title-hd-sm">
												<h4>Videos & Photos</h4>
												<a href="#media" class="time">All {{count($m_videos)}} Videos & {{count($m_images)}} Photos <i class="ion-ios-arrow-right"></i></a>
											</div>
											<div class="mvsingle-item ov-item">
												<?php $i = 0; ?>
												@foreach($m_images as $item)
													<a class="backdrops img-lightbox"  data-fancybox-group="gallery" href="http://image.tmdb.org/t/p/w500{{$item->file_path}}" ><img src="http://image.tmdb.org/t/p/w500{{$item->file_path}}" alt=""></a>
												<?php $i++; if($i == 2){break;} ?>
												@endforeach
												<?php 
												$v = 0; 
												$index = 3; 
												?>
												@foreach($m_videos as $item)
													<div class="vd-it">
														<img class="vd-img" src="http://image.tmdb.org/t/p/w500{{$m_images[$index]->file_path}}" alt="">
														<a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/{{$item->key}}"><img src="http://127.0.0.1:8000/images/uploads/play-vd.png" alt=""></a>
													</div>
												<?php $v++; $index++; if($v == 2){break;} ?>
												@endforeach
											</div>
											<div class="title-hd-sm">
												<h4>cast</h4>
												<a href="#cast" class="time">Full Cast & Crew  <i class="ion-ios-arrow-right"></i></a>
											</div>
											<!-- movie cast -->
											<div class="mvcast-item">
												<?php $c = 0; ?>
												@foreach($m_cast as $item)										
													<div class="cast-it">
														<div class="cast-left">
															<img src="http://image.tmdb.org/t/p/w500{{$item->profile_path}}" alt="">
															<a href="#">{{$item->name}}</a>
														</div>
														<div class="ocast_name">
															<p>{{$item->character}}</p>
														</div>
														
													</div>
												<?php $c++; if($c == 8){break;} ?>
												@endforeach
											</div>
											<div class="title-hd-sm">
												<h4>User reviews</h4>
												<?php if(count($m_reviews) >= 2) { ?>
													<a href="#reviews" class="time">See All {{count($m_reviews)}} Reviews <i class="ion-ios-arrow-right"></i></a>
												<?php } ?>
											</div>
											<!-- movie user review -->
											<div class="mv-user-review-item">
												@if(count($m_reviews) > 1)
													<h3>A review by {{$m_reviews[0]->author}}</h3>
													<p>{{$m_reviews[0]->content}}</p>
												@endif
											</div>
						            	</div>
						            	<div class="col-md-4 col-xs-12 col-sm-12">
						            		<div class="sb-it">
						            			<h6>Director: </h6>
						            			<p>
						            				@foreach($m_crew as $item)
						            					@if($item->department == 'Directing' && $item->job == 'Director')
															<a href="/celebrities">{{$item->name}}</a>
						            					@endif
						            				@endforeach
					            				</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Writer: </h6>
						            			<p>
						            				<?php $ow= 1; ?>
							            			@foreach($m_crew as $item)
						            					@if($item->department == 'Writing' && $ow <= 4)
															<a href="/celebrities">{{$item->name}}</a> 
															<?php $ow++; ?>
						            					@endif
						            				@endforeach
					            				</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Stars: </h6>
						            			<p>
						            				<?php $oc = 1; ?>
						            				@foreach($m_cast as $item)
						            					@if($oc <= 4)
															<a href="/celebrities">{{$item->name}}</a>  
						            					@endif
						            					<?php $oc++; ?>
						            				@endforeach
						            			</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Genres:</h6>
						            			<p class="tags">
						            				@foreach($m_genres as $item)
						            					<span class="time"><a href="/genres">{{$item->name}}</a></span>
						            				@endforeach
						            			</p>
						            		</div>
						            		<div class="sb-it">
						            			@if($m_details->status == 'Released')
							            			<h6>Release Date:</h6>
							            			<p>{{date('F d, Y', strtotime($m_details->release_date))}}</p>
							            		@else
							            			<h6>Status:</h6>
							            			<p>{{$m_details->status}}</p>
							            		@endif
						            		</div>
						            		<div class="sb-it">
						            			<h6>Run Time:</h6>
						            			<p>{{intdiv($m_details->runtime, 60)}}h {{($m_details->runtime % 60)}}m </p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Original Language</h6>
						            			@foreach($m_details->spoken_languages as $item)
						            				<p>{{$item->name}}</p>
						            			@endforeach
						            		</div>
						            		<div class="sb-it">
						            			<h6>Budget</h6>
						            			<p>{{$locale['currency_symbol']}}{{number_format($bud, 2, $locale['decimal_point'], $locale['thousands_sep'])}}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Revenue</h6>
						            			<p>{{$locale['currency_symbol']}}{{number_format($rev, 2, $locale['decimal_point'], $locale['thousands_sep'])}}</p>
						            		</div>
						            		<div class="ads">
												<img src="http://127.0.0.1:8000/images/uploads/ads1.png" alt="">
											</div>
						            	</div>
						            </div>
						        </div>
						        <div id="reviews" class="tab review">
						           <div class="row">
						            	<div class="rv-hd">
						            		<div class="div">
							            		<h3>Reviews of</h3>
						       	 				<h2>{{$m_details->title}}</h2>
							            	</div>
							            	<a href="#" class="redbtn">Write Review</a>
						            	</div>
						            	<div class="topbar-filter">
											<p>Found <span>56 reviews</span> in total</p>
											<label>Filter by:</label>
											<select>
												<option value="popularity">Popularity Descending</option>
												<option value="popularity">Popularity Ascending</option>
												<option value="rating">Rating Descending</option>
												<option value="rating">Rating Ascending</option>
												<option value="date">Release date Descending</option>
												<option value="date">Release date Ascending</option>
											</select>
										</div>
										@foreach($m_reviews as $item)
										<div class="mv-user-review-item">
											<div class="user-infor">
												<h3>A review by {{$item->author}}</h3>
											</div>
											<p>{{$item->content}}</p>
										</div>
										@endforeach
										<div class="topbar-filter">
											<label>Reviews per page:</label>
											<select>
												<option value="range">5 Reviews</option>
												<option value="saab">10 Reviews</option>
											</select>
											<div class="pagination2">
												<span>Page 1 of 6:</span>
												<a class="active" href="#">1</a>
												<a href="#">2</a>
												<a href="#">3</a>
												<a href="#">4</a>
												<a href="#">5</a>
												<a href="#">6</a>
												<a href="#"><i class="ion-arrow-right-b"></i></a>
											</div>
										</div>
						            </div>
						        </div>
						        <div id="cast" class="tab">
						        	<div class="row">
						            	<h3>Cast & Crew of</h3>
					       	 			<h2>{{$m_details->title}}</h2>
					       	 			<?php 
						       	 			$dep = ''; 
						       	 			$cast = 0;
					       	 			?>
					       	 			<div class="col-md-6">
						       	 			<div class="title-hd-sm">
												<h4>Cast</h4>
											</div>
					       	 				@foreach($m_cast as $item)
												<div class="mvcast-item">											
													<div class="cast-it">
														<div class="cast-left">
															<img src="http://image.tmdb.org/t/p/w500{{$item->profile_path}}"  alt="{{$item->character}}">
															<div class="name_role">
																<p><a href="#">{{$item->name}}</a></p>
																<p>{{$item->character}}</p>
															</div>
														</div>
													</div>
												</div>
				       	 					@endforeach
					       	 			</div>
					       	 			<div class="col-md-6">
					       	 				@foreach($m_crew as $item)
				       	 						<?php 
				       	 						$initial = explode(" ", $item->name);
				       	 						if($item->department != $dep) {
					       	 						$dep = $item->department; ?>
					       	 						<div class="title-hd-sm">
														<h4>{{$item->department}}</h4>
													</div>
												<?php } ?>
													<div class="mvcast-item">											
														<div class="cast-it">
															<div class="cast-left">
																<h4>{{substr($initial[0], 0,1)}}{{substr($initial[1], 0,1)}}</h4>
																<div class="name_role">
																	<p><a href="#">{{$item->name}}</a></p>
																	<p>{{$item->job}}</p>
																</div>
															</div>
														</div>
													</div>
				       	 					@endforeach
					       	 			</div>
						            </div>
					       	 	</div>
					       	 	<div id="media" class="tab">
						        	<div class="row">
						        		<div class="rv-hd">
						            		<div>
						            			<h3>Videos & Photos of</h3>
					       	 					<h2>{{$m_details->title}}</h2>
						            		</div>
						            	</div>
						            	<div class="title-hd-sm">
											<h4>Videos <span>({{count($m_videos)}})</span></h4>
										</div>
										<div class="mvsingle-item media-item">
										<?php $index = 1 ?>
										@foreach($m_videos as $item)
											<div class="vd-item">
												<div class="vd-it">
													<img class="vd-img" src="http://image.tmdb.org/t/p/w500{{$m_images[$index]->file_path}}" alt="">
													<a class="fancybox-media hvr-grow"  href="https://www.youtube.com/embed/{{$item->key}}"><img src="http://127.0.0.1:8000/images/uploads/play-vd.png" alt=""></a>
												</div>
												<div class="vd-infor">
													<h6> <a href="#">{{$item->name}}</a></h6>
												</div>
											</div>
										<?php $index++; ?>
										@endforeach
										</div>
										<div class="title-hd-sm">
											<h4>Photos <span> ({{count($m_images)}})</span></h4>
										</div>
										<div class="mvsingle-item">
										@foreach($m_images as $item)
											<a class="backdrops img-lightbox"  data-fancybox-group="gallery" href="http://image.tmdb.org/t/p/w500{{$item->file_path}}" ><img src="http://image.tmdb.org/t/p/w500{{$item->file_path}}" alt=""></a>
										@endforeach
										</div>
						        	</div>
					       	 	</div>
					       	 	<div id="moviesrelated" class="tab">
					       	 		<div class="row">
					       	 			<h3>Related Movies To</h3>
					       	 			<h2>{{$m_details->title}}</h2>
					       	 			<div class="topbar-filter">
											<p>Found <span>12 movies</span> in total</p>
											<label>Sort by:</label>
											<select>
												<option value="popularity">Popularity Descending</option>
												<option value="popularity">Popularity Ascending</option>
												<option value="rating">Rating Descending</option>
												<option value="rating">Rating Ascending</option>
												<option value="date">Release date Descending</option>
												<option value="date">Release date Ascending</option>
											</select>
										</div>
										<div class="movie-item-style-2">
											<img src="http://127.0.0.1:8000/images/uploads/mv1.jpg" alt="">
											<div class="mv-item-infor">
												<h6><a href="#">oblivion <span>(2012)</span></a></h6>
												<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
												<p class="describe">Earth's mightiest heroes must come together and learn to fight as a team if they are to stop the mischievous Loki and his alien army from enslaving humanity...</p>
												<p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
												<p>Director: <a href="#">Joss Whedon</a></p>
												<p>Stars: <a href="#">Robert Downey Jr.,</a> <a href="#">Chris Evans,</a> <a href="#">  Chris Hemsworth</a></p>
											</div>
										</div>
										<div class="movie-item-style-2">
											<img src="http://127.0.0.1:8000/images/uploads/mv2.jpg" alt="">
											<div class="mv-item-infor">
												<h6><a href="#">into the wild <span>(2014)</span></a></h6>
												<p class="rate"><i class="ion-android-star"></i><span>7.8</span> /10</p>
												<p class="describe">As Steve Rogers struggles to embrace his role in the modern world, he teams up with a fellow Avenger and S.H.I.E.L.D agent, Black Widow, to battle a new threat...</p>
												<p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
												<p>Director: <a href="#">Anthony Russo,</a><a href="#">Joe Russo</a></p>
												<p>Stars: <a href="#">Chris Evans,</a> <a href="#">Samuel L. Jackson,</a> <a href="#">  Scarlett Johansson</a></p>
											</div>
										</div>
										<div class="movie-item-style-2">
											<img src="http://127.0.0.1:8000/images/uploads/mv3.jpg" alt="">
											<div class="mv-item-infor">
												<h6><a href="#">blade runner  <span>(2015)</span></a></h6>
												<p class="rate"><i class="ion-android-star"></i><span>7.3</span> /10</p>
												<p class="describe">Armed with a super-suit with the astonishing ability to shrink in scale but increase in strength, cat burglar Scott Lang must embrace his inner hero and help...</p>
												<p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
												<p>Director: <a href="#">Peyton Reed</a></p>
												<p>Stars: <a href="#">Paul Rudd,</a> <a href="#"> Michael Douglas</a></p>
											</div>
										</div>
										<div class="movie-item-style-2">
											<img src="http://127.0.0.1:8000/images/uploads/mv4.jpg" alt="">
											<div class="mv-item-infor">
												<h6><a href="#">Mulholland pride<span> (2013)  </span></a></h6>
												<p class="rate"><i class="ion-android-star"></i><span>7.2</span> /10</p>
												<p class="describe">When Tony Stark's world is torn apart by a formidable terrorist called the Mandarin, he starts an odyssey of rebuilding and retribution.</p>
												<p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
												<p>Director: <a href="#">Shane Black</a></p>
												<p>Stars: <a href="#">Robert Downey Jr., </a> <a href="#">  Guy Pearce,</a><a href="#">Don Cheadle</a></p>
											</div>
										</div>
										<div class="movie-item-style-2">
											<img src="http://127.0.0.1:8000/images/uploads/mv5.jpg" alt="">
											<div class="mv-item-infor">
												<h6><a href="#">skyfall: evil of boss<span> (2013)  </span></a></h6>
												<p class="rate"><i class="ion-android-star"></i><span>7.0</span> /10</p>
												<p class="describe">When Tony Stark's world is torn apart by a formidable terrorist called the Mandarin, he starts an odyssey of rebuilding and retribution.</p>
												<p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
												<p>Director: <a href="#">Alan Taylor</a></p>
												<p>Stars: <a href="#">Chris Hemsworth,  </a> <a href="#">  Natalie Portman,</a><a href="#">Tom Hiddleston</a></p>
											</div>
										</div>
										<div class="topbar-filter">
											<label>Movies per page:</label>
											<select>
												<option value="range">5 Movies</option>
												<option value="saab">10 Movies</option>
											</select>
											<div class="pagination2">
												<span>Page 1 of 2:</span>
												<a class="active" href="#">1</a>
												<a href="#">2</a>
												<a href="#"><i class="ion-arrow-right-b"></i></a>
											</div>
										</div>
					       	 		</div>
					       	 	</div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
