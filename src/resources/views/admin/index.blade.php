<div class="admin-container container">
	
	<table class="table table-sm">
        <thead>
            <th>Title</th>
            <th>Status</th>
            <th>Published At</th>
            <th>Creator</th>
            <th>Created At</th>
            <th>Actions</th>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->status_icon}}</td>
                <td>{{$post->published_at_short_date}}</td>
                <td>{{$post->user->full_name ?? 'User Unknown' }}</td>
                <td>{{$post->created_at->toFormattedString('d-m-Y')}}</td>
                <td>
                	
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


<div class="btn-group btn-group-sm" role="group" aria-label="Password Actions">
    <a class="btn btn-light btn-sm" href="{{ url('tc_password/' . $password->id . '/edit') }}"><i class="text-dark fa-pencil"></i></a>
    <form action="{{ url('tc_password/' . $password->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm"><i class="text-white fa-trash"></i></button>   
    </form>
</div>