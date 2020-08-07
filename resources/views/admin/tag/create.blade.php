@extends('layouts.app')
@section('content')

@include('admin.includes.errors')


    <div class="card card-default">
        <div class="card-header">
            Create new tag
        </div>

        <div class="card-body">
            <form action="{{route('tag.store')}}" method='post'>
                 @csrf

                <div class="form-group">
                    <label for="title">tag</label>
                    <input type="text" name='tag' class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type='submit'>Store Tag</button>
                </div>

            </form>
        </div>
    </div>
@endsection
