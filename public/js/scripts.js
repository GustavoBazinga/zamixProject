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


// Função auxiliar que recebe um elemento e remove tudo que tem dentro dele
function limpaElemento(element){
    let child = element.lastElementChild;
    while (child){
        element.removeChild(child);
        child = element.lastElementChild;
    }
}

function getProdutoList(){
    let divMountPage = document.querySelector('#mountPage');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.responseText);
            divFormGroup = document.createElement('div');
            divFormGroup.setAttribute('class', 'form-group');
            count = divMountPage.childElementCount;
            options = '<option value="0">Selecione um Produto</option>';
            for (i = 0; i < response.length; i++) {
                options += `<option value="${response[i].id}">${response[i].nome}</option>`
            }
            divFormGroup.innerHTML =`
                <label for="produto">Produto #${ count }</label>
                <select class="form-control" id="produto${ count }" name="produto${count}" placeholder="Produto" value="0">
                    ${options}
                `


            divFormGroup.innerHTML += `</select>`
            divFormGroup.innerHTML += `
                <label for="quantidade">Quantidade</label>
                <input type="number" class="form-control" id="quantidade${ count }" name="quantidade${count}" placeholder="Quantidade" value="1" min="1">
            `

            divMountPage.appendChild(divFormGroup);


        }
    };
    xhttp.open("GET", "http://localhost:8000/getProdutos", true);
    xhttp.send();
}



function mountProductCompsite(id) {
    let divProdutos = document.querySelector('#divProdutos');
    console.log(id);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            response = JSON.parse(this.responseText);
            console.log(response)
            divFormGroup = document.createElement('div');
            divFormGroup.setAttribute('class', 'form-group');
            divFormGroup.innerHTML = `
                <div class="form-group">
                <label for="">Produtos</label>
                </div>
            `
            for (i = 0; i < response.length; i++) {
                divFormGroup.innerHTML += `
                    <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="produto${i}">Produto #${i + 1}</label>
                            <input type="text" class="form-control" id="produto${i}" name="produto${i}" placeholder="Produto" value="${response[i].nome}" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="quantidade${i}">Quantidade</label>
                            <input type="number" class="form-control" id="quantidade${i}" name="quantidade${i}" placeholder="Quantidade" value="${response[i].quantidade}" disabled>
                        </div>
                    </div>
                    </div>
                   `

            }
            divProdutos.appendChild(divFormGroup);
        }
    }
    console.log("Line 114")
    xhttp.open("GET", "http://localhost:8000/getSubProdutos/" + id, true);
    xhttp.send();
}

