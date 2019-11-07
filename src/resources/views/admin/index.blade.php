{{-- @extends('tcadmin::layout') --}}
@extends('admin.layout')

@section('subnav')
    <a class="btn btn-light" href="{{route('admin')}}" role="button">Back To Dashboard</a>
    <a class="btn btn-success" href="{{route('admin.blog.create')}}" role="button">Create New Post</a>
@endsection

@section('content')

    <div class="admin-container container blog">
        <table class="table table-sm">
            <thead>
                
                <th>Title</th>
                <th>Status</th>
                <th>Published At</th>
                <th>Creator</th>
                <th>Created At</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            @forelse($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td><span class="badge badge-{{$post->status_color}}">{{$post->status}}</span></td>
                    <td>{{ (!is_null($post->published_at) ?  $post->published_at->toFormattedDateString() : 'n/a') }}  <small class="text-muted">{{ (!is_null($post->published_at) ? $post->published_at->diffForHumans() : '') }}</small></td>
                    <td>{{$post->user->full_name ?? 'User Unknown' }}</td>
                    <td>{{$post->created_at->toFormattedDateString()}} <small class="text-muted">{{$post->created_at->diffForHumans()}}</small></td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Password Actions">
                            <a class="btn btn-dark text-light btn-sm" href="{{ route('admin.blog.edit', $post->slug) }}">
                                <i class="text-dark fa-pencil"></i>
                                edit
                            </a>
                            <a class="btn btn-light btn-sm" href="{{ route('admin.blog.show', $post->slug ) }}">
                                <i class="text-dark fa-eye"></i>
                                view    
                            </a>
                        </div>
                    </td>
                    <td>
                        <form action="{{ route('admin.blog.destroy', $post->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="text-white fa-trash"></i>
                                delete
                            </button>   
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No blog posts available to show</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
