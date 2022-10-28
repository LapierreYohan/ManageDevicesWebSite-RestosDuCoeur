<script language=javascript>
    const nodes = document.querySelectorAll('input[name="drSelector"]');

    nodes.forEach((node) => {
        node.addEventListener("change", (event) => {

            let a = "coucou";

            <?php
            $a = "<script>document.write(event.target.id);</script>";
            var_dump($a);
            ?>


        });
    });
</script>