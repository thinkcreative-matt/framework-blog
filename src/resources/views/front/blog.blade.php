<div class="blog-container container">
	
	@foreach($posts as $post)
		<div class="post card">

			<h2 class="post-title card-title">{{$post->title}}</h2>
			<h4 class="post-date"><small>{{$post->published_at_date}}</small></h4>

			<div class="post-body card-body">

				@if($post->intro)
					<p class="post-body-intro">{{$post->intro}}</p>
				@else
					<p class="post-body truncated">{{$post->limited_body}}</p>
				@endif
				
			</div>

			<div class="post-footer card-footer">
				<a href="{{route('blog.show', $post->slug)}}" class="btn btn-secondary">Read More</a>
			</div>
			
		</div>
	@endforeach

</div>
