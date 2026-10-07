<?php
session_start();

$filmes = [
    'coracao_selvagem' => ['nome'=>'Coração Selvagem','preco'=>20.00],
    'homem_aranha' => ['nome'=>'Homem-Aranha','preco'=>25.00],
    'vingadores' => ['nome'=>'Vingadores: Ultimato','preco'=>30.00]
];

$erro='';
$mostrarPagamento=false;

if($_SERVER['REQUEST_METHOD']==='POST' && ($_POST['acao']??'')==='comprar'){
    $nome=trim($_POST['nome_cliente']??'');
    $tipo=$_POST['tipo']??'';
    $quantidade=(int)($_POST['quantidade']??0);
    $filme=$_POST['filme']??'';

    if($nome==='') $erro='Digite seu nome.';
    elseif(!isset($filmes[$filme])) $erro='Selecione um filme válido.';
    elseif(!in_array($tipo,['inteira','meia'],true)) $erro='Selecione o tipo de ingresso.';
    elseif($quantidade<1 || $quantidade>20) $erro='A quantidade deve estar entre 1 e 20.';
    else{
        $preco=$filmes[$filme]['preco'];
        if($tipo==='meia') $preco/=2;
        $_SESSION['compra']=[
            'nome'=>$nome,
            'tipo'=>$tipo,
            'quantidade'=>$quantidade,
            'filme'=>$filme,
            'nome_filme'=>$filmes[$filme]['nome'],
            'preco'=>$preco,
            'total'=>$preco*$quantidade
        ];
        $mostrarPagamento=true;
    }
}

if($_SERVER['REQUEST_METHOD']==='POST' && ($_POST['acao']??'')==='pagar'){
    if(!isset($_SESSION['compra'])){header('Location:index.php');exit;}
    $cartao=$_POST['cartao']??'';
    $numero=$_POST['numero_cartao']??'';
    $senha=$_POST['senha']??'';
    if($cartao===''||$numero===''||$senha===''){
        $erro='Preencha todos os dados do pagamento.';
        $mostrarPagamento=true;
    }else{
        $_SESSION['pagamento']=true;
        header('Location: sucesso.php');
        exit;
    }
}

if(isset($_GET['filme']) && isset($filmes[$_GET['filme']])) $filmeSelecionado=$_GET['filme'];
else $filmeSelecionado=$_POST['filme']??'';

$compra=$_SESSION['compra']??null;
if($compra) $mostrarPagamento=true;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CinePop | Comprar ingresso</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,Helvetica,sans-serif;background:#f6f6f8;color:#202026;min-height:100vh}.topo{background:#fff;border-bottom:1px solid #eee;box-shadow:0 4px 18px rgba(0,0,0,.07);padding:12px 7%;display:flex;align-items:center}.logo{width:155px;height:62px;object-fit:contain}.area{width:min(720px,92%);margin:45px auto}.caixa{background:#fff;border:1px solid #e8e8ec;border-radius:20px;padding:32px;box-shadow:0 12px 35px rgba(0,0,0,.09)}h1{font-size:32px;margin-bottom:8px}h1 span{color:#b3132b}.sub{color:#71717b;margin-bottom:25px}.erro{background:#fff0f2;color:#a10d24;border:1px solid #ffc5cd;padding:13px;border-radius:10px;margin-bottom:18px}.campo{margin:18px 0}.campo label.titulo{display:block;font-weight:700;margin-bottom:8px}input[type=text],input[type=number],input[type=password]{width:100%;padding:14px;border:1px solid #d9d9df;border-radius:10px;font-size:16px;outline:none}input:focus{border-color:#b3132b}.opcoes{display:flex;flex-wrap:wrap;gap:10px}.opcoes input{display:none}.opcao{display:inline-block;padding:12px 16px;border:1px solid #ddd;border-radius:10px;background:#fafafa;cursor:pointer}.opcoes input:checked+.opcao{background:#b3132b;border-color:#b3132b;color:#fff}.botao{width:100%;border:0;border-radius:11px;background:#b3132b;color:#fff;padding:14px;font-weight:800;cursor:pointer;text-decoration:none;display:block;text-align:center;margin-top:12px}.botao:hover{background:#8f0e21}.voltar{background:#eee;color:#333}.resumo{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin:22px 0}.info{background:#f7f7f9;border-radius:12px;padding:15px}.info small{display:block;color:#777;margin-bottom:6px}.total{display:flex;justify-content:space-between;background:#fff1f3;padding:18px;border-radius:13px;margin:20px 0}.total strong{font-size:25px;color:#b3132b}@media(max-width:600px){.caixa{padding:22px}.resumo{grid-template-columns:1fr}.logo{width:130px}}
</style>
</head>
<body>
<header class="topo"><a href="index.php"><img class="logo" src="logo.png" alt="CinePop"></a></header>
<main class="area">
<div class="caixa">
<?php if(!$mostrarPagamento): ?>
<h1>Comprar <span>ingresso</span> 🎟️</h1><p class="sub">Preencha os dados para reservar sua sessão.</p>
<?php if($erro): ?><div class="erro"><?=htmlspecialchars($erro)?></div><?php endif; ?>
<form method="post">
<input type="hidden" name="acao" value="comprar">
<div class="campo"><label class="titulo">Seu nome</label><input type="text" name="nome_cliente" required placeholder="Digite seu nome"></div>
<div class="campo"><label class="titulo">Tipo de ingresso</label><div class="opcoes"><label><input type="radio" name="tipo" value="inteira" required><span class="opcao">Inteira</span></label><label><input type="radio" name="tipo" value="meia"><span class="opcao">Meia-entrada</span></label></div></div>
<div class="campo"><label class="titulo">Quantidade</label><input type="number" name="quantidade" min="1" max="20" value="1" required></div>
<div class="campo"><label class="titulo">Filme</label><div class="opcoes">
<?php foreach($filmes as $codigo=>$filme): ?><label><input type="radio" name="filme" value="<?=$codigo?>" <?=($filmeSelecionado===$codigo?'checked':'')?> required><span class="opcao"><?=htmlspecialchars($filme['nome'])?></span></label><?php endforeach; ?>
</div></div>
<button class="botao" type="submit">Continuar para o pagamento →</button>
<a class="botao voltar" href="index.php">← Voltar</a>
</form>
<?php else: ?>
<h1>Resumo da <span>compra</span></h1><p class="sub">Confira seus dados e finalize o pagamento.</p>
<?php if($erro): ?><div class="erro"><?=htmlspecialchars($erro)?></div><?php endif; ?>
<div class="resumo">
<div class="info"><small>Cliente</small><strong><?=htmlspecialchars($compra['nome'])?></strong></div>
<div class="info"><small>Filme</small><strong><?=htmlspecialchars($filmes[$compra['filme']]['nome'])?></strong></div>
<div class="info"><small>Quantidade</small><strong><?=$compra['quantidade']?> ingresso(s)</strong></div>
<div class="info"><small>Tipo</small><strong><?=$compra['tipo']==='meia'?'Meia-entrada':'Inteira'?></strong></div>
</div>
<div class="total"><span>Total</span><strong>R$ <?=number_format($compra['total'],2,',','.')?></strong></div>
<form method="post">
<input type="hidden" name="acao" value="pagar">
<div class="campo"><label class="titulo">Tipo de cartão</label><div class="opcoes"><label><input type="radio" name="cartao" value="mastercard" required><span class="opcao">Mastercard</span></label><label><input type="radio" name="cartao" value="banco_brasil"><span class="opcao">Banco do Brasil</span></label><label><input type="radio" name="cartao" value="santander"><span class="opcao">Santander</span></label></div></div>
<div class="campo"><label class="titulo">Número do cartão</label><input type="text" name="numero_cartao" inputmode="numeric" placeholder="Digite o número do cartão" required></div>
<div class="campo"><label class="titulo">Senha</label><input type="password" name="senha" placeholder="Digite sua senha" required></div>
<button class="botao" type="submit">Confirmar pagamento ✓</button>
<a class="botao voltar" href="index.php">Cancelar compra</a>
</form>
<?php endif; ?>
</div>
</main>
</body>
</html>
