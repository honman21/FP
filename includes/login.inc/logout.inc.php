<?php

session_start();
session_unset();
session_destroy();

header ("location: ../../demo/index.php");
exit();