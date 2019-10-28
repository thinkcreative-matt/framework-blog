<div class="blog-container container">
	
	<div class="post card">

		<h2 class="post-title card-title">{{$post->title}}</h2>
		<h4><small>{{$post->published_at_date}}</small></h4>

		<div class="post-body card-body">

			@if($post->intro)
				<p>{{$post->intro}}</p>
			@endif

			<p>{{$post->body}}</p>
					
		</div>
		
	</div>

</div>
