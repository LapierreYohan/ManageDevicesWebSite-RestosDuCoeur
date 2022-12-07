nodes = document.querySelectorAll('input[name="uoSelector"]');

nodes.forEach((node) => {
    node.addEventListener("change", (event) => {

        let sectionMa= document.getElementById('ma');

        let carousel2 = sectionMa.firstElementChild;
        
        sectionMa.removeChild(carousel2);

        carousel2 = document.createElement('div');
        carousel2.classList.add("carousel");
        sectionMa.prepend(carousel2)

        var flkty2 = new Flickity( carousel2, {
            groupCells: true, 
            pageDots: false
        });

        var value3 = {'materiels':event.target.id};
        
        $.ajax({
            type: "POST",
            url: "/includes/traitements/uo.php",
            dataType:"json",
            data:value3, 
            success: function(data){
                $.each(data, function (index, value) {
                    let stat;
                    if (value.Etat == "Actif") {
                        stat = '<div class="spinner-grow spinner-grow-sm text-success" role="status" style="position: absolute; margin-left: 20px; margin-bottom: 170px;"></div>'
                    } else if (value.Etat == "Hors Service") {
                        stat = '<div class="spinner-grow spinner-grow-sm text-danger" role="status" style="position: absolute; margin-left: 20px; margin-bottom: 170px;"></div>'
                    } else if (value.Etat == "Hors Parc") {
                        stat = '<div class="spinner-grow spinner-grow-sm text-secondary" role="status" style="position: absolute; margin-left: 20px; margin-bottom: 170px;"></div>'
                    } else if (value.Etat == "Résilié") {
                        stat = '<div class="spinner-grow spinner-grow-sm text-warning" role="status" style="position: absolute; margin-left: 20px; margin-bottom: 170px;"></div>'
                    }
                    var $cellElems = $('<input type="radio" name="maSelector" id="' + value.Reference_Materiel + '">');
                    flkty2.append( $cellElems)

                    var $cellElem = $('<div class="carousel-cell"> ' + stat + ' <label for="' + value.Reference_Materiel + '"><img src="'+value.image+'" alt="Icon Matériels"> <p><b>' + value.Reference_Materiel + '</b></p></label></div>');
                    flkty2.append( $cellElem)

                })
            }
        });
        
        var value2 = {'buttons':event.target.id};
        
        $.ajax({
            type: "POST",
            url: "/includes/traitements/uo.php",
            dataType:"json",
            data:value2, 
            success: function(data){
                console.log(data);
            }
        });
    });
});