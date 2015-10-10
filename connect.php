<?php

function connectDataB($database) {
    mysql_connect('localhost', 'root') or die(mysql_error());
    mysql_select_db($database) or die("Can't connect to database");
}

connectDataB('first_db');
?>