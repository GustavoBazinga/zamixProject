<div class="row">
    <div class="col-12">
        <div class="card-header">
            <h1>{{$title ?? null}}</h1>
        </div>
    </div>
    <div class="card-body">
        <div class="form-check">
            <input class="form-check-input" value=1 type="radio" name="flexRadioDefault" id="entrada"onchange="alteraRelatorio(this.value)">
            <label class="form-check-label" for="entrada">
                Relatório de Entrada
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value=2 type="radio" name="flexRadioDefault" id="requisicoes" onchange="alteraRelatorio(this.value)">
            <label class="form-check-label" for="requisicoes">
                Relatório de Requisições
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value=3 type="radio" name="flexRadioDefault" id="saida" onchange="alteraRelatorio(this.value)">
            <label class="form-check-label" for="saida">
                Relatório de Saída
            </label>
        </div>
        <div class="form-group">
            <label for="dataInicial">Data Inicial</label>
            <input type="date" class="form-control" id="dataInicial" name="dataInicial" onchange="alteraRelatorio()">
        </div>
        <div class="form-group">
            <label for="dataFinal">Data Final</label>
            <input type="date" class="form-control" id="dataFinal" name="dataFinal" onchange="alteraRelatorio()">
        </div>
        <div id="result" class="table-responsive">
            {{ $bodyItems ?? null}}
        </div>

    </div>

</div>
