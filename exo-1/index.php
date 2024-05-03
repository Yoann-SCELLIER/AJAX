<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AJAX Fetch Example</title>
</head>

<body>
  <button id="fetchData">Fetch Data</button>

  <script>
    // Écris ton code JavaScript ici

    // utilisation de getElementById qui récupére l'ID (fetchData) du "button".
    // addEventListener pour créer un évenement d'écoute au "click" qui redirigera à la fonction suivante nommé "fetchData"
    document.getElementById('fetchData').addEventListener('click', fetchData);

    // création d'une "function" qui récupére la préparation de l'événement au click nommé plus haut "fetchData".
    function fetchData() {

      // utilisation fetch pour l'envoi en "GET" vers le fichier JSON ou lien
      fetch('https://jsonplaceholder.typicode.com/users')

        // on utilise ".then" avec le paramêtre "response" fléché.
        .then(response => {

          // "si", on vérifie en paramétre avec "!" pour voir si la réponse et mauvaise
          if (!response.ok) {

            // "throw new Error" qui prépare le message d'erreur.
            throw new Error('Erreur de récupération des données.');
          }

          // je "return" la réponse si toute est bon
          return response.json();
        })

        // affiche avec ".then" en console.log la réponse
        .then(users => {
          console.log('Utilisateur trouvé :', users);
        })

        // affiche avec ".catch" l'erreur capturé et afficher avecc le console.log
        .catch(error => {
          console.log('Erreur!', error);
        })
    }
  </script>

</body>

</html>