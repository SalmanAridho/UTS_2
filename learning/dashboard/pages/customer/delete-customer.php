<?php

require '../../../functions.php';

$id = $_GET['id'];

$pdo->query("DELETE FROM customer WHERE id = $id");

return header("Location: customer.php");
