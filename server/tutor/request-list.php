<?php
require_once '../db-connect.php';
$peer_id = $_POST['peer_id'];

// get the schedule id and tutee id from post
$sql = "SELECT * FROM tbl_schedule WHERE peer_id = $peer_id";
$result = mysqli_query($conn, $sql);

