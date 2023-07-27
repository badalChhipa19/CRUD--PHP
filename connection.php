<?php
//TODO: Connect with DB
$connect = mysqli_connect('localhost', 'root', '', 'testdb');
if(!$connect) echo 'Connection lost.';

//TODO: Fetching data from DB
$query_for_fetch_data = "SELECT * FROM users";
$result_for_fetch_data = mysqli_query($connect, $query_for_fetch_data);
?>