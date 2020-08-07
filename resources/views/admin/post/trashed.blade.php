@extends('layouts.app')

@section('content')
    <div class="card">
        @if($trash->count()>0)
            <table class="table">
                <thead class='card-header'>
                    <th>image</th>
                    <th>title</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                </thead>

                <tbody class='card-body'>
                @foreach($trash as $post)
                    <tr>
                        <th><img src="{{asset($post->feature)}}" alt="no image" height='50px' width='50px'></th>
                        <td>{{$post->title}}</td>
                        <th><a href="{{route('post.destroy',$post->id)}}" class='btn btn-success'>Delete</a></th>
                        <th><a href="{{route('post.restore',$post->id)}}" class='btn btn-danger'>Restore</a></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="card-header text-center">
                <h2>No Trashed posts yet</h2>
            </div>
        @endif
    </div>

@endsection
