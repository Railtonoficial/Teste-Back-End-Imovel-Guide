<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM corretores WHERE id = ?");
$stmt->execute([$id]);

header('Location: form.php?status=success&message=Corretor excluído com sucesso!');
exit();
?>
