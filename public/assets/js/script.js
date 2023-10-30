const navbar = document.querySelector(".navbar");


/*============= fonction changement de background color navbar =============*/ 
const scrollNavbar = () => {
    if(window.scrollY >= 1300) {
        navbar.classList.add("navbarScroll")
        navbar.classList.remove("navbarStyle")
    } else {
        navbar.classList.add("navbarStyle")
        navbar.classList.remove("navbarScroll")
    }
}

window.addEventListener("scroll", scrollNavbar)
