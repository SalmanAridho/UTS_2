<?php

require_once "../../../functions.php";

$id = $_GET['id'];

$pdo->query("DELETE FROM product_type WHERE id = $id");

return header("Location: product-type.php");
