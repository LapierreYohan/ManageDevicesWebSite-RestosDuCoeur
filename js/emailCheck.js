const nodeEmail = document.getElementById("identifiant");

nodeEmail.addEventListener("input", event => {
    let value = event.target.value
    let error = document.getElementById("idError");

    if ((!value.includes("@") && !value.includes(".")) || !value.includes(".")) {
  
        error.style.display = "block";
    } else {
        error.style.display = "none";
    }
    
})