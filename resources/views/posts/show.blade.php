@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100">
        </div>
        <div class="col-4">
            <div class = "d-flex align-items-center">
                <div class = "pr-3">
                    <img src="{{ $post->user->profile->profileImage() }}" 
                        class = "w-100 rounded-circle" 
                        style = "max-width: 40px">
                </div>
                <div>
                    <a href="/profile/{{ $post->user->id }}">
                        <span class="text-dark font-weight-bold">{{ $post->user->username}}</span>
                    </a>
                    <a href="#" class = "font-weight-bold pl-3">Follow</a>
                </div>

            </div>
            <hr>
            <p><a href="/profile/{{ $post->user->id }}">
                    <span class="text-dark font-weight-bold"> {{ $post->user->username}}</span>
                </a> 
                {{ $post->caption }}
            </p>
        </div>
    </div>
</div>
@endsection
