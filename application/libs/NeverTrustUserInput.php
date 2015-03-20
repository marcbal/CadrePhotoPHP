<?php

/**
 * Classe qui gère les vérifications des formulaires et autres données provenant des utilisateurs
 * 
 * Par Marc Baloup
 */
class NeverTrustUserInput
{

	public static function checkEmail($mail)
	{
		return preg_match('#^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$#i', $mail);
	}
	
	
	public static function checkPasswordValidity($pass)
	{
		return preg_match('#^.{'.PASSWORD_MIN_SIZE.',}$#', $pass);
	}

}