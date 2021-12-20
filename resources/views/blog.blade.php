@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Blog</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <div class="row">
                        @foreach ($data as $post)
                          <div class="col-sm">
                            <div class="card" style="width: 450px;">
                                <img src="{{ asset("storage/$post->image") }}" class="card-img-top" alt="{{ $post->title }}" style="height: 320px;">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $post->title }}</h3>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success">Vizualizar Completo</a>
                                </div>
                            </div>
                            <br>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
