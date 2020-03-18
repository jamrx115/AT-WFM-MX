<?php

if (!session_id()){
	@ session_start();
}

if (isset($_SESSION['AT-WFM-MX-AUTH'])) {
	unset($_SESSION['AT-WFM-MX-AUTH']);
}

header("Location: login.html");

