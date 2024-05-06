<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'envoi de données</title>
</head>
<body>
    <h2>Formulaire d'envoi de données</h2>
    <form id="userForm">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Message :</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

        <!-- Ajoute d'autres champs au besoin -->

        <button type="submit">Envoyer</button>
    </form>

    <script>
        
    </script>
</body>
</html>
