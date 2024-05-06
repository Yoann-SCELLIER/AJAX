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

    <!-- Script pour la gestion des données du formulaire -->
    <script>
        // Lien API pour l'envoi des données du formulaire
        // API : https://reqres.in/api/users
        // Code Regex : /^[^\s@]+@[^\s@]+\.[^\s@]+$/

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function validateForm(name, email, message) {
            if(!name || !email || !message) {
                alert('Veuillez remplir les champs vide')
                return false;
            }

            if(!isValidEmail(email)) {
                alert('Veuillez remplir une adresse mail valide')
                return false;
            }
            return true;
        }

        document.getElementById('userForm').addEventListener('submit', submitForm);

        function submitForm(event) {
            event.preventDefault();

            const formData = new FormData(event.target);
            const name = formData.get('name');
            const email = formData.get('email');
            const message = formData.get('message');
            const userData = {name, email, message};

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
                return response.json();
            })
            .then(user => {
                console.log('Utilisateur trouvé!', user);
            })
            .catch(error => {
                console.error('Une erreur est survenu...', error);
            })
        }

</script>
</body>
</html>
