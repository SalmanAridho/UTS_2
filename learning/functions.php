<?php


$pdo = new PDO('mysql:host=localhost;dbname=dblearning', 'root', '');

function query($query)
{
    global $pdo;

    $result = $pdo->query($query);
    $rows = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $rows[] = $row;
    }

    return $rows;
};

function add_product($data)
{
    global $pdo;
    $sku = $data["sku"];
    $name = $data["name"];
    $purchase_price = $data["purchase_price"];
    $sell_price = $data["sell_price"];
    $stock = $data["stock"];
    $min_stock = $data["min_stock"];
    $product_type_id = $data["product_type_id"];

    $query = "INSERT INTO product (sku, name, purchase_price, sell_price, stock, min_stock, product_type_id, restock_id)
                VALUES
            ('$sku', '$name', '$purchase_price', '$sell_price', '$stock', '$min_stock', '$product_type_id','1')";

    $pdo->query($query);

    return header("Location: product.php");
}


function edit_product($data)
{
    global $pdo;
    $id = $data["id"];
    $sku = $data["sku"];
    $name = $data["name"];
    $purchase_price = $data["purchase_price"];
    $sell_price = $data["sell_price"];
    $stock = $data["stock"];
    $min_stock = $data["min_stock"];

    $query = "UPDATE product SET
                sku = '$sku',
                name = '$name',
                purchase_price = '$purchase_price',
                sell_price = '$sell_price',
                stock = '$stock',
                min_stock = '$min_stock'
                WHERE id = $id
            ";

    $pdo->query($query);

    return header("Location: product.php");
}

function add_product_type($data)
{
    global $pdo;
    $name = $data["name"];

    $query = "INSERT INTO product_type (name)
                VALUES
            ('$name')";

    $pdo->query($query);

    return header("Location: product-type.php");
}

function edit_product_type($data)
{
    global $pdo;
    $id = $data["id"];
    $name = $data["name"];

    $query = "UPDATE product_type SET
                name = '$name'
                WHERE id = $id
            ";

    $pdo->query($query);

    return header("Location: product-type.php");
}

function add_customer($data)
{
    global $pdo;
    $name = $data["name"];
    $gender = $data["gender"];
    $phone = $data["phone"];
    $email = $data["email"];
    $address = $data["address"];

    $query = "INSERT INTO customer (name, gender,phone,email,address,card_id)
                VALUES
            ('$name', '$gender', '$phone', '$email', '$address', '1')";

    $pdo->query($query);

    return header("Location: customer.php");
}


function edit_customer($data)
{
    global $pdo;
    $id = $data["id"];
    $name = $data["name"];
    $gender = $data["gender"];
    $phone = $data["phone"];
    $email = $data["email"];
    $address = $data["address"];

    $query = "UPDATE customer SET
                name = '$name',
                gender = '$gender',
                phone = '$phone',
                email = '$email',
                address = '$address'
                WHERE id = $id
            ";

    $pdo->query($query);

    return header("Location: customer.php");
}

function edit_order($data)
{
    global $pdo;
    $id = $data["id"];
    $order_number = $data["order_number"];
    $qty = $data["qty"];
    $total_price = $data["total_price"];

    $query = "UPDATE `order` SET
                order_number = '$order_number',
                qty = '$qty',
                total_price = '$total_price'
                WHERE id = $id
            ";
    $pdo->query($query);

    return header("Location: order.php");
}

function checkout($data)
{
    global $pdo;
    $order_number = "PO00" . rand(1, 99);
    $product_id = $data["product_id"];
    $customer_id = $data["customer_id"];
    $qty = $data["qty"];

    $product = query("SELECT * FROM product WHERE id = $product_id")[0];

    $total_price = $product['sell_price'] * $qty;

    $query = "INSERT INTO `order` (order_number, date, qty, total_price, customer_id, product_id)
                VALUES
            ('$order_number', NOW(),  '$qty',$total_price, '$customer_id', '$product_id')";

    $pdo->query($query);

    return header("Location: index.php");
}
