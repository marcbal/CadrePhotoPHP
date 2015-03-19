SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Structure de la table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL COMMENT "auto incrementing id of each user, unique index",
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT "user""s name, unique",
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT "user""s password in salted and hashed format",
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT "user""s email, unique",
  `user_active` tinyint(1) NOT NULL DEFAULT "0" COMMENT "user""s activation status",
  `user_account_type` tinyint(1) NOT NULL DEFAULT "1" COMMENT "user""s account type (basic, premium, etc)",
  `user_rememberme_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT "user""s remember-me cookie token",
  `user_creation_timestamp` bigint(20) DEFAULT NULL COMMENT "timestamp of the creation of user""s account",
  `user_last_login_timestamp` bigint(20) DEFAULT NULL COMMENT "timestamp of user""s last login",
  `user_failed_logins` tinyint(1) NOT NULL DEFAULT "0" COMMENT "user""s failed login attempts",
  `user_last_failed_login` int(10) DEFAULT NULL COMMENT "unix timestamp of last failed login attempt",
  `user_activation_hash` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT "user""s email verification hash string",
  `user_password_reset_hash` char(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT "user""s password reset code",
  `user_password_reset_timestamp` bigint(20) DEFAULT NULL COMMENT "timestamp of the password reset request"
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT="user data";


--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_name` (`user_name`), ADD UNIQUE KEY `user_email` (`user_email`);


--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "auto incrementing id of each user, unique index",AUTO_INCREMENT=4;

