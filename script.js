let formu=document.getElementById("form");

function ajouterPlayer(){
    formu.style.display="flex";
    formu.style.boxShadow="5px 5px 500px gray";
};
let fermer=document.getElementById("close");
fermer.addEventListener("click", function(){
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
function handleDataEdit(id)
{
    fetch('./modifierClub.php?id=' + id)
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
        
        document.getElementById("nameClub").value = data.club_name;
        document.getElementById("logoClub").value = data.club_image;
        document.getElementById("btn6").textContent = "Modifier";
        document.getElementById("btn6").setAttribute("name", "modifier");
        const input = document.createElement("input");
        input.type = "hidden";
        input.name = "id";
        input.value = data.club_id;

        document.getElementById("nameClub").parentElement.appendChild(input);
    })
    

}
function stockerDataEdit(id){
    fetch("./modifierNationality.php?id=" + id)
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
        document.getElementById("nameNatio").value = data.nationality_name;
        document.getElementById("logoNatio").value = data.nationality_image;
        document.getElementById("btn7").textContent = "Modifier";
        document.getElementById("btn7").setAttribute("name", "modifier");
        const input = document.createElement("input");
        input.type = "hidden";
        input.name = "id";
        input.value = data.nationality_id;

        document.getElementById("nameNatio").parentElement.appendChild(input);
})}