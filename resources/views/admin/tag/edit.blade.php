@extends('layouts.app')
@section('content')

  @include('admin.includes.errors')



    <div class="card card-default">
        <div class="card-header">
            update category {{$tag->tag}}
        </div>

        <div class="card-body">
            <form action="{{route('tag.update',$tag->id)}}" method='post'>
                 @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">name</label>
                    <input type="text" name='tag' class="form-control" value="{{$tag->tag}}">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type='submit'>update tag</button>
                </div>

            </form>
        </div>
    </div>
@endsection
