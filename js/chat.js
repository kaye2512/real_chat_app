const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");


form.onsubmit = (e)=>{
    e.preventDefault(); //prevoir le formulaire pour l'envoi
}


sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest(); // creation d'objet xml 
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = ""; // quand les messages sont inserés laissé le chat vide
            }
        }
    }
    // envoie des donné avec ajax vers php
    let formData = new FormData(form); // création d'un nouveau formData object
    xhr.send(formData); // envoi donnés du formulaire vers php
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(()=>{
    let xhr = new XMLHttpRequest(); // creation d'objet xml 
    xhr.open("POST", "php/get_chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
              
            }
        }
    }
    let formData = new FormData(form); // création d'un nouveau formData object
    xhr.send(formData); // envoi donnés du formulaire vers php
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}