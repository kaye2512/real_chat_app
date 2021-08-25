const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".erreur-txt");

form.onsubmit = (e)=>{
    e.preventDefault(); //prevoir le formulaire pour l'envoi
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest(); // creation d'objet xml 
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "bon"){

                    location.href = "users.php";
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                    
                }
            }
        }
    }
    // envoie des donné avec ajax vers php
    let formData = new FormData(form); // création d'un nouveau formData object
    xhr.send(formData); // envoi donnés du formulaire vers php
}