<div class="row">
    <div class="col-12">

        <div class="card-header">
            <h1>{{$title ?? null}}</h1>
        </div>

        <div class="card-body">
            <form action="{{$url}}" method="POST">
                @csrf
                @method('PATCH')
                {{ $formInput ?? null}}
                <button class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary">
                    Editar
                </button>
            </form>
        </div>
    </div>
</div>
