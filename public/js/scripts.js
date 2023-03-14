

function alteraTipo(value) {
    let divMountPage = document.querySelector('#mountPage');
    limpaElemento(divMountPage)
    document.querySelector('#nome').value = '';
    if (value == '1') {
        divFormGroup = document.createElement('div');
        divFormGroup.setAttribute('class', 'form-group');
        divFormGroup.innerHTML = `
            <label for="quantidade">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade" value="0" disabled>

        `
        divMountPage.appendChild(divFormGroup);

        divFormGroup = document.createElement('div');
        divFormGroup.setAttribute('class', 'form-group');

        divFormGroup.innerHTML = `
            <label for="precoCusto">Preço de Custo</label>
            <input type="number" class="form-control" id="precoCusto" name="precoCusto" placeholder="Preço de Custo" value="0" min="0" step="0.01">
        `
        divMountPage.appendChild(divFormGroup);

        divFormGroup = document.createElement('div');
        divFormGroup.setAttribute('class', 'form-group');
        divFormGroup.innerHTML = `
            <label for="precoVenda">Preço de Venda</label>
            <input type="number" class="form-control" id="precoVenda" name="precoVenda" placeholder="Preço de Venda" value="0" min="0" step="0.01">
        `
        divMountPage.appendChild(divFormGroup);

    }
    else{
        divFormGroup = document.createElement('div');
        divFormGroup.setAttribute('class', 'form-group');
        divFormGroup.innerHTML = `
        <div class="form-group">
            <label for="precoCusto">Preço de Custo</label>
            <input type="number" class="form-control" id="precoCusto" name="precoCusto" placeholder="Preço de Custo" value=0 min="0" step="0.01">
        </div>
        <div class="form-group">
            <label for="precoVenda">Preço de Venda</label>
            <input type="number" class="form-control" id="precoVenda" name="precoVenda" placeholder="Preço de Venda" value=0 min="0" step="0.01">
        </div>
            <button type="button" class="btn btn-primary btn-sm" id="btnAdd" onclick="getProdutoList()">Adicionar Produto</button>
        `
        divMountPage.appendChild(divFormGroup);

    }
}

// Função auxiliar que recebe um elemento e remove tudo que tem dentro dele
function limpaElemento(element){
    let child = element.lastElementChild;
    while (child){
        element.removeChild(child);
        child = element.lastElementChild;
    }
}

async function getProdutosCompostos(){
    let divMountPage = document.querySelector('#mountPage');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.responseText);
            return response;
        }
    };
    xhttp.open("GET", "http://localhost:8000/getProdutosCompostos", true);
    xhttp.send();
}

async function getProdutoList(request = false){
    let divMountPage = document.querySelector('#mountPage');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.responseText);
            divFormGroup = document.createElement('div');
            divFormGroup.setAttribute('class', 'form-group');
            count = document.querySelectorAll('.toCount').length + 1;
            options = '<option value="0">Selecione um Produto</option>';
            optGroupSimples = '<optgroup label="Produtos Simples">'
            optGroupComposto = '<optgroup label="Produtos Compostos">'
            for (i = 0; i < response.length; i++) {
                if (response[i].quantidade != undefined) {
                    optGroupSimples += `<option value="${response[i].id}">${response[i].nome}</option>`
                }else{
                    optGroupComposto += `<option value="PC-${response[i].id}">${response[i].nome}</option>`
                }
            }

            optGroupSimples += `</optgroup>`
            optGroupComposto += `</optgroup>`

            divFormGroup.innerHTML =`
                <div class="row pl-4">
                    <div class="col-10">
                        <label for="produto">Produto #${count}</label>
                        <select class="form-control toCount" onchange="auxTwoFunction(${count})" id="produto${count}" name="produto${count}" placeholder="Produto" value="0">
                            ${options}
                            ${optGroupSimples}
                            ${optGroupComposto}

                        </select>
                    </div>
                    <div class="col-2">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" onchange="attPrecos('produto${count}')" class="form-control text-right quantidade" id="quantidade${ count }" name="quantidade${count}" placeholder="Quantidade" value="1" min="1">
                    </div>
                </div>
            `
            divMountPage.appendChild(divFormGroup);


        }
    };
    xhttp.open("GET", "http://localhost:8000/getAllProdutos", true);
    xhttp.send();
}

function auxTwoFunction(count){
    if (count == 1) {
        quantidadeRecebe1(count)
        attPrecos('produto' + count)
    }
}

function attPrecos(id){
    quantidadeId = id.replace('produto', 'quantidade');
    produto = document.querySelector('#' + id).value;
    if (produto != 0){
        precos = getPrecoProduto(produto);
    }
}

function quantidadeRecebe1(count){
    quantidade = document.querySelector("#quantidade" + count);
    quantidade.value = 1;
}

function getPrecoProduto(id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            precos = JSON.parse(this.responseText);
            precoVenda = document.querySelector('#precoVenda');
            precoCusto = document.querySelector('#precoCusto');
            quantidade = document.querySelector('#' + quantidadeId);

            precoVenda.value = precos.precoVenda * quantidade.value;
            precoCusto.value = precos.precoCusto * quantidade.value;
        }
    };
    xhttp.open("GET", "http://localhost:8000/getPrecoProduto/" + id, true);
    xhttp.send();
}

function mountProductCompsite(id, disabled = false){
    let divProdutos = document.querySelector('#mountPage');
    console.log(id);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.responseText);
            divFormGroup = document.createElement('div');
            divFormGroup.setAttribute('class', 'form-group');
            divFormGroup.innerHTML = `
                <div class="form-group">
                    <label for="btnAddProduto">Produtos</label>
                </div>
            `
            if (disabled){
                divFormGroup.innerHTML += `
                    <button type="button" name="btnAddProduto" class="btn btn-primary btn-sm" id="btnAddProduto" onclick="getProdutoList(true)">Adicionar Produto</button>
                `
            }
            for (i = 0; i < response.length; i++) {
                divFormGroup.innerHTML += `
                    <div class="row pl-4">
                        <div class="col-10">
                            <div class="form-group">
                                <label for="produto${i+1}">Produto #${i + 1}</label>
                                <input type="text" class="form-control toCount" id="produto${i + 1}" name="produto${i + 1}" placeholder="Produto" value="${response[i].nome}" disabled>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="quantidade${i}">Quantidade</label>
                                <input type="number" class="form-control text-right" id="quantidade${i + 1}" name="quantidade${i + 1}" min="0" placeholder="Quantidade" value="${response[i].quantidade}" disabled>
                            </div>
                        </div>
                    </div>
                   `
                if (disabled){
                  inputs = divFormGroup.querySelectorAll('input');
                    for (j = 0; j < inputs.length; j++){
                        inputs[j].disabled = false;
                    }
                }
            }

            divProdutos.appendChild(divFormGroup);
        }
    };
    xhttp.open("GET", "http://localhost:8000/getSubProdutos/" + id, true);
    xhttp.send();
}

function mountRequestList(id){
    let divProdutos = document.querySelector('#mountPage');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.responseText);
            console.log(response);
            for (i = 0; i < response.length; i++) {
                console.log(response[i]);
                try{
                    nome = (response[i])['produto']['nome'];
                    id_produto = 'PS-' + (i+1).toString();
                    id_quantidade = 'PS-' + (i+1).toString();
                }
                catch{
                    nome = (response[i])['produtoComposto']['nome'];
                    id_produto = 'PC-' + (i+1).toString();
                    id_quantidade = 'PC-' + (i+1).toString();
                }
                divFormGroup = document.createElement('div');
                divFormGroup.setAttribute('class', 'form-group');
                divFormGroup.innerHTML += `
                    <div class="row pl-4">
                        <div class="col-10">
                            <div class="form-group">
                                <label for="${id_produto}">Produto #${i + 1}</label>
                                <input type="text" class="form-control toCount" id="${id_produto}" name="${id_produto}" placeholder="Produto" value="${nome}" disabled>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="${id_quantidade}">Quantidade</label>
                                <input type="number" class="form-control text-right" id="${id_quantidade}" name="${id_quantidade}" min="0" placeholder="Quantidade" value="${response[i].quantidade}" disabled>
                            </div>
                        </div>
                    </div>
                   `
                divProdutos.appendChild(divFormGroup);
            }
        }
    };
    xhttp.open("GET", "http://localhost:8000/getProdutosRequest/" + id, true);
    xhttp.send();
}

function tratarRequisicao(id, status){
    funcionario = document.querySelector('#funcionario').value;
    if (funcionario === 0){
        alert('Selecione um funcionário');
        return;
    }
    console.log(id);
    alert("Esse não funcionou!")

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (response.status === 'success'){
                console.log(response.message);
                window.location.href = 'http://localhost:8000/requisicoes';
            }
            else{
                console.log(response.message);
            }
        }
    };
    xhttp.open("GET", "http://localhost:8000/executeRequest/" + id + '/' + status, true);
    xhttp.send();
}

function alteraRelatorio(value){

    divResult = document.querySelector('#result');
    table = document.createElement('table');
    table.setAttribute('class', 'table table-striped');
    dataInicial = document.querySelector('#dataInicial').value;
    dataFinal = document.querySelector('#dataFinal').value;
    console.log(dataInicial);
    console.log(dataFinal);
    limpaElemento(divResult);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            console.log(this.responseText);
            response = JSON.parse(this.responseText);
            console.log(response);
            if (value === "1"){

                table.innerHTML = `
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade Entrada</th>
                            <th>Valor Custo</th>
                            <th>Valor Venda</th>
                        </tr>
                    </thead>
                    <tbody>
                `
                for (i = 0; i < response.length; i++){
                    console.log(response[i]);
                    table.innerHTML += `
                        <tr>
                            <td>${response[i].nome_produto}</td>
                            <td>${response[i].quantidade_entrada}</td>
                            <td  class="toCountCusto">${response[i].precoCusto_total}</td>
                            <td  class="toCountVenda">${response[i].precoVenda_total}</td>
                        </tr>
                    `
                }
                table.innerHTML += `
                    </tbody>
                `


                divResult.appendChild(table);
                h2 = document.createElement('h2');
                totais = soma();
                h2.innerHTML = 'Total Custo de Entrada de Produtos: R$ ';
                divResult.appendChild(h2);
                h2 = document.createElement('h2');
                h2.innerHTML = 'Total Venda de Produtos: R$ ' + totais[1];
                divResult.appendChild(h2);

            }
            else if (value === "2"){
                table.innerHTML = `
                    <thead>
                        <tr>
                            <th>Requição</th>
                            <th>Status</th>
                            <th>Funcionário</th>
                            <th>Data Criação</th>
                            <th>Data Atualização</th>
                        </tr>
                    </thead>
                    <tbody>
                `
                for (i = 0; i < response.length; i++){
                    console.log(response[i]);
                    table.innerHTML += `
                        <tr>
                            <td>${response[i].requisicao_id}</td>
                            <td>${response[i].status}</td>
                            <td>${response[i].nome_funcionario}</td>
                            <td>${response[i].data_criacao}</td>
                            <td>${response[i].data_atualizacao}</td>
                        </tr>
                    `
                }
                table.innerHTML += `
                    </tbody>
                `
            }
            else{
                table.innerHTML = `
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço de Custo</th>
                            <th>Preço de Venda</th>
                            <th>Lucro</th>
                        </tr>
                    </thead>
                    <tbody>
                    `
                for (i = 0; i < response.length; i++){
                    table.innerHTML += `
                        <tr>
                            <td>${response[i].nome_produto}</td>
                            <td>${response[i].quantidade}</td>
                            <td  class="toCountCusto">${response[i].precoCusto_total}</td>
                            <td  class="toCountVenda">${response[i].precoVenda_total}</td>
                            <td>${response[i].precoVenda_total - response[i].precoCusto_total}</td>
                        </tr>
                    `
                }
                table.innerHTML += `
                    </tbody>
                `
            }

            divResult.appendChild(table);
            h2 = document.createElement('h2');
            totais = soma();
            h2.innerHTML = 'Total Custo de Entrada de Produtos: R$ ' + totais[0]
            divResult.appendChild(h2);
            h2 = document.createElement('h2');
            h2.innerHTML = 'Total Venda de Produtos: R$ ' + totais[1];
            divResult.appendChild(h2);
        }
    };
    xhttp.open("GET", "http://localhost:8000/getRelatorio/" + value + "/" + dataInicial + "/" + dataFinal , true);
    xhttp.send();

}

function soma(){
    toCountCusto = document.querySelectorAll('.toCountCusto');
    toCountVenda = document.querySelectorAll('.toCountVenda');
    total = 0;
    totalCusto = 0;
    totalVenda = 0;
    for (i = 0; i < toCountCusto.length; i++){
        totalCusto += parseFloat(toCountCusto[i].innerHTML);
    }
    for (i = 0; i < toCountVenda.length; i++){
        totalVenda += parseFloat(toCountVenda[i].innerHTML);
    }
    return [totalCusto, totalVenda];
}
