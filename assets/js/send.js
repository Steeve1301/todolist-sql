(() => {

let formUpdate=document.getElementById("formUpdate");

formUpdate.addEventListener('submit', function(e){
    e.preventDefault();
}, false);

document.onclick= function(event){
    const target= event.target;
    // Au clic du bouton submit du formulaire
    if(target.id=="sendForm"){
        let input= document.querySelectorAll(".todo");
        let id= [];
        let value= [];

        // Enregistrement des données du formulaire
        for(let i=0; i<input.length; i++){
            id[i]=input[i].dataset.id;
            value[i]=input[i].value;
        }

        // Création du FormData
        let formtoSend= new FormData();
        for(let i=0; i<input.length;i++){
            formtoSend.append('id[]', id[i]);
            formtoSend.append('todo[]', value[i]);
        }

        // Envoi du Formulaire pour le traitement PHP
        try {
            fetch("./submit.php", {
                method: "POST",
                body: formtoSend
            });
        } catch (error) {
            console.error(error);
        }

    }
    else if(target.tagName.toLowerCase()=="input" && target.classList.contains("todo")){
        
        if(target.hasAttribute("checked")){
            target.removeAttribute("checked");
            target.setAttribute("value","0");
        }
        else{
            target.setAttribute("checked", "checked");
            target.setAttribute("value", "1");
        }
    }
    
    if(target.dataset.to=="archive"){

        let id= target.dataset.id;
        let formtoSend= new FormData();
        formtoSend.append("idtoarchive", id);

        try{
            fetch('./submit.php', {
                method: "POST",
                body: formtoSend
            });
        }catch(error){
            console.error(error);
        }

        setTimeout(function(){
            window.location.reload(true);
        },200);
    }

}
})();
