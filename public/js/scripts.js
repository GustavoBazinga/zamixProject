

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
            <input type="number" class="form-control" id="precoCusto" name="precoCusto" placeholder="Preço de Custo" value="0" min="0" step="0.01">
        </div>
        <div class="form-group">
            <label for="precoVenda">Preço de Venda</label>
            <input type="number" class="form-control" id="precoVenda" name="precoVenda" placeholder="Preço de Venda" value="0" min="0" step="0.01">
        </div>
            <button type="button" class="btn btn-primary btn-sm" id="btnAdd" onclick="getProdutoList()">Adicionar Produto</button>
        `
        divMountPage.appendChild(divFormGroup);
    }
}

function editProdutoComposto(id){

}
// Função auxiliar que recebe um elemento e remove tudo que tem dentro dele
function limpaElemento(element){
    let child = element.lastElementChild;
    while (child){
        element.removeChild(child);
        child = element.lastElementChild;
    }
}

function getProdutoList(composto = false){
    let divMountPage = document.querySelector('#mountPage');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.responseText);
            divFormGroup = document.createElement('div');
            divFormGroup.setAttribute('class', 'form-group');
            count = document.querySelectorAll('.toCount').length + 1;
            options = '<option value="0">Selecione um Produto</option>';
            for (i = 0; i < response.length; i++) {
                options += `<option value="${response[i].id}">${response[i].nome}</option>`
            }
            divFormGroup.innerHTML =`
                <div class="row pl-4">
                    <div class="col-10">
                        <label for="produto">Produto #${count}</label>
                        <select class="form-control toCount" id="produto${count}" name="produto${count}" placeholder="Produto" value="0">
                            ${options}
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" class="form-control text-right" id="quantidade${ count }" name="quantidade${count}" placeholder="Quantidade" value="1" min="1">
                    </div>
                </div>
            `
            divMountPage.appendChild(divFormGroup);
        }
    };
    xhttp.open("GET", "http://localhost:8000/getProdutos", true);
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
                                <label for="produto${i}">Produto #${i + 1}</label>
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
