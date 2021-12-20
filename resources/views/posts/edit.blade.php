@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Editar Post</h3>
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    {!!Form::open()->fill($post)->multipart()->method('put')->route('posts.update', [$post->id])!!}
                        @include('posts._form')
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection