<?php
// Supposant que vous avez un script PHP pour gérer la création de nouvelles entrées
$nom = $_POST['nom'];
$email = $_POST['email'];

// Ici, vous inséreriez les données dans votre base de données
// Pour l'exemple, nous allons simplement retourner un message de succès
$response = array('status' => 'success', 'message' => 'Entrée créée avec succès');
echo json_encode($response);
?>
