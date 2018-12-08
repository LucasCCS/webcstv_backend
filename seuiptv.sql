-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Set-2018 às 06:21
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `email` varchar(128) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `telefone` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `codigo_ativacao` varchar(128) NOT NULL,
  `codigo_mudanca_senha` varchar(128) NOT NULL,
  `id_plano` int(11) NOT NULL,
  `id_operadora` int(11) NOT NULL,
  `id_metodo_pagamento` int(11) NOT NULL,
  `chave_des` varchar(128) NOT NULL,
  `aparelho_usuario` varchar(128) NOT NULL,
  `aparelho_senha` varchar(128) NOT NULL,
  `data_final_plano` int(11) NOT NULL,
  `data_inicio_plano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cms_clientes`
--

INSERT INTO `cms_clientes` (`id_cliente`, `nome`, `email`, `senha`, `telefone`, `status`, `codigo_ativacao`, `codigo_mudanca_senha`, `id_plano`, `id_operadora`, `id_metodo_pagamento`, `chave_des`, `aparelho_usuario`, `aparelho_senha`, `data_final_plano`, `data_inicio_plano`) VALUES
(27, 'Lucas Costa', 'lucascostacruzsilva@gmail.com', 'c8360d0f7f1cdb2fe294c26eba2137a0', '(12) 31231-2312', 1, '43300', '', 2, 0, 0, '', '', '', 0, 0),
(28, 'Lucas Costa teste', 'lucas2@gmail.com', 'c8360d0f7f1cdb2fe294c26eba2137a0', '(11) 11111-1111', 0, '18298', '', 1, 0, 0, '', '', '', 0, 0),
(29, 'lucasteste', 'lucas@gmail.com', 'c8360d0f7f1cdb2fe294c26eba2137a0', '(22) 22222-2222', 0, '74430', '', 2, 0, 0, '', '', '', 0, 0),
(30, 'Lucas Costa2321312', 'lucasco2stacruzsilva@gmail.com', 'c8360d0f7f1cdb2fe294c26eba2137a0', '(12) 32323-2323', 0, '79912', '', 1, 0, 0, '', '', '', 0, 0),
(31, 'Lucas Costa', 'lucas222@gmail.com', 'c8360d0f7f1cdb2fe294c26eba2137a0', '(21) 23232-1323', 0, '68203', '', 1, 0, 0, '', '', '', 0, 0),
(32, '123123', 'lucascostacru2323zsilva@gmail.com', 'c8360d0f7f1cdb2fe294c26eba2137a0', '(12) 23231-2312', 0, '11506', '', 1, 0, 0, '', '', '', 0, 0);

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
(26, 27, 1),
(27, 27, 2),
(28, 28, 1),
(29, 29, 1),
(30, 29, 2),
(31, 30, 1),
(32, 0, 1),
(33, 31, 1),
(34, 32, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms_faq`
--

CREATE TABLE `cms_faq` (
  `id_faq` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms_guias_instalacao`
--

CREATE TABLE `cms_guias_instalacao` (
  `id_guia_instalacao` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `imagem_url` varchar(128) NOT NULL,
  `video_url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `url` varchar(12) NOT NULL,
  `porta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cms_operadoras`
--

INSERT INTO `cms_operadoras` (`id_operadora`, `titulo`, `imagem_logo`, `url`, `porta`) VALUES
(1, 'Claro', 'https://www.claro.com.br/imagem/img-logoclaro-header-1509132207341.png', '', 0),
(2, 'SKY', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Skybrasil.svg/1200px-Skybrasil.svg.png', '', 0);

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
(7, 'Planos CardSharing', 'cardsharing', '', '.', 0, 0, 0, '', 1, 0),
(8, 'Revenda', 'revenda', '', '.', 0, 0, 0, '', 1, 1),
(9, 'Dúvidas', '#duvidas', '', '.', 0, 0, 0, '', 1, 2),
(10, 'Contato', 'contato', '', '.', 0, 0, 0, '', 1, 3),
(11, 'Planos IPTV', 'iptv', '', '.', 0, 0, 0, '', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms_planos`
--

CREATE TABLE `cms_planos` (
  `id_plano` int(11) NOT NULL,
  `titulo` varchar(128) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `dias` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `operadoras` int(11) NOT NULL,
  `pagseguro_codigo` varchar(128) NOT NULL,
  `mercadopago_codigo` varchar(128) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cms_planos`
--

INSERT INTO `cms_planos` (`id_plano`, `titulo`, `valor`, `dias`, `descricao`, `operadoras`, `pagseguro_codigo`, `mercadopago_codigo`, `tipo`) VALUES
(1, 'Prata', '15,00', 30, '<li>3 operadoras a escolha</li>\r\n                                    <li>Mais de 254 canais</li>\r\n                                    <li>Servidor dedicado protegido</li>\r\n                                    <li>01 acesso(s)</li>\r\n                                    <li>Login para apenas 1 aparelho</li>', 1, 'sda', 'WaN1', 1),
(2, 'Ouro', '25,00', 30, '<li>3 operadoras a escolha</li>\r\n                                    <li>Mais de 254 canais</li>\r\n                                    <li>Servidor dedicado protegido</li>\r\n                                    <li>01 acesso(s)</li>\r\n                                    <li>Login para apenas 1 aparelho</li>', 2, '', 'WaN1', 0),
(3, 'Diamante', '30,00', 0, '<li>3 operadoras a escolha</li>\r\n                                    <li>Mais de 254 canais</li>\r\n                                    <li>Servidor dedicado protegido</li>\r\n                                    <li>01 acesso(s)</li>\r\n                                    <li>Login para apenas 1 aparelho</li>', 3, '', 'WaN1', 0),
(4, 'Net', '20,00', 0, '<li>3 operadoras a escolha</li>\r\n                                    <li>Mais de 254 canais</li>\r\n                                    <li>Servidor dedicado protegido</li>\r\n                                    <li>01 acesso(s)</li>\r\n                                    <li>Login para apenas 1 aparelho</li>', 1, '', 'WaN1', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms_sub_planos`
--

CREATE TABLE `cms_sub_planos` (
  `id_sub_plano` int(11) NOT NULL,
  `valor` varchar(128) NOT NULL,
  `dias` int(11) NOT NULL,
  `pagseguro_codigo` varchar(128) NOT NULL,
  `mercadopago_codigo` varchar(128) NOT NULL,
  `id_plano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cms_sub_planos`
--

INSERT INTO `cms_sub_planos` (`id_sub_plano`, `valor`, `dias`, `pagseguro_codigo`, `mercadopago_codigo`, `id_plano`) VALUES
(2, '30,00', 60, '23', '24', 1),
(3, '50,00', 60, '2222', '22222222', 2),
(4, '75,00', 90, '1sd31', '123sda21', 2);

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
(1, 'admin', 'c8360d0f7f1cdb2fe294c26eba2137a0');

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
(1, 'Seu IPTV', 'Soluções em IPTV', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dignissim pulvinar aliquam. Fusce eleifend mi magna. ', 'http://localhost/inovlab/workana/seucs_backend/public/images/logo.png', 'http://localhost/inovlab/workana/seucs_backend/public/images/logo.png', '(00) 0000-0000', 'sac@iptvcontato.com.br', 'sistemas@inovlab.com.br', 'Rua José de Aguiar Moraes 77A', '17580000', 'São Paulo', 'Pompeia', 'São Paulo', 'https://www.youtube.com/embed/BW3nbMKpIsU', '', '', '(00) 0000-0000');

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cms_clientes_historico_pagamentos`
--
ALTER TABLE `cms_clientes_historico_pagamentos`
  MODIFY `id_cliente_historico_pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_cliente_operadoras`
--
ALTER TABLE `cms_cliente_operadoras`
  MODIFY `id_cliente_operadora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `cms_faq`
--
ALTER TABLE `cms_faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_guias_instalacao`
--
ALTER TABLE `cms_guias_instalacao`
  MODIFY `id_guia_instalacao` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cms_planos`
--
ALTER TABLE `cms_planos`
  MODIFY `id_plano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_sub_planos`
--
ALTER TABLE `cms_sub_planos`
  MODIFY `id_sub_plano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_usuarios`
--
ALTER TABLE `cms_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
