<?php

//  for security better put thi file outside of this folder like ../
//  This file also establishes a connection to MySQL,
//  selects this database, and sets the encoding.

//  Set the database access information as constants:

DEFINE('DB_USER', 'vladkome_cordel');
DEFINE('DB_PASSWORD', 'DoPsejMatere123!');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'vladkome_019_gfx_d_php_mysql_e_comm');

//  Majke the connection:
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
  or die('Could not connect to the MySQL: database' . mysqli_connect_error());
//  call is preceded by @ in order to supress any ugly errors.
//  Set the encoding...
mysqli_set_charset($dbc, 'utf8');
