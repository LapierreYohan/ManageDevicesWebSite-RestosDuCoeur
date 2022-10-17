const nodeMdp = document.getElementById("mdp");

nodeMdp.addEventListener("blur", event => {
    let value = event.target.value
    let error = document.getElementById("mdpError");
    
    if (!value.trim()) {
        error.style.display = "block";
    } else {
        error.style.display = "none";
    }
    
})