@extends('layouts.app')
@section('content')


    <div class="card">
        @if($tags->count()>0)
            <table class="table">
                <thead class='card-header'>
                    <th>name</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                </thead>

                <tbody class='card-body'>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->tag}}</td>
                        <td>
                            <a href="{{route('tag.edit',$tag->id)}}" class="btn btn-success">Edit</a>
                        </td>

                        <form action="{{route('tag.destroy',$tag->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <td>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </form>


                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="card-header text-center">
                <h2>No tags yet</h2>
            </div>
        @endif

    </div>
@endsection
