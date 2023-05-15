<?php
require 'template/header.php';
$customer = query("SELECT * FROM customer");
$product = query("SELECT * FROM product");

if (isset($_POST['checkout'])) {
    if (checkout($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}

?>
<section id="contact" class="contact">

    <div class="container mt-5" data-aos="fade-up">

        <header class="section-header">
            <h2>Checkout</h2>
            <p>Checkout Product</p>
        </header>

        <div class="row gy-4">

            <div class="col-lg-6 mx-auto">
                <form method="post" class="checkout-form">
                    <div class="row gy-4">

                        <div class="col-md-12">
                            <label for="customer" class="form-label">Customer</label>
                            <select class="form-select" name="customer_id" id="customer" required>
                                <option value="">Select Customer</option>
                                <?php foreach ($customer as $c) : ?>
                                    <option value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="product" class="form-label">Product</label>
                            <select class="form-select" name="product_id" id="product" required>
                                <option value="">Select Product</option>
                                <?php foreach ($product as $p) : ?>
                                    <option value="<?= $p['id']; ?>"><?= $p['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-12 ">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="qty" id="quantity" placeholder="Quantity" min="0" required>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" name="checkout">Checkout</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>

    </div>

</section><!-- End Contact Section -->
<?php
require 'template/footer.php';
?>