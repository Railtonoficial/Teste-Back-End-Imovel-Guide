<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Corretores</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Cadastro de Corretores</h2>
    <?php if (isset($_GET['status'])): ?>
        <div id="statusMessage" class="alert alert-<?php echo $_GET['status'] == 'success' ? 'success' : 'danger'; ?>">
            <?php echo $_GET['message']; ?>
        </div>
    <?php endif; ?>
    <form action="index.php" method="POST" id="corretorForm">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name">
            <div class="invalid-feedback">Por favor, preencha o nome.</div>
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf">
            <div class="invalid-feedback">Por favor, preencha o CPF.</div>
        </div>
        <div class="form-group">
            <label for="creci">CRECI</label>
            <input type="text" class="form-control" id="creci" name="creci">
            <div class="invalid-feedback">Por favor, preencha o CRECI.</div>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">CRECI</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("SELECT * FROM corretores");
            while ($row = $stmt->fetch()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['cpf']}</td>
                        <td>{$row['creci']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}' class='btn btn-warning'><i class='bi bi-pencil-square'></i></a>
                            <a href='delete.php?id={$row['id']}' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir este corretor?\")'><i class='bi bi-trash'></i></a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="js/form-validation.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
