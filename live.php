<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
$DATA = simplexml_load_file("https://raw.githubusercontent.com/J3K/GitHub-REPO/master/live.xml");
$X = null;

 	
$app->get("/:compet/", function ($compet) use ($DATA,$X) {

    foreach($DATA->liveevents as $le){
		if($le["league"] == $compet) $X = $le;
	}


echo "<pre>";
print_r(json_encode(array($X)));
echo "</pre>";

});

$app->get("/:compet/:date", function ($compet,$date) use ($DATA,$X) {

    foreach($DATA->liveevents as $le){
		if($le["league"] == $compet && $le["ut"] == $date) $X = $le;
	}


echo "<pre>";
print_r(json_encode(array($X)));
echo "</pre>";

});







$app->run();


?>