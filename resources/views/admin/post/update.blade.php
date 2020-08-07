@extends('layouts.app')
@section('content')

@include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            update {{$post->title}}
        </div>

        <div class="card-body">
            <form action="{{route('post.update',$post->id)}}" method='post' enctype='multipart/form-data'>
                 @csrf
                 @method('put')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name='title' class="form-control" value='{{$post->title}}'>
                </div>

                <div class="form-group">
                    <label for="title">Category</label>
                    <select name="category_id"  class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                @if($post->category->id == $category->id)
                                    selected
                                @endif
                                > {{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Select Tags</label><br>
                        @foreach($tags as $tag)
                           <label><input type="checkbox" name='tags[]' value="{{$tag->id}}"
                                @foreach($post->tags as $t)
                                    @if($tag->id == $t->id)
                                        checked
                                    @endif
                                @endforeach
                            >{{$tag->tag}}</label><br>
                        @endforeach
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="content" cols="5" rows="5">{{$post->content}}</textarea>
                </div>

                <div class="form-group">
                    <label for="content">featured</label>
                   <input type="file" name='feature' class="form-control">
                </div>

                <button class="btn btn-success" type='submit'>Edit</button>

            </form>
        </div>
    </div>
@endsection
