<div class="row">
    <div class="col-6">
        {!!Form::text('name', 'Nome')!!}
    </div>
    <div class="col-6">
        {!!Form::text('email', 'Email')->type('email')!!}
    </div>
    <div class="col-6">
        {!!Form::text('password', 'Senha')->type('password')!!}
    </div>
    <div class="col-6">
        {!!Form::select('role_id', 'Função')->options($roles)!!}
    </div>
    <div class="col-6 mt-3">
        {!!Form::submit("Cadastrar", "success")!!}
        <a class="btn btn-primary" href="{{ route('users.index') }}">Voltar</a>
    </div>
</div>