<?php
$categories = [
    'gaming-laptops' => [
        'name' => 'Gaming laptops',
        'description' => 'Neem je favoriete games overal mee naartoe.',
        'products' => [
            ['Gaming Laptop X1', 1499, 'Krachtige laptop met de nieuwste GPU voor ultieme gaming prestaties.', 'img/laptop.webp', 'Gaming laptop'],
            ['LevelUp Nova 15', 1199, 'Een veelzijdige 15-inch laptop voor je dagelijkse games, studie en entertainment.', 'img/producten/laptop-nova.jpg', 'Gaming laptop met verlicht toetsenbord op een bureau'],
            ['LevelUp Apex 17', 1799, 'Meer overzicht op een ruim 17-inch scherm, ideaal voor lange gamesessies.', 'img/producten/laptop-apex.jpg', 'Gaming laptop van bovenaf gefotografeerd'],
        ],
    ],
    'gaming-pcs' => [
        'name' => 'Gaming pc’s',
        'description' => 'Een krachtige basis voor jouw eigen battlestation.',
        'products' => [
            ['Custom Gaming PC', 1999, 'Op maat gemaakte desktop met topkwaliteit componenten voor maximale snelheid.', 'img/pc.png', 'Custom gaming pc'],
            ['LevelUp Pulse', 999, 'Een toegankelijke desktop voor wie zijn eerste eigen gaming setup samenstelt.', 'img/producten/pc-pulse.jpg', 'Binnenkant van een desktop met zichtbare componenten'],
            ['LevelUp Titan', 2499, 'Een ruime desktop voor veeleisende gamers, met plaats voor toekomstige upgrades.', 'img/producten/pc-titan.jpg', 'Desktop in een behuizing met glazen zijpaneel'],
        ],
    ],
    'monitoren' => [
        'name' => 'Monitoren',
        'description' => 'Geef je games de schermruimte die ze verdienen.',
        'products' => [
            ['LevelUp Vision 27', 279, 'Een 27-inch scherm voor een fijne balans tussen werkruimte en gameplezier.', 'img/producten/monitor-vision.jpg', 'Monitor met toetsenbord en muis op een bureau'],
            ['LevelUp Panorama 34', 499, 'Een breed 34-inch scherm voor meer overzicht in je games en tijdens het multitasken.', 'img/producten/monitor-ultrawide.jpg', 'Gaming setup met meerdere monitoren en rode verlichting'],
        ],
    ],
    'toetsenborden' => [
        'name' => 'Toetsenborden',
        'description' => 'Van een complete toetsenindeling tot een compact bureau.',
        'products' => [
            ['LevelUp Spark RGB', 89, 'Een mechanisch toetsenbord met verlichting voor een opvallende gaming setup.', 'img/producten/keyboard-spark.jpg', 'Detail van een mechanisch toetsenbord met oranje verlichting'],
            ['LevelUp Compact 60', 69, 'Een compact mechanisch toetsenbord dat extra ruimte overlaat voor je muis.', 'img/producten/keyboard-compact.jpg', 'Compact zwart mechanisch toetsenbord'],
        ],
    ],
    'randapparatuur' => [
        'name' => 'Randapparatuur',
        'description' => 'Maak je setup compleet met een muis of headset.',
        'products' => [
            ['Pro Gaming Headset', 199, 'Comfortabele headset met surround sound voor een meeslepende game-ervaring.', 'img/headset.webp', 'Pro gaming headset'],
            ['LevelUp Precision', 59, 'Een lichte gamingmuis met een geperforeerde behuizing voor snelle bewegingen.', 'img/producten/mouse-precision.jpg', 'Zwarte gamingmuis met geperforeerde behuizing'],
            ['LevelUp Echo', 99, 'Een headset voor je favoriete soundtrack, teamoverleg en lange gamesessies.', 'img/producten/headset-echo.jpg', 'Witte headset naast een gamingmuis en toetsenbord'],
        ],
    ],
];

function escapeProductText($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten | LevelUp Hardware</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once "header.php"; ?>
    <main>
        <div class="hero-title">
            <h1>Producten</h1>
            <h2>Voor de Serieuze Gamer</h2>
        </div>
        <p class="catalog-intro">Van je eerste gaming pc tot de finishing touch voor je setup: ontdek onze vijf categorieën.</p>
        <p class="catalog-note">Voorbeeldassortiment met voorbeeldprijzen. De foto's zijn ter illustratie.</p>
        <nav class="product-categories" aria-label="Productcategorieën">
            <?php foreach ($categories as $id => $category): ?>
                <a href="#<?= escapeProductText($id) ?>"><?= escapeProductText($category['name']) ?></a>
            <?php endforeach; ?>
        </nav>

        <?php foreach ($categories as $id => $category): ?>
            <section class="product-category" id="<?= escapeProductText($id) ?>" aria-labelledby="<?= escapeProductText($id) ?>-title">
                <h2 id="<?= escapeProductText($id) ?>-title"><?= escapeProductText($category['name']) ?></h2>
                <p class="category-description"><?= escapeProductText($category['description']) ?></p>
                <div class="products-container">
                    <?php foreach ($category['products'] as [$name, $price, $description, $image, $alt]): ?>
                        <article class="product-kaart">
                            <img src="<?= escapeProductText($image) ?>" alt="<?= escapeProductText($alt) ?>" width="150" height="150" loading="lazy" decoding="async">
                            <div class="product-info">
                                <h3><?= escapeProductText($name) ?></h3>
                                <p class="product-prijs">€ <?= number_format($price, 2, ',', '.') ?></p>
                                <p><?= escapeProductText($description) ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </main>
    <?php require_once "footer.php"; ?>
</body>

</html>
