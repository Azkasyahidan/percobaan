<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aroma Catering 🍽️</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

    .contact{
        min-height:100vh;

        display:grid;
        place-content:center;

        text-align:center;

        background:
        linear-gradient(
            rgba(0,0,0,.65),
            rgba(0,0,0,.65)
        ),
        url('https://images.unsplash.com/photo-1555244162-803834f70033');

        background-size:cover;
        background-position:center;
    }

    .contact h2{
        color:white;
        font-size:42px;
        margin-bottom:10px;
    }

    .contact-subtitle{
        color:#ddd;
        margin-bottom:40px;
        font-size:18px;
    }

    .contact-grid{
        margin-top:60px;

        max-width:1000px;
        margin-left:auto;
        margin-right:auto;
        display:flex;
        justify-content:center;
        gap:25px;
        flex-wrap:wrap;
    }

    .contact-card{
        width:280px;
        padding:30px;

        background:rgba(255,255,255,0.12);
        backdrop-filter:blur(10px);

        border-radius:20px;

        box-shadow:0 5px 20px rgba(0,0,0,.3);

        transition:.3s;
    }

    .contact-card:hover{
        transform:translateY(-10px);
    }

    .contact-card .icon{
        font-size:45px;
        margin-bottom:15px;
    }

    .contact-card h3{
        color:#d8a46d;
        margin-bottom:10px;
    }

    .contact-card p{
        color:white;
        line-height:1.6;
    }

    </style>

</head>
<body>

<header>
    <nav>
        <div class="logo">🍽️ Aroma Catering</div>
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="tentang.php">Tentang</a></li>
            <li><a href="kontak.php" class="active">Kontak</a></li>
        </ul>

        <a href="menu.php" class="btn-nav">
            Pesan Sekarang
        </a>
    </nav>
</header>

<section class="contact">

    <h2>Hubungi Kami</h2>

    <p class="contact-subtitle">
        Kami siap melayani dan menjawab pertanyaan Anda.
    </p>

    <div class="contact-grid">

        <div class="contact-card">
            <div class="icon">📍</div>
            <h3>Alamat</h3>
            <p>
                <a href="https://maps.app.goo.gl/Q8M47MnZHEmj5eeA8" target="_blank">
                Kopi Mbulu
                </a>
            </p>
        </div>

        <div class="contact-card">
            <div class="icon">📞</div>
            <h3>Telepon</h3>
            <p>
                <a href="https://wa.me/6285802756596" target="_blank">
                WhatsApp
                </a>
            </p>
        </div>

        <div class="contact-card">
            <div class="icon">📧</div>
            <h3>Email</h3>
            <p>
                <a href="mailto:kopimbulu@gmail.com">
                kopi_mbulu@gmail.com
                </a>
            </p>
        </div>

    </div>

</section>

<footer>
    <p>© Aroma Catering 🍽️. All Rights Reserved.</p>
</footer>

</body>
</html>