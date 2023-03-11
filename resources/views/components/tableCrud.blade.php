<div class="row">
    <div class="col-12">
        <div class="card-header">
            <h1>{{$title ?? null}}</h1>
        </div>
        <div class="card-body">
            <a href="{{ $pathCreate }}" class="btn btn-success btn-sm" title="Adicionar">
                Adicionar
            </a>
            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 2%">#</th>
                            {{ $headerItems ?? null}}
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{ $bodyItems ?? null}}
                     </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
