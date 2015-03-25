<?php
// PHP code goes here
	ini_set('display_errors', 'On');
	session_start();

	function ScrapeMeta($URL) {

		//now we work out the shop by cleaning up the URL
		//first get rid of the header (secure or unsecure)
		$openers = array("http://", "https://");
		$replacers = array("", "");

		$Domain = str_ireplace($openers, $replacers, $URL);

		$_SESSION["email"] = $_POST["email"];


		//now get rid of the trailing stuff
		//echo strpos($Domain, "/");
		if (strpos($Domain, "/") > "0" ) {
			$Domain = substr($Domain,0, strpos($Domain, "/"));
		}

		// enable user error handling
		libxml_use_internal_errors(true);

		$html = file_get_html($URL);

		//echo $Domain;

		switch ($Domain) {
			case "www.riverisland.com":
				//echo "Lets do the River Island stuff";
				echo "<p>Here's what I'm going to save to your SaleRail from River Island<p>";
				$prices =  $html->find('div[class=price]');
				$currentprice = NULL;
				foreach ($prices as $key) {
					if ($currentprice == NULL) {
						$currentprice = strip_tags($key);
					}
				}
				$currentdate = date("F j, Y, g:i a");
				$titles = $html->find('h1');
				foreach ($titles as $key) {
					$currenttitle = strip_tags($key);
				}
				$images = $html->find('div[class=shotNavNext]');
				foreach ($images as $key) {
					$currentimage = $key;
				}
				echo "The on sale price right now is " . $currentprice . "<p>";
				echo "The Product title is " . $currenttitle . "<p>";
				echo "The date you added it was " . $currentdate;
				$myfile = "riverisland.txt" ;
				$txt = $Domain . ", " . $currentprice . ", " . $currenttitle . ", " . $currentdate . PHP_EOL ;
				file_put_contents($myfile, $txt, FILE_APPEND);
				break;
			case "www.next.co.uk":
				echo "<p>Hi " . $email .  ", here's what I'm going to save to your SaleRail from Next<p>";
				$prices =  $html->find('div[class=Price]');
				foreach ($prices as $key) {
					$currentprice = strip_tags($key);
				}
				$currentdate = date("F j, Y, g:i a");
				$titles = $html->find('div[class=Title]');
				foreach ($titles as $key) {
					$currenttitle = strip_tags($key);
				}
				echo "The on sale price right now is " . $currentprice . "<p>";
				echo "The Product title is " . $currenttitle . "<p>";
				echo "The date you added it was " . $currentdate;
				$myfile = "next.txt";
				$txt = $Domain . ", " . $currentprice . ", " . $currenttitle . ", " . $currentdate . PHP_EOL;
				file_put_contents($myfile, $txt, FILE_APPEND);
				break;
			default:
				echo "Unknown website - need to update settings...";
				break;
		}

		// $doc->getElementByID;


		//$xpath = new DOMXPath($doc);

		//$nodes = $xpath->query('//head/meta');

		//$x = 0;
		//echo $x . "<br>";
		//foreach($nodes as $node) {
    	//	echo $node . "<br>";
    //		$X += 1;
    //		echo $x . "<br>";
	//	}
		//echo "complete";
	}


?>
