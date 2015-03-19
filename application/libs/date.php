<?php

/*
	Codé par Marc Baloup
	
	Extrait depuis un autre projet perso
	
	L'utilisation est totalement libre
*/


	function affiche_date_fr($time_affiche, $aff_diff = true, $precision = 's', $html = true, $html_class = false, $html_id = false)
	{
		$time_affiche = intval($time_affiche);
		$jours_semaine = array(1 => 'lundi',2 => 'mardi',3 => 'mercredi',4 => 'jeudi',5 => 'vendredi',6 => 'samedi',7 => 'dimanche');
		$mois_annee = array(1 => 'janvier',2 => 'février',3 => 'mars',4 => 'avril',5 => 'mai',6 => 'juin',
			7 => 'juillet',8 => 'août',9 => 'septembre',10 => 'octobre',11 => 'novembre',12 => 'décembre');
		
		$time_actuel = time();
		
		// date affiché au survol
		$date_complet = $jours_semaine[date('N',$time_affiche)] . ' ' . date('j', $time_affiche) . ' ' . $mois_annee[date('n',$time_affiche)] .
						' ' . date('Y', $time_affiche);
		
		$return = '';
		if ($html)
			$return .= '<time datetime="' . date('c', $time_affiche) . '" title="' . $date_complet . '"' . (($html_class != false)?' class="' . $html_class . '"':'') . (($html_id!= false)?' id="' . $html_id . '"':'') . '>';
		
		if ($aff_diff)
		{
			$time_diff = $time_actuel-$time_affiche;
			if ($time_diff < -1)
			{
				if ($time_diff > -60) // dans 1 min
					$return .= 'dans ' . (-$time_diff) . ' secondes';
				elseif ($time_diff > -60*2) // dans 2 min
					$return .= 'dans ' . floor((-$time_diff)/60) . ' minute';
				elseif ($time_diff > -3600) // dans 1h
					$return .= 'dans ' . floor((-$time_diff)/60) . ' minutes';
				elseif ($time_diff > -3600*2) // dans 2h
					$return .= 'dans ' . floor((-$time_diff)/(3600)) . ' heure';
				elseif ($time_diff > -3600*12) // dans 12h
					$return .= 'dans ' . floor((-$time_diff)/(3600)) . ' heures';
				elseif ($time_affiche <= mktime(23, 59, 59, date("n",$time_actuel), date("j",$time_actuel), date("Y",$time_actuel))) // aujourd'hui
					$return .= 'aujourd\'hui à ' . date('H:i', $time_affiche);
				elseif ($time_affiche <= mktime(23, 59, 59, date("n",$time_actuel), date("j",$time_actuel)+1, date("Y",$time_actuel))) // demain
					$return .= 'demain à ' . date('H:i', $time_affiche);
				elseif ($time_affiche <= mktime(0, 0, 0, date("n",$time_actuel), date("j",$time_actuel)+6, date("Y",$time_actuel))) // dans moins d'1 semaine
					$return .= $jours_semaine[date('N',$time_affiche)] . date(' j à H:i'.(($precision == 's')?':s':''), $time_affiche);
				else
					$return .= $date_complet;
			}
			elseif ($time_diff >= -1 AND $time_diff <= 1) // entre -1 et 1 sec
				$return .= 'maintenant';
			elseif ($time_diff < 60) // ya moins d'1 min
				$return .= 'il y a ' . $time_diff . ' secondes';
			elseif ($time_diff < 60*2) // ya moins de 2 min
				$return .= 'il y a ' . floor(($time_diff)/60) . ' minute';
			elseif ($time_diff < 3600) // ya moins d'1h
				$return .= 'il y a ' . floor(($time_diff)/60) . ' minutes';
			elseif ($time_diff < 3600*2) // ya moins de 2h
				$return .= 'il y a ' . floor(($time_diff)/(3600)) . ' heure';
			elseif ($time_diff < 3600*12) // ya moins de 12h
				$return .= 'il y a ' . floor(($time_diff)/(3600)) . ' heures';
			elseif ($time_affiche >= mktime(0, 0, 0, date("n",$time_actuel), date("j",$time_actuel), date("Y",$time_actuel))) // aujourd'hui
				$return .= 'aujourd\'hui à ' . date('H:i', $time_affiche);
			elseif ($time_affiche >= mktime(0, 0, 0, date("n",$time_actuel), date("j",$time_actuel)-1, date("Y",$time_actuel))) // hier
				$return .= 'hier à ' . date('H:i', $time_affiche);
			elseif ($time_affiche >= mktime(0, 0, 0, date("n",$time_actuel), date("j",$time_actuel)-6, date("Y",$time_actuel))) // ya moins d'1 semaine
				$return .= $jours_semaine[date('N',$time_affiche)] . ' dernier à ' . date('H:i'.(($precision == 's')?':s':''), $time_affiche);
			else
				$return .= $date_complet;
		}
		else
			$return .= $date_complet;
		
		
		if ($html)
			$return .= '</time>';
		
		return $return;
	}
	
	
	
	
function date_duree($time, $limit = 'd')
{
	$time = intval($time);
	if ($time < 60 OR $limit == 's')
		return $time.'s';
	if ($time < 3600 OR $limit == 'm')
		return floor($time/60).'m '.($time-60*floor($time/60)).'s';
	if ($time < 86400 OR $limit == 'h')
		return floor($time/3600).'h '. floor(($time-3600*floor($time/3600))/60).'m';
	else
		return floor($time/86400).'d '. floor(($time-86400*floor($time/86400))/3600).'h';
		
}
	
