<?php

namespace Site\models;

if( !defined('URL')){
	header("location: /");
	exit();
}

class Pedido{

	private $tabela = "pedido";

	public function visualizar($idPedido){
        $this->idPedido = $idPedido;
        
        
		/*echo "<br/>Listando dados do banco";
		$conexao = new \Site\models\helper\ModelsConn();
		$conexao->getConn();*/
        
        $verPedido = new \Site\models\helper\ModelsRead();
		$verPedido->exeReadEspecifico("SELECT p.idPedido, u.nome, u.sobrenome, p.precoTotal, p.status, 
            p.dataPedido, p.dataEntrega, p.formaEntrega, p.formaPagamento, p.statusPagamento, p.observacao, e.logradouro, e.bairro, e.numero, e.cep
            FROM {$this->tabela} p, usuarios AS u, endereco AS e
            WHERE p.idCliente = u.idUsuario AND p.idPedido = {$this->idPedido} 
            AND p.idEndereco = e.idEndereco AND p.idCliente = u.idUsuario
            ORDER BY p.idPedido ASC");
		$this->result['pedido'] = $verPedido->getResult();

        $verBolosPedido = new \Site\models\helper\ModelsRead();
        $verBolosPedido->exeReadEspecifico("SELECT b.sabor, b.tamanho, b.imagem, b.preco, 
            pb.idBoloDePote, pb.quantidade
            FROM {$this->tabela} p, bolodepote b, pedido_bolodepote pb 
            WHERE p.idPedido = pb.idPedido AND pb.idBoloDePote = b.idBoloDePote 
            AND p.idPedido = {$this->idPedido}
            ORDER BY p.idPedido ASC");
        $this->result['bolos'] = $verBolosPedido->getResult();

        
		//var_dump($this->result['usuario']);
		return $this->result;
        
	}

    public function listar(){

        $listarPedidos = new \Site\models\helper\ModelsRead();

        if($_SESSION['nivel'] == 1){
            $listarPedidos->exeReadEspecifico("SELECT u.idUsuario, u.nome, u.sobrenome, p.idPedido, qt.qtd as qtdBolos, p.precoTotal, p.status,
                                            e.bairro, e.logradouro, e.numero, e.cep
            FROM {$this->tabela} AS p, usuarios AS u, endereco AS e, (SELECT COUNT(pb.idPedido) as qtd
                                        FROM pedido_bolodepote AS pb
                                        JOIN pedido AS pD ON pb.idPedido = pD.idPedido AND pD.idPedido = 1) as qt

            WHERE p.idEndereco = e.idEndereco AND p.idCliente = u.idUsuario
            ORDER BY p.dataPedido DESC");
        }
        else{
            $listarPedidos->exeReadEspecifico("SELECT p.idPedido, qt.qtd as qtdBolos, p.precoTotal, p.status,
                                            e.bairro, e.logradouro, e.numero, e.cep
            FROM {$this->tabela} as p, endereco AS e, (SELECT COUNT(pb.idPedido) as qtd
                                        FROM pedido_bolodepote AS pb
                                        JOIN pedido AS pD ON pb.idPedido = pD.idPedido AND pD.idPedido = 1) as qt

            WHERE p.idCliente = {$_SESSION['id']} AND p.idEndereco = e.idEndereco
            ORDER BY p.idPedido ASC");

        }
        
        $this->result['pedidos'] = $listarPedidos->getResult();
        //var_dump($this->result['pedidos']);
        //exit();
        return $this->result['pedidos'];
    }

	public function addPedido($dados){
		$this->dados = $dados;
        $this->dados['idCliente'] = $_SESSION['id'];
        $this->dados['dataPedido'] = date("Y-m-d H:i:s");
        $this->dados['dataEntrega'] = date($this->dados['dataPedido'], strtotime("+2 days"));
        

        $inserirPedido = new \Site\models\helper\ModelsCreate();
        $inserirPedido->exeCreate($this->tabela, $this->dados);

        $ultimoPedido = new \Site\models\helper\ModelsRead();
        $ultimoPedido->exeReadEspecifico("SELECT idPedido
                                        FROM pedido
                                        ORDER BY idPedido
                                        DESC limit 1;
                                        ");

        $lastIdPedido = $ultimoPedido->getResult();
        $lastIdPedido = $lastIdPedido[0]['idPedido'];

        $inserirPedidoBolo = new \Site\models\helper\ModelsCreate();

        foreach($_SESSION['carrinho'] as $bolo) {
            extract($bolo);

            $this->dados['carrinho']['idPedido'] = $lastIdPedido;
            $this->dados['carrinho']['idBoloDePote'] = $idBoloDePote;
            $this->dados['carrinho']['quantidade'] = $qtd;
            $inserirPedidoBolo->exeCreate("pedido_bolodepote", $this->dados['carrinho']);
        }
        
        unset($_SESSION['carrinho']);

        if ($inserirPedidoBolo->getResult()){
            $this->result = true;
            $_SESSION['msg'] = "<div id=\"message_div\" class=\"alert alert-success\" role=\"alert\">
                                    Pedido efetuado com sucesso!
                                </div>";
        }else{
            $_SESSION['msg'] = "<div id=\"message_div\" class=\"alert alert-danger\" role=\"alert\">
                                    Falha ao efetuar o pedido! Erro: {$inserirPedidoBolo->getMsg()}
                                </div>";
        }
    }

    public function altPedido(array $dados){
        $this->dados = $dados;

        /*var_dump($this->dados);
        exit();*/

        $upPedido = new \Site\Models\helper\ModelsUpdate();
        $upPedido->exeUpdate("pedido", $this->dados, "WHERE idPedido =:id", "id=" . $this->dados['idPedido']);

        if ($upPedido->getResult()) {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-success container'>Pedido atualizado com sucesso!</div>";
            $this->result = true;
        } else {
            $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: O pedido não foi atualizado!</div>";
            $this->result = false;
        }
    }

}