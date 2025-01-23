<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $cpf = $_POST['cpf'];
    $creci = $_POST['creci'];

    if (strlen($cpf) == 14 && strlen($creci) >= 2 && strlen($name) >= 2) {
        $stmt = $pdo->prepare("INSERT INTO corretores (name, cpf, creci) VALUES (?, ?, ?)");
        $stmt->execute([$name, $cpf, $creci]);
        header('Location: form.php?status=success&message=Corretor cadastrado com sucesso!');
        exit();
    } else {
        header('Location: form.php?status=error&message=Erro de validação. Verifique os campos.');
        exit();
    }
}
?>
