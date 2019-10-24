<?php
//___________________________________________________________________________
namespace Site\models\helper;
use PDO;
if (!defined('URL')){
	header("location: /");
	exit();
}

//___________________________________________________________________________
class ModelsRead extends ModelsConn{

	private $select;
	private $values; 
	private $result;
	private $msg;
	private $squery;
	private $conn;


	public function exeRead($tabela, $termos = null, $parseString = null){
		if(!empty($parseString)){
            // caso tenha sido passado algum parametro, ele será colocado no array $this->value
			parse_str($parseString, $this->values);
		}

		$this->select = "SELECT * FROM {$tabela} {$termos}";
		$this->executarInstrucao();
	}

	public function exeReadEspecifico($query, $parseString = null){
		if (!empty($parseString)){
			parse_str($parseString, $this->values);
		}
        // Montando a SQL para busca em BD
		$this->select = (string) $query;
		$this->executarInstrucao();
	}

	private function conexao(){
        //chamando o método da classe pai
		$this->conn = parent::getConn();
        // preparando a SQL
		$this->query = $this->conn->prepare($this->select);
        // colocando o modo de exibição da query como ASSOCIAÇÃO (nome dos campos)
		$this->query->setFetchMode(PDO::FETCH_ASSOC);
	}
    
	private function getInstrucao(){
		if($this->values){
			foreach ($this->values as $link => $valor){
				if ($link == 'limit' || $link =='offset'){
					$valor = (int)$valor;
				}
                //garantindo a integridade dos valores passados (bindValue)
				$this->query->bindValue(":{$link}", $valor, (is_int($valor) ? PDO::PARAM_INT : PDO::PARAM_STR));
			}
		}
	}


	private function executarInstrucao(){
		$this->conexao();
		try{

			$this->getInstrucao();
            
			$this->query->execute();

			$this->result = $this->query->fetchAll();
            
		}catch (PDOException $e){
			$this->result = null;
			$this->msg = "<strong>Erro ao ler daddos:</strong> {$e->getMessage()}";
		}
	}
    
    
	public function getResult(){
		return $this->result;
	}
}