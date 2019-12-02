
    /*const item = this.pegarBolos().done(function(data){
        return data;
    });

    console.log(item);*/

inicializarPagina();

function inicializarPagina(){

    this.pegarBolos().done(function(data){
        this.imagem = document.getElementById("cake_photo");
        this.preco = document.getElementById("precoBolo");
        this.tamanho = document.getElementById("tamanhoBolo");

        this.inputId = document.querySelector('input[name=idBoloDePote]');
        this.inputSabor = document.querySelector('input[name=sabor]');
        this.inputPreco = document.querySelector('input[name=preco]');
        this.inputImagem = document.querySelector('input[name=imagem]');
        

        var bolo = data[0]; //Pega o primeiro bolo do array

        this.inputId.value = bolo.idBoloDePote;
        this.inputSabor = bolo.sabor;
        this.inputPreco = bolo.preco;
        this.inputImagem = bolo.imagem;
        
        var imgUrl = `./assets/img/bolos/bolosdepote/${bolo.idBoloDePote}/${bolo.imagem}`;
        this.imagem.src = imgUrl;

        this.preco.textContent = `R$${bolo.preco},00`;
        this.tamanho.textContent = bolo.tamanho;

        //Criando os botões de sabores

        this.formFlavors = document.querySelector('form[name=formFlavors');

        data.forEach(bolo => {
            var sabor = document.createElement("div");
            sabor.setAttribute("class", "buttonCake_flavor");
            sabor.setAttribute("onChange", `alterarSabor(${bolo.idBoloDePote})`);

            var labelSabor = document.createElement("label");
            labelSabor.setAttribute("for", bolo.sabor);
            var texto = document.createTextNode(bolo.sabor);
            labelSabor.appendChild(texto);
            

            var inputSabor = document.createElement("input");
            inputSabor.type="radio";
            inputSabor.id = bolo.sabor;
            inputSabor.name = "sabor";
            inputSabor.value = bolo.sabor;
            
            
            sabor.appendChild(labelSabor);
            sabor.appendChild(inputSabor);

            this.formFlavors.appendChild(sabor);
        });
        
    });
}

function alterarSabor(id){
    this.pegarBolos().done(function(data){
        this.imagem = document.getElementById("cake_photo");
        this.preco = document.getElementById("precoBolo");
        this.tamanho = document.getElementById("tamanhoBolo");

        this.inputId = document.querySelector('input[name=idBoloDePote]');
        this.inputSabor = document.querySelector('input[name=sabor]');
        this.inputPreco = document.querySelector('input[name=preco]');
        this.inputImagem = document.querySelector('input[name=imagem]');
        

        var bolo = data.find(bolo => bolo.idBoloDePote == id);

        this.inputId.value = bolo.idBoloDePote;
        this.inputSabor = bolo.sabor;
        this.inputPreco = bolo.preco;
        this.inputImagem = bolo.imagem;
        
        var imgUrl = `./assets/img/bolos/bolosdepote/${bolo.idBoloDePote}/${bolo.imagem}`;
        this.imagem.src = imgUrl;

        this.preco.textContent = `R$${bolo.preco},00`;
        this.tamanho.textContent = bolo.tamanho;

    });
}

function pegarBolos(){
    return $.getJSON({
        url: "./Bolopote/getBolos", 
        type: "POST",
        dataType: "json"
    }).done(function(data) {
        return data;
    }).fail(function(jqXHR, textStatus ) {
        console.log("Request failed: " + textStatus);
    
    }).always(function() {
        console.log("completou");
    }); 
}
