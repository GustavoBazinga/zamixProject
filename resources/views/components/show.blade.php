<div class="row">
    <div class="col-12">

        <div class="card-header">
            <h1>{{$title ?? null}}</h1>
        </div>

        <div class="card-body">
            {{ $inputs ?? null}}
            <button class="btn btn-secondary">Voltar</button>
            <a href="{{$editPath ?? null}}" class="btn btn-primary">
                Editar
            </a>
        </div>
    </div>
</div>
