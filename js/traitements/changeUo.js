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

                let toolBarUo = document.getElementById('toolBarUo');
                let toolBarMa = document.getElementById('toolBarMa');

                if (data.CAN_INTERACTION && data.idUo != "") {

                    let testEditUo = document.getElementById('editUo'); 
                    let testRemoveUo = document.getElementById('removeUo'); 
                    let testNewMa2 = document.getElementById('newMa'); 

                    if (testNewMa2) {
                        testNewMa2.remove();
                    }

                    if (testEditUo) {
                        testEditUo.remove();
                    }

                    if (testRemoveUo) {
                        testRemoveUo.remove();
                    }

                    let aEditUo = document.createElement('a');
                    aEditUo.id = "editUo";
                    aEditUo.classList.add('nav-link')
                    aEditUo.href = "/pages/editSite.php?uo=" + data.idUo

                    let h3EditUo = document.createElement('h3');
                    h3EditUo.classList.add('bi')
                    h3EditUo.classList.add('bi-pencil-square')

                    aEditUo.prepend(h3EditUo);

                    toolBarUo.append(aEditUo)

                    let aRemoveUo = document.createElement('a');
                    aRemoveUo.id = "removeUo";
                    aRemoveUo.classList.add('nav-link')
                    aRemoveUo.href = "/pages/removeSite.php?uo=" + data.idUo

                    let h3RemoveUo = document.createElement('h3');
                    h3RemoveUo.classList.add('bi')
                    h3RemoveUo.classList.add('bi-trash3')

                    aRemoveUo.prepend(h3RemoveUo);

                    toolBarUo.append(aRemoveUo)

                    let aNewMa = document.createElement('a');
                    aNewMa.id = "newMa";
                    aNewMa.classList.add('nav-link')
                    aNewMa.href = "/pages/addMateriel.php?uo=" + data.idUo

                    let h3NewMa = document.createElement('h3');
                    h3NewMa.classList.add('bi')
                    h3NewMa.classList.add('bi-plus-circle')

                    aNewMa.prepend(h3NewMa);

                    toolBarMa.append(aNewMa);
                }
            }
        });
    });
});