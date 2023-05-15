<?php
// create edit product php
require_once "../../layout/header.php";
$id = $_GET['id'];
$product = query("SELECT * FROM product WHERE id = $id")[0];


if (isset($_POST['edit'])) {
    edit_product($_POST);
}

?>

<div class="row-cols-md-2">
    <div class="container mb-5">
        <div class="card">
            <div class="container-fluid px-5 py-2">
                <h2 class="py-4 text-center">Edit Product</h2>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $product['id']; ?>">
                    <div class="mb-3">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku" value="<?= $product['sku']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Product</label>
                        <input type="text" class="form-control" id="nama" name="name" value="<?= $product['name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="purchase_price" class="form-label">Purchase Price</label>
                        <input type="number" class="form-control" id="purchase_price" name="purchase_price" value="<?= $product['purchase_price']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="sell_price" class="form-label">Sell Price</label>
                        <input type="number" class="form-control" id="sell_price" name="sell_price" value="<?= $product['sell_price']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="<?= $product['stock']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="min_stock" class="form-label">Min Stock</label>
                        <input type="number" class="form-control" id="min_stock" name="min_stock" value="<?= $product['min_stock']; ?>" required>
                    </div>

                    <div class="modal-footer my-4">
                        <a href="product.php?title=Product" type="button" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-dark ms-2" name="edit">Edit Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once "../../layout/footer.php";
?>