<?php
require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../functions.php';
$products = require __DIR__ . '/../data/products.php';

$allowedThemes = array('light', 'dark');
$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light';
if (!in_array($theme, $allowedThemes)) {
    $theme = 'light';
}
?>
<!DOCTYPE html>
<html lang="id" data-theme="<?php echo $theme; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokoKita - Keranjang Belanja</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --bg: #f8f9fa;
            --text: #212529;
            --card: #ffffff;
            --primary: #2563eb;
            --secondary: #64748b;
            --success: #10b981;
        }

        [data-theme="dark"] {
            --bg: #0f172a;
            --text: #f1f5f9;
            --card: #1e293b;
            --primary: #3b82f6;
            --secondary: #94a3b8;
            --success: #34d399;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: var(--card);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 16px 0;
        }

        .navbar-brand {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--primary) !important;
        }

        .nav-link {
            font-weight: 600;
            color: var(--text) !important;
            margin-right: 20px;
        }

        .nav-link:hover {
            color: var(--primary) !important;
        }

        .badge {
            background-color: var(--primary);
            font-size: 0.75rem;
            padding: 6px 10px;
            border-radius: 20px;
        }

        .theme-select {
            border-radius: 12px;
            padding: 8px 12px;
            border: 1px solid var(--secondary);
            background-color: var(--card);
            color: var(--text);
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 30px;
            text-align: center;
        }

        .page-title span {
            color: var(--primary);
        }

        .card {
            background-color: var(--card);
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(37, 99, 235, 0.15);
        }

        .price {
            color: var(--primary);
            font-size: 1.5rem;
            font-weight: 800;
        }

        .btn-primary {
            background-color: var(--primary);
            border: none;
            border-radius: 12px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
            transform: scale(1.05);
        }

        .flash {
            background-color: #dcfce7;
            color: #166534;
            border-radius: 12px;
            padding: 12px 20px;
            margin-bottom: 24px;
            text-align: center;
        }

        [data-theme="dark"] .flash {
            background-color: #14532d;
            color: #bbf7d0;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px 15px;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="container d-flex flex-wrap align-items-center justify-content-between">
        <a class="navbar-brand" href="index.php">TokoKita</a>

        <div class="d-flex align-items-center">
            <a class="nav-link" href="index.php">Katalog</a>
            <a class="nav-link" href="cart.php">
                Keranjang
                <span class="badge"><?php echo cartCount($_SESSION['cart']); ?></span>
            </a>

            <form method="POST" action="actions.php" class="ms-3">
                <select name="theme" onchange="this.form.submit()" class="theme-select">
                    <option value="light" <?php echo $theme === 'light' ? 'selected' : ''; ?>>☀️ Terang</option>
                    <option value="dark" <?php echo $theme === 'dark' ? 'selected' : ''; ?>>🌙 Gelap</option>
                </select>
                <input type="hidden" name="action" value="set_theme">
            </form>
        </div>
    </div>
</nav>

<main>