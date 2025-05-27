<?php include('header.php'); ?>

<?php
$data_nascimento = $_POST['data_nascimento'] ?? '';
$signos = simplexml_load_file("signos.xml");

$signo_encontrado = false;

if ($data_nascimento) {
    list($ano, $mes, $dia) = explode('-', $data_nascimento);

    foreach ($signos->signo as $signo) {
        $inicio = DateTime::createFromFormat('d/m/Y', $signo->dataInicio . "/$ano");
        $fim = DateTime::createFromFormat('d/m/Y', $signo->dataFim . "/$ano");

        // Ajusta se o signo cruza o ano (ex: Capricórnio)
        if ($fim < $inicio) {
         $fim->modify('+1 year');
        }

        $data = DateTime::createFromFormat('Y-m-d', $data_nascimento);

        if ($data >= $inicio && $data <= $fim) {
            $signo_encontrado = $signo; // aqui você armazena um objeto
            break;
        }
    }
}
?>


<?php if (isset($signo_encontrado) && $signo_encontrado): ?>
  <h2 class="text-center">Seu signo é: </h2>
  <img src="<?= $signo_encontrado->imagem ?>" alt="<?= $signo_encontrado->nome ?>" class="img-fluid mx-auto d-block">
  <h1><?= $signo_encontrado->nome ?></h1>
  <p class="text-center">Período: <?= $signo_encontrado->dataInicio ?> a <?= $signo_encontrado->dataFim ?></p>
  <p class="text-center"><?= $signo_encontrado->descricao ?></p>
<?php else: ?>
  <h2 class="text-center text-danger">Data inválida ou signo não encontrado!</h2>
<?php endif; ?>

<div class="text-center mt-4">
  <a href="index.php" class="btn btn-secondary">Voltar</a>
</div>
