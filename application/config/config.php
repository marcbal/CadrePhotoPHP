<?php
error_reporting(E_ALL);
ini_set("display_errors", 1); // niveau d'erreur en phase de développement
setlocale(LC_TIME, 'fr_FR.utf8','fra'); // date en langue française, fr_FR
define('URL', dirname($_SERVER['PHP_SELF']).'/');
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'cadre_photo_php');
define('DB_USER', 'cadre_photo_php');
define('DB_PASS', 'HA7XtNK54PExKPTt');




// nom d'utilisateur
define('USERNAME_MAX_SIZE', 20);
define('USERNAME_MIN_SIZE', 2);

// mot de passe
define('PASSWORD_MIN_SIZE', 8);