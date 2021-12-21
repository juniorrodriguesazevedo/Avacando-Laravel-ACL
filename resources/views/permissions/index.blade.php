@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Permissões</h3>
                    <a class="btn btn-success" href="{{ route('permissions.create') }}">Cadastrar</a>
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
                            <th scope="col" style="width: 90px">Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $permission)
                            <tr>
                             <td>{{ $permission->name }}</td>
                              <td>
                                <a class="btn btn-primary" href="{{ route('permissions.edit', $permission->id) }}">Editar</a>
                              </td>
                            </tr>
                            @endforeach    
                        </tbody>
                    </table>

                    {{ $data->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
