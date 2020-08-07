@extends('layouts.app')
@section('content')

@include('admin.includes.errors')


    <div class="card card-default">
        <div class="card-header">
           <h2>Edit profile</h2>
        </div>

        <div class="card-body">
            <form action="{{route('profile.update',Auth::user())}}" method='post' enctype='multipart/form-data'>
                 @csrf
                    @method('put')
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" value='{{$user->name}}' name='name' class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Email</label>
                    <input type="email" name='email' class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Change Password</label>
                    <input type="password" name='password' class="form-control">
                </div>

                <div class="form-group">
                    <label for="avatar">Change Avatar</label>
                    <input type="file" name='avatar' class="form-control">
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" name='facebook' value='{{$user->profile->facebook}}' class="form-control">
                </div>

                <div class="form-group">
                    <label for="youtube">Youtube</label>
                    <input type="text" name='youtube'  value='{{$user->profile->youtube}}' class="form-control">
                </div>

                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" class="form-control"  id="about" cols="5" rows="5">{{$user->profile->about}}</textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type='submit'>Edit Profile </button>
                </div>

            </form>
        </div>
    </div>
@endsection
