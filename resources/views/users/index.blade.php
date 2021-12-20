@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Usuários</h3>
                    @can('user_create')
                        <a class="btn btn-success" href="{{ route('users.create') }}">Cadastrar</a>
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
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Função</th>
                            <th scope="col" style="width: 135px">Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $user)
                            <tr>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->roles->first()->name }}</td>
                              <td>
                                @can('user_edit')
                                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Editar</a>
                                @endcan
                                <a class="btn btn-success" href="{{ route('users.show', $user->id) }}">Ver</a>
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
