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
    // Lien API pour exercice : https://reqres.in/api/users

    // création d'un écouteur d'événement sur l'ID du formulaire sur le bouton "submit" nommé en "submitForm" pour la fonction
    document.getElementById('userForm').addEventListener('submit', submitForm);

    // création d'une fonction qui reprend le nommage "submitForm"
    function submitForm(event) {

        // Empêche le comportement par défaut de soumission du formulaire (rechargement de la page)
        event.preventDefault();

        // Création de constantes pour récupérer les valeurs des champs de formulaire
        const formData = new FormData(event.target);
        const name = formData.get('name');
        const email = formData.get('email');
        const message = formData.get('message');
        const userData = {name, email, message};

        // Vérification si les champs "nom", "email", "message" sont vides
        if(!name || !email || !message) {

            // Affichage d'une alerte si les champs sont vides
            alert('Champs vide, veuillez les remplirs!');
            return;
        }

        // Envoi d'une requête POST vers le lien API spécifié
        fetch('https://reqres.in/api/users', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(userData) 
        })

        // Gestion de la réponse de la requête
        .then(response => {
            if(!response.ok) {
                throw new Error('Erreur');
            }
            return response.json();
        })

        // Affichage d'un message lorsque l'utilisateur est trouvé
        .then(user => {
            console.log('Utilisateur trouvé');
        })

        // Capture et affichage des erreurs
        .catch(error => {
            console.log('Erreur en cours...');
        });
    }
</script>

</body>
</html>
