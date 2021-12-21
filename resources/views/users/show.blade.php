@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Visualizando Usuário</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <strong>Nome: </strong> {{ $user->name }} <br>
                    <strong>Email: </strong> {{ $user->email }} <br>
                    <strong>Função: </strong> {{ $user->roles->first()->name }} <br>

                    <br>
                    {!!Form::open()->method('delete')->route('users.destroy', [$user->id])!!}
                        {!!Form::submit('Deletar Usuário', 'danger')!!}
                    {!!Form::close()!!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
