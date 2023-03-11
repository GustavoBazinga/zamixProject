<div class="row">
    <div class="col-12">

        <div class="card-header">
            <h1>{{$title ?? null}}</h1>
        </div>

        <div class="card-body">
            {{ $inputs ?? null}}
            <button class="btn btn-secondary">Voltar</button>
            <button onclick="{{ $editPath ?? null }}" class="btn btn-primary">
                Editar
            </button>

        </div>
    </div>
</div>
