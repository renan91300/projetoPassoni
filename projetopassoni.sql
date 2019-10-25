
DROP TABLE IF EXISTS `adm_cor`;
CREATE TABLE IF NOT EXISTS `adm_cor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `cor` varchar(40) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `adm_cor` (`id`, `nome`, `cor`, `data_criacao`, `data_modificacao`) VALUES
(1, 'Azul', 'primary', '2019-05-15 00:00:00', NULL),
(2, 'Cinza', 'secundary', '2019-05-09 00:00:00', NULL),
(3, 'Verde', 'success', '2019-05-09 00:00:00', NULL),
(4, 'Vermelho', 'danger', '2019-05-09 00:00:00', NULL),
(5, 'Amarelo', 'warning', '2019-05-09 00:00:00', NULL),
(6, 'Azul claro', 'info', '2019-05-09 00:00:00', NULL),
(7, 'Claro', 'light', '2019-05-09 00:00:00', NULL),
(8, 'Cinza escuro', 'dark', '2019-05-09 00:00:00', NULL);


DROP TABLE IF EXISTS `adm_situacao`;
CREATE TABLE IF NOT EXISTS `adm_situacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `adm_cor_id` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


INSERT INTO `adm_situacao` (`id`, `nome`, `adm_cor_id`, `data_criacao`, `data_modificacao`) VALUES
(1, 'Ativo', 3, '2019-05-10 00:00:00', NULL),
(2, 'Inativo', 4, '2019-05-10 00:00:00', NULL),
(3, 'Em Análise', 5, '2019-05-10 00:00:00', NULL);


DROP TABLE IF EXISTS `bairro`;
CREATE TABLE IF NOT EXISTS `bairro` (
  `idBairro` int(11) NOT NULL AUTO_INCREMENT,
  `nomeBairro` varchar(50) NOT NULL,
  PRIMARY KEY (`idBairro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


INSERT INTO `bairro` (`idBairro`, `nomeBairro`) VALUES
(1, 'Agostinho Simonato'),
(2, 'Marbrasa'),
(3, 'IBC'),
(4, 'BNH');


DROP TABLE IF EXISTS `bolo`;
CREATE TABLE IF NOT EXISTS `bolo` (
  `idBolo` int(11) NOT NULL AUTO_INCREMENT,
  `formato` varchar(100) NOT NULL,
  `qtdCamadas` int(11) NOT NULL,
  `descricao` int(255) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  PRIMARY KEY (`idBolo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `bolodepote`;
CREATE TABLE IF NOT EXISTS `bolodepote` (
  `idBoloDePote` int(11) NOT NULL AUTO_INCREMENT,
  `sabor` enum('Morango','Limão','Coco','Tiramisu') NOT NULL,
  `tamanho` enum('150ml','250ml') NOT NULL,
  `preco` float NOT NULL,
  `imagem` varchar(60) DEFAULT NULL,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`idBoloDePote`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


INSERT INTO `bolodepote` (`idBoloDePote`, `sabor`, `tamanho`, `preco`, `imagem`, `descricao`) VALUES
(1, 'Limão', '250ml', 15, 'limao.jpg', 'Bolo de limão com recheio de limão natural.'),
(2, 'Morango', '150ml', 25, 'morango.jpg', 'Bolo de morango com recheio de chantilly'),
(3, 'Tiramisu', '250ml', 30, 'tiramisu.jpg', 'Bolo de baunilha com biscoitos e creme inglês');

-- --------------------------------------------------------

DROP TABLE IF EXISTS `carousel`;
CREATE TABLE IF NOT EXISTS `carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `posicao_text` varchar(40) DEFAULT NULL,
  `titulo_botao` varchar(40) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `adm_cor_id` int(11) DEFAULT NULL,
  `adm_situacao_id` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `carousel` (`id`, `nome`, `imagem`, `titulo`, `descricao`, `posicao_text`, `titulo_botao`, `link`, `ordem`, `adm_cor_id`, `adm_situacao_id`, `data_criacao`, `data_modificacao`) VALUES
(1, 'Banner 01', 'banner01.jpg', 'Exemplo testando o banner 01', 'Mussum Ipsum, cacilds vidis litro abertis. Quem manda na minha terra sou euzis! Viva Forevis aptent taciti sociosqu ad litora torquent. Não sou faixa preta cumpadi.', 'text-left', 'Clique aqui', 'http://www.ifes.edu.br', 1, 1, 1, '2019-05-08 08:31:15', NULL),
(2, 'Banner 02', 'banner02.jpg', 'Exemplo testando o banner 02', 'Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Suco de cevadiss deixa as pessoas mais interessantis. Vehicula non. Ut sed ex eros.', 'text-center', 'Comprar agora', 'http://www.ci.ifes.edu.br', 2, 5, 1, '2019-05-08 09:08:25', NULL),
(3, 'Banner 03', 'banner03.jpg', 'Exemplo testando o banner 03', 'Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis! Praesent malesuada urna nisi, quis volutpat erat hendrerit non.', 'text-right', 'Inscreva-se', 'http://www.google.com.br', 3, 4, 1, '2019-05-08 09:19:32', NULL);



DROP TABLE IF EXISTS `categoria_noticia`;
CREATE TABLE IF NOT EXISTS `categoria_noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `categoria_noticia` (`id`, `nome`, `data_criacao`, `data_modificacao`) VALUES
(1, 'Esporte', '2019-05-17 00:00:00', NULL),
(2, 'Tecnologia', '2019-05-17 00:00:00', NULL),
(3, 'Economia', '2019-05-17 00:00:00', NULL);



DROP TABLE IF EXISTS `contato`;
CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `mensagem` text NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `contato` (`id`, `nome`, `email`, `assunto`, `mensagem`, `data_criacao`, `data_modificacao`) VALUES
(1, 'Flavio Izo', 'flavio@flavioizo.com', 'Sugestão', 'sd', '2019-05-28 00:00:00', NULL),
(2, 'Flavio Izo', 'flavio@flavioizo.com', 'Sugestão', 'sd', '2019-05-28 00:00:00', NULL),
(3, 'Flavio Izo', 'flavio@flavioizo.com', 'Sugestão', 'sd', '2019-05-28 00:00:00', NULL),
(4, 'Flavio Izo', 'flavio@flavioizo.com', 'Sugestão', 'sd', '2019-05-28 21:38:20', NULL),
(5, 'Flavio Izo', 'flavio@flavioizo.com', 'Dúvidas', 'sdsd', '2019-05-28 22:15:04', NULL),
(6, 'Flavio Izo', 'flavio@flavioizo.com', 'Dúvidas', 'sdsd', '2019-05-28 22:15:24', NULL),
(7, 'Renan Gomes Poggian', 'renanpoggiangomes@gmail.com', 'Sugestão', 'addsadsasdf', '2019-08-24 13:23:00', NULL);


DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `idEndereco` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `identificacao` varchar(40) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `logradouro` varchar(150) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `pontoDeRef` varchar(100) DEFAULT NULL,
  `cep` varchar(8) NOT NULL,
  `padrao` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idEndereco`),
  KEY `idCliente` (`idCliente`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;


INSERT INTO `endereco` (`idEndereco`, `idCliente`, `identificacao`, `bairro`, `logradouro`, `complemento`, `numero`, `pontoDeRef`, `cep`, `padrao`) VALUES
(26, 15, 'Casa', 'Agostinho Simonato', 'Rua Wagner Alves Emery', 'Casa', 17, 'Próximo a quadra', '29311785', 0),
(27, 15, 'Apartamento', 'Agostinho Simonato', 'Rua João Gonçalves de Freitas', '', 20, 'Esquina', '29311747', 0),
(28, 15, 'Serviço', 'Caiçara', 'Rua José Olympio Gomes', '', 666, 'Rua calçada', '29311740', 0),
(30, 14, 'Casa', 'Marbrasa', 'Rua Horacy Amarantes Mattos', 'Apto', 80, 'Rua asfaltada', '29313668', 0),
(46, 32, 'jkn', 'Monte Belo', 'Rua dos Ipês', 'jn', 12, 'kjn', '29314777', 1);



DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `idEstoque` int(11) NOT NULL AUTO_INCREMENT,
  `idBolodePote` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `dataEstoque` date NOT NULL,
  PRIMARY KEY (`idEstoque`),
  KEY `idBolodePote` (`idBolodePote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `noticia`;
CREATE TABLE IF NOT EXISTS `noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `descricao` text NOT NULL,
  `conteudo` text NOT NULL,
  `imagem` varchar(60) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `keywords` varchar(150) NOT NULL,
  `description` varchar(200) NOT NULL,
  `author` varchar(50) NOT NULL,
  `resumo` text NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '0',
  `robots_id` int(11) NOT NULL,
  `adm_user_id` int(11) NOT NULL,
  `adm_situacoes_id` int(11) NOT NULL,
  `tipo_noticia_id` int(11) NOT NULL,
  `categoria_noticia_id` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


INSERT INTO `noticia` (`id`, `titulo`, `descricao`, `conteudo`, `imagem`, `slug`, `keywords`, `description`, `author`, `resumo`, `hits`, `robots_id`, `adm_user_id`, `adm_situacoes_id`, `tipo_noticia_id`, `categoria_noticia_id`, `data_criacao`, `data_modificacao`) VALUES
(1, 'Notícia 01', 'Quem manda na minha terra sou euzis! Mais vale um bebadis conhecidiss, que um alcoolatra anonimis.', '<p>Mussum Ipsum, cacilds vidis litro abertis. Diuretics paradis num copo é motivis de denguis. Não sou faixa preta cumpadi, sou preto inteiris, inteiris. Quem manda na minha terra sou euzis! Mais vale um bebadis conhecidiss, que um alcoolatra anonimis.</p>', 'noticia.jpg', 'noticia-teste-1', 'noticia, mussum, teste', 'Aqui teremos a descrição do texto da notícia.', 'DW', '<p>Aqui teremos um resumo público para demonstrar um texto de notícia</p>', 0, 1, 1, 1, 1, 1, '2019-05-17 00:00:00', NULL),
(2, 'Notícia 02', 'Mé faiz elementum girarzis, nisi eros vermeio. Praesent malesuada urna nisi, quis volutpat erat hendrerit non.', '<p>Nam vulputate dapibus. Per aumento de cachacis, eu reclamis. Sapien in monti palavris qui num significa nadis i pareci latim. Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl. Suco de cevadiss, é um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Paisis, filhis, espiritis santis.</p>', 'noticia.jpg', 'noticia-teste-2', 'noticia, mussum, teste2', 'Aqui teremos a descrição do texto da notícia 2.', 'DW', '<p>Aqui teremos um resumo público para demonstrar um texto de notícia 2</p>', 0, 1, 1, 1, 1, 2, '2019-05-17 00:00:00', NULL),
(3, 'Notícia 03', 'Nullam volutpat risus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio.', '<p>Leite de capivaris, leite de mula manquis sem cabeça. A ordem dos tratores não altera o pão duris. Casamentiss faiz malandris se pirulitá. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi.</p>', 'noticia.jpg', 'noticia-teste-3', 'noticia, mussum, teste3', 'Aqui teremos a descrição do texto da notícia 3.', 'DW', '<p>Aqui teremos um resumo público para demonstrar um texto de notícia 3</p>', 0, 1, 1, 1, 1, 1, '2019-05-17 00:00:00', NULL),
(4, 'Noticia 4', 'Todo mundo vê os porris que eu tomo, mas ninguém vê os tombis que eu levo! Si u mundo tá muito paradis?', '<p>Tá deprimidis, eu conheço uma cachacis que pode alegrar sua vidis. Sapien in monti palavris qui num significa nadis i pareci latim. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. Paisis, filhis, espiritis santis. Praesent vel viverra nisi. Mauris aliquet nunc non turpis scelerisque, eget. Cevadis im ampola pa arma uma pindureta.</p>', 'noticia.jpg', 'noticia-teste-1', 'noticia, mussum, teste', 'Aqui teremos a descrição do texto da notícia 4.', 'DW', '<p>Aqui teremos um resumo público para demonstrar um texto de notícia 4</p>', 0, 1, 1, 1, 1, 3, '2019-05-17 00:00:00', NULL);


DROP TABLE IF EXISTS `pagina`;
CREATE TABLE IF NOT EXISTS `pagina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(50) NOT NULL,
  `metodo` varchar(50) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `obs` varchar(150) DEFAULT NULL,
  `keywords` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL,
  `icone` varchar(100) DEFAULT NULL,
  `tp_pagina_id` int(11) NOT NULL,
  `robots_id` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;


INSERT INTO `pagina` (`id`, `controller`, `metodo`, `nome`, `titulo`, `obs`, `keywords`, `description`, `author`, `icone`, `tp_pagina_id`, `robots_id`, `data_criacao`, `data_modificacao`) VALUES
(1, 'Home', 'index', 'Página principal', 'DW - Página inicial', 'Página principal', 'dw, programação, php', 'Site para exibir a página inicial do projeto', 'DW', 'home.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(2, 'Sobrenos', 'index', 'Página sobre a empresa', 'DW - Sobre Nós', 'Página sobre a empresa', 'dw, programação, php', 'Site para exibir a página quem somos do projeto', 'DW', 'sobrenos.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(3, 'montarBolo', 'index', 'Aplicação montar bolo', 'DW - Montar bolo', 'Aplicação para montar bolo', 'dw, programação, php', 'Site para exibir a página de aplicação de montar bolo', 'DW', 'montarBolo.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(4, 'Bolopote', 'index', 'Página de visualização da notícia', 'DW - Notícias', 'Página de notícias', 'dw, programação, php', 'Site para exibir a página de notícias do projeto', 'DW', 'noticias.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(5, 'Usuario', 'login', 'Página de login do cliente', 'DW - Login', 'Página login do cliente', 'dw, programação, php', 'Site para exibir a página de login', 'DW', 'login.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(6, 'Error404', 'index', 'Página de Erro', 'DW - Erro 404', 'Página de erro', 'dw, programação, php', 'Site para exibir a página de erro do projeto', 'DW', 'erro.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(7, 'AdmHome', 'index', 'Página principal da área administrativa', 'DW - Página inicial ADM', 'Página principal ADM', 'dw, programação, php', 'Site para exibir a página inicial do projeto ADM', 'DW', 'home.jpg', 2, 1, '2019-05-24 00:00:00', NULL),
(8, 'AdmUser', 'index', 'Página de usuários da área administrativa', 'DW - Página user ADM', 'Página user ADM', 'dw, programação, php', 'Site para exibir a página user do projeto ADM', 'DW', 'user.jpg', 2, 1, '2019-05-24 00:00:00', NULL),
(9, 'AdmAuth', 'auth', 'Página de login da área administrativa', 'DW - Página login ADM', 'Página login ADM', 'dw, programação, php', 'Site para exibir a página de login do projeto ADM', 'DW', '', 2, 1, '2019-05-24 00:00:00', NULL),
(10, 'AdmNoticia', 'listar', 'Página ADM de notícia', 'DW - Página ADM Notícia', 'Página ADM', 'dw, programação, php', 'Site para exibir a página do projeto ADM', 'DW', '', 2, 1, '2019-05-24 00:00:00', NULL),
(11, 'AdmUser', 'addUser', 'Página de usuários da área administrativa', 'DW - Página user ADM', 'Página user ADM', 'dw, programação, php', 'Site para exibir a página user do projeto ADM', 'DW', 'user.jpg', 2, 1, '2019-05-24 00:00:00', NULL),
(12, 'AdmUser', 'moreUser', 'Página de usuários da área administrativa', 'DW - Página user ADM', 'Página user ADM', 'dw, programação, php', 'Site para exibir a página user do projeto ADM', 'DW', 'user.jpg', 2, 1, '2019-05-24 00:00:00', NULL),
(13, 'AdmUser', 'upUser', 'Página de usuários da área administrativa', 'DW - Página user ADM', 'Página user ADM', 'dw, programação, php', 'Site para exibir a página user do projeto ADM', 'DW', 'user.jpg', 2, 1, '2019-05-24 00:00:00', NULL),
(14, 'AdmUser', 'delUser', 'Página de usuários da área administrativa', 'DW - Página user ADM', 'Página user ADM', 'dw, programação, php', 'Site para exibir a página user do projeto ADM', 'DW', 'user.jpg', 2, 1, '2019-05-24 00:00:00', NULL),
(15, 'AdmUser', 'upUser', 'Página de usuários da área administrativa', 'DW - Página user ADM', 'Página user ADM', 'dw, programação, php', 'Site para alterar a página user do projeto ADM', 'DW', 'user.jpg', 2, 1, '2019-05-24 00:00:00', NULL),
(16, 'AdmUser', 'upUserPass', 'Página de usuários da área administrativa', 'DW - Página user ADM', 'Página user ADM', 'dw, programação, php', 'Site para alterar a página user do projeto ADM', 'DW', 'user.jpg', 2, 1, '2019-05-24 00:00:00', NULL),
(17, 'AdmAuth', 'logout', 'Página de login da área administrativa', 'DW - Página login ADM', 'Página login ADM', 'dw, programação, php', 'Site para exibir a página de login do projeto ADM', 'DW', '', 2, 1, '2019-05-24 00:00:00', NULL),
(18, 'Usuario', 'cadastrar', 'Página de cadastro do cliente', 'DW - Cadastro', 'Página cadastro do cliente', 'dw, programação, php', 'Site para exibir a página de cadastro', 'DW', 'cadastro.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(19, 'Usuario', 'logout', 'Página de logout', 'DW - Página logout', 'Página logout', 'dw, programação, php', 'Site para exibir a página de logout', 'DW', '', 1, 1, '2019-05-24 00:00:00', NULL),
(20, 'listarClientes', 'index', 'Página de listagem de clientes', 'DW - Página listagem de clientes', 'listagem de clientes', 'dw, programação, php', 'Site para exibir a página de listagem de clientes', 'DW', '', 1, 1, '2019-05-24 00:00:00', NULL),
(21, 'Usuario', 'delUsuario', 'Página de delUsuario', 'DW - Página de delUsuario', 'Página de delUsuario', 'dw, programação, php', 'Site para exibir a Página de delUsuario', 'DW', 'delCad.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(22, 'Carrinho', 'index', 'Página de carrinho', 'DW - Página de carrinho', 'Página de carrinho', 'dw, programação, php', 'Site para exibir a Página de carrinho', 'DW', 'carrinho.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(23, 'Carrinho', 'addProdCarrinho', 'Função que add produto ao carrinho', 'DW - Página de carrinho', 'Função que add produto ao carrinho', 'dw, programação, php', 'Função que add produto ao carrinho', 'DW', 'carrinho.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(24, 'Checkout', 'index', 'Página de checkout', 'DW - Página de checkout', 'Página de carrinho', 'dw, programação, php', 'Site para exibir a Página de checkout', 'DW', 'checkout.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(25, 'Editarbolopersonalizado', 'index', 'Página de Editarbolopersonalizado', 'DW - Página de Editarbolopersonalizado', 'Página de Editarbolopersonalizado', 'dw, programação, php', 'Site para exibir a Página de Editarbolopersonalizado', 'DW', 'editarbolo.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(26, 'Editarbolopote', 'index', 'Página de Editarbolopote', 'DW - Página de Editarbolopote', 'Página de Editarbolopote', 'dw, programação, php', 'Site para exibir a Página de Editarbolopote', 'DW', 'editarbolo.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(27, 'Listarenderecos', 'index', 'Página de Listarenderecos', 'DW - Página de Listarenderecos', 'Página de Listarenderecos', 'dw, programação, php', 'Site para exibir a Página de Listarenderecos', 'DW', 'endereco.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(28, 'Listarenderecos', 'altEnderecoPadrao', 'Página de editarEndereco', 'DW - Página de editarEndereco', 'Página de editarEndereco', 'dw, programação, php', 'Site para exibir a Página de editarEndereco', 'DW', 'endereco.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(29, 'Listarpedidosadmin', 'index', 'Página de Listarpedidosadmin', 'DW - Página de Listarpedidosadmin', 'Página de Listarpedidosadmin', 'dw, programação, php', 'Site para exibir a Página de Listarpedidosadmin', 'DW', 'pedidos.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(30, 'Listarpedidoscliente', 'index', 'Página de Listarpedidoscliente', 'DW - Página de Listarpedidoscliente', 'Página de Listarpedidoscliente', 'dw, programação, php', 'Site para exibir a Página de Listarpedidoscliente', 'DW', 'pedidos.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(31, 'Visualizarbolodepote', 'index', 'Página de Visualizarbolodepote', 'DW - Página de Visualizarbolodepote', 'Página de Visualizarbolodepote', 'dw, programação, php', 'Site para exibir a Página de Visualizarbolodepote', 'DW', 'bolo.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(32, 'Visualizarbolomontado', 'index', 'Página de Visualizarbolomontado', 'DW - Página de Visualizarbolomontado', 'Página de Visualizarbolomontado', 'dw, programação, php', 'Site para exibir a Página de Visualizarbolomontado', 'DW', 'bolo.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(33, 'Usuario', 'editarUsuario', 'Página de editarUsuario', 'DW - Página de editarUsuario', 'Página de editarUsuario', 'dw, programação, php', 'Site para exibir a Página de editarUsuario', 'DW', 'usuario.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(34, 'Usuario', 'visualizar', 'Página de visualizar rUsuario', 'DW - Página de visualizar Usuario', 'Página de visualizar Usuario', 'dw, programação, php', 'Site para exibir a Página de editarUsuario', 'DW', 'usuario.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(35, 'Pedido', 'listarPedidos', 'Página de listar Pedidos do admin', 'DW - Página de listar Pedidos do admin', 'Página de listar Pedidos do admin', 'dw, programação, php', 'Site para exibir a Página de listar Pedidos do admin', 'DW', 'pedidos.jpg', 2, 1, '2019-05-24 00:00:00', NULL),
(36, 'Pedido', 'visualizar', 'Página de Visualizar bolodepote', 'DW - Página de Visualizar bolodepote', 'Página de Visualizar bolodepote', 'dw, programação, php', 'Site para exibir a Página de Visualizar bolodepote', 'DW', 'bolo.jpg', 2, 1, '2019-05-24 00:00:00', NULL),
(37, 'Pedido', 'editar', 'Página de editar bolodepote', 'DW - Página de editar bolodepote', 'Página de editar bolodepote', 'dw, programação, php', 'Site para exibir a Página de editar bolodepote', 'DW', 'bolo.jpg', 2, 1, '2019-05-24 00:00:00', NULL),
(38, 'Listarenderecos', 'addEndereco', 'Página de addEndereco', 'DW - Página de addEndereco', 'Página de addEndereco', 'dw, programação, php', 'Site para exibir a Página de addEndereco', 'DW', 'endereco.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(39, 'Listarenderecos', 'editarEndereco', 'Página de editarEndereco', 'DW - Página de editarEndereco', 'Página de editarEndereco', 'dw, programação, php', 'Site para exibir a Página de editarEndereco', 'DW', 'endereco.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(40, 'Listarenderecos', 'visualizarEndereco', 'Página de visualizarEndereco', 'DW - Página de visualizarEndereco', 'Página de visualizarEndereco', 'dw, programação, php', 'Site para exibir a Página de visualizarEndereco', 'DW', 'endereco.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(41, 'Listarenderecos', 'apagarEndereco', 'Página de apagarEndereco', 'DW - Página de apagarEndereco', 'Página de apagarEndereco', 'dw, programação, php', 'Site para exibir a Página de apagarEndereco', 'DW', 'endereco.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(42, 'Checkout', 'finalizarCompra', 'Página de finalizarCompra', 'DW - Página de finalizarCompra', 'Página de carrinho', 'dw, programação, php', 'Site para exibir a Página de finalizarCompra', 'DW', 'checkout.jpg', 1, 1, '2019-05-24 00:00:00', NULL),
(43, 'Carrinho', 'upPreco', 'Função de atualizar o preço', 'DW - Página de Função de atualizar o preço', 'Função de atualizar o preço', 'dw, programação, php', 'Função de atualizar o preço', 'DW', 'carrinho.jpg', 1, 1, '2019-05-24 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `status` enum('Recusado','Em andamento','Em entrega','Entregue') DEFAULT 'Em andamento',
  `prontaEntrega` tinyint(1) DEFAULT NULL,
  `precoTotal` float NOT NULL,
  `dataPedido` date NOT NULL,
  `dataEntrega` date NOT NULL,
  `formaEntrega` enum('Retirar','Delivery') NOT NULL DEFAULT 'Retirar',
  `formaPagamento` enum('Dinheiro','Cartão') NOT NULL,
  `idEndereco` int(11) NOT NULL,
  `statusPagamento` enum('Aguardando Pagamento','Pagamento Efetuado') NOT NULL DEFAULT 'Aguardando Pagamento',
  `observacao` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `idCliente` (`idCliente`),
  KEY `pedido_endereco` (`idEndereco`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;


INSERT INTO `pedido` (`idPedido`, `idCliente`, `status`, `prontaEntrega`, `precoTotal`, `dataPedido`, `dataEntrega`, `formaEntrega`, `formaPagamento`, `idEndereco`, `statusPagamento`, `observacao`) VALUES
(1, 15, 'Entregue', NULL, 225, '2019-09-21', '2019-09-21', 'Delivery', 'Dinheiro', 27, 'Aguardando Pagamento', ''),
(2, 15, 'Em andamento', NULL, 90, '2019-09-22', '2019-09-22', 'Retirar', 'Dinheiro', 27, 'Aguardando Pagamento', NULL),
(5, 15, 'Recusado', NULL, 25, '2019-09-22', '2019-09-22', 'Delivery', 'Dinheiro', 27, 'Aguardando Pagamento', NULL),
(6, 15, 'Em entrega', NULL, 105, '2019-09-22', '2019-09-22', 'Retirar', 'Dinheiro', 26, 'Aguardando Pagamento', NULL),
(7, 14, 'Em andamento', NULL, 50, '2019-09-24', '2019-09-24', 'Retirar', 'Dinheiro', 30, 'Aguardando Pagamento', NULL),
(8, 14, 'Entregue', NULL, 60, '2019-10-03', '2019-10-03', 'Retirar', 'Dinheiro', 30, 'Aguardando Pagamento', ''),
(9, 14, 'Em andamento', NULL, 195, '2019-10-03', '2019-10-03', 'Retirar', 'Dinheiro', 30, 'Aguardando Pagamento', NULL),
(10, 15, 'Em andamento', NULL, 50, '2019-10-03', '2019-10-03', 'Retirar', 'Dinheiro', 27, 'Aguardando Pagamento', NULL),
(11, 15, 'Recusado', NULL, 100, '2019-10-03', '2019-10-03', 'Retirar', 'Dinheiro', 26, 'Aguardando Pagamento', ''),
(12, 15, 'Em andamento', NULL, 125, '2019-10-03', '2019-10-03', 'Retirar', 'Dinheiro', 26, 'Aguardando Pagamento', NULL),
(13, 32, 'Em andamento', NULL, 15, '2019-10-17', '2019-10-17', 'Retirar', 'Dinheiro', 46, 'Aguardando Pagamento', NULL),
(14, 32, 'Em entrega', NULL, 110, '2019-10-18', '2019-10-18', 'Retirar', 'Cartão', 46, 'Aguardando Pagamento', 'Pedido saiu para entrega');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_bolodepote`
--

DROP TABLE IF EXISTS `pedido_bolodepote`;
CREATE TABLE IF NOT EXISTS `pedido_bolodepote` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `idBoloDePote` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`idPedido`,`idBoloDePote`),
  KEY `idBoloDePote` (`idBoloDePote`),
  KEY `idPedido` (`idPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO `pedido_bolodepote` (`idPedido`, `idBoloDePote`, `quantidade`) VALUES
(1, 1, 4),
(1, 2, 3),
(1, 3, 3),
(2, 3, 3),
(5, 2, 1),
(6, 1, 3),
(6, 3, 2),
(7, 2, 2),
(8, 1, 4),
(9, 2, 3),
(9, 3, 4),
(10, 2, 2),
(11, 2, 4),
(12, 2, 5),
(13, 1, 1),
(14, 1, 4),
(14, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quem_somos`
--

DROP TABLE IF EXISTS `quem_somos`;
CREATE TABLE IF NOT EXISTS `quem_somos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(220) NOT NULL,
  `ordem` int(11) NOT NULL,
  `adm_situacao_id` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


INSERT INTO `quem_somos` (`id`, `titulo`, `descricao`, `imagem`, `ordem`, `adm_situacao_id`, `data_criacao`, `data_modificacao`) VALUES
(1, 'Histórico', 'Mussum Ipsum, cacilds vidis litro abertis. Praesent malesuada urna nisi, quis volutpat erat hendrerit non. Nam vulputate dapibus. Mé faiz elementum girarzis, nisi eros vermeio. Detraxit consequat et quo num tendi nada. Cevadis im ampola pa arma uma pindureta.\r\n\r\nPaisis, filhis, espiritis santis. Quem num gosta di mim que vai caçá sua turmis! Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose.', 'historico.jpg', 1, 1, '2019-05-17 00:00:00', NULL),
(2, 'Fundadores', 'Copo furadis é disculpa de bebadis, arcu quam euismod magna.  Sapien in monti palavris qui num significa nadis i pareci latim. Nec orci ornare consequat. Praesent lacinia ultrices consectetur. Sed non ipsum felis. Viva Forevis aptent taciti sociosqu ad litora torquent.\r\n\r\nSuco de cevadiss deixa as pessoas mais interessantis. Delegadis gente finis, bibendum egestas augue arcu ut est. Per aumento de cachacis, eu reclamis. Si num tem leite então bota uma pinga aí cumpadi!', 'fundadores.jpg', 2, 1, '2019-05-17 00:00:00', NULL),
(3, 'Produtos e serviços', 'Nec orci ornare consequat. Praesent lacinia ultrices consectetur. Sed non ipsum felis. Mais vale um bebadis conhecidiss, que um alcoolatra anonimis. Sapien in monti palavris qui num significa nadis i pareci latim. A ordem dos tratores não altera o pão duris.\r\n\r\nSuco de cevadiss deixa as pessoas mais interessantis. Praesent vel viverra nisi. Mauris aliquet nunc non turpis scelerisque, eget. Copo furadis é disculpa de bebadis, arcu quam euismod magna. Paisis, filhis, espiritis santis.', 'produtos_servicos.jpg', 3, 1, '2019-05-17 00:00:00', NULL);

DROP TABLE IF EXISTS `robots`;
CREATE TABLE IF NOT EXISTS `robots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `robots` (`id`, `nome`, `tipo`, `data_criacao`, `data_modificacao`) VALUES
(1, 'Indexar a página e seguir os links', 'index,follow', '2019-05-16 00:00:00', NULL),
(2, 'Não indexar a página, mas seguir os links', 'noindex,follow', '2019-05-16 00:00:00', NULL),
(3, 'Indexar a página, mas não seguir os links', 'index,nofollow', '2019-05-17 00:00:00', NULL),
(4, 'Não indexar a página e nem seguir os links', 'noindex,nofollow', '2019-05-17 00:00:00', NULL),
(5, 'Não exibir a versão em cache da página', 'noarchive', '2019-05-17 00:00:00', NULL);


DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `descricao` varchar(210) NOT NULL,
  `imagem` varchar(40) NOT NULL,
  `adm_cor_id` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tipo_noticia`;
CREATE TABLE IF NOT EXISTS `tipo_noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;



INSERT INTO `tipo_noticia` (`id`, `nome`, `data_criacao`, `data_modificacao`) VALUES
(1, 'Pública', '2019-05-17 00:00:00', NULL),
(2, 'Privada', '2019-05-17 00:00:00', NULL),
(3, 'Privada com resumo público', '2019-05-17 00:00:00', NULL);


DROP TABLE IF EXISTS `tipo_pagina`;
CREATE TABLE IF NOT EXISTS `tipo_pagina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `obs` varchar(150) NOT NULL,
  `ordem` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `tipo_pagina` (`id`, `tipo`, `nome`, `obs`, `ordem`, `data_criacao`, `data_modificacao`) VALUES
(1, 'Site', 'Site principal', 'Site principal do projeto', 1, '2019-05-17 00:00:00', NULL),
(2, 'adm', 'Área administrativa', 'Área administrativa do projeto', 2, '2019-05-17 00:00:00', NULL);



DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` char(11) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `senha` varchar(20) NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `adm` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;


INSERT INTO `user` (`idUsuario`, `cpf`, `nome`, `email`, `telefone`, `senha`, `dataNascimento`, `adm`) VALUES
(5, '16118554706', 'Renan Gomes Poggian', 'renanpoggiangomes@gmail.com', '28999871283', 'rerenanjsudn', '2000-12-02', 1),
(6, '18745968731', 'Renan', 'admin@admin.com', NULL, 'admin', NULL, 1),
(21, NULL, 'Renan', 'renanpoggiangomes@gmail.com', NULL, '123', NULL, NULL);


DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` char(111) DEFAULT NULL,
  `imagem` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `nome` varchar(40) NOT NULL,
  `sobrenome` varchar(60) NOT NULL,
  `genero` char(1) DEFAULT 'o',
  `telefone` varchar(11) DEFAULT '',
  `senha` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `adm` tinyint(1) DEFAULT '0',
  `data_criacao` date NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

INSERT INTO `usuarios` (`idUsuario`, `cpf`, `imagem`, `nome`, `sobrenome`, `genero`, `telefone`, `senha`, `email`, `dataNascimento`, `adm`, `data_criacao`) VALUES
(8, NULL, 'download.jpg', 'Renan-ADM', 'Gomes Poggian', 'm', '999857846', 'e10adc3949ba59abbe56e057f20f883e', 'renanpoggiangomes@gmail.com', '2001-12-02', 1, '2019-09-08'),
(14, NULL, 'lydia.jpg', 'Lydia', 'Martin Banshee', 'o', '999656565', '202cb962ac59075b964b07152d234b70', 'lydia@gmail.com', '1998-07-07', 0, '2019-09-17'),
(15, NULL, 'perfil.jpg', 'Renan', 'Gomes Poggian', 'm', '28999871283', '202cb962ac59075b964b07152d234b70', 'renan_poggiangomes@gmail.com', '2000-12-02', 0, '2019-09-17'),
(17, NULL, NULL, 'Paulo', 'Casagrande', 'o', '', '', 'paulo@gmail.com', '2000-12-02', 1, '2019-10-01'),
(20, NULL, '20171201-214918.jpg', 'Eliane', 'Almeida', 'f', '999262677', 'e10adc3949ba59abbe56e057f20f883e', 'eliane@gmail.com', '1978-12-15', 0, '2019-10-01'),
(21, NULL, 'img-20170507-wa0018.jpg', 'Douglas', 'Silva Cabral', 'm', '999857846', 'e10adc3949ba59abbe56e057f20f883e', 'douglas@gmail.com', '2000-05-16', 1, '2019-10-01'),
(26, NULL, NULL, 'Valdenice', 'Da Silva Gomes', 'o', '', '202cb962ac59075b964b07152d234b70', 'nice@gmail.com', '1975-12-04', 0, '2019-10-02'),
(28, NULL, 'chaves.jpg', 'Bolanos', 'Chaves', 'm', '999875461', 'e10adc3949ba59abbe56e057f20f883e', 'chaves@gmail.com', '1945-02-15', 0, '2019-10-02'),
(29, NULL, 'img-20170523-wa0055.jpg', 'Letícia', 'Martins', 'f', '999874562', 'e10adc3949ba59abbe56e057f20f883e', 'le@gmail.com', '2001-02-02', 0, '2019-10-02'),
(30, NULL, 'img-20180103-wa0019.jpg', 'Unicórnio', 'Bonito', 'o', '999879465', 'e10adc3949ba59abbe56e057f20f883e', 'unicornio@gmail.com', '1988-12-15', 0, '2019-10-02'),
(31, NULL, '20180217-140925.jpg', 'Vitória', 'Gomes', 'o', '999857463', 'e10adc3949ba59abbe56e057f20f883e', 'vic@gmail.com', '1999-02-15', 0, '2019-10-02'),
(32, NULL, 'perwomjpg.jpg', 'Laís', 'Carvalho', 'f', '999272788', 'e10adc3949ba59abbe56e057f20f883e', 'lais@gmail.com', '1998-10-03', 0, '2019-10-17');



DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_modificacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `video` (`id`, `titulo`, `descricao`, `link`, `data_criacao`, `data_modificacao`) VALUES
(1, 'O que é reciclagem?', 'Reciclagem é o processo em que há a transformação do resíduo sólido que não seria aproveitado, com mudanças em seus estados físico, físico-químico ou biológico.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/OQ5jpiKzNqg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-05-18 00:00:00', NULL);


ALTER TABLE `endereco`
  ADD CONSTRAINT `endereço_cliente` FOREIGN KEY (`idCliente`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_cliente` FOREIGN KEY (`idCliente`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `pedido_endereco` FOREIGN KEY (`idEndereco`) REFERENCES `endereco` (`idEndereco`);


ALTER TABLE `pedido_bolodepote`
  ADD CONSTRAINT `pedidobolo_bolo` FOREIGN KEY (`idBoloDePote`) REFERENCES `bolodepote` (`idBoloDePote`),
  ADD CONSTRAINT `pedidobolo_pedido` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
