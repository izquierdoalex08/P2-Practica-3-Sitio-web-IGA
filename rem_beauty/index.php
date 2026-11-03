<?php require_once "auth.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>r.e.m. beauty — Makeup</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #252536;
            background: #fff;
        }

        .promo {
            text-align: center;
            background: #edf2f8;
            padding: 10px;
            font-size: 13px;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 5;
            background: #fff;
            border-bottom: 1px solid #eee;
            padding: 18px 4%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -2px;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .logo small {
            font-size: 14px;
            letter-spacing: 0;
        }

        .logo span {
            display: block;
            font-size: 11px;
            letter-spacing: 0;
        }

        nav {
            display: flex;
            gap: 22px;
            flex-wrap: wrap;
        }

        .nav-label {
            color: inherit;
            text-decoration: none;
            font-size: 14px;
        }

        .nav-label:hover {
            color: #7896bc;
        }

        /* SECCIÓN HERO (IMAGEN PRINCIPAL MÁS GRANDE) */
        .hero {
            min-height: 550px; /* <- Aumentado a 550px para hacerla más grande */
            padding: 90px 6%;
            display: flex;
            align-items: center;
            background: linear-gradient(rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.4)), 
                        url('https://pbs.twimg.com/media/HTkordJWkAAVz59?format=webp&name=large') no-repeat center center / cover;
            animation: heroAppear 1.1s ease both;
        }

        @keyframes heroAppear { 
            from { opacity: .45; transform: scale(1.025); } 
            to { opacity: 1; transform: scale(1); } 
        }

        .hero div {
            max-width: 480px;
        }

        .hero h1 {
            font-size: clamp(36px, 5.5vw, 64px);
            font-weight: 500;
            margin: 0 0 12px;
        }

        .hero p {
            line-height: 1.5;
            font-size: 16px;
        }

        button, .btn {
            border: 0;
            border-radius: 25px;
            background: #bfd0e4;
            padding: 12px 22px;
            cursor: pointer;
            color: #222;
            font-weight: 600;
            display: inline-block;
            text-decoration: none;
        }

        button:hover, .btn:hover {
            background: #a8bfd9;
        }

        /* TEXTO INTERMEDIO DEBAJO DEL HERO */
        .hero-subtext {
            text-align: center;
            max-width: 700px;
            margin: 50px auto 30px;
            padding: 0 20px;
        }

        .hero-subtext h3 {
            font-size: 22px;
            font-weight: 500;
            color: #385d82;
            margin-bottom: 8px;
            letter-spacing: 1px;
            text-transform: lowercase;
        }

        .hero-subtext p {
            font-size: 15px;
            color: #626271;
            margin: 0;
            line-height: 1.6;
        }

        /* MOSAICO DE CATEGORÍAS (DESPEGADO DE LA IMAGEN) */
        .category-tiles { 
            display: grid; 
            grid-template-columns: repeat(3, 1fr); 
            gap: 15px; /* <- Añadido pequeño espacio entre las imágenes */
            padding: 0 4%; 
            margin-top: 30px; /* <- Despegado del hero/texto superior */
        }

        .category-tile { 
            height: min(48vw, 430px); 
            min-height: 230px; 
            position: relative; 
            overflow: hidden; 
            display: block; 
            background: #e7e7e9; 
            border-radius: 12px; /* Redondeado suave acorde a los cambios */
        }

        .category-tile img { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            transition: transform .8s ease, filter .8s ease; 
        }

        .category-tile:hover img { 
            transform: scale(1.07); 
            filter: brightness(.82); 
        }

        .category-tile span { 
            position: absolute; 
            left: 26px; 
            top: 42%; 
            color: white; 
            font-size: 34px; 
            letter-spacing: 3px; 
            text-shadow: 0 2px 12px rgba(0,0,0,0.5); 
        }

        /* HISTORIA DE MARCA */
        .brand-story { 
            text-align: center; 
            max-width: 820px; 
            margin: 0 auto; 
            padding: 75px 24px; 
        }

        .brand-story .eyebrow { 
            letter-spacing: 3px; 
            font-size: 11px; 
            color: #7896bc; 
        }

        .brand-story h2 { 
            font-size: clamp(28px, 4vw, 42px); 
            font-weight: 500; 
            margin: 12px 0; 
        }

        .brand-story p:not(.eyebrow) { 
            line-height: 1.8; 
            color: #626271; 
        }

        .user-bar { 
            background: #f2f5fa; 
            text-align: right; 
            padding: 8px 4%; 
            font-size: 12px; 
            color: #536e94; 
        }

        .user-bar a { 
            margin-left: 12px; 
            text-decoration: underline; 
        }

        footer {
            text-align: center;
            background: #dce6f1;
            padding: 28px;
            font-size: 13px;
        }

        @media(max-width:850px) {
            header {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media(max-width:650px) { 
            .category-tiles { grid-template-columns: 1fr; gap: 10px; }
            .category-tile { height: 280px; }
            .category-tile span { font-size: 28px; }
            .hero { min-height: 400px; }
        }
    </style>
</head>
<body>

    <div class="promo">✨ regalo especial en compras seleccionadas ✨</div>

    <header>
        <a class="logo" href="index.php">
            r.e.m.<small> beauty</small>
            <span>inspirado en tu brillo</span>
        </a>
        <nav>
            <a class="nav-label" href="new.php">new</a>
            <a class="nav-label" href="best.php">best sellers</a>
            <a class="nav-label" href="eyes.php">eyes</a>
            <a class="nav-label" href="lip.php">lip</a>
            <a class="nav-label" href="face.php">face</a>
            <a class="nav-label" href="cuenta.php">cuenta</a>
        </nav>
    </header>

    <?php if (!empty($_SESSION["usuario"])): ?>
        <div class="user-bar">
            Hola, <?php echo htmlspecialchars($_SESSION["usuario"], ENT_QUOTES, "UTF-8"); ?> · ¡qué gusto tenerte aquí! 
            <a href="salir.php">Cerrar sesión</a>
        </div>
    <?php endif; ?>

    <main>
        <!-- SECCIÓN HERO PRINCIPAL -->
        <section class="hero">
            <div>
                <h1>your everyday encore</h1>
                <p>Color, brillo y creatividad para expresar tu propio estilo. Encuentra tus nuevos favoritos.</p>
                <a class="btn" href="new.php">EXPLORAR</a>
            </div>
        </section>

        <!-- TEXTO INTERMEDIO (PEQUEÑO TEXTO ABAJO DE LA IMAGEN) -->
        <div class="hero-subtext">
            <h3>explora por categoría</h3>
            <p>Descubre fórmulas esenciales diseñadas para iluminar tus ojos, labios y rostro con un acabado único.</p>
        </div>

        <!-- MOSAICO DE CATEGORÍAS -->
        <section class="category-tiles">
            <a class="category-tile tile-eyes" href="eyes.php">
                <img src="https://rembeauty.com/cdn/shop/files/01_liquid-eyeshadow-shimmer-waterproof-starlet-rem-fembot.png?v=1776719015&width=900" alt="Maquillaje para ojos">
                <span>eyes</span>
            </a>
            <a class="category-tile tile-lips" href="lip.php">
                <img src="https://rembeauty.com/cdn/shop/files/01_glossybalmset_488b29e6-eca2-4c98-b4f7-abe11703017e.png?v=1788908350&width=900" alt="Productos para labios">
                <span>lips</span>
            </a>
            <a class="category-tile tile-face" href="face.php">
                <img src="https://rembeauty.com/cdn/shop/files/01_melange_cheeky.png?v=1790105972&width=900" alt="Maquillaje para rostro">
                <span>face</span>
            </a>
        </section>

        <!-- HISTORIA DE MARCA -->
        <section class="brand-story">
            <p class="eyebrow">THE WORLD OF r.e.m. beauty</p>
            <h2>make your own kind of magic</h2>
            <p>r.e.m. beauty es una marca creada para explorar la creatividad, jugar con el color y expresar tu personalidad. Descubre texturas, tonos y productos que acompañan cada una de tus versiones.</p>
            <a class="btn" href="best.php">DESCUBRIR FAVORITOS</a>
        </section>
    </main>

    <footer>
        Izquierdo Gaytan Alexander 5°J · r.e.m. beauty by Ariana Grande
    </footer>

</body>
</html>