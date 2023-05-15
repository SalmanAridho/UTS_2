<?php

require '../../../functions.php';

$id = $_GET['id'];

$pdo->query("DELETE FROM `order` WHERE id = $id");

return header("Location: order.php");
