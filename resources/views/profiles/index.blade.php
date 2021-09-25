@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}"
                class="rounded-circle w-100">
        </div>
        <div class="col-8">
            
            <div class="pt-5 d-flex justify-content-between align-items-baseline">
                <div class = "d-flex align-items-baseline">
                    <h4>{{$user->username}}</h4>

                    @cannot('update', $user->profile)
                        <follow-button user-id = "{{ $user->id}}" follows = "{{ $follows }}"></follow-button>
                    @endcannot   

                </div>
                
                @can('update', $user->profile)
                    <a href="/p/create"><strong>Add New Post</strong></a>
                @endcan
                

            </div>

            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit"><strong>Edit Profile</strong></a>
            @endcan


            <div class="d-flex">
                <div class = "pr-5"><strong>{{$postCount}}</strong> posts</div>
                <div class = "pr-5"><strong>{{$followersCount}}</strong> followers</div>
                <div class = "pr-5"><strong>{{$followingCount}}</strong> following</div>
            </div>
            <div class = "pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div class = "font-weight-bold">
                <a href="#">{{ $user->profile->url }}</a>
            </div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{$post->id}}">
                    <img src = "/storage/{{$post->image}}" 
                        class = "w-100">
                </a>
            </div>
        @endforeach
    </div>



<!--div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div-->
</div>
@endsection
