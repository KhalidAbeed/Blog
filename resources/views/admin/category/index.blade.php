@extends('layouts.app')
@section('content')


    <div class="card">
        @if($categories->count()>0)
            <table class="table">
                <thead class='card-header'>
                    <th>name</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                </thead>

                <tbody class='card-body'>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-success">Edit</a>
                        </td>

                        <form action="{{route('category.destroy',$category->id)}}" method="post">
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
                <h2>No Categories yet</h2>
            </div>
        @endif

    </div>
@endsection
