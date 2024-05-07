<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chargement de contenu AJAX</title>
</head>
<body>
    <div id="content">
        <!-- Le contenu chargé sera inséré ici -->
    </div>

    <button onclick="loadContentAndUpdate('./ajax.txt')">Charger le contenu</button>

    <script>

    // création d'une fonction qui récupère le "onclick" nommé loadContentAndUpdapte"
    function loadContentAndUpdate(url) { 

        // création d'une constante qui créer un objet
        const xhttp = new XMLHttpRequest();

        // création d'une requête qui prépare tout changement de contenu 
        xhttp.onreadystatechange = () => {

            // création d'une condition qui vérifie si tout est bon et passe la réponse en "innerHTML"
            if(xhttp.readyState === 4 &
                xhttp.status === 200) {
                    document.getElementById("content").innerHTML = xhttp.responseText;

                // Sinon affiche l'erreur en "console.log" et dans "alert"
                } else {
                    console.error("Erreur" + xhttp.status + "" + xhttp.statusText);
                    alert("Attention une erreur est survenue!");
                }
        }

        // création d'une requête pour récupérer la demande du fichier
        xhttp.open("GET", url, true);

        // envoie les données au serveur
        xhttp.send();
    }

    </script>
</body>
</html>
