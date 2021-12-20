@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Posts</h3>
                    @can('post_create')
                        <a class="btn btn-success" href="{{ route('posts.create') }}">Cadastrar</a>
                    @endcan
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead class="thead-dark">
                          <tr>
                              @if (!auth()->user()->hasRole('Author'))
                                  <th scope="col">Autor</th>
                              @endif
                            <th scope="col">Título</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="width: 135px">Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $post)
                            <tr>
                                @if (!auth()->user()->hasRole('Author'))
                                    <td>{{ $post->author->name }}</td>
                                @endif
                              <td>{{ $post->title }}</td>
                              <td>{{ $post->slug }}</td>
                              <td>{{ $post->status }}</td>
                              <td>
                                  @can('post_edit')
                                    <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Editar</a>
                                  @endcan
                                  <a class="btn btn-success" href="{{ route('posts.show', $post->id) }}">Ver</a>
                              </td>
                            </tr>
                            @endforeach    
                        </tbody>
                    </table>
                </div>

                {{ $data->links() }}

            </div>
        </div>
    </div>
</div>
@endsection
