<div class="blog-container container">
	
	<h1>Edit blog post</h1>

	{{ Form::model($post, ['route' => [ 'admin.blog.update', $post->slug ], 'method' => 'PUT' ]) }}
				
		<div class="form-group">
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', $post->title, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('slug', 'Slug') }}
			{{ Form::text('slug', $post->slug, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('intro', 'Intro') }}
			{{ Form::textarea('intro', $post->intro, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('body', 'Body') }}
			{{ Form::textarea('body', $post->body, ['class' => 'form-control']) }}
		</div>
		
		<div class="form-group">
			{{ Form::label('status', 'Status') }}
			{{ Form::select('stats', [ 'draft' => 'Draft', 'published' => 'Published', 'unpublished' => 'Unpublished' ]) }}
		</div>

		<div class="form-group">
			{{ Form::submit('Update Post') }}
		</div>

	{{ Form::close() }}

</div>
