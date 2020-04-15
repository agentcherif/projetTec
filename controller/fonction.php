<?php
function bdd()
	{
		try
	 	{
			$bdd = new PDO('mysql:host=localhost; dbname=mohadiallo; port=3306; charset=utf8', 'Cherif','Personne');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	 	catch (Exception $e)
	 		{
				die('Erreur : '. $e->getMessage());
	 	}
    	return $bdd;
	}	
function existMail($email, $bdd)
{
	$res=$bdd->prepare("SELECT email FROM membres WHERE email= ?");
	$res->execute(array($email));
	return $res->rowCount()>0;
}

?>
