document.getElementById('createForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêcher la soumission du formulaire par défaut

    // Récupérer les données du formulaire
    var formData = new FormData(this);

    // Envoyer la requête AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'create_entry.php', true); // Supposant que vous avez un script côté serveur pour gérer la création
    xhr.onload = function() {
        if (xhr.status === 200) {
            // La requête a réussi, faire quelque chose avec la réponse
            console.log(xhr.responseText);
            alert('Entrée créée avec succès!');
        } else {
            // La requête a échoué
            alert('Erreur: ' + xhr.statusText);
        }
    };
    xhr.onerror = function() {
        // Erreur pendant la requête
        alert('La requête a échoué');
    };
    xhr.send(formData);
});
