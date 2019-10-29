<div class="blog-container container post-single">
	<div class="post card">

		<h2 class="post-title card-title">{{$post->title}}</h2>
		<h4 class="post-date"><small>{{$post->published_at_date}}</small></h4>

		<div class="post-body card-body">

			@if($post->intro)
				<p class="post-body-intro">{{$post->intro}}</p>
			@else
				<p class="post-body full">{{$post->limited_body}}</p>
			@endif
					
		</div>
		
	</div>

</div>
