
divMountPage = document.querySelector('#mountPage');
function alteraTipo(value) {
    limpaElemento(divMountPage)
    if (value == '1') {
        divFormGroup = document.createElement('div');
        divFormGroup.setAttribute('class', 'form-group');
        labelQuantidade = document.createElement('label');
        labelQuantidade.setAttribute('for', 'quantidade');
        labelQuantidade.innerHTML = 'Quantidade';
        inputQuantidade = document.createElement('input');
        inputQuantidade.setAttribute('type', 'number');
        inputQuantidade.setAttribute('class', 'form-control');
        inputQuantidade.setAttribute('id', 'quantidade');
        inputQuantidade.setAttribute('name', 'quantidade');
        inputQuantidade.setAttribute('placeholder', 'Quantidade');
        inputQuantidade.setAttribute('value', "0");
        inputQuantidade.disabled = true;
        divFormGroup.appendChild(labelQuantidade);
        divFormGroup.appendChild(inputQuantidade);
        divMountPage.appendChild(divFormGroup);

        divFormGroup = document.createElement('div');
        divFormGroup.setAttribute('class', 'form-group');
        labelPrecoCusto = document.createElement('label');
        labelPrecoCusto.setAttribute('for', 'precoCusto');
        labelPrecoCusto.innerHTML = 'Preço de Custo';
        inputPrecoCusto = document.createElement('input');
        inputPrecoCusto.setAttribute('type', 'number');
        inputPrecoCusto.setAttribute('class', 'form-control');
        inputPrecoCusto.setAttribute('id', 'precoCusto');
        inputPrecoCusto.setAttribute('name', 'precoCusto');
        inputPrecoCusto.setAttribute('placeholder', 'Preço de Custo');
        inputPrecoCusto.setAttribute('min', "0");
        inputPrecoCusto.setAttribute('step', "0.01");

        divFormGroup.appendChild(labelPrecoCusto);
        divFormGroup.appendChild(inputPrecoCusto);

        divMountPage.appendChild(divFormGroup);

        divFormGroup = document.createElement('div');
        divFormGroup.setAttribute('class', 'form-group');
        labelPrecoVenda = document.createElement('label');
        labelPrecoVenda.setAttribute('for', 'precoVenda');
        labelPrecoVenda.innerHTML = 'Preço de Venda';
        inputPrecoVenda = document.createElement('input');
        inputPrecoVenda.setAttribute('type', 'number');
        inputPrecoVenda.setAttribute('class', 'form-control');
        inputPrecoVenda.setAttribute('id', 'precoVenda');
        inputPrecoVenda.setAttribute('name', 'precoVenda');
        inputPrecoVenda.setAttribute('placeholder', 'Preço de Venda');
        inputPrecoVenda.setAttribute('min', "0");
        inputPrecoVenda.setAttribute('step', "0.01");

        divFormGroup.appendChild(labelPrecoVenda);
        divFormGroup.appendChild(inputPrecoVenda);

        divMountPage.appendChild(divFormGroup);

    }
    else{
        divFormGroup = document.createElement('div');
        divFormGroup.setAttribute('class', 'form-group');
        btnAdd = document.createElement('button');
        btnAdd.setAttribute('type', 'button');
        btnAdd.setAttribute('class', 'btn btn-primary btn-sm');
        btnAdd.setAttribute('id', 'btnAdd');
        btnAdd.setAttribute('onclick', 'addProduto()');
        btnAdd.innerHTML = 'Adicionar Produto';
        divFormGroup.appendChild(btnAdd);
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

// function addProduto(){
//     ajax = new XMLHttpRequest();
//     ajax.open('GET', 'http://localhost:8080/getProdutos', true);
//     ajax.responseType = 'json';
//     ajax.send();
//
//     ajax.onreadystatechange = function(){
//
//
//     }
// }
