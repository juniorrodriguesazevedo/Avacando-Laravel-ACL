@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">               
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card" style="width: 100%;">
                        <img src="{{ asset("storage/$post->image") }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                        <h3 class="card-title">{{ $post->title }}</h3>
                        <p class="card-text">{{ $post->content }}</p>

                        <strong>Author: </strong> {{ $post->author->name }}
                        <br><br>

                        @can('post_destroy')
                            {!!Form::open()->method('delete')->route('posts.destroy', [$post->id])!!}
                                {!!Form::submit("Deletar Post", 'danger')!!}
                            {!!Form::close()!!}
                        @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
