<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'envoi de données</title>
    <link rel="stylesheet" href="styles.css"> 
    <!-- Ajout du lien CSS pour les couleurs de validation ou de inavlidation du formulaire --> 
</head>
<body>
    <h2>Formulaire d'envoi de données</h2>

    <!-- Début du formulaire -->
    <form id="userForm">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Message :</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
        <!-- Ajout de "requried" en fin de l'input et textarea pour signaler que le champ dois être rempli. -->

        <button type="submit">Envoyer</button>
    </form>
    <!-- Fin du Formulaire -->

    <!-- Emplacement pour le script -->
    <script>
        // API : https://reqres.in/api/users
        // Code Regex : /^[^\s@]+@[^\s@]+\.[^\s@]+$/

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
            return emailRegex.test(email);
        }

        function validateForm(name, email, message) {
            if(!name || !email || !message) {
                alert('Une erreur est survenue, veuillez remplir les champs du formulaire.')
                return false;
            }

            if(!isValidEmail(email)) {
                alert('Attention email invalide.')
                return false;
            }

            if(name.length > 50) {
                alert('Attention votre nom dépasse les 50 caractères.')
                return false;
            }

            if(message.length > 500) {
                alert('Attention votre message dépasse les 500 caractères.')
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

            if(!validateForm(name, email, message)){
                return false;
            }

            fetch('https://reqres.in/api/users', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(userData)
            })
            .then(response => {
                if(!response.ok) {
                    throw new Error('Une erreur est survenue!')
                }
                return response.json();
            })
            .then(user => {
                alert('Vous avez bien était enregistrer!')
                console.log('Utilisateur enregistrer.');
            })
            .catch(error => {
                alert('Vous avez une erreur dans l\'un des champs du formulaire.')
                console.error('Erreur formulaire.');
            })
        }
    </script>
</body>
</html>
