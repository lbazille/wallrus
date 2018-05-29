<?php
	/**
	* Required:
	* * http_response_code()
	*/

	session_start();
	include(getcwd() . "/../private/lib/functions.php");

	// Pages array
	$pages = [
		"home"		=>	[	"url" 		=>	"home.php",
							"title"		=>	"Accueil",
							"header"	=>	true,
							"footer"	=>	true
						],
		"login"		=>	[	"url" 		=>	"login.php",
							"title"		=>	"Connexion",
							"header"	=>	false,
							"footer"	=>	false
						],
		"about"		=>	[	"url" 		=>	"about.php",
							"title"		=>	"À propos",
							"header"	=>	true,
							"footer"	=>	true
						],
		"admin-users"	=>	[	"url" 		=>	"admin-users.php",
							"title"		=>	"Changer le mot de passe",
							"header"	=>	true,
							"footer"	=>	true
						],
		"network-wifi"	=>	[	"url" 		=>	"network-wifi.php",
							"title"		=>	"Configurer le WiFi",
							"header"	=>	true,
							"footer"	=>	true
						],
		"network-wan"	=>	[	"url" 		=>	"network-wan.php",
							"title"		=>	"Configurer l'interface WAN",
							"header"	=>	true,
							"footer"	=>	true
						],
		"rules-fw"	=>	[	"url" 		=>	"rules-fw.php",
							"title"		=>	"Règles pare-feu",
							"header"	=>	true,
							"footer"	=>	true
						],
		"admin-box"	=>	[	"url" 		=>	"admin-box.php",
							"title"		=>	"Administration de la box",
							"header"	=>	true,
							"footer"	=>	true
						],
		"vpn"	=>	[	"url" 		=>	"vpn.php",
							"title"		=>	"Statut de la connexion VPN à Wallrus DC",
							"header"	=>	true,
							"footer"	=>	true
						]
	];


	if (isset($_SESSION['username']))	{
		$connect = true;
	}
	else {
		$connect = false;
	}

	if ($connect == true)	{
		if (!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] == 'login'))  {
			pageCall2($pages['home']);
		}
		else if (isset($pages[$_GET['page']]))	{
			pageCall2($pages[$_GET['page']]);
		}
		else {
			http_response_code(404);
			echo "<h1 style=\"text-align:center\">404</h1><br/><p style=\"text-align:center\"><img src=\"img/morse.gif\" /></p>";
		}
	}
	else {
		pageCall2($pages['login']);
	}
?>
