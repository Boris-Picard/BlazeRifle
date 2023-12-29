const createReplyForm = (replyButton) => {
    // Vérifier si un formulaire existe déjà
    if (replyButton.nextElementSibling && replyButton.nextElementSibling.tagName === "FORM") {
        // Un formulaire existe déjà, donc ne rien faire
        return;
    }

    // Désactiver le bouton "Répondre"
    replyButton.style.display = 'none';

    // Créer le formulaire
    let form = document.createElement("form");
    form.classList.add("w-100")
    form.setAttribute("method", "post");
    form.setAttribute("action", "/post-reply"); // URL

    let columnDiv = document.createElement("div");
    columnDiv.classList.add("col-md-12");
    form.appendChild(columnDiv)

    // Créer un champ de texte pour la réponse
    let textarea = document.createElement("textarea");
    textarea.setAttribute("name", "replyText");
    textarea.setAttribute("placeholder", "Votre réponse...");
    columnDiv.appendChild(textarea);
    textarea.classList.add('form-control');
    textarea.setAttribute("rows", "5");

    // Créer une div pour les boutons
    let buttonDiv = document.createElement("div");
    buttonDiv.classList.add("d-flex", "mt-2");
    form.appendChild(buttonDiv)

    // Créer un bouton de soumission
    let submitButton = document.createElement("button");
    submitButton.setAttribute("type", "submit");
    submitButton.textContent = "Envoyer";
    submitButton.classList.add("btn", "btn-primary","btn-sm", "fw-bold", "rounded-5", "text-uppercase", "p-2")
    buttonDiv.appendChild(submitButton);

    // Créer un bouton d'annulation
    let cancelButton = document.createElement("button");
    cancelButton.setAttribute("type", "button");
    cancelButton.textContent = "Annuler";
    cancelButton.classList.add("btn", "btn-outline-danger", "fw-bold", "btn-sm", "rounded-5", "p-2", "text-uppercase", "mx-2")
    buttonDiv.appendChild(cancelButton);

    cancelButton.addEventListener('click', () => {
        // Supprimer le formulaire
        form.remove();

        // Réactiver le bouton 'Répondre'
        replyButton.style.display = 'block';
    });

    // Insérer le formulaire après le bouton "Répondre"
    replyButton.parentNode.insertBefore(form, replyButton.nextSibling);
}

// Ajouter un écouteur d'événements à tous les boutons "Répondre"
let replyButtons = document.querySelectorAll(".replyButton");
replyButtons.forEach((button) => {
    button.addEventListener("click", () => {
        createReplyForm(button);
    });
});


document.querySelector('.letComment').addEventListener('click', () => {
    let form = document.getElementById('commentForm');
    form.classList = form.classList.toggle === 'd-none' ? 'd-block' : 'd-block';
    form.classList = form.classList.toggle === 'd-block' ? 'd-none' : 'd-block';
});

