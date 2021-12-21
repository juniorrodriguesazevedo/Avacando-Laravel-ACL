<div class="row">
    <div class="col-12">
        {!!Form::file('image', 'Imagem')!!}
    </div>
    <div class="col-6 mt-2">
        {!!Form::text('title', 'Titulo')!!}
    </div>
    <div class="col-6 mt-2">
        {!!Form::select('status', 'Status', ['draft' => 'Rascunho', 'publish' => 'Publicado'])!!}
    </div>
    <div class="col-12 mt-2">
        {!!Form::textarea('content', 'Conteúdo')!!}
    </div>
    <div class="col-6 mt-4">
        {!!Form::submit("Salvar", "success")!!}
        <a class="btn btn-primary" href="{{ route('posts.index') }}">Voltar</a>
    </div>
</div>