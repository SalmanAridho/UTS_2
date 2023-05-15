<?php

require_once "../../../functions.php";

$id = $_GET['id'];

$query = "DELETE FROM product WHERE id = $id";

$pdo->query($query);

return header("Location: product.php");
