const nodes = document.querySelectorAll('input[name="siSelector"]');

nodes.forEach((node) => {
	node.addEventListener("change", (event) => {
		let value = event.target.checked;
		console.log(event.target.id);
	});
});
