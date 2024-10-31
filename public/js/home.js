document.addEventListener("DOMContentLoaded", () => {
        const iconHome = documentQuerySelector(".icon-home");

        iconHome.addEventListener("mouseover", () => {
            document.querySelector(".icon-home").src = "./public/assets/home1-black.svg";
        });
    
        iconHome.addEventListener("mouseout", () => {
            document.querySelector(".icon-home").src = "./public/assets/home1-white.svg";
        });
    });
    
document.addEventListener("DOMContentLoaded", () => {
    const iconLinks = document.querySelectorAll(".icon-home");

    iconLinks.forEach(link => {
        const img = link.querySelector("img"); 

        link.addEventListener("mouseover", () => {
            if (img.alt === "HOME") {
                img.src = "./public/assets/home1-black.svg";
            } else if (img.alt === "notepad") {
                img.src = "./public/assets/notepad-black.svg"; 
            } else if (img.alt === "config") {
                img.src = "./public/assets/config-black.svg"; 
            }
        });

        link.addEventListener("mouseout", () => {
            if (img.alt === "HOME") {
                img.src = "./public/assets/home1-white.svg";
            } else if (img.alt === "notepad") {
                img.src = "./public/assets/notepad-white.svg"; 
            } else if (img.alt === "config") {
                img.src = "./public/assets/config-white.svg"; 
            }
        });
    });
});