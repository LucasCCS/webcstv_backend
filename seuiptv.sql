-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07-Jan-2019 às 11:03
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seuiptv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms_clientes`
--

CREATE TABLE `cms_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `usuario` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `telefone` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `codigo_ativacao` varchar(128) NOT NULL,
  `codigo_teste` varchar(128) NOT NULL,
  `codigo_mudanca_senha` varchar(128) NOT NULL,
  `id_plano` int(11) NOT NULL,
  `id_subplano` int(11) DEFAULT NULL,
  `id_operadora` int(11) NOT NULL,
  `id_metodo_pagamento` int(11) NOT NULL,
  `chave_des` varchar(128) NOT NULL,
  `aparelho_usuario` varchar(128) NOT NULL,
  `aparelho_senha` varchar(128) NOT NULL,
  `data_final_plano` int(11) NOT NULL,
  `data_inicio_plano` int(11) NOT NULL,
  `id_user_servidor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cms_clientes`
--

INSERT INTO `cms_clientes` (`id_cliente`, `nome`, `usuario`, `email`, `senha`, `telefone`, `status`, `codigo_ativacao`, `codigo_teste`, `codigo_mudanca_senha`, `id_plano`, `id_subplano`, `id_operadora`, `id_metodo_pagamento`, `chave_des`, `aparelho_usuario`, `aparelho_senha`, `data_final_plano`, `data_inicio_plano`, `id_user_servidor`) VALUES
(3, 'gabriel casas', 'gabr1789', 'cazuma89@gmail.com', '707426bb3860097f90907f71cce8e81a', '(12) 99661-5087', 1, '68860', '72a559947678fe8e13d25b5a262b8971', '', 4, NULL, 0, 0, '', '', '', 0, 0, 18),
(16, 'Lucas Costa', 'luca251', 'lucascostacruzsilva@gmail.com', 'c8360d0f7f1cdb2fe294c26eba2137a0', '(11) 0000-0000', 1, '98042', '', '', 10, NULL, 0, 0, '', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms_clientes_historico_pagamentos`
--

CREATE TABLE `cms_clientes_historico_pagamentos` (
  `id_cliente_historico_pagamento` int(11) NOT NULL,
  `data_pagamento` int(11) NOT NULL,
  `observacoes` varchar(128) NOT NULL,
  `comprovante_imagem` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `id_plano` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cms_clientes_historico_pagamentos`
--

INSERT INTO `cms_clientes_historico_pagamentos` (`id_cliente_historico_pagamento`, `data_pagamento`, `observacoes`, `comprovante_imagem`, `status`, `id_plano`, `id_cliente`) VALUES
(1, 1536963599, 'teste', 'http://seuiptv.inovlab.com.br/public/images/uploads/8ee6119f08c3aed3c3bb5ba2e1e32634.png', 4, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms_cliente_operadoras`
--

CREATE TABLE `cms_cliente_operadoras` (
  `id_cliente_operadora` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_operadora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cms_cliente_operadoras`
--

INSERT INTO `cms_cliente_operadoras` (`id_cliente_operadora`, `id_cliente`, `id_operadora`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms_faq`
--

CREATE TABLE `cms_faq` (
  `id_faq` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cms_faq`
--

INSERT INTO `cms_faq` (`id_faq`, `titulo`, `descricao`) VALUES
(2, 'Qual a internet indicada para usar Cs e IPTV ?', 'Para o serviço de Cs funcionar perfeito e necessário 512Kbps, já o serviço de IPTV necessita de no minimo 5Mbps porem velocidade não influência tanto o funcionamento e sim a qualidade da internet , o ideal e que mesma não tenha perda de pacotes , não tenha pings acima de 200 ms'),
(3, 'Posso usar meu login em mais de um aparelho?', 'Pensando na qualidade do serviço prestado este tipo de ação não e permitida em nossos servidores o sistema bloqueia automaticamente seu login. O receptor que vai receber o sinal do servidor será o que for ligado primeiro, sendo que o segundo não receberá as chaves para decodificação dos canais.'),
(4, 'O preço é muito diferente?', 'Você pagará muito menos por esse serviço do que pagaria por uma televisão tradicional.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms_guias_instalacao`
--

CREATE TABLE `cms_guias_instalacao` (
  `id_guia_instalacao` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `header_titulo` varchar(128) NOT NULL,
  `imagem_url` varchar(128) NOT NULL,
  `video_url` varchar(128) NOT NULL,
  `descricao` text NOT NULL,
  `guia_slug` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cms_guias_instalacao`
--

INSERT INTO `cms_guias_instalacao` (`id_guia_instalacao`, `titulo`, `header_titulo`, `imagem_url`, `video_url`, `descricao`, `guia_slug`) VALUES
(1, 'VPN', 'VPN - como resolver os travamentos do IPTV', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRO0MzVnUQD9Gdx6BbL2m1qCQtTo_wrGRYYoTOZ0zjCXFmKvWeZ', 'https://www.youtube.com/embed/9PuH40fMgtk', 'Logicamente o usuário mais leigo já associa de cara ao servidor IPTV, mas no IPTV existem diversos fatores que levam a uma ótima ou péssima experiência de entretenimento, e a maioria dos problemas não são culpa nossa. Quando são problemas conosco, somos transparentes, viemos a público e informamos os problemas/manutenções existentes. Mas o que ocorre e vai ocorrer cada vez mais é o famoso Traffic Shaping por parte das operadoras, que limita e muito sua experiência e atinge em cheio o IPTV, serviço que usa muita banda, tal prática é proibida, mas como já sabem, aqui é “Brazil”. Veja este vídeo e entenda mais o motivo de a “lista sempre travar” nos momentos mais “importantes” e aprenda sobre a VPN, a única maneira de burlar isso com sucesso.', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms_metodos_pagamento`
--

CREATE TABLE `cms_metodos_pagamento` (
  `id_metodo_pagamento` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `imagem_logo` varchar(128) NOT NULL,
  `checkout_url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cms_metodos_pagamento`
--

INSERT INTO `cms_metodos_pagamento` (`id_metodo_pagamento`, `titulo`, `imagem_logo`, `checkout_url`) VALUES
(1, 'MercadoPago', 'http://[::1]/inovlab/workana/seucs_backend/public/images/mercadopago.png', 'http://mpago.la/'),
(2, 'PagSeguro', 'https://logodownload.org/wp-content/uploads/2016/09/pagseguro-logo.png', 'https://pag.ae/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms_operadoras`
--

CREATE TABLE `cms_operadoras` (
  `id_operadora` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `imagem_logo` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `porta` int(11) NOT NULL,
  `perfil` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cms_operadoras`
--

INSERT INTO `cms_operadoras` (`id_operadora`, `titulo`, `imagem_logo`, `url`, `porta`, `perfil`) VALUES
(1, 'Claro', 'https://www.claro.com.br/imagem/img-logoclaro-header-1509132207341.png', 'brahd.cbrs.tv', 50501, 'teste'),
(2, 'SKY', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Skybrasil.svg/1200px-Skybrasil.svg.png', '', 0, 'teste2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms_paginas`
--

CREATE TABLE `cms_paginas` (
  `id_page` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `subtitulo` varchar(128) NOT NULL,
  `conteudo` text NOT NULL,
  `data_cadastro` int(11) NOT NULL,
  `data_update` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `banner_page_url` varchar(128) NOT NULL,
  `nav_menu` int(11) NOT NULL,
  `posicao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cms_paginas`
--

INSERT INTO `cms_paginas` (`id_page`, `titulo`, `slug`, `subtitulo`, `conteudo`, `data_cadastro`, `data_update`, `autor`, `banner_page_url`, `nav_menu`, `posicao`) VALUES
(12, 'Sobre', 'sobre', '', '<div class="row">\r\n<div class="col-sm-12 col-md-12 col-lg-8">\r\n<h2>A Empresa</h2><p style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: 1.8; font-family: poppins, Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(97, 97, 97); max-width: 100%;">Easyhost offers superior, reliable and affordable Web Hosting to individuals and small businesses. Founded in 2001, Easyhost has quickly grown to become a leader in Performance Web Hosting</p><h5 style="margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: 1.3; font-family: poppins, Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(23, 28, 36);"><span style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Missão</span></h5><p style="margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: 1.8; font-family: poppins, Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(97, 97, 97); max-width: 100%;">Our company philosophy is to create the kind of website that most businesses want: easy to find, stylish and appealing, quick loading, mobile responsive and easy to buy from.</p><h5 style="margin-right: 0px; margin-bottom: 7px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: 1.3; font-family: poppins, Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(23, 28, 36);"><span style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Competência</span></h5><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 14px; line-height: 1.8; font-family: poppins, Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(97, 97, 97); max-width: 100%;">We’ve designed our entire process and products around providing everything a small businesses needs when they’re starting out – ensuring that working with us is always a quick, easy and hassle-free experience. We give our clients full control of their website without a ridiculous price tag, and our friendly team offers their expertise even after your website is live</p>\r\n</div>\r\n<div class="col-sm-12 col-md-12 col-lg-4">\r\n<img src="public/images/canais-de-tv.jpg">\r\n</div>\r\n</div>\r\n', 0, 0, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms_planos`
--

CREATE TABLE `cms_planos` (
  `id_plano` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `subtitulo` varchar(128) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `valor_antigo` varchar(128) NOT NULL,
  `dias` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `operadoras` int(11) NOT NULL,
  `conexoes` int(11) NOT NULL,
  `pagseguro_codigo` varchar(128) NOT NULL,
  `mercadopago_codigo` varchar(128) NOT NULL,
  `chave_des` varchar(128) NOT NULL,
  `plano_tipo` int(11) NOT NULL,
  `periodicidade` int(11) NOT NULL,
  `url_teste` varchar(128) NOT NULL,
  `duracao_teste` varchar(128) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cms_planos`
--

INSERT INTO `cms_planos` (`id_plano`, `titulo`, `subtitulo`, `valor`, `valor_antigo`, `dias`, `descricao`, `operadoras`, `conexoes`, `pagseguro_codigo`, `mercadopago_codigo`, `chave_des`, `plano_tipo`, `periodicidade`, `url_teste`, `duracao_teste`, `status`) VALUES
(9, 'CardSharing', 'Satélite Simples', '25,00', '40,00', 30, '<li>+ de 190 canais</li>\r\n<li>Servidor dedicado</li>\r\n<li>1 operadora</li>\r\n<li>Teste grátis - 24 horas</li>', 0, 0, '7UrG69KVn', '3NHUhP', '', 0, 0, 'http://cs.cardbr.com/csgold/teste.php?a=4vznjt26mv95mea', '24', 0),
(10, 'CardSharing', 'Satélite Duplo', '30,00', '55,00', 30, '<li>+ de 190 canais</li>\r\n<li>Servidor dedicado</li>\r\n<li>1 operadora</li>\r\n<li>Teste grátis - 24 horas</li>', 0, 0, '7UrGavVga', '1MZcYG', '', 0, 0, 'http://cs.cardbr.com/csgold/teste.php?a=4vznjt26mv95mea', '24', 0),
(12, 'Indisponível', 'Satélite Triplo', '0,00', '0,00', 30, '<li>+ de 190 canais</li>\r\n<li>Servidor dedicado</li>\r\n<li>1 operadora</li>\r\n<li>Teste grátis - 24 horas</li>', 0, 0, 'N/A', 'N/A', '', 0, 0, 'N/A', '24', 1),
(13, 'NET', 'Canais em HD', '35,00', '70,00', 30, '<li>+ de 190 canais</li>\r\n<li>Servidor dedicado</li>\r\n<li>1 operadora</li>\r\n<li>Teste grátis - 24 horas</li>', 0, 0, '7UrGc9fKv', '3PRA3u', '', 0, 0, 'http://system.clubcs.net/painel/cadtest.php?r=VjFSS1YyTXlSbGhQVjNCclVqQndiMVJWVWtaa01ERlNVRlF3UFE9PQ==', '24', 0),
(14, 'IPTV', 'Mensal', '35,00', '60,00', 30, '<li>+ de 190 canais</li>\r\n<li>Servidor dedicado</li>\r\n<li>1 operadora</li>\r\n<li>Teste grátis</li>', 0, 0, '7UrGdKmXa', '3H11dV', '', 1, 0, 'http://sistema.g5iptv.live/gerenciador/crie-teste-automatico?id=ZGI4ZDI1ZTJjNWRkOTg4ZTA5ZTU1ZjU2MTA5NWEyYWExY2M0NGY1NWI5YzhmOTdk', '1', 0),
(15, 'IPTV', 'Trimestral', '90,00', '120,00', 90, '<li>+ de 190 canais</li>\r\n<li>Servidor dedicado</li>\r\n<li>1 operadora</li>\r\n<li>Teste grátis</li>', 0, 0, '7UrGe8XBa', '3uQNT4', '', 1, 1, 'http://sistema.g5iptv.live/gerenciador/crie-teste-automatico?id=ZGI4ZDI1ZTJjNWRkOTg4ZTA5ZTU1ZjU2MTA5NWEyYWExY2M0NGY1NWI5YzhmOTdk', '1', 0),
(16, 'IPTV', 'Semestral', '175,00', '200,00', 180, '<li>+ de 190 canais</li>\r\n<li>Servidor dedicado</li>\r\n<li>1 operadora</li>\r\n<li>Teste grátis</li>', 0, 0, '7UrGepHxH', '1Eb88e', '', 1, 2, 'http://sistema.g5iptv.live/gerenciador/crie-teste-automatico?id=ZGI4ZDI1ZTJjNWRkOTg4ZTA5ZTU1ZjU2MTA5NWEyYWExY2M0NGY1NWI5YzhmOTdk', '1', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms_sub_planos`
--

CREATE TABLE `cms_sub_planos` (
  `id_sub_plano` int(11) NOT NULL,
  `valor` varchar(128) NOT NULL,
  `valor_antigo` varchar(128) NOT NULL,
  `dias` int(11) NOT NULL,
  `pagseguro_codigo` varchar(128) NOT NULL,
  `mercadopago_codigo` varchar(128) NOT NULL,
  `periodicidade` int(11) NOT NULL,
  `id_plano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cms_sub_planos`
--

INSERT INTO `cms_sub_planos` (`id_sub_plano`, `valor`, `valor_antigo`, `dias`, `pagseguro_codigo`, `mercadopago_codigo`, `periodicidade`, `id_plano`) VALUES
(3, '50,00', '60,00', 60, '2222', '22222222', 1, 2),
(4, '75,00', '85,00', 90, '1sd31', '123sda21', 2, 2),
(5, '55,00', '', 90, '7UrG9HunR', '45FKTD', 1, 9),
(6, '105,00', '', 180, '7UrGa2Y12', '2omFah', 2, 9),
(7, '70,00', '', 90, '7UrGaR_4n', '3LBStV', 1, 10),
(8, '130,00', '', 180, '7UrGb9q-n', '1g7yWB', 2, 10),
(9, '0,00', '', 90, 'N/A', 'N/A', 1, 12),
(11, '85,00', '', 90, '7UrGcCX62', '3xK9YX', 1, 13),
(12, '0,00', '', 180, 'N/A', 'N/A', 2, 12),
(13, '165,00', '', 180, '7UrGcWHma', '35PZZK', 2, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms_usuarios`
--

CREATE TABLE `cms_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(128) NOT NULL,
  `senha` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cms_usuarios`
--

INSERT INTO `cms_usuarios` (`id_usuario`, `usuario`, `senha`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_config`
--

CREATE TABLE `site_config` (
  `id` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `slogan` varchar(128) NOT NULL,
  `descricao_footer` text NOT NULL,
  `logo_url` varchar(128) NOT NULL,
  `logo_footer_url` varchar(128) NOT NULL,
  `contato` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `email_formularios` varchar(128) NOT NULL,
  `endereco` varchar(128) NOT NULL,
  `cep` varchar(128) NOT NULL,
  `cidade` varchar(128) NOT NULL,
  `bairro` varchar(128) NOT NULL,
  `estado` varchar(128) NOT NULL,
  `video_promocional` varchar(128) NOT NULL,
  `fone` varchar(128) NOT NULL,
  `facebook` varchar(128) NOT NULL,
  `whatsapp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `site_config`
--

INSERT INTO `site_config` (`id`, `titulo`, `slogan`, `descricao_footer`, `logo_url`, `logo_footer_url`, `contato`, `email`, `email_formularios`, `endereco`, `cep`, `cidade`, `bairro`, `estado`, `video_promocional`, `fone`, `facebook`, `whatsapp`) VALUES
(1, 'WebCSTV', 'O melhor em CardSharing e IPTV', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dignissim pulvinar aliquam. Fusce eleifend mi magna. ', 'http://localhost/inovlab/workana/seucs_backend/public/images/logo.png', 'http://localhost/inovlab/workana/seucs_backend/public/images/logo.png', '(12) 997824798', 'sac@iptvcontato.com.br', 'sistemas@inovlab.com.br', 'Rua José de Aguiar Moraes 77A', '17580000', 'São Paulo', 'Pompeia', 'São Paulo', 'https://www.youtube.com/embed/BW3nbMKpIsU', '', '', '(12) 997824798');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_clientes`
--
ALTER TABLE `cms_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `cms_clientes_historico_pagamentos`
--
ALTER TABLE `cms_clientes_historico_pagamentos`
  ADD PRIMARY KEY (`id_cliente_historico_pagamento`);

--
-- Indexes for table `cms_cliente_operadoras`
--
ALTER TABLE `cms_cliente_operadoras`
  ADD PRIMARY KEY (`id_cliente_operadora`);

--
-- Indexes for table `cms_faq`
--
ALTER TABLE `cms_faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `cms_guias_instalacao`
--
ALTER TABLE `cms_guias_instalacao`
  ADD PRIMARY KEY (`id_guia_instalacao`);

--
-- Indexes for table `cms_metodos_pagamento`
--
ALTER TABLE `cms_metodos_pagamento`
  ADD PRIMARY KEY (`id_metodo_pagamento`);

--
-- Indexes for table `cms_operadoras`
--
ALTER TABLE `cms_operadoras`
  ADD PRIMARY KEY (`id_operadora`);

--
-- Indexes for table `cms_paginas`
--
ALTER TABLE `cms_paginas`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `cms_planos`
--
ALTER TABLE `cms_planos`
  ADD PRIMARY KEY (`id_plano`);

--
-- Indexes for table `cms_sub_planos`
--
ALTER TABLE `cms_sub_planos`
  ADD PRIMARY KEY (`id_sub_plano`);

--
-- Indexes for table `cms_usuarios`
--
ALTER TABLE `cms_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario_2` (`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_usuario_3` (`id_usuario`),
  ADD KEY `id_usuario_4` (`id_usuario`);

--
-- Indexes for table `site_config`
--
ALTER TABLE `site_config`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_clientes`
--
ALTER TABLE `cms_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cms_clientes_historico_pagamentos`
--
ALTER TABLE `cms_clientes_historico_pagamentos`
  MODIFY `id_cliente_historico_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cms_cliente_operadoras`
--
ALTER TABLE `cms_cliente_operadoras`
  MODIFY `id_cliente_operadora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cms_faq`
--
ALTER TABLE `cms_faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cms_guias_instalacao`
--
ALTER TABLE `cms_guias_instalacao`
  MODIFY `id_guia_instalacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cms_metodos_pagamento`
--
ALTER TABLE `cms_metodos_pagamento`
  MODIFY `id_metodo_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cms_operadoras`
--
ALTER TABLE `cms_operadoras`
  MODIFY `id_operadora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cms_paginas`
--
ALTER TABLE `cms_paginas`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cms_planos`
--
ALTER TABLE `cms_planos`
  MODIFY `id_plano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cms_sub_planos`
--
ALTER TABLE `cms_sub_planos`
  MODIFY `id_sub_plano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cms_usuarios`
--
ALTER TABLE `cms_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
