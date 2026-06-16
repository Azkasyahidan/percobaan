<?php
include 'koneksi.php';

$data = mysqli_query(
    $conn,
    "SELECT * FROM menu_makanan"
);
?>

<!DOCTYPE html>

<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Aroma Catering</title>

<link rel="stylesheet"
href="assets/css/style.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<div class="container">

```
<div class="header">

    <h2>🍽 Aroma Catering</h2>

    <p>Makanan Lezat Untuk Semua Acara</p>

</div>

<!-- SEARCH MENU -->
<input
type="text"
id="searchMenu"
class="search-box"
placeholder="Cari menu...">

<!-- DAFTAR MENU -->
<?php while($menu = mysqli_fetch_assoc($data)){ ?>

    <div class="menu-card">

        <img
        src="assets/img/menu1.jpg"
        alt="Menu">

        <h3>
            <?= $menu['nama_menu']; ?>
        </h3>

        <p>
            Rp <?= number_format($menu['harga']); ?>
        </p>

        <a
        class="btn"
        href="user/pesanan.php?id=<?= $menu['id']; ?>">
            Pesan
        </a>

    </div>

<?php } ?>
```

</div>

<!-- AI ASSISTANT -->

<div id="chat-widget">

```
<div id="chat-header">

    🤖 Aroma AI

</div>

<div id="chat-body">

    <div id="chat-content">

        <div class="ai-msg">
            Halo 👋 Saya Aroma AI.
            Silakan tanyakan menu catering.
        </div>

    </div>

    <input
    type="text"
    id="chat-input"
    placeholder="Tanyakan menu...">

    <button onclick="kirimAI()">
        Kirim
    </button>

</div>
```

</div>

<script src="assets/js/script.js"></script>

</body>
</html>
