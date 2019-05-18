<?php

$db_server = 'sql207.epizy.com';
$db_login = 'epiz_23926542';
$db_pass = 'LHDeXfeksopSr';
$db_name = 'epiz_23926542_flatron';

$con = mysqli_connect($db_server, $db_login, $db_pass);
mysqli_select_db($con, $db_name);