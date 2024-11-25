-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_pweb1_2024_2_blog
CREATE DATABASE IF NOT EXISTS `db_pweb1_2024_2_blog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_pweb1_2024_2_blog`;

-- Copiando estrutura para tabela db_pweb1_2024_2_blog.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_pweb1_2024_2_blog.categoria: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_pweb1_2024_2_blog.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `texto` text COLLATE utf8mb4_bin NOT NULL,
  `data_publicacao` datetime NOT NULL,
  `status` varchar(3) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `categoria_id` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_post_categoria` (`categoria_id`),
  CONSTRAINT `FK_post_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_pweb1_2024_2_blog.post: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
