<html>
<head>
	<title>SaleRail PoC | Scraper</title>
	<meta charset="UTF-8">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.28/angular.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>
<body>
<?php
	session_start() ;
  include "functions.php";
  include "simple_html_dom.php";

  ini_set('display_errors','On');
  ScrapeMeta($_POST["URL"]);
//error_reporting(E_ALL);
//require_once 'SimpleScraper.class.php';
//echo $_POST["URL"] . " is the URL";
//try {
//  $scraper = new SimpleScraper($_POST["URL"]);
//  $data = $scraper->getAllData();
//  $response = array(
//    'success' => true,
//    'ogp' => $data['ogp'],
//    'dump' => print_r($data, true)
//  );
//} catch (Exception $e) {
//  $response = array(
//    'success' => false,
//    'message' => 'Something went wrong.',
//    'log' => "$e"
//  );
// }

//echo json_encode($response);

?>
</body>




</html>
