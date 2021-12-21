@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Funções</h3>
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
                            <th scope="col" style="width: 170px">Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $role)
                            <tr>
                             <td>{{ $role->name }}</td>
                              <td>
                                <a class="btn btn-success" href="{{ route('roles.edit', $role->id) }}">Editar Permissões</a>
                              </td>
                            </tr>
                            @endforeach    
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
