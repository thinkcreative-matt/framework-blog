<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="blog-container container">
	<h1>Create new blog post</h1>

	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	        	<h4>Fix the errors below</h4>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	{{ Form::model($post, ['route' => [ 'admin.blog.store' ], 'method' => 'POST', 'class' => 'needs-validation']) }}
		<div class="form-group">
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', $post->title , ['class' => 'form-control', 'required' => 'required']) }}
			<div class="valid-feedback">Looks good!</div>
		</div>
		<div class="form-group">
			{{ Form::label('slug', 'Slug') }}
			{{ Form::text('slug', $post->slug, ['class' => 'form-control', 'placholder' => 'auto-generates if blank']) }}
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
			{{ Form::select('status', [ 'draft' => 'Draft', 'published' => 'Published', 'unpublished' => 'Unpublished' ], null, ['class' => 'form-control' , 'placeholder' => 'Pick a size...']) }}
		</div>
		<div class="form-group">
			{{ Form::submit('Create Post', ['class' => 'btn btn-success']) }}
		</div>
	{{ Form::close() }}

</div>
