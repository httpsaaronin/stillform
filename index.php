
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>STILLFORM — Objects for Everyday</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- NAVIGATION -->
    <nav class="navbar">

        <a href="index.php" class="logo">STILLFORM.</a>

        <div class="nav-links">
            <a href="#collection" class="nav-link">COLLECTION</a>
            <a href="login.php" class="nav-link">ACCOUNT</a>
        </div>

        <button class="cart-button" type="button">
            BAG (<span id="cart-count">0</span>)
        </button>

    </nav>


    <!-- SHOPPING CART -->
    <div class="cart-panel" id="cart-panel">

        <div class="cart-header">
            <h2>Your bag</h2>

            <button id="close-cart" type="button">
                CLOSE ✕
            </button>
        </div>

        <div id="cart-items">
            <p class="empty-cart">Your bag is empty.</p>
        </div>

        <div class="cart-footer">

            <div class="cart-total">
                <span>Total</span>
                <strong id="cart-total">₹0</strong>
            </div>

            <button id="checkout-button" type="button">
                CONTINUE TO CHECKOUT ↗
            </button>

            <p class="cart-message" id="cart-message"></p>

        </div>

    </div>

    <div class="cart-overlay" id="cart-overlay"></div>


    <!-- HERO SECTION -->
    <main class="hero">

        <p class="eyebrow">
            OBJECTS FOR EVERYDAY — 2026
        </p>

        <h1>
            Less noise.<br>
            More meaning.
        </h1>

        <p class="description">
            Everyday essentials, thoughtfully selected.<br>
            Designed to stay. Made to be lived in.
        </p>

        <a href="#collection" class="button">
            EXPLORE COLLECTION ↗
        </a>

        <span class="hero-number">
            01 / STILLFORM
        </span>

    </main>


    <!-- COLLECTION -->
    <section class="collection" id="collection">

        <div class="section-heading reveal">

            <div>
                <p class="eyebrow">
                    THE SELECTION — 001
                </p>

                <h2>Everyday forms.</h2>
            </div>

            <p class="section-note">
                A considered collection of essentials.
            </p>

        </div>


        <!-- PRODUCT GRID -->
        <div class="product-grid">


            <!-- PRODUCT 1: ESSENTIAL TEE -->
            <article class="product-card reveal">

                <a href="product.php?id=essential-tee"
                   class="product-link">

                    <div class="product-image">

                        <img
                            src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=800&q=85"
                            alt="Essential Tee"
                        >

                        <span class="product-tag">
                            01 / ESSENTIAL
                        </span>

                    </div>

                    <div class="product-info">

                        <div>
                            <h3>Essential Tee</h3>
                            <p>Everyday cotton</p>
                        </div>

                        <span class="price">₹999</span>

                    </div>

                </a>

                <button
                    class="add-button"
                    data-name="Essential Tee"
                    data-price="999"
                    type="button">

                    ADD TO BAG +

                </button>

            </article>



            <!-- PRODUCT 2: CLASSIC HOODIE -->
            <article class="product-card reveal">

                <a href="product.php?id=classic-hoodie"
                   class="product-link">

                    <div class="product-image">

                        <img
                            src="https://images.unsplash.com/photo-1556821840-3a63f95609a7?auto=format&fit=crop&w=800&q=85"
                            alt="Classic Hoodie"
                        >

                        <span class="product-tag">
                            02 / COMFORT
                        </span>

                    </div>

                    <div class="product-info">

                        <div>
                            <h3>Classic Hoodie</h3>
                            <p>Relaxed everyday fit</p>
                        </div>

                        <span class="price">₹1,999</span>

                    </div>

                </a>

                <button
                    class="add-button"
                    data-name="Classic Hoodie"
                    data-price="1999"
                    type="button">

                    ADD TO BAG +

                </button>

            </article>



            <!-- PRODUCT 3: EVERYDAY SNEAKER -->
            <article class="product-card reveal">

                <a href="product.php?id=everyday-sneaker"
                   class="product-link">

                    <div class="product-image">

                        <img
                            src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=800&q=85"
                            alt="Everyday Sneaker"
                        >

                        <span class="product-tag">
                            03 / MOVEMENT
                        </span>

                    </div>

                    <div class="product-info">

                        <div>
                            <h3>Everyday Sneaker</h3>
                            <p>Made for the daily rhythm</p>
                        </div>

                        <span class="price">₹2,499</span>

                    </div>

                </a>

                <button
                    class="add-button"
                    data-name="Everyday Sneaker"
                    data-price="2499"
                    type="button">

                    ADD TO BAG +

                </button>

            </article>


        </div>

    </section>


    <!-- FOOTER -->
    <footer class="footer">

        <a href="index.php" class="logo">
            STILLFORM.
        </a>

        <p>LESS, BUT BETTER.</p>

        <p>© 2026 STILLFORM</p>

    </footer>


    <!-- JAVASCRIPT -->
    <script src="script.js"></script>

</body>
</html>
