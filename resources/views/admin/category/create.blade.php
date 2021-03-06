@extends('layouts.app')
@section('content')

@include('admin.includes.errors')


    <div class="card card-default">
        <div class="card-header">
            Create new category
        </div>

        <div class="card-body">
            <form action="{{route('category.store')}}" method='post'>
                 @csrf

                <div class="form-group">
                    <label for="title">name</label>
                    <input type="text" name='name' class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type='submit'>store Category</button>
                </div>

            </form>
        </div>
    </div>
@endsection
