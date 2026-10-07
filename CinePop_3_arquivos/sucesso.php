<?php
session_start();
if(!isset($_SESSION['pagamento']) || !isset($_SESSION['compra'])){
    header('Location: index.php');
    exit;
}
$compra=$_SESSION['compra'];
unset($_SESSION['pagamento'], $_SESSION['compra']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CinePop | Pagamento concluído</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,Helvetica,sans-serif;background:#f6f6f8;color:#202026;min-height:100vh}.topo{background:#fff;border-bottom:1px solid #eee;box-shadow:0 4px 18px rgba(0,0,0,.07);padding:12px 7%}.logo{width:155px;height:62px;object-fit:contain}.area{width:min(650px,92%);margin:60px auto}.caixa{background:#fff;border:1px solid #e8e8ec;border-radius:22px;padding:45px 35px;text-align:center;box-shadow:0 15px 40px rgba(0,0,0,.09)}.check{width:82px;height:82px;border-radius:50%;background:#198754;color:#fff;font-size:45px;display:flex;align-items:center;justify-content:center;margin:0 auto 25px}.caixa h1{font-size:35px;margin-bottom:12px}.caixa h1 span{color:#b3132b}.caixa p{color:#666;line-height:1.7;margin-bottom:25px}.detalhes{background:#f7f7f9;border-radius:14px;padding:18px;text-align:left;margin-bottom:25px}.detalhes div{display:flex;justify-content:space-between;padding:7px 0}.botao{display:block;background:#b3132b;color:#fff;text-decoration:none;padding:14px;border-radius:11px;font-weight:800}.botao:hover{background:#8f0e21}
</style>
</head>
<body>
<header class="topo"><a href="index.php"><img class="logo" src="logo.png" alt="CinePop"></a></header>
<main class="area"><section class="caixa">
<div class="check">✓</div>
<h1>Pagamento <span>concluído!</span></h1>
<p>Obrigado pela compra, <?=htmlspecialchars($compra['nome'])?>! Seu ingresso foi registrado com sucesso. 🍿</p>
<div class="detalhes">
<div><span>Filme</span><strong><?=htmlspecialchars($compra['nome_filme'])?></strong></div>
<div><span>Quantidade</span><strong><?=$compra['quantidade']?></strong></div>
<div><span>Total</span><strong>R$ <?=number_format($compra['total'],2,',','.')?></strong></div>
</div>
<a class="botao" href="index.php">Voltar para o CinePop</a>
</section></main>
</body>
</html>
