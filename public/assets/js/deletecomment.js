let getIdUserFromUrl = () => {
    let searchParams = new URLSearchParams(window.location.search);
    return searchParams.get('id_user'); 
};

let generateDeleteUrl = (id_comment) => {
    let baseUrl = '/controllers/account/comments-account-ctrl.php';
    let id_user = getIdUserFromUrl(); // Récupère l'id_user de l'URL

    return `${baseUrl}?id_user=${id_user}&id_comment=${id_comment}`;
};

document.addEventListener("DOMContentLoaded", () => {
    const deleteButtons = document.querySelectorAll('.btn-light[data-comment-id]');
    const deleteLink = document.querySelector('#modalDelete .deleteModalBtn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id_comment = button.getAttribute('data-comment-id');
            deleteLink.href = generateDeleteUrl(id_comment);
        });
    });
});
