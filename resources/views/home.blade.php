@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-success">Posts</div>
                <div class="card-body">
                    <h2>{{$posts_count}}</h2>
                </div>
            </div>
        </div>


        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-danger">Trashed Post</div>
                <div class="card-body">
                    <h2>{{$trashed_count}}</h2>
                </div>
            </div>
        </div>



        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-info">Categories</div>
                <div class="card-body">
                    <h2>{{$categories_count}}</h2>
                </div>
            </div>
        </div>



        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-warning">Users</div>
                <div class="card-body">
                    <h2>{{$users_count}}</h2>
                </div>
            </div>
        </div>


    </div>
@endsection
