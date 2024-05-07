<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Exercise</title>
</head>

<body>
    <h2>Contenu chargé avec AJAX</h2>
    <button onclick="loadContent()">Charger le contenu</button>
    <div id="content"></div>

    <script>

        // création d'une fonction nommé "loadContent"
        function loadContent() {

            // création d'une variable qui créer un objet pour gérer la requête AJAX
            var xhttp = new XMLHttpRequest();

            // création d'un gestionnaire d'événement pour chaque changement de la requête
            xhttp.onreadystatechange = function () {

                // condition pour le cicle de vie pour la requête "readyState" et pour le statut si la demande est trouvé ou pas
                if(this.readyState == 4 && this.status == 200) {

                    // création d'un événement d'écoute sur l'ID "content" du bouton qui fera apparaitre le fichier texte via le "innerHTML"
                    document.getElementById("content").innerHTML = this.responseText;
                }
            }

            // requête pour la reception en "GET" du fichier texte qui est "true"
            xhttp.open("GET", "./ajax.txt", true);

            // envoie la requête au serveur
            xhttp.send();
        }
    </script>
</body>

</html>