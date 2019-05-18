<?php

$db_server = '52.29.239.198:3306';
$db_login = 'sql7292274';
$db_pass = 'NZRbqXCmdQ';
$db_name = 'sql7292274';

$con = mysqli_connect($db_server, $db_login, $db_pass);
mysqli_select_db($con, $db_name);