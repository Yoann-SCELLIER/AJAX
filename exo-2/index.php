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

        <!-- Ajoute d'autres champs au besoin -->

        <button type="submit">Envoyer</button>
    </form>

    <script>
        // Ton code JavaScript pour l'exercice sera ici

        document.getElementById('userForm').addEventListener('submit', submitForm);

        function submitForm(event) {
            event.preventDefault();

            const formData = new FormData(event.target);
            const userData = {};
            formData.forEach((value, key) => userData[key] = value);

            fetch('https://reqres.in/api/users', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(userData)
            })
            .then(response => {
                if(!response.ok) {
                    throw new Error('Erreur')
                }
                return response.json()
            })
            .then(user => {
                console.log('Utilisateur trouvé!')
            })
            .catch(error => {
                console.log('Erreur trouvé!')
            });
        }
    </script>
</body>
</html>