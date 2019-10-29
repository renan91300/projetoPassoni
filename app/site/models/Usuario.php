<?php
    namespace Site\models;
    if( !defined('URL')){
        header("location: /");
        exit();
    }

    class Usuario{
        private $result=false;
        private $tabela="usuarios";

        private $userLog;

        
        public function listar(array $dados=null){
            $this->dados = $dados;

            $listar = $listar = new \Site\models\helper\ModelsRead();
            $listar->exeReadEspecifico("SELECT u.idUsuario, u.nome, u.email, u.adm,u.telefone
                                        FROM {$this->tabela} as u
                                        WHERE u.nome LIKE '%{$this->dados['nome']}%'
                                        AND u.email LIKE '%{$this->dados['email']}%'
                                        AND u.telefone LIKE '%{$this->dados['telefone']}%'
                                        ORDER BY u.idUsuario ASC");
            $this->result['usuarios'] = $listar->getResult();
            return $this->result['usuarios'];
        }

        public function logar(array $dados){
            $this->dados = $dados;
            $this->dados['senha'] = md5($this->dados['senha']);
            $this->validarDados("login");
            if ($this->result){
                $this->exeLogar();
            }
        }

        public function addUser(array $dados){
            $this->dados = $dados;
            $this->dados['data_criacao'] = date("Y-m-d H:i:s");
            $this->dados['senha'] = md5($this->dados['senha']);
            $this->validarDados("add");
            if ($this->result){
                $this->exeAddUser();
            }
        }

        private function validarDados($tipo=null){
            $this->dados = array_map('strip_tags', $this->dados);
            $this->dados = array_map('trim', $this->dados);
            if (in_array('', $this->dados)){
                $_SESSION['msg'] = "
                        <div id=\"message_div\" class='alert alert-danger' role='alert'>
                          <strong>Erro ao enviar:</strong> Os campos obrigatórios não foram preenchidos!
                        </div>";
            
                
            }else{
                if (filter_var($this->dados['email'], FILTER_VALIDATE_EMAIL)){
                    $this->result = true;
                }else{
                    $_SESSION['msg'] = "
                            <div id=\"message_div\" class='alert alert-danger' role='alert'>
                              <strong>Erro ao enviar:</strong> O campo e-mail é inválido!
                            </div>";
                    
                }
            }
        }

        private function exeLogar(){
            $checar = new \Site\models\helper\ModelsRead();
            $checar->exeReadEspecifico("SELECT u.idUsuario, u.nome, u.adm
                                        FROM {$this->tabela} as u
                                        WHERE u.email = \"{$this->dados['email']}\"
                                        AND u.senha = \"{$this->dados['senha']}\""); 


            if ($checar->getResult()){
                $this->result = true;
                $this->userLog = $checar->getResult();
                extract( $this->userLog[0]);
                $_SESSION['id'] = $idUsuario;
                $_SESSION['user'] = $nome;
                $_SESSION['nivel'] = $adm;
            
                $_SESSION['msg'] = "<div id=\"message_div\" class=\"alert alert-success container \" role=\"alert\">
                                        Bem-vindo!
                                    </div>";
            }else{
                $this->result = false;
                $_SESSION['msg'] = "<div id=\"message_div\" class=\"alert alert-danger alert-dismissable fade show container\" 
                                        role=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                        Email ou senha incorretos!
                                    </div>";
            }
        }

        private function exeAddUser(){
            $inserir = new \Site\models\helper\ModelsCreate();
            $inserir->exeCreate($this->tabela, $this->dados);

            if ($inserir->getResult()){
                $this->result = true;
                $_SESSION['msg'] = "<div id=\"message_div\" class=\"alert alert-success container\" role=\"alert\">
                                        Usuário cadastrado com sucesso!
                                    </div>";
            }else{
                $_SESSION['msg'] = "<div id=\"message_div\" class=\"alert alert-danger container\" role=\"alert\">
                                        Falha ao cadastrar usuário! Erro: {$inserir->getMsg()}
                                    </div>";
            }
        }

        public function visualizarUsuario($idUser){
            $this->usuario = $idUser;

            $visualizar = new \Site\models\helper\modelsRead();
            $visualizar->exeReadEspecifico("SELECT u.*
                                            FROM {$this->tabela} as u
                                            WHERE u.idUsuario = \"{$this->usuario}\"");
            $this->result['usuario'] = $visualizar->getResult();
            return $this->result['usuario'];
        }

        public function confirmarUser(){
            $verUsuario = new \Site\models\helper\ModelsRead();
            $verUsuario->exeReadEspecifico("SELECT user.imagem FROM usuarios as user
                    WHERE user.idUsuario =:id LIMIT :limit", "id=" . $this->id . "&limit=1");
            $this->dados = $verUsuario->getResult();
        }

        public function apagarUsuario($id = null){
            $this->id = (int) $id;  
            $this->confirmarUser();
            if ($this->dados) {
                $apagarUsuario = new \Site\models\helper\ModelsDelete();
                $apagarUsuario->exeDelete("usuarios", "WHERE idUsuario =:id", "id={$this->id}");
                if ($apagarUsuario->getResult()) {
                    $apagarImg = new \Site\models\helper\ModelsDelete();
                    $apagarImg->apagarImg('assets/img/usuario/' . $this->id . '/' . $this->dados[0]['imagem'], 'assets/img/usuario/' . $this->id);
                    $_SESSION['msg'] = "<div id='message_div' class='alert alert-success'>Usuário excluído com sucesso!</div>";
                    $this->result = true;
                } else {
                    $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: Usuário não foi apagado!</div>";
                    $this->result = false;
                }
            } else {
                $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: Usuário não foi apagado!</div>";
                $this->result = false;
            }
        }

        public function altUsuario(array $dados){
            $this->dados = $dados;
            if(empty($this->dados['dataNascimento'])){
                $this->dados['dataNascimento']="";
            }
            
            $valEmail = new \Site\models\helper\ModelsEmail();
            $valEmail->valEmail($this->dados['email']);

            $valEmailUnico = new \Site\models\helper\ModelsEmailUnico();
            $editarUnico = true;
            $valEmailUnico->valEmailUnico($this->dados['email'], $editarUnico, $this->dados['idUsuario']);

            $this->foto = $this->dados['imagem_nova'];
            $this->imgAntiga = $this->dados['imagem_antiga'];
            
            unset($this->dados['imagem_nova'], $this->dados['imagem_antiga']);

            if($valEmail->getResult() && $valEmailUnico->getResult()){
                $this->valFotoAlterar();
            }
            else{
                $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Email inválido ou já existente!</div>";
                    $this->result = false;
            }
            
        }

        private function valFotoAlterar()
        {
            if (empty($this->foto['name'])) {
                $this->updateEditUsuario();
            } else {
                $slugImg = new \Site\models\helper\ModelsSlug();
                $this->dados['imagem'] = $slugImg->nomeSlug($this->foto['name']);

                $uploadImg = new \Site\models\helper\ModelsUploadImgRed();
                $uploadImg->uploadImagem($this->foto, 'assets/img/usuario/' . $this->dados['idUsuario'] . '/', $this->dados['imagem'], 150, 150);
                if ($uploadImg->getResult()) {
                    $apagarImg = new \Site\models\helper\ModelsApagarImg();
                    $apagarImg->apagarImg('assets/img/usuario/' . $this->dados['idUsuario'] . '/' . $this->imgAntiga);
                    $this->updateEditUsuario();
                } else {
                    $this->result = false;
                }
            }
        }

        private function updateEditUsuario(){
            $upUser = new \Site\models\helper\ModelsUpdate();
            $upUser->exeUpdate("usuarios", $this->dados, "WHERE idUsuario =:id", "id=" . $this->dados['idUsuario']);

            if ($upUser->getResult()) {
                $_SESSION['msg'] = "<div id='message_div' class='alert alert-success container'>Usuário atualizado com sucesso!</div>";
                $this->result = true;
            } else {
                $_SESSION['msg'] = "<div id='message_div' class='alert alert-danger'>Erro: O usuário não foi atualizado!</div>";
                $this->result = false;
            }
        }
    
        public function getResult(){
            return $this->result;
        }

        public function getUser(){
            return $this->userLog;
        }
    }
    
