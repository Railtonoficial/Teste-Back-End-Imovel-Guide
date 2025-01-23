<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM corretores WHERE id = ?");
$stmt->execute([$id]);
$corretor = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $cpf = $_POST['cpf'];
    $creci = $_POST['creci'];

    if (strlen($cpf) == 14 && strlen($creci) >= 2 && strlen($name) >= 2) {
        $stmt = $pdo->prepare("UPDATE corretores SET name = ?, cpf = ?, creci = ? WHERE id = ?");
        $stmt->execute([$name, $cpf, $creci, $id]);
        header('Location: form.php?status=success&message=Corretor atualizado com sucesso!');
        exit();
    } else {
        header('Location: edit.php?id=' . $id . '&status=error&message=Erro de validação. Verifique os campos.');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Corretor</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Editar Corretor</h2>
    <?php if (isset($_GET['status'])): ?>
        <div class="alert alert-<?php echo $_GET['status'] == 'success' ? 'success' : 'danger'; ?>">
            <?php echo $_GET['message']; ?>
        </div>
    <?php endif; ?>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST" id="corretorForm">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $corretor['name']; ?>">
            <div class="invalid-feedback">Por favor, preencha o nome.</div>
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $corretor['cpf']; ?>">
            <div class="invalid-feedback">Por favor, preencha o CPF.</div>
        </div>
        <div class="form-group">
            <label for="creci">CRECI</label>
            <input type="text" class="form-control" id="creci" name="creci" value="<?php echo $corretor['creci']; ?>">
            <div class="invalid-feedback">Por favor, preencha o CRECI.</div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="js/form-validation.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.amazonaws.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
