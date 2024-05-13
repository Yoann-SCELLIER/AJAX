<?php
// Connexion à la base de données
$mysqli = new mysqli('localhost', 'utilisateur', 'mot_de_passe', 'crud_ajax');

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion à la base de données: " . $mysqli->connect_error);
}

// Supposons que vous ayez déjà reçu les données du formulaire
$nom = $_POST['nom'];
$email = $_POST['email'];

// Insérer les données dans la base de données
$query = "INSERT INTO users (nom, email) VALUES ('$nom', '$email')";
if ($mysqli->query($query) === TRUE) {
    $id = $mysqli->insert_id; // Récupérer l'ID auto-incrémenté de la nouvelle entrée
    $response = array('status' => 'success', 'id' => $id, 'message' => 'Entrée créée avec succès');
    echo json_encode($response); // Renvoyer une réponse JSON avec le statut de succès et l'ID de l'entrée
} else {
    $response = array('status' => 'error', 'message' => 'Erreur lors de la création de l\'entrée: ' . $mysqli->error);
    echo json_encode($response); // Renvoyer une réponse JSON avec le statut d'erreur et un message d'erreur détaillé
}

// Fermer la connexion à la base de données
$mysqli->close();
?>
