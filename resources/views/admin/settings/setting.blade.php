@extends('layouts.app')
@section('content')

@include('admin.includes.errors')


    <div class="card card-default">
        <div class="card-header">
            Blog Settings
        </div>

        <div class="card-body">
            <form action="{{route('settings.update',$settings->id)}}" method='post'>
                 @csrf
                @method('put')
                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" name='site_name' value='{{$settings->site_name}}' class="form-control">
                </div>

                <div class="form-group">
                    <label for="address">address</label>
                    <input type="text" name='address' value='{{$settings->address}}' class="form-control">
                </div>

                <div class="form-group">
                    <label for="contact_phone">Contact Phone</label>
                    <input type="text" name='contact_phone' value='{{$settings->contact_phone}}' class="form-control">
                </div>

                <div class="form-group">
                    <label for="contact_email">Contact email</label>
                    <input type="text" name='contact_email' value='{{$settings->contact_email}}' class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type='submit'>Edit Settings</button>
                </div>

            </form>
        </div>
    </div>
@endsection
