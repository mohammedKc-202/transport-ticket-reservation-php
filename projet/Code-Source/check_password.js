function checkPassword(){

    let pass=document.getElementById("pass");
    pass.addEventListener("submit",(error)=>{
        let password = document.getElementById("password1").value;
        let cnfrmPassword = document.getElementById("password2").value;

        let message = document.getElementById("message");

        if(password == cnfrmPassword){

            message.textContent = "";
            message.style.backgroundColor = "#e1261d";
            return true;
        }
        else{
            message.textContent = "Le mot de passe ne correspond pas";
            message.style.color = "#ff0000";
            error.preventDefault();

        } });


}