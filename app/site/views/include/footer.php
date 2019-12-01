<footer class="page-footer font-small mdb-color lighten-3 pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-2 mx-auto my-md-4 my-0 mt-4 mb-1">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mb-4">Acesso</h5>

                <ul class="list-unstyled">
                    <li>
                        <p>
                            <a href="<?=URL;?>home/index">Home</a>
                        </p>
                    </li>
                    <li>
                        <p>
                            <a href="<?=URL;?>montarBolo">Monte seu bolo</a>
                        </p>
                    </li>
                    <li>
                        <p>
                            <a href="<?=URL;?>boloPote">Bolos de pote</a>
                        </p>
                    </li>
                    <li>
                        <p>
                            <a href="<?=URL;?>sobreNos">Sobre nós</a>
                        </p>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-4 mx-auto my-md-4 my-0 mt-4">

                <!-- Contact details -->
                <h5 class="font-weight-bold text-uppercase mb-4">Endereço</h5>

                <ul class="list-unstyled">
                    <li>
                        <p>
                            <i class="fas fa-home mr-3"></i>R. Fernando Passoni, 1 - São Francisco de Assis<br>Cachoeiro
                            de Itapemirim, Espírito Santo, Brasil</p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-envelope mr-3"></i> info@example.com</p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-phone mr-3"></i>(28) 99930-5296</p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-phone mr-3"></i>(28) 99919-6890</p>
                    </li>
                </ul>

            </div>


            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-2 text-center mx-auto my-4">

                <!-- Social buttons -->
                <h5 class="font-weight-bold text-uppercase mb-4">Siga-nos</h5>

                <a href="#" class="fab fa-facebook-square"></a>
                <a href="#" class="fab fa-instagram"></a>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
        <a href="#">Adriana e Alessandra Bolos e Pote</a>
    </div>
    <!-- Copyright -->

</footer>



<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="<?=URL;?>assets/js/Input-Spinner-Plugin-Bootstrap-4/src/bootstrap-input-spinner.js"></script>
<script src="<?=URL;?>assets/js/Number-Input-Spinner-jQuery-Nice-Number/src/jquery.nice-number.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="<?= URL; ?>assets/js/holder.min.js"></script>
<script src="<?= URL; ?>assets/js/scrollreveal.min.js"></script>
<script src="<?= URL; ?>assets/js/personalizado.js"></script>
<script src="<?= URL; ?>assets/js/carrinho.js"></script>
<script src="<?=URL;?>assets/js/bolopote.js"></script>
<script>
    $('.qtd').niceNumber({
        autoSize: false
    });
    

    // Get the modal
    var modal = document.getElementById('loginModal');
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function fecharModalLogin(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function hideMessage() {
        document.getElementById("message_div").style.display = "none";
    };
    setTimeout(hideMessage, 5000);

    //API PARA BUSCA DE CEP
     function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('numero').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('complemento').value=(conteudo.complemento);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function buscarCep() {
        var cep = document.getElementById("cep").value;

        //Nova variável "cep" somente com dígitos.
        cep = cep.replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {
                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    function previewImagem() {
        var imagem = document.querySelector('input[name=imagem_nova').files[0];
        var preview = document.querySelector('#preview-user');

        var reader = new FileReader();
        reader.onloadend = function () {
            preview.src = reader.result;
        };
        if (imagem) {
            reader.readAsDataURL(imagem);
        } else {
            preview.src = "";
        }
    }



</script>

</body>

</html>