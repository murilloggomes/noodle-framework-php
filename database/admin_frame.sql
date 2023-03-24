-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 22-Mar-2023 às 12:19
-- Versão do servidor: 10.3.35-MariaDB
-- versão do PHP: 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `admin_frame`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mg_config_tema`
--

CREATE TABLE `mg_config_tema` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `modo_tema` varchar(25) NOT NULL,
  `largura_tela` varchar(25) NOT NULL,
  `cor_menu` varchar(25) NOT NULL,
  `tamanho_menu` varchar(25) NOT NULL,
  `data_alteracao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mg_config_tema`
--

INSERT INTO `mg_config_tema` (`id`, `usuario`, `modo_tema`, `largura_tela`, `cor_menu`, `tamanho_menu`, `data_alteracao`) VALUES
(1, 1, 'light', 'fluid', 'default', 'fixed', '2022-07-27 10:13:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mg_general_data`
--

CREATE TABLE `mg_general_data` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `data` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mg_general_data`
--

INSERT INTO `mg_general_data` (`id`, `name`, `data`) VALUES
(1, 'email-settings', '{\"smtp\":{\"host\":\"smtp.gmail.com\",\"port\":\"587\",\"encryption\":\"tls\",\"auth\":true,\"username\":\"\",\"password\":\"\",\"from\":\"\"},\"notifications\":{\"emails\":\"\",\"new_user\":true,\"new_payment\":false}}'),
(2, 'settings', '{\"site_name\":\"Noodle Framework\",\"site_description\":Framework PHP 8.2 em MVC - Brasileiro.\",\"currency\":\"BRL\",\"proxy\":false,\"user_proxy\":false,\"geonamesorg_username\":\"\",\"logomark\":\"\",\"logotype\":\"\"}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mg_logs`
--

CREATE TABLE `mg_logs` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `situacao` varchar(30) NOT NULL,
  `pagina` varchar(100) NOT NULL,
  `detalhes` varchar(250) NOT NULL,
  `horas` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mg_options`
--

CREATE TABLE `mg_options` (
  `id` int(10) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_value` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mg_options`
--

INSERT INTO `mg_options` (`id`, `option_name`, `option_value`) VALUES
(3, 'np_active_theme_idname', 'default');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mg_users`
--

CREATE TABLE `mg_users` (
  `id` int(255) NOT NULL,
  `account_type` varchar(20) NOT NULL,
  `responsavel` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `cnpj` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `cep` varchar(14) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mg_users`
--

INSERT INTO `mg_users` (`id`, `account_type`, `responsavel`, `email`, `username`, `password`, `firstname`, `is_active`, `date`, `imagem`, `phone`, `cnpj`, `address`, `cep`) VALUES
(1, 'admin', 137, 'renael@gmail.com', 'user_61045965e59d7', '$2y$10$9MndhhRQ238I/cYMOqHKp.ivpmgz9/t4HQcYtXKc49vGyWFbijjG6', 'Renael Conceição', 1, '2021-07-30 16:56:21', '', '61983496459', '00000000002', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `mg_config_tema`
--
ALTER TABLE `mg_config_tema`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mg_general_data`
--
ALTER TABLE `mg_general_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Índices para tabela `mg_logs`
--
ALTER TABLE `mg_logs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mg_options`
--
ALTER TABLE `mg_options`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mg_users`
--
ALTER TABLE `mg_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `mg_config_tema`
--
ALTER TABLE `mg_config_tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `mg_general_data`
--
ALTER TABLE `mg_general_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `mg_logs`
--
ALTER TABLE `mg_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mg_options`
--
ALTER TABLE `mg_options`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `mg_users`
--
ALTER TABLE `mg_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
