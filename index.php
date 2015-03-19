<?php
$mtime_debut = microtime(true);


require_once('application/config/config.php');
require_once('application/libs/Controleur.php');
require_once('application/libs/Application.php');
require_once('application/libs/Session.php');
require_once('application/libs/NeverTrustUserInput.php');
require_once('application/libs/password.php');	// API externe (cf commentaire en début de fichier)
require_once('application/libs/date.php');	// API externe (cf commentaire en début de fichier)



require_once('application/modele/base/queries/Query.class.php');
require_once('application/modele/base/tables/Table.class.php');
require_once('application/modele/base/db/CRUDAdapter.class.php');
require_once('application/modele/base/db/DBAdapter.class.php');
require_once('application/modele/base/db/pdo/PDOCRUDAdapter.class.php');
require_once('application/modele/base/db/pdo/PDODBAdapter.class.php');

$app = new Application();

?><!-- durée d'exécution : <?php echo (microtime(true)-$mtime_debut); ?> s -->
