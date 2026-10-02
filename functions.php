<?php
function e($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function setFlash($message) {
    $_SESSION['flash'] = $message;
}

function pullFlash() {
    $msg = isset($_SESSION['flash']) ? $_SESSION['flash'] : null;
    unset($_SESSION['flash']);
    return $msg;
}

function cartCount($cart) {
    return array_sum(array_map('intval', $cart));
}