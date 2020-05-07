@extends('blog.bloglayout')

@section('content')

			
			<!-- start banner Area -->
			<section class="relative about-banner">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Blog Details Page				
							</h1>	
							<p class="text-white link-nav"><a href="{{ url('/') }}">Home </a>  <span class="lnr lnr-arrow-right"></span> <a href="#"> Blog Details Page</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
  
			<!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class="container">
					<div class="row" style="font-size: 18px;">
						<div class="col-lg-12 posts-list">
							<div class="single-post row">
								<div class="col-lg-3  col-md-3 meta-details">
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6">
											{{ $data->author }} &nbsp;&nbsp; <span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6">
											{{ $data->createdate }} &nbsp;&nbsp; <span class="lnr lnr-calendar-full"></span></p>
										<p class="comments col-lg-12 col-md-12 col-6">
											{{ $data->comments }} Comments &nbsp;&nbsp; <span class="lnr lnr-bubble"></span></p>
										<p class="comments col-lg-12 col-md-12 col-6">
											{{ $data->replys }} Replys &nbsp;&nbsp; <span class="lnr lnr-bubble"></span></p>
													
									</div>
								</div>
								<div class="col-lg-9 col-md-9">
									<h3 class="mt-20 mb-20">{{ $data->ptitle }}</h3>
									<p class="excert">
										{{ $data->psummary }}
									</p>
									{!!html_entity_decode($data->posttext)!!}
									
									
								</div>
								
							</div>
	<div class="comments-area">
		<h2 style="color: blue;">{{ $data->comments }} Comments 
			<b style="color: black;">&</b> {{ $data->replys }} Replys</h2><hr>
		@foreach($cdata as $comment)
			<div class="comment-list" style="margin-bottom: -35px;">
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        <div class="desc">
                            <h3> 
                            	<span class="lnr lnr-user"></span>
                                {{ $comment->user }}
                            </h3>
                            <p >{{ $comment->created_at }} </p>
                            <p style="font-size: 21px; color: black; font-weight: bolder;">
                            	{{ $comment->comment }}
                            </p>
                            @if(count($reply) > 0)
                            	@foreach($reply as $r)

	                            	@if($r->cmttype == $comment->id)

		       		          			<div class="comment-list" style="margin-bottom: -35px;margin-left: 80px;">
		                                    <div class="single-comment justify-content-between d-flex">
		                                        <div class="user justify-content-between d-flex">
		                                            <div class="desc">
		                                                <h3> 
		                                                	<span class="lnr lnr-user"></span>
			                                                Reply By :- &nbsp;&nbsp;{{ $r->user }}
			                                            </h3>
		                                                <p >{{ $r->created_at }} </p>
		                                                <p style="font-size: 21px; color: black; font-weight: bolder;">
		                                                	{{ $r->comment }}
		                                                </p>
	                                          	    </div>
		                                        </div>
		                                    </div>
		                                </div>

	    							@endif
                    			@endforeach
                   			 @endif
          	<button class="btn btn-primary" onclick="reply({{ $comment->id }})" >
                    	Reply To This Comment &rarr;
                    </button>
                </div>
            </div>
        </div>
    </div>
	    <div class="comment-form" style="background: lightgray;display: none;" id="replycmt{{ $comment->id }}" >
			<h4>Leave a Reply Of Comment</h4>
			<form method="post" action="{{ url('setcomment') }}">
				@csrf
				<input type="hidden" name="blogid" value="{{ $data->id }}">
				<input type="hidden" id="cntid{{ $comment->id }}" name="cntid" value="">
				<div class="form-group form-inline">
				  <div class="form-group col-lg-6 col-md-12 name">
				    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
				  </div>
				  <div class="form-group col-lg-6 col-md-12 email">
				    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" >
				  </div>										
				</div>
				<div class="form-group">
					<textarea class="form-control mb-10" rows="5" name="message" placeholder="Enter Comment Here" required=""></textarea>
				</div>
				<button class="primary-btn text-uppercase">Post Reply</button>	
				<a class="primary-btn text-uppercase" style="color: white;" onclick="backmain('{{ $comment->id }}')">Cancle Reply</a>	
			</form>
		</div>
	    	
	                                <hr>
                                @endforeach
							<div class="comment-form" style="background: lightgray;display: block;" id="maincmt" >
								<h4>Leave a New Comment</h4>
								<form method="post" action="{{ url('setcomment') }}">
									@csrf
									<input type="hidden" name="blogid" value="{{ $data->id }}">
									<input type="hidden" name="cntid" id="cntid" value="0">
									<div class="form-group form-inline">
									  <div class="form-group col-lg-6 col-md-12 name">
									    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" >
									  </div>
									  <div class="form-group col-lg-6 col-md-12 email">
									    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" >
									  </div>										
									</div>
									<div class="form-group">
										<textarea class="form-control mb-10" rows="5" name="message" placeholder="Enter Comment Here" required=""></textarea>
									</div>
									<button class="primary-btn text-uppercase">Post Comment</button>	
								</form>
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->


<script type="text/javascript">
				
				function reply(id){
					
					var name = 'replycmt'+id;
					document.getElementById('maincmt').style.display = 'none';
					var cid = {!! json_encode($cid->toArray()) !!};

					for (var i = 0; i < cid.length; i++) {

						var nname = 'replycmt'+cid[i]['id'];
						var cname = 'cntid'+id;
						if (cid[i]['id'] != id) {
							document.getElementById(nname).style.display = 'none';
						} else {
							document.getElementById(name).style.display = 'block';
							document.getElementById(cname).value = id;
						}
					}
					

				}


				function backmain(id){
				

					document.getElementById('maincmt').style.display = 'block';
					var cid = {!! json_encode($cid->toArray()) !!};

					for (var i = 0; i < cid.length; i++) {

						var nname = 'replycmt'+cid[i]['id'];
						document.getElementById(nname).style.display = 'none';
						document.getElementById('cntid').value = 0;
					}

				}


			</script>



@endsection
      