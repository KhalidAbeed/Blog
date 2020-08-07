@extends('layouts.app')
@section('content')

  @include('admin.includes.errors')



    <div class="card card-default">
        <div class="card-header">
            update category {{$category->name}}
        </div>

        <div class="card-body">
            <form action="{{route('category.update',$category->id)}}" method='post'>
                 @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">name</label>
                    <input type="text" name='name' class="form-control" value="{{$category->name}}">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type='submit'>update Category</button>
                </div>

            </form>
        </div>
    </div>
@endsection
