<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/functions.php';
$products = require __DIR__ . '/data/products.php';
include __DIR__ . '/components/header.php';
?>

<main class="py-4" style="display:flex; flex-direction:column; align-items:center; min-height:70vh; justify-content:center;">
    <h1 class="page-title">Katalog <span>Produk</span></h1>

    <?php if ($flash = pullFlash()): ?>
        <div class="flash" style="width:100%; max-width:600px; text-align:center;">
            <?php echo e($flash); ?>
        </div>
    <?php endif; ?>

    <div class="row g-4" style="justify-content:center; width:100%; max-width:900px;">
        <?php foreach ($products as $id => $p): ?>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center p-4">
                        <h5 class="card-title mb-3"><?php echo e($p['nama']); ?></h5>
                        <p class="price mb-4">Rp <?php echo number_format($p['harga'], 0, ',', '.'); ?></p>

                        <form method="POST" action="actions.php">
                            <input type="hidden" name="action" value="add">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <button type="submit" class="btn btn-primary w-100">
                                Tambah ke Keranjang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include __DIR__ . '/components/footer.php'; ?>