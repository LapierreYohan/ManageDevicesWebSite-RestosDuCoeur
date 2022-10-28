<script language=javascript>
    const nodes = document.querySelectorAll('input[name="drSelector"]');

    nodes.forEach((node) => {
        node.addEventListener("change", (event) => {
            let value = event.target.checked;
            console.log(event.target.id);
            <?php
            require_once("../include/MariaDB.php");
            $bdd = bddRestos();

            $stmt = $bdd->query("SELECT * FROM Delegation_Regionale");
            $res = $stmt->fetchAll();

            foreach ($res as $row) { ?>
                console.log("<?= $row["Reference"] ?>");
            <?php } ?>

        });
    });
</script>