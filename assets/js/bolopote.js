
    /*const item = this.pegarBolos().done(function(data){
        return data;
    });

    console.log(item);*/

this.imagem = document.getElementById("cake_photo");
this.preco = document.getElementById("precoBolo");

inicializarPagina();

function inicializarPagina(){
    this.pegarBolos().done(function(data){
        var bolo = data[0];
        console.log(bolo);
        var imgUrl = `../assets/img/assets/img/bolos/bolosdepote/${bolo.idBoloDePote}/${bolo.imagem}`;
        this.imagem.setAttribute("src", imgUrl);
    });
}

function alterarSabor(id){
    console.log(this.preco);

    this.pegarBolos().done(function(data){
        const item = data.find(bolo => bolo.idBoloDePote == id);
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
