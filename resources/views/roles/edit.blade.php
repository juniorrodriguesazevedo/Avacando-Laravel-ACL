@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Editar Função</h3>
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <strong>Função: </strong> {{ $role->name }} <br><br>

                <h5>Permissões</h5>
        
                <form action="{{ route('roles.update', $role->id) }}" method="post">
                    @method('put')
                    @csrf
                    @foreach ($permissions as $permission)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="permission_id[]" value="{{ $permission->name }}" id="{{ $permission->id }}" {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                    <br><br>
                    <button class="btn btn-success" type="submit">Salvar</button>
                    <a class="btn btn-primary" href="{{ route('roles.index') }}">Voltar</a>
                </form>
               
            </div>
        </div>
    </div>
</div>
@endsection