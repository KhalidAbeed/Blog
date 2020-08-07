@extends('layouts.app')
@section('content')

@include('admin.includes.errors')


    <div class="card card-default">
        <div class="card-header">
            Create new User
        </div>

        <div class="card-body">
            <form action="{{route('user.store')}}" method='post'>
                 @csrf

                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" name='name' class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Email</label>
                    <input type="email" name='email' class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type='submit'>Store User</button>
                </div>

            </form>
        </div>
    </div>
@endsection
