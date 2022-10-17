const nodeMdp = document.getElementById("mdp");

nodeMdp.addEventListener("input", (event) => {
	let value = event.target.value;
	let error = document.getElementById("mdpError");
	let button = document.getElementById("submitConnect");

	if (!value.trim()) {
		error.style.display = "block";
		button.disabled = true;
	} else {
		error.style.display = "none";

		let identifiants = document.getElementById("identifiant");
		if (
			(!identifiants.value.includes("@") &&
				!identifiants.value.includes(".")) ||
			!identifiants.value.includes(".")
		) {
			button.disabled = true;
		} else {
			button.disabled = false;
		}
	}
});
