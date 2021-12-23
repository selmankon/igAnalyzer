<?php
require("php/updater.php");

clearDBs();
updateAll();
$conn->close();

header("Location: /index.php");
die();

