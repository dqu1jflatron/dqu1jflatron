<?php

session_start();

$db_server = 'sql7.freemysqlhosting.net';
$db_login = 'sql7292274';
$db_pass = 'NZRbqXCmdQ';
$db_name = 'sql7292274';

include_once('/lib/rb-mysql.php');
R::setup( 'mysql:host=sql7.freemysqlhosting.net;dbname=sql7292274', 'sql7292274', 'NZRbqXCmdQ' );
$con = mysqli_connect($db_server, $db_login, $db_pass, $db_name);
mysqli_query($con, "SET NAMES UTF8");