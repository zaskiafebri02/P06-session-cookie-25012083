<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/functions.php';
$products = require __DIR__ . '/data/products.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    // Tambah produk ke keranjang
    if ($action === 'add') {
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        if (isset($products[$id])) {
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]++;
            } else {
                $_SESSION['cart'][$id] = 1;
            }
            setFlash('Produk berhasil ditambahkan ke keranjang!');
        }
        header('Location: index.php');
        exit;
    }

    // Ubah tema
    if ($action === 'set_theme') {
        $theme = isset($_POST['theme']) ? $_POST['theme'] : 'light';
        setcookie('theme', $theme, time() + (365 * 24 * 60 * 60), '/');
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
        header('Location: ' . $referer);
        exit;
    }

    // Hapus produk dari keranjang
    if ($action === 'remove') {
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
            setFlash('Produk dihapus dari keranjang!');
        }
        header('Location: cart.php');
        exit;
    }

    // Kosongkan keranjang
    if ($action === 'clear') {
        $_SESSION['cart'] = array();
        setFlash('Keranjang sudah dikosongkan!');
        header('Location: cart.php');
        exit;
    }
}

header('Location: index.php');
exit;