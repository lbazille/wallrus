<?php
	/**
	 * Function file
	 * Provides functions by all the others files
	 * Do the inclusion of the config file
	 *
	 * Required:
	 * * getcwd()
	 * * include()
	 * * file_get_contents()
	 *
	 * @author Lilian BAZILLE <bazille.e1604454@etud.univ-ubs.fr>
	 * @version 0.0.80109
	*/

    // Import config
	include(getcwd() . "/../private/lib/config.php");

    // Import class
    include($dirs['class'] . "Player.php");

    /**
     * This function can be used to include the pages stored in /private/pages/
     *
     * @param       string      $page       Name of the file to include. Must be placed in the /private/pages/ directory.
     * @param       string      $title      Title of the page. Appears in the <title> if header is included.
     * @param       boolean     $header     (Optional) Determine if the header must be include before the page. Default: true.
     * @param       boolean     $footer     (Optional) Determine if the footer must be include after the page. Default: true.
     * @return      boolean     True if the page can be included.
     */
    function pageCall($page, $title, $header = true, $footer = true) {
        global $dirs, $site, $app, $db;
        // Include header if requested
        if ($header == true)
            include($dirs['parts'] . "header.php");
        // Trying include the page
        try {
            if (! @include($dirs['pages'] . $page)) {
                throw new Exception ("$page does not exist");
            }
        } catch (Exception $e) {
            return false;
        }
        // Include footer if requested
        if ($footer == true)
            include($dirs['parts'] . "footer.php");

        return true;
    }

	function pageCall2($pageArrayDescr)	{
		pageCall($pageArrayDescr['url'],$pageArrayDescr['title'],$pageArrayDescr['header'],$pageArrayDescr['footer']);
	}

	/**
	 * This function return the uptime in a human readable format.
	 *
	 * @return 		string		Current uptime (example: "0 jours 0:43:2.23")
	 */
	function uptime()	{
		$str   = @file_get_contents('/proc/uptime');
		$num   = floatval($str);
		$secs  = (int)fmod($num, 60); $num = intdiv($num, 60);
		$mins  = $num % 60;      $num = intdiv($num, 60);
		$hours = $num % 24;      $num = intdiv($num, 24);
		$days  = $num;

		return $days . " j " . $hours . " h " . $mins . " mins ". $secs . " secs";
	}

	/**
	 * This function verify the users credentials
	 * The password is stored into a .txt file in the db folder
	 * TODO : Improve pwd storage (db ?)
	 *
	 * @param 		string		$username		The requested username
	 * @param 		string 		$password		The password used for the connexion
	 * @param 		boolean		True if user is correctly identified, false otherwise
	 */
	function login($username, $password)	{
		try {
		    $adminPass = trim(file_get_contents(getcwd() . "/../private/db/" . "password.txt"));

		} catch (Exception $e) {
		    die("BDD unavailable");
		}
		$adminLogin = "admin";

		if ($username == $adminLogin && password_verify($password,$adminPass))  {
			return true;
		}
		else {
			return false;
		}
	}

	/**
	 * This function update the users credentials
	 * The password is stored into a .txt file in the db folder
	 * TODO : Improve pwd storage (db ?)
	 *
	 * @param 		string		$username		The requested username
	 * @param 		string 		$password		The password used for the connexion
	 * @param 		boolean		True if user is correctly identified, false otherwise
	 */
	function changePwd($username, $password)	{
		try {
		    file_put_contents(getcwd() . "/../private/db/" . "password.txt",password_hash($password, PASSWORD_DEFAULT));
			return true;
		} catch (Exception $e) {
		    return false;
		}
	}

	function pannel($color,$icon,$title,$msg)	{
		$pannel = "
		<div class=\"panel panel-$color\">
            <div class=\"panel-heading\">
                <div class=\"row\">
                    <div class=\"col-xs-3\">
						<div class=\"huge\"><strong>$title</strong></div>
                    </div>
                    <div class=\"col-xs-9 text-right\">
						<div class=\"huge\"><span class=\"$icon\"></span></div>
                    </div>
                </div>
            </div>
            <div class=\"panel-footer\">
                <span class=\"pull-left\">$msg</span>
                <!--<span class=\"pull-right\"><i class=\"fa fa-arrow-circle-right\"></i></span>-->
                <div class=\"clearfix\"></div>
            </div>
        </div>";
		// We can add an alert link <a href=\"#\" class=\"alert-link\">Alert Link</a>
		$pannel = "
		<div class=\"alert alert-$color alert-dismissable\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
            <strong><span class=\"$icon\"></span> $title : </strong>$msg
        </div>";
		return $pannel;
	}

	function getWifi()	{
		global $dirs;
		exec("python3 " . $dirs['scripts'] . "getWifi.py", $return);
		$json = "";
		foreach($return as $value)  {
			$json .= $value;
		}
		$wifiConfig = json_decode($json,true);
		return $wifiConfig;
	}
	function getInterfaces() 	{
		global $dirs;
		exec("python3 " . $dirs['scripts'] . "cpep.py", $return);
		$json = "";
		foreach($return as $value)  {
			$json .= $value;
		}
		$interfaces = json_decode($json,true);
		return $interfaces;
	}
?>
