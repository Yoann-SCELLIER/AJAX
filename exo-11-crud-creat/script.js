// Ajout d'un écouteur d'événement au formulaire avec l'ID "createForm" pour l'événement "submit"
document.getElementById('createForm').addEventListener('submit', function(event) {
    // Empêcher le comportement par défaut du formulaire de se produire (rechargement de la page)
    event.preventDefault();

    // Récupération des données du formulaire
    var formData = new FormData(this);

    // Création d'une requête AJAX
    var xhr = new XMLHttpRequest();

    // Spécification des détails de la requête (méthode, URL, asynchrone)
    xhr.open('POST', 'create_entry.php', true);

    // Gestion de la réponse de la requête
    xhr.onload = function() {
        // Si le statut de la réponse est 200 (OK)
        if (xhr.status === 200) {
            // Affichage de la réponse dans la console
            console.log(xhr.responseText);
            // Affichage d'une alerte indiquant que l'entrée a été créée avec succès
            alert('Entrée créée avec succès!');
        } else {
            // Si le statut de la réponse n'est pas 200, affichage d'une alerte avec le statut du code de la réponse
            alert('Erreur: ' + xhr.statusText);
        }
    };

    // Gestion des erreurs pendant la requête
    xhr.onerror = function() {
        // Affichage d'une alerte en cas d'erreur pendant la requête
        alert('La requête a échoué');
    };

    // Envoi de la requête avec les données du formulaire
    xhr.send(formData);
});
