// const createReplyForm = (replyButton) => {
//     if (replyButton.nextElementSibling && replyButton.nextElementSibling.tagName === "FORM") {
//         return;
//     }

//     replyButton.style.display = 'none';
    
//     let form = document.createElement("form");
//     form.classList.add("w-100");
//     form.setAttribute("method", "POST");
//     form.setAttribute("action", "");

//     let columnDiv = document.createElement("div");
//     columnDiv.classList.add("col-md-12", "mt-4");
//     form.appendChild(columnDiv);

//     let textarea = document.createElement("textarea");
//     textarea.setAttribute("name", "replyText");
//     textarea.setAttribute("placeholder", "Votre réponse...");
//     textarea.classList.add('form-control');
//     textarea.setAttribute("rows", "5");
//     textarea.setAttribute("name", "textArea")
//     columnDiv.appendChild(textarea);

//     let buttonDiv = document.createElement("div");
//     buttonDiv.classList.add("d-flex", "mt-3");
//     form.appendChild(buttonDiv);

//     let submitButton = document.createElement("button");
//     submitButton.setAttribute("type", "submit");
//     submitButton.textContent = "Envoyer";
//     submitButton.classList.add("btn", "btn-primary", "btn-sm", "fw-bold", "rounded-5", "text-uppercase", "p-2");
//     buttonDiv.appendChild(submitButton);

//     let cancelButton = document.createElement("button");
//     cancelButton.setAttribute("type", "button");
//     cancelButton.textContent = "Annuler";
//     cancelButton.classList.add("btn", "btn-outline-danger", "fw-bold", "btn-sm", "rounded-5", "p-2", "text-uppercase", "mx-2");
//     buttonDiv.appendChild(cancelButton);

//     cancelButton.addEventListener('click', () => {
//         form.remove();
//         replyButton.style.display = 'block';
//     });

//     let commentCard = replyButton.closest('.cardsComment');
//     if (commentCard) {
//         commentCard.appendChild(form);
//     } else {
//         return;
//     }
//     // Gestion de la soumission du formulaire
//     form.onsubmit = (event) => {
//         event.preventDefault(); 

//         const replyText = textarea.value.trim();
//         if (replyText) {
//             // Créer et afficher la réponse avec son propre bouton "Répondre"
//             const replyDiv = createReplyDiv(replyText);
//             commentCard.appendChild(replyDiv);

//             // Réinitialiser et cacher le formulaire
//             textarea.value = '';
//             form.style.display = 'none';
//             replyButton.style.display = 'block';
//         }
//     };
// };

// document.addEventListener('DOMContentLoaded', () => {
//     // Fonction pour créer un nouveau commentaire
//     const createCommentDiv = (commentText) => {
//         const commentDiv = document.createElement("div");
//         commentDiv.classList.add("card","reply-message","card", "mt-4", "rounded-4", "bg-light", "border-0", "shadow-lg", "p-3","cardsComment")

//         const cardRow = document.createElement("div")
//         cardRow.classList.add("row", "g-0")
//         commentDiv.appendChild(cardRow)
    
//         const colmd2 = document.createElement("div")
//         colmd2.classList.add("col-md-2", "d-flex")
//         cardRow.appendChild(colmd2)

//         const imgCard = document.createElement("img")
//         imgCard.src = "/public/assets/img/MWII-SEASON-01-ROADMAP-004.jpg"
//         imgCard.classList.add("imgProfilComment", "rounded-circle", "object-fit-cover", "img-fluid")
//         colmd2.appendChild(imgCard)

//         const colmd10 = document.createElement("div")
//         colmd10.classList.add("col-md-10")
//         cardRow.appendChild(colmd10)

//         const cardTitle = document.createElement("div")
//         cardTitle.classList.add("card-title", "p-0", "d-flex", "flex-wrap", "align-items-center")
//         colmd10.appendChild(cardTitle)
        
//         const titleName = document.createElement("p");
//         titleName.classList.add("text-card", "aCard", "m-0", "text-capitalize", "fw-bold", "mb-1")
//         titleName.textContent = "Boris";
//         cardTitle.appendChild(titleName);

//         const smallDate = document.createElement("small")
//         smallDate.classList.add("text-muted", "mb-1", "mx-2")
//         smallDate.textContent = "le 29 déc, à 13h50"
//         cardTitle.appendChild(smallDate)

//         const cardBody = document.createElement("div")
//         cardBody.classList.add("card-body","p-0")
//         colmd10.appendChild(cardBody)

//         const replyContent = document.createElement("p")
//         replyContent.classList.add("text-card")
//         cardBody.appendChild(replyContent)
//         replyContent.textContent = commentText;

//         const buttonDiv = document.createElement("div")
//         buttonDiv.classList.add("d-flex")
//         cardBody.appendChild(buttonDiv)

//         const replyButton = document.createElement("button");
//         replyButton.textContent = "Répondre";
//         replyButton.setAttribute("type", "button");
//         replyButton.classList.add("replyButton", "btn", "btn-outline-secondary", "btn-sm", "fw-bold", "rounded-5", "text-uppercase", "p-2");
//         replyButton.onclick = () => createReplyForm(replyButton);
//         buttonDiv.appendChild(replyButton);

//         return commentDiv;
//     };

//     // Gestionnaire d'événements pour le formulaire principal de commentaire
//     document.getElementById('commentForm').addEventListener('submit', (event) => {
//         event.preventDefault();

//         const textarea = document.getElementById('textArea');
//         const commentText = textarea.value.trim();
//         if (commentText) {
//             // Créer et afficher le nouveau commentaire
//             const newCommentDiv = createCommentDiv(commentText);
//             const commentSection = document.querySelector('.commentSection'); 
//             commentSection.appendChild(newCommentDiv);

//             // Réinitialiser le formulaire
//             textarea.value = '';
//         }
//     });
// });

// // Fonction pour créer la div de réponse avec un bouton "Répondre"
// const createReplyDiv = (replyText) => {
//     const replyDiv = document.createElement("div");
//     replyDiv.classList.add("col-md-12");

//     const replyCard = document.createElement("div")
//     replyCard.classList.add("card","reply-message","card", "mt-4", "rounded-4", "bg-light", "border-0", "shadow-lg", "p-3")
//     replyDiv.appendChild(replyCard)

//     const cardRow = document.createElement("div")
//     cardRow.classList.add("row", "g-0")
//     replyCard.appendChild(cardRow)

//     const colmd2 = document.createElement("div")
//     colmd2.classList.add("col-md-2", "d-flex")
//     cardRow.appendChild(colmd2)

//     const imgCard = document.createElement("img")
//     imgCard.src = "/public/assets/img/MWII-SEASON-01-ROADMAP-004.jpg"
//     imgCard.classList.add("imgProfilComment", "rounded-circle", "object-fit-cover", "img-fluid")
//     colmd2.appendChild(imgCard)

//     const colmd10 = document.createElement("div")
//     colmd10.classList.add("col-md-10")
//     cardRow.appendChild(colmd10)

//     const cardTitle = document.createElement("div")
//     cardTitle.classList.add("card-title", "p-0", "d-flex", "flex-wrap", "align-items-center")
//     colmd10.appendChild(cardTitle)
    
//     const titleName = document.createElement("p");
//     titleName.classList.add("text-card", "aCard", "m-0", "text-capitalize", "fw-bold", "mb-1")
//     titleName.textContent = "Boris";
//     cardTitle.appendChild(titleName);

//     const smallDate = document.createElement("small")
//     smallDate.classList.add("text-muted", "mb-1", "mx-2")
//     smallDate.textContent = "le 29 déc, à 13h50"
//     cardTitle.appendChild(smallDate)

//     const cardBody = document.createElement("div")
//     cardBody.classList.add("card-body","p-0")
//     colmd10.appendChild(cardBody)

//     const replyContent = document.createElement("p")
//     replyContent.classList.add("text-card")
//     cardBody.appendChild(replyContent)
//     replyContent.textContent = replyText;

//     const buttonDiv = document.createElement("div")
//     buttonDiv.classList.add("d-flex")
//     cardBody.appendChild(buttonDiv)

//     // Créer un bouton "Répondre" pour la réponse
//     const replyButton = document.createElement("button");
//     replyButton.textContent = "Répondre";
//     replyButton.classList.add("replyButton", "btn", "btn-outline-secondary", "btn-sm", "fw-bold", "rounded-5", "text-uppercase", "p-2");
//     replyButton.onclick = () => createReplyForm(replyButton);
//     cardBody.appendChild(replyButton);

//     return replyDiv;
// };

// Ajouter un écouteur d'événements à tous les boutons "Répondre"
// let replyButtons = document.querySelectorAll(".replyButton");
// replyButtons.forEach((button) => {
//     button.addEventListener("click", () => {
//         createReplyForm(button);
//     });
// });

// Gestion du formulaire de commentaire principal
document.querySelector('.letComment').addEventListener('click', () => {
    let form = document.getElementById('commentForm');
    form.classList.toggle('d-none');
});

// Gestion affichage des commentaires suivant
document.querySelector('.showMoreComments').addEventListener('click', () => {
    let comments = document.querySelectorAll('.commentNotShow')
    comments.forEach(comment => {
        comment.classList.toggle('d-none')
    });
    
})

// Gestionnaire d'événements pour le bouton d'annulation dans le formulaire principal de commentaire
    const cancelButton = document.querySelector('#commentForm .btn-outline-danger');
    if (cancelButton) {
        cancelButton.addEventListener('click', () => {
            const form = document.getElementById('commentForm');
            if (form) {
                form.classList.add('d-none'); 
            }
        });
    }

// const addReplyButtonEventListeners = () => {
//     const replyButtons = document.querySelectorAll(".replyButton");
//     replyButtons.forEach((button) => {
//         button.onclick = () => createReplyForm(button);
//     });
// };

