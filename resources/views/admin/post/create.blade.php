@extends('layouts.app')
@section('content')

@include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Create new post
        </div>

        <div class="card-body">
            <form action="{{route('post.store')}}" method='post' enctype='multipart/form-data'>
                 @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name='title' class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Select Category</label>
                    <select name="category_id"  class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"> {{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Select Tags</label><br>
                        @foreach($tags as $tag)
                           <label><input type="checkbox" name='tags[]' value="{{$tag->id}}">{{$tag->tag}}</label><br>
                        @endforeach
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="content" cols="5" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="content">featured</label>
                   <input type="file" name='feature' class="form-control">
                </div>

                <button class="btn btn-success" type='submit'>Submit</button>

            </form>
        </div>
    </div>
@endsection


