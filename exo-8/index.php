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

            // création d'une constante qui créer un objet
            const xhttp = new XMLHttpRequest();

            // création d'une requête 
            xhttp.onreadystatechange = () => {

                // création d'une condition qui prend le cicle de vie d'un parcourt de "readyState"
                if(xhttp.readyState == 4 &&

                    // création d'un status 200 si tout se passe bien
                    xhttp.status == 200){

                        // création d'un événement d'écoute sur l'ID "content" du bouton
                        document.getElementById("content").innerHTML = xhttp.responseText;

                    // création d'une condition final si il y a une erreur afficher en "console.log"
                    } else {
                        console.log('Erreur survenu', xhttp.responseText);
                    }
            }

            // condition d'ouverture de la requête en "GET" du fichier ".txt" qui est "true"
            xhttp.open("GET", "./ajax.txt", true);

            // envoie des données au serveur
            xhttp.send();
        }
    </script>
</body>

</html>