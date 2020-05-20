@extends('blog.bloglayout')

@section('content')
		<!-- Start post-content Area -->
			<section class="post-content-area">
				<div class="container">
					<div class="row" style="font-size: 16px;" id="maindivd">
						<div class="col-lg-12 posts-list">
						@foreach($data as $d)
							<div class="single-post row" style=" margin-bottom: 20px;">
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
										<p class="comments col-lg-12 col-md-12 col-6">
											{{ $d->reply }} Replys &nbsp;&nbsp; <span class="lnr lnr-bubble"></span>
										</p>						
									</div>
								</div>
								<div class="col-lg-9 col-md-9 ">
									<div class="img-fluid">
										<br>
										@if($d->imgurl == null)
											<a href="#">
											  <img alt="Sorry ,Image Is Not Available">
											</a>
										@else							
											<a target="_blank" href="{{ url('/blogimages/'.$d->thmbpath) }}">
											  <img src="{{ url('/blogimages/'.$d->thmbpath) }}" alt="Sorry ,Image Is Not Available">
											</a>
										@endif
										
									</div><br>
									<h3>{{ $d->ptitle }}</h3>
									<p class="excert">
										{{ $d->psummary }}
									</p>
									<a href='{{url("/bdetail/$d->id")}}' class="btn btn-primary">Read More &rarr;</a>
								</div>
							</div>
							<hr>
						@endforeach
						</div>
						<p style="margin-left: 15px; margin-bottom: 50px;">{{ $data->links() }}</p>
					</div>
				</div>
			</section>
			<!-- End post-content Area -->

@endsection
      