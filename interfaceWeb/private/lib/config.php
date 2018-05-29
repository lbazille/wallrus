<?php
	/**
	 * Configuration file
	 * Provides vars and elements used by all the others files
	 * Included by the function file
	 *
	 * Required:
	 * * getcwd()
	 *
	 *
	 * @author Lilian BAZILLE <bazille.e1604454@etud.univ-ubs.fr>
	 * @version 0.0.80109
	*/

	$baseDir = getcwd() . "/../";
	$publicDir = $baseDir . "public/";
	$privateDir = $baseDir . "private/";

	$dirs =	[
		"base"		=>	$baseDir,
		"public"	=>	$publicDir,
		"private"	=>	$privateDir,
		"class"		=>	$privateDir . "class/",
		"db"		=>	$privateDir . "db/",
		"lib"		=>	$privateDir . "lib/",
		"pages"		=>	$privateDir . "pages/",
		"parts"		=>	$privateDir . "parts/",
		"scripts"	=>  $privateDir . "scripts/",
	];

	$site = [
		"company"	=>	"ENSIBS",
		"title"		=>	"Wallrus"
	];

	$app = [
		"fqdn"		=>	"box.cqrite.pw",
		"version"	=>	"1.0.80601",
		"productName"=>	"Wallrus Box"
	];

	$db = [
		"server"	=>	"localhost",
		"name"		=>	"wallrus_box",
		"user"		=>	"user",
		"password"	=>	"pwd"
	];

?>
