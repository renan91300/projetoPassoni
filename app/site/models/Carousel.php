<?php

namespace Site\models;

if( !defined('URL')){
	header("location: /");
	exit();
}

class Carousel{

	private $tabela = "carousel";

	public function listar(){
        
		/*echo "<br/>Listando dados do banco";
		$conexao = new \Site\models\helper\ModelsConn();
		$conexao->getConn();*/
        
        $listar = new \Site\models\helper\ModelsRead();
		//$listar->exeRead($this->tabela, "WHERE adm_situacao_id=:adm_situacao_id LIMIT :limit", "adm_situacao_id=1&limit=3");
		$listar->exeReadEspecifico("SELECT ca.id, ca.nome, ca.imagem, ca.titulo, ca.descricao, ca.posicao_text, ca.titulo_botao, ca.link, co.cor
											FROM {$this->tabela} ca
											INNER JOIN adm_cor co ON co.id = ca.adm_cor_id
											WHERE adm_situacao_id=:adm_situacao_id ORDER BY ca.ordem ASC LIMIT :limit", "adm_situacao_id=1&limit=3");
		$this->result['carousel'] = $listar->getResult();
		//var_dump($this->result['carousel']);
		return $this->result['carousel'];
        
	}
}