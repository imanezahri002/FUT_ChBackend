let formu=document.getElementById("form");

function ajouterPlayer(){
    formu.style.display="flex";
    formu.style.boxShadow="5px 5px 500px gray";
};
let ferme=document.getElementById("close");
ferme.addEventListener("click", function(){
    formu.style.display="none"
});
//commentaire
position.addEventListener("change", (event) => {
    if (position.value == "GK") {
        const changementP = document.querySelectorAll(".normal-joueur");
        for (let i = 0; i < changementP.length; i++) {
            changementP[i].setAttribute("hidden", "hidden"); 
        }
        const changementS = document.querySelectorAll(".goal-joueur");
        for (let i = 0; i < changementS.length; i++) {
            changementS[i].removeAttribute("hidden");
        }
    } else {
        const changementP= document.querySelectorAll(".normal-joueur");
        for (let i = 0; i < changementP.length; i++) {
            changementP[i].removeAttribute("hidden");
        }
        const changementS = document.querySelectorAll(".goal-joueur");
        for (let i = 0; i < changementS.length; i++) {
            changementS[i].setAttribute("hidden", "hidden");
        }
    }
});

fetch("modifier.php")
.then(function(response) {
})