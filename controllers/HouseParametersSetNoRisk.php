<?php

include_once("../models/critical.php");

	critical::houseParametersSetNoRisk();
	
	header("Location:../views/HomePage.php");
?>