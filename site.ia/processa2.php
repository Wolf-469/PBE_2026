<?php
session_start();

$cartao        = $_POST['cartao'] ?? '';
$numero_cartao = $_POST['numero_cartao'] ?? '';

if (empty($cartao) || empty($numero_cartao)) {
    header("Location: view.php");
    exit;
}

require_once "view_relatorio2.php";