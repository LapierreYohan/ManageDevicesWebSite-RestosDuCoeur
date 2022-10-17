const nodeEmail = document.getElementById("identifiant");

nodeEmail.addEventListener("input", (event) => {
	let value = event.target.value;
	let error = document.getElementById("idError");
	let button = document.getElementById("submitConnect");

	if ((!value.includes("@") && !value.includes(".")) || !value.includes(".")) {
		error.style.display = "block";
		button.disabled = true;
	} else {
		error.style.display = "none";

		let mdp = document.getElementById("mdp");

		if (mdp.value.trim()) {
			button.disabled = false;
		} else {
			button.disabled = true;
		}
	}
});
