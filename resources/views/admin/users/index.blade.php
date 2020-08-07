@extends('layouts.app')

@section('content')
    <div class="card">
        @if($users->count()>0)
            <table class="table">
                <thead class='card-header'>
                    <th>image</th>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th>Delete</th>
                </thead>


                    <tbody class='card-body'>
                    @foreach($users as $user)
                        <tr>
                            <th><img src="{{asset($user->profile->avatar)}}" alt="no image" height='50px' width='50px' style='border-radius:50%;'></th>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->admin)
                                    <a href="{{route('user.removeadmin',$user->id)}}" class="btn btn-success btn-sm">Del Admin</a>
                                @else
                                    <a href="{{route('user.admin',$user->id)}}" class="btn btn-success btn-sm">Make Admin</a>
                                @endif
                            </td>
                            <td>
                               @if(Auth::id() !== $user->id)
                                <a href="{{route('user.destroy',$user->id)}}" class="btn btn-danger btn-sm">Delete</a>
                               @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

            </table>
        @else
            <div class="card-header text-center">
                <h2>no posts yet</h2>
            </div>
        @endif
    </div>
@endsection
