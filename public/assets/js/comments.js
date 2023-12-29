const createReplyForm = (replyButton) => {
    // Vérifier si un formulaire existe déjà
    if (replyButton.nextElementSibling && replyButton.nextElementSibling.tagName === "FORM") {
        // Un formulaire existe déjà, donc ne rien faire
        return;
    }

    // Désactiver le bouton "Répondre"
    replyButton.style.display = 'none';

    // Créer le formulaire de réponse
    let form = document.createElement("form");
    form.classList.add("w-100");
    form.setAttribute("method", "post");
    form.setAttribute("action", ""); // URL de votre endpoint

    let columnDiv = document.createElement("div");
    columnDiv.classList.add("col-md-12");
    form.appendChild(columnDiv);

    // Créer un champ de texte pour la réponse
    let textarea = document.createElement("textarea");
    textarea.setAttribute("name", "replyText");
    textarea.setAttribute("placeholder", "Votre réponse...");
    textarea.classList.add('form-control');
    textarea.setAttribute("rows", "5");
    columnDiv.appendChild(textarea);

    // Créer une div pour les boutons
    let buttonDiv = document.createElement("div");
    buttonDiv.classList.add("d-flex", "mt-2");
    form.appendChild(buttonDiv);

    // Créer un bouton de soumission
    let submitButton = document.createElement("button");
    submitButton.setAttribute("type", "submit");
    submitButton.textContent = "Envoyer";
    submitButton.classList.add("btn", "btn-primary", "btn-sm", "fw-bold", "rounded-5", "text-uppercase", "p-2");
    buttonDiv.appendChild(submitButton);

    // Créer un bouton d'annulation
    let cancelButton = document.createElement("button");
    cancelButton.setAttribute("type", "button");
    cancelButton.textContent = "Annuler";
    cancelButton.classList.add("btn", "btn-outline-danger", "fw-bold", "btn-sm", "rounded-5", "p-2", "text-uppercase", "mx-2");
    buttonDiv.appendChild(cancelButton);

    cancelButton.addEventListener('click', () => {
        // Supprimer le formulaire
        form.remove();

        // Réactiver le bouton 'Répondre'
        replyButton.style.display = 'block';
    });

    // Insérer le formulaire sous le commentaire
    let commentCard = replyButton.closest('.cardsComment');
    commentCard.appendChild(form);

    // Gestion de la soumission du formulaire
    form.onsubmit = (event) => {
        event.preventDefault(); // Empêcher le rechargement de la page

        const replyText = textarea.value.trim();
        if (replyText) {
            // Créer et afficher la réponse avec son propre bouton "Répondre"
            const replyDiv = createReplyDiv(replyText);
            commentCard.appendChild(replyDiv);

            // Réinitialiser et cacher le formulaire
            textarea.value = '';
            form.style.display = 'none';
            replyButton.style.display = 'block';
        }
    };
};

// Fonction pour créer la div de réponse avec un bouton "Répondre"
const createReplyDiv = (replyText) => {
    const replyDiv = document.createElement("div");
    replyDiv.classList.add("reply-message"); // Vos classes CSS

    const replyContent = document.createElement("p");
    replyContent.textContent = replyText;
    replyDiv.appendChild(replyContent);

    // Créer un bouton "Répondre" pour la réponse
    const replyButton = document.createElement("button");
    replyButton.textContent = "Répondre";
    replyButton.classList.add("replyButton", "btn", "btn-outline-secondary", "btn-sm", "fw-bold", "rounded-5", "text-uppercase", "p-2");
    replyButton.onclick = () => createReplyForm(replyButton);
    replyDiv.appendChild(replyButton);

    return replyDiv;
};

// Ajouter un écouteur d'événements à tous les boutons "Répondre"
let replyButtons = document.querySelectorAll(".replyButton");
replyButtons.forEach((button) => {
    button.addEventListener("click", () => {
        createReplyForm(button);
    });
});

// Gestion du formulaire de commentaire principal
document.querySelector('.letComment').addEventListener('click', () => {
    let form = document.getElementById('commentForm');
    form.classList.toggle('d-none');
});
