@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <div class="row">
            <div class="col-6 offset-3">
                <a href="/p/{{ $post->id}}"><img src="/storage/{{$post->image}}" class="w-100"></a>
            </div>
        </div >
        <div class = "col-6 offset-3 pt-2 pb-4" >
            <p><a href="/profile/{{ $post->user->id }}">
                    <span class="text-dark font-weight-bold"> {{ $post->user->username}}</span>
                </a> 
                {{ $post->caption }}
            </p>
        </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-4')}}
        </div>
    </div>

</div>
@endsection
