<?php
require 'template/header.php';
$product = query("SELECT product.*,product_type.name as product_type_name FROM product INNER JOIN product_type ON product.product_type_id = product_type.id");
?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">For training to succeed, you need the best learning tool</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">FlexStart comes with all the tools you need, ready to go, right out of the box.</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <a href="#product" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Let's Shopping</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="assets/img/hero-img.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->


<!-- ======= Portfolio Section ======= -->
<section id="product" class="portfolio">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Product</h2>
            <p>Check our Featured Product</p>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <?php foreach ($product as $p) : ?>
                        <li data-filter=".<?= explode(" ", $p['product_type_name'])[0]; ?>"><?= $p['product_type_name']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <?php foreach ($product as $p) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item <?= explode(" ", $p['product_type_name'])[0]; ?>">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-<?= rand(1, 9) ?>.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $p['name']; ?></h4>
                            <p><?= $p['product_type_name']; ?></p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?= $p['name'] . "<br> Stock :" . $p["stock"] . "<br> Price :" . $p["sell_price"]; ?>"><i class="bi bi-info-lg"></i></a>
                                <a href="checkout.php" title="Checkout"><i class="bi bi-cart-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>

</section><!-- End Portfolio Section -->


<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Contact</h2>
            <p>Contact Us</p>
        </header>

        <div class="row gy-4">

            <div class="col-lg-6">

                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <p>Depok, Jawa Barat<br>Indonesia</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-telephone"></i>
                            <h3>Call Us</h3>
                            <p>+62 (21) 500-600<br>+62 (21) 500-400</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-envelope"></i>
                            <h3>Email Us</h3>
                            <p>info@example.com<br>contact@example.com</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-clock"></i>
                            <h3>Open Hours</h3>
                            <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <form action="" method="post" class="checkout-form">
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>

                        <div class="col-md-6 ">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                        </div>

                        <div class="col-md-12 text-center">

                            <button type="submit">Send Message</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>

    </div>

</section><!-- End Contact Section -->

<?php
require_once 'template/footer.php';
?>