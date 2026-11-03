<?php require_once "auth.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>r.e.m. beauty — New</title>
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

        section {
            padding: 35px 4%;
        }

        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .section-title h2 {
            font-weight: 500;
            text-transform: lowercase;
            font-size: 28px;
            margin: 0 0 18px;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        .product {
            min-width: 0;
        }

        .photo {
            height: 245px;
            background: #e9e9eb;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .photo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .details {
            padding: 10px 2px;
        }

        .rating {
            font-size: 12px;
            color: #555;
        }

        .name {
            font-weight: 600;
            font-size: 14px;
            margin: 5px 0;
        }

        .price {
            font-size: 13px;
        }

        .product button {
            width: 100%;
            margin-top: 10px;
            font-size: 12px;
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
            margin-top: 40px;
        }

        @media(max-width:850px) {
            header {
                align-items: flex-start;
                flex-direction: column;
            }
            .products {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
            .photo {
                height: 210px;
            }
        }

        @media(max-width:460px) {
            nav {
                gap: 12px;
                font-size: 13px;
            }
            .products {
                gap: 10px;
            }
            .photo {
                height: 160px;
            }
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
        <section id="sec-new">
            <div class="section-title">
                <h2>new</h2>
                <span>✦ colección ✦</span>
            </div>
            <div class="products">
                <article class="product">
                    <div class="photo">
                        <img src="https://rembeauty.com/cdn/shop/files/petal_kit_main_image.png?v=1791489716&width=433&height=506&crop=center" alt="petal kit">
                    </div>
                    <div class="details">
                        <div class="rating">★★★★★ <span>5.0</span></div>
                        <div class="name">petal kit</div>
                        <div class="price">$80 USD</div>
                        <button type="button">AÑADIR AL CARRITO</button>
                    </div>
                </article>

                <article class="product">
                    <div class="photo">
                        <img src="https://rembeauty.com/cdn/shop/files/01_prima.png?v=1788907435&width=433&height=506&crop=center" alt="the prima palette">
                    </div>
                    <div class="details">
                        <div class="rating">★★★★★ <span>5.0</span></div>
                        <div class="name">the prima palette</div>
                        <div class="price">$44 USD</div>
                        <button type="button">AÑADIR AL CARRITO</button>
                    </div>
                </article>

                <article class="product">
                    <div class="photo">
                        <img src="https://rembeauty.com/cdn/shop/files/01_glossybalmset_488b29e6-eca2-4c98-b4f7-abe11703017e.png?v=1788908350&width=433&height=506&crop=center" alt="glossy balm set">
                    </div>
                    <div class="details">
                        <div class="rating">★★★★★ <span>4.8</span></div>
                        <div class="name">the gloss barre mini glossy balm set</div>
                        <div class="price">$26 USD</div>
                        <button type="button">AÑADIR AL CARRITO</button>
                    </div>
                </article>

                <article class="product">
                    <div class="photo">
                        <img src="https://rembeauty.com/cdn/shop/files/01_lipmask.png?v=1790102322&width=433&height=506&crop=center" alt="satin slumber lip mask">
                    </div>
                    <div class="details">
                        <div class="rating">★★★★★ <span>5.0</span></div>
                        <div class="name">satin slumber lip mask</div>
                        <div class="price">$26 USD</div>
                        <button type="button">AÑADIR AL CARRITO</button>
                    </div>
                </article>

                <article class="product">
                    <div class="photo">
                        <img src="https://rembeauty.com/cdn/shop/files/01_singlet_velvetetoile.png?v=1788908275&width=433&height=506&crop=center" alt="sweet dreams eyeshadow singlet">
                    </div>
                    <div class="details">
                        <div class="rating">★★★★★ <span>4.9</span></div>
                        <div class="name">sweet dreams eyeshadow singlet</div>
                        <div class="price">$24 USD</div>
                        <button type="button">AÑADIR AL CARRITO</button>
                    </div>
                </article>

                <article class="product">
                    <div class="photo">
                        <img src="https://rembeauty.com/cdn/shop/files/01_blushpalette_2341ea72-2ba9-442f-abe1-2f8470a60139.png?v=1790103471&width=433&height=506&crop=center" alt="blush palette">
                    </div>
                    <div class="details">
                        <div class="rating">★★★★★ <span>5.0</span></div>
                        <div class="name">ballet rosé blush palette</div>
                        <div class="price">$42 USD</div>
                        <button type="button">AÑADIR AL CARRITO</button>
                    </div>
                </article>

                <article class="product">
                    <div class="photo">
                        <img src="https://rembeauty.com/cdn/shop/files/01_frost_flutter.png?v=1790103584&width=433&height=506&crop=center" alt="eye makeup set">
                    </div>
                    <div class="details">
                        <div class="rating">★★★★★ <span>5.0</span></div>
                        <div class="name">frost & flutter eye makeup set</div>
                        <div class="price">$29 USD</div>
                        <button type="button">AÑADIR AL CARRITO</button>
                    </div>
                </article>

                <article class="product">
                    <div class="photo">
                        <img src="https://rembeauty.com/cdn/shop/files/01_melange_cheeky.png?v=1790105972&width=433&height=506&crop=center" alt="highlight stick">
                    </div>
                    <div class="details">
                        <div class="rating">★★★★★ <span>4.7</span></div>
                        <div class="name">mélangue á trois blush & highlight stick</div>
                        <div class="price">$29 USD</div>
                        <button type="button">AÑADIR AL CARRITO</button>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <footer class="account-footer">
        Izquierdo Gaytan Alexander 5°J · r.e.m. beauty by Ariana Grande
    </footer>

</body>
</html>