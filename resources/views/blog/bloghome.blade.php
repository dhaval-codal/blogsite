@extends('blog.bloglayout')

@section('content')
  
			<!-- Start post-content Area -->
			<section class="post-content-area">
				<div class="container">
					<div class="row" style="font-size: 16px;">
						<div class="col-lg-12 posts-list">
						@foreach($data as $d)
							<div class="single-post row">
								<div class="col-lg-3  col-md-3 meta-details">
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6">
											{{ $d->author }} &nbsp;&nbsp; <span class="lnr lnr-user"></span>
										</p>
										<p class="date col-lg-12 col-md-12 col-6">
											{{ $d->createdate }} &nbsp;&nbsp; <span class="lnr lnr-calendar-full"></span>
										</p>
										<p class="comments col-lg-12 col-md-12 col-6">
											{{ $d->comments }} Comments &nbsp;&nbsp; <span class="lnr lnr-bubble"></span>
										</p>						
									</div>
								</div>
								<div class="col-lg-9 col-md-9 ">
									<div class="feature-img">
										<img class="img-fluid" src="img/blog/feature-img1.jpg" alt="">
									</div>
									<h3>{{ $d->ptitle }}</h3><br>
									<p class="excert">
										{{ $d->psummary }}
									</p>
									<a href='{{url("/bdetail/$d->id")}}' class="btn btn-primary">Read More &rarr;</a>
								</div>
							</div>
							<hr>
						@endforeach
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->

@endsection
      