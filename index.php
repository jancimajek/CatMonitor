<?php

require_once './CatConfig.php';
require_once './CatMonitor.php';

$catMonitor = new CatMonitor(new CatConfig());
$catMonitor->routeCat(isset ($_GET['doCat']) ? $_GET['doCat'] : '');