document.getElementById("addQuestion").addEventListener("click", () => {
    let wrapper = document.getElementById("questionWrapper");
    let newQuestion = wrapper.firstElementChild.cloneNode(true);
    newQuestion.querySelector("input").value = "";
    wrapper.appendChild(newQuestion);
});
