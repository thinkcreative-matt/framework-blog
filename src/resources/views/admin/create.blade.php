{{--@extends('tcadmin::layout') --}}
@extends('admin.layout')

@section('subnav')
    @include('admin-blog::components.subnav')
@endsection

@section('content')
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
			
			@include('admin-blog::components.form')

			<div class="form-group">
				{{ Form::submit('Create Post', ['class' => 'btn btn-success']) }}
				<a href="{{route('admin.blog.index')}}" class="btn btn-secondary">Back</a>
			</div>
		{{ Form::close() }}

	</div>
@endsection
