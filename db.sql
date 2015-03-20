SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Structure de la table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_adresse` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);


--
-- Unique pour la table `users`
--
ALTER TABLE `users`
 ADD UNIQUE KEY `user_email` (`user_email`);


 
 
 
 
 
--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo` MEDIUMBLOB NOT NULL,
  largeur FLOAT NOT NULL,
  hauteur FLOAT NOT NULL,
  marge FLOAT NOT NULL,
  epaisseur FLOAT NOT NULL,
  bordure_gauche_couleur VARCHAR(30) NOT NULL,
  bordure_droite_couleur VARCHAR(30) NOT NULL,
  bordure_haut_couleur VARCHAR(30) NOT NULL,
  bordure_bas_couleur VARCHAR(30) NOT NULL,
  bordure_gauche_type VARCHAR(30) NOT NULL,
  bordure_droite_type VARCHAR(30) NOT NULL,
  bordure_haut_type VARCHAR(30) NOT NULL,
  bordure_bas_type VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`)
);

