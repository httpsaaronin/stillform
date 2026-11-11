

<?php
$products = [
    'essential-tee' => [
        'name' => 'Essential Tee',
        'price' => 999,
        'description' => 'A timeless everyday essential, designed with simplicity and comfort in mind.',
'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=800&q=85',
        'sizes' => ['S', 'M', 'L', 'XL']
    ],

    'classic-hoodie' => [
        'name' => 'Classic Hoodie',
        'price' => 1999,
        'description' => 'A relaxed everyday fit with comfort and understated style.',
        'image' => 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?auto=format&fit=crop&w=800&q=85',
        'sizes' => ['S', 'M', 'L', 'XL']
    ],

    'everyday-sneaker' => [
        'name' => 'Everyday Sneaker',
        'price' => 2499,
        'description' => 'Made for the daily rhythm with a clean everyday design.',
      'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=800&q=85',
        'sizes' => ['6', '7', '8', '9', '10']
    ]
];

$id = $_GET['id'] ?? 'essential-tee';
$product = $products[$id] ?? $products['essential-tee'];

$name = $product['name'];
$price = $product['price'];
$description = $product['description'];
$image = $product['image'];
$sizes = $product['sizes'];
?>

<?php
$products = [
    'essential-tee' => [
        'name' => 'Essential Tee',
        'price' => 999,
        'description' => 'A timeless everyday essential, designed with simplicity and comfort in mind.',
        'image' => 'images/essential-tee.jpg'
    ],
    'relaxed-shirt' => [
        'name' => 'Relaxed Shirt',
        'price' => 1499,
        'description' => 'A relaxed silhouette for effortless everyday wear.',
        'image' => 'images/relaxed-shirt.jpg'
    ],
    'everyday-pants' => [
        'name' => 'Everyday Pants',
        'price' => 1799,
        'description' => 'Clean lines and everyday comfort in a versatile design.',
        'image' => 'images/everyday-pants.jpg'
    ],
    'minimal-hoodie' => [
        'name' => 'Minimal Hoodie',
        'price' => 1999,
        'description' => 'A comfortable layer with a clean, understated look.',
        'image' => 'images/minimal-hoodie.jpg'
    ]
];

$id = $_GET['id'] ?? 'essential-tee';
$product = $products[$id] ?? $products['essential-tee'];

$name = $product['name'];
$price = $product['price'];
$description = $product['description'];
$image = $product['image'];
?>

<?php
$products = [
    'essential-tee' => [
        'name' => 'Essential Tee',
        'price' => 999,
        'description' => 'A timeless everyday essential, designed with simplicity and comfort in mind.',
        'image' => 'images/essential-tee.jpg'
    ],
    'relaxed-shirt' => [
        'name' => 'Relaxed Shirt',
        'price' => 1499,
        'description' => 'A relaxed silhouette for effortless everyday wear.',
        'image' => 'images/relaxed-shirt.jpg'
    ],
    'everyday-pants' => [
        'name' => 'Everyday Pants',
        'price' => 1799,
        'description' => 'Clean lines and everyday comfort in a versatile design.',
        'image' => 'images/everyday-pants.jpg'
    ],
    'minimal-hoodie' => [
        'name' => 'Minimal Hoodie',
        'price' => 1999,
        'description' => 'A comfortable layer with a clean, understated look.',
        'image' => 'images/minimal-hoodie.jpg'
    ]
];

$id = $_GET['id'] ?? 'essential-tee';
$product = $products[$id] ?? $products['essential-tee'];

$name = $product['name'];
$price = $product['price'];
$description = $product['description'];
$image = $product['image'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($name); ?> | STILLFORM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="product-page">

    <nav class="navbar">
        <a href="index.php" class="logo">STILLFORM</a>
        <a href="index.php" class="back-link">Back to shop</a>
    </nav>

    <main class="product-detail">
        <div class="product-detail-image">
           <img
    src="<?php echo htmlspecialchars($image); ?>"
    alt="<?php echo htmlspecialchars($name); ?>"
>
        </div>

        <section class="product-detail-info">
            <p class="eyebrow">STILLFORM ESSENTIALS</p>

            <h1><?php echo htmlspecialchars($name); ?></h1>

            <p class="detail-price">
                ₹<?php echo number_format($price); ?>
            </p>

            <p class="detail-description">
                <?php echo htmlspecialchars($description); ?>
            </p>

            <label for="size">Choose size</label>
            <select id="size">
                <option value="S">Small</option>
                <option value="M">Medium</option>
                <option value="L">Large</option>
                <option value="XL">Extra Large</option>
            </select>
            
<label for="quantity">Quantity</label>

<select id="quantity">
    <option value="1">1 No.</option>
    <option value="2">2 Nos.</option>
    <option value="3">3 Nos.</option>
    <option value="4">4 Nos.</option>
    <option value="5">5 Nos.</option>
</select>


   <button
    class="add-button"
    data-name="<?php echo htmlspecialchars($product['name']); ?>"
    data-price="<?php echo $product['price']; ?>"
    type="button">
    ADD TO BAG +
</button>
            <p class="size-note">
                Minimal design. Everyday essentials.
            </p>
        </section>
    </main>

    <script src="script.js"></script>
    <script src="script.js"></script>
</body>
</html>
