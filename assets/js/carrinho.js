/*$(document).ready(function() {
    listarCarrinho();
});

$(document).ready(function() {
    listarProdutosCheckout();
});

document.getElementById('btnAddCarrinho').addEventListener('click',addCarrinho);

function addCarrinho(e){
  	var id = 0;
    var idBolo = document.getElementById("idBolo").value;
    var qtd = document.getElementById("qtd").value;
    var preco = 30.00*qtd;
    var flavor = document.getElementsByName("sabor");
    var foto = document.getElementsByName("imagem");;
    for(var i = 0; i < flavor.length; i++){
       if(flavor[i].checked){
        var sabor = (flavor[i].value);
        var imagem = (foto[i].value);
       }
       
    }

    if(!sabor){
    	alert("Selecione um sabor!");
    }

    if(localStorage.getItem('carrinho') === null){
    	bolo = {
    		id : id,
        idBolo : idBolo,
    		quantidade : qtd,
        preco : preco,
    		sabor : sabor,
        imagem : imagem
    	}
    	var bolos = [];
    	bolos.push(bolo);
    	localStorage.setItem('carrinho', JSON.stringify(bolos));
    }
    else{
    	var bolos = JSON.parse(localStorage.getItem('carrinho'));
    	id = bolos.length;
    	bolo = {
    		id : id,
        idBolo : idBolo,
    		quantidade : qtd,
        preco : preco,
    		sabor : sabor,
        imagem : imagem
    	}

    	bolos.push(bolo);
    	localStorage.setItem('carrinho', JSON.stringify(bolos));
    }  
    console.log(bolo);
    
}

function listarCarrinho(){
	var carrinho = document.getElementById("bolosCarrinho");
	carrinho.innerHTML = '';

	var bolos = JSON.parse(localStorage.getItem('carrinho'));
	
  var valorTotal = 0;

	for(var i =0; i < bolos.length; i++){
		var id = bolos[i].id;
    var idBolo = bolos[i].idBolo;
		var sabor = bolos[i].sabor;
    var imagem = bolos[i].imagem;
    var preco = bolos[i].preco;
		var qtd = bolos[i].quantidade;
    valorTotal += preco;
		

		carrinho.innerHTML+=
			'<tr>'+
			'<th scope="row" class="border-0">' +
                '<div class="p-2">'+
                  '<img src="/projetoPassoni/assets/img/bolos/bolosdepote/'+idBolo+'/'+imagem+'" alt="" width="70" class="img-fluid rounded shadow-sm">'+
                  '<div class="ml-3 d-inline-block align-middle">'+
                    '<h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">Bolo de Pote de '+sabor+'</a></h5><span class="text-muted font-weight-normal font-italic d-block">Sabor: '+sabor+' | Tamanho: 2 Litros</span>'+
                  '</div>'+
                '</div>'+
              '</th>'+
              '<td class="border-0 align-middle"><strong>R$'+preco+'</strong></td>'+
              '<td class="border-0 align-middle">'+
                '<div class="nice-number quantity">'+
                  '<input type="number" id="qtd" value="'+qtd+'" min="1" max="100" onChange="mudarPreco('+id+', this.value)">'+
              '</div>'+
              '</td>'+
              '<td class="border-0 align-middle"><a href="#" class="text-dark" onClick="deletarBolo('+id+')"><i class="fa fa-trash"></i></a></td>'+
            '</tr>'
		;	
	}	
  document.getElementById("subTotal").innerHTML='<strong class="text-muted">Subtotal</strong><strong>'+valorTotal+'</strong>'
	
}

function listarProdutosCheckout(){
  var checkout = document.getElementById("prodCarrinho");
  checkout.innerHTML = '';

  var bolos = JSON.parse(localStorage.getItem('carrinho'));
  
  var valorTotal = 0;

  for(var i =0; i < bolos.length; i++){
    var id = bolos[i].id;
    var idBolo = bolos[i].idBolo;
    var sabor = bolos[i].sabor;
    var imagem = bolos[i].imagem;
    var preco = bolos[i].preco;
    var qtd = bolos[i].quantidade;
    valorTotal += preco;
    

    checkout.innerHTML+=
      '<li class="list-group-item d-flex justify-content-between lh-condensed">'+
          '<div>'+
              '<h6 class="my-0">Bolo de pote de '+sabor+'</h6>'+
              '<small class="text-muted">Qtd: '+qtd+'</small>'+
          '</div>'+
          '<span class="text-muted">R$'+preco+'</span>'+
      '</li>'
    ; 
  }

  checkout.innerHTML+=
  '<li class="list-group-item d-flex justify-content-between lh-condensed">'+
      '<div class="text-success">'+
          '<h6 class="my-0">Código de promoção</h6>'+
          '<small>CODIGOEXEMEPLO</small>'+
      '</div>'+
      '<span class="text-success">R$0</span>'+
  '</li>'+
  '<li class="list-group-item d-flex justify-content-between">'+
    '<span>Total (BRL)</span>'+
    '<strong>R$'+valorTotal+'</strong>'+
  '</li>'
    ; 

}

function mudarPreco(id, qtd){
  var bolos = JSON.parse(localStorage.getItem('carrinho'));

  for(var i =0; i < bolos.length; i++){
    if(bolos[i].id == id){
      bolos[i].preco = 30*qtd;
      bolos[i].quantidade = qtd;

    }

    localStorage.setItem('carrinho', JSON.stringify(bolos));

  }

  listarCarrinho();
}

function deletarBolo(id){

  var bolos = JSON.parse(localStorage.getItem('carrinho'));

  for(var i =0; i < bolos.length; i++){
    if(bolos[i].id == id){
      bolos.splice(i, 1);

    }

    localStorage.setItem('carrinho', JSON.stringify(bolos));

  }

  listarCarrinho();

}