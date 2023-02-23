let toLogin = document.getElementById("loginLink");
        function toggleLogin(){
            let loginBlock = document.querySelector(".indexPageLogin");
            let registerBlock = document.querySelector(".indexPageRegister");
            if (loginBlock.style.display == "none"){
                loginBlock.style.display = "block";
                registerBlock.style.display = "none";
                console.log("clicked");
            };
        };
toLogin.addEventListener('click',toggleLogin);

let toRegister = document.getElementById("registerLink");
        function toggleRegister(){
            let loginBlock = document.querySelector(".indexPageLogin");
            let registerBlock = document.querySelector(".indexPageRegister");
            if (registerBlock.style.display == "none"){
                registerBlock.style.display = "block";
                loginBlock.style.display = "none";
                console.log("clicked");
            };
        };
toRegister.addEventListener('click',toggleRegister);

let submitDetails = document.getElementById("submitNew");
        function toggleSubmit(){
            if (submitDetails.style.display == "block"){
                submitDetails.style.display = "none";

            }else{
                submitDetails.style.display = "block";
            }
        };
submitDetails.addEventListener('click',toggleSubmit);

function dropdown(){
    document.querySelector('.dropdown-menu').setAttribute('class','dropdown-menu show');
}

function toggleRemove(){
        let x = document.getElementsByTagName("tr");
        let i = document.getElementsByTagName("tr").length-1;
        let result = x[i].rowIndex;
        let index = (5*result)-5;
        let chosen = document.getElementsByTagName("td")[index].innerText;
        console.log(result);
        console.log(chosen);
        return chosen;
    };