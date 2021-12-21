<div class="row">
    <div class="col-12">
        {!!Form::text('name', 'Nome')!!}
    </div>
    <div class="col-6 mt-4">
        {!!Form::submit("Salvar", "success")!!}
        <a class="btn btn-primary" href="{{ route('permissions.index') }}">Voltar</a>
    </div>
</div>