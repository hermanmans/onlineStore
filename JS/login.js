let toLogin = document.getElementById("loginLink");
        function toggleLogin(){
            let loginBlock = document.querySelector(".indexPageLogin");
            let registerBlock = document.querySelector(".indexPageRegister");
            if (loginBlock.style.display == "none"){
                loginBlock.style.display = "block";
                registerBlock.style.display = "none";
            } else if (registerBlock.style.display == "none"){
                registerBlock.style.display = "block";
                loginBlock.style.display = "none";
            };
        };
toLogin.addEventListener('click',toggleLogin);
let toRegister = document.getElementById("registerLink");
toRegister.addEventListener('click',toggleLogin);

let submitDetails = document.getElementById("submitNew");
        function toggleSubmit(){
            if (submitDetails.style.display == "block"){
                submitDetails.style.display = "none";

            }else{
                submitDetails.style.display = "block";
            }
        };
submitDetails.addEventListener('click',toggleSubmit);
