<?php

namespace Site\models;

if( !defined('URL')){
	header("location: /");
	exit();
}

class Produto{

	private $tabela = "bolodepote";

	public function listar(){
        
		/*echo "<br/>Listando dados do banco";
		$conexao = new \Site\models\helper\ModelsConn();
		$conexao->getConn();*/
        
        $listar = new \Site\models\helper\ModelsRead();
		$listar->exeReadEspecifico("SELECT *
            FROM {$this->tabela}
            ORDER BY idBoloDePote ASC");
		$this->result['bolos'] = $listar->getResult();
		//var_dump($this->result['usuario']);
		return $this->result['bolos'];
        
	}
	private function addPedido(){
		$this->dados = $dados;
        $this->dados['dataPedido'] = date("Y-m-d H:i:s");
        $this->dados['dataEntrega'] = date($this->dados['dataPedido'], strtotime("+2 days"));
        
        $inserir = new \Site\models\helper\ModelsCreate();
        $inserir->exeCreate($this->tabela, $this->dados);

        if ($inserir->getResult()){
            $this->result = true;
            $_SESSION['msg'] = "<div id=\"message_div\" class=\"alert alert-success\" role=\"alert\">
                                    Pedido efetuado com sucesso!
                                </div>";
        }else{
            $_SESSION['msg'] = "<div id=\"message_div\" class=\"alert alert-danger\" role=\"alert\">
                                    Falha ao efetuar o pedido! Erro: {$inserir->getMsg()}
                                </div>";
        }
    }

}