nodes = document.querySelectorAll('input[name="adSelector"]');

nodes.forEach((node) => {
    node.addEventListener("change", (event) => {

        var value = {'ad':event.target.id};
        let section = document.getElementById('uo');
        let sectionMa= document.getElementById('ma');

        let carousel = section.firstElementChild;
        let carousel2 = sectionMa.firstElementChild;
        
        section.removeChild(carousel);
        sectionMa.removeChild(carousel2);

        carousel = document.createElement('div');
        carousel.classList.add("carousel");
        carousel.classList.add('bg-dark')
        carousel.classList.add('border-0')
        section.prepend(carousel)

        carousel2 = document.createElement('div');
        carousel2.classList.add("carousel");
        carousel2.classList.add('bg-dark')
        carousel2.classList.add('border-0')
        sectionMa.prepend(carousel2)
    
        var flkty = new Flickity( carousel, {
            groupCells: true, 
            pageDots: false
        });

        var flkty2 = new Flickity( carousel2, {
            groupCells: true, 
            pageDots: false
        });

        $.ajax({
            type: "POST",
            url: "/includes/traitements/ad.php",
            dataType:"json",
            data:value, 
            success: function(data){
                let passed = false;
                $.each(data, function (index, value) {

                    var $cellElems = $('<input type="radio" name="uoSelector" id="' + value.ID_Site + '">');
                    flkty.append( $cellElems)

                    var $cellElem = $('<div class="carousel-cell"> <label for="' + value.ID_Site + '"> <img src="'+value.Image+'" alt="Icon maison"> <p><b>' + value.Reference + "</b></p> <br> <p class=\"adress\"><b>" + value.Adresse + '</b></p></label></div>');
                    flkty.append( $cellElem)
                    passed = true;
                })
                if (passed == false) {
                    var $cellElem = $('<div class="carousel-cell"> <h3 class="nothing text-secondary">Vide</h3></div>');
                    flkty.append( $cellElem)
                }
                
                let script = document.createElement('script');
                script.src = "/js/traitements/changeUo.js";
                carousel.prepend(script);
            }
        });


        var value3 = {'materiels':event.target.id};
        
        $.ajax({
            type: "POST",
            url: "/includes/traitements/ad.php",
            dataType:"json",
            data:value3, 
            success: function(data){
                let passed = false;
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
                    passed = true;
                })
                if (passed == false) {
                    var $cellElem = $('<div class="carousel-cell"> <h3 class="nothing text-secondary">Vide</h3></div>');
                    flkty2.append( $cellElem)
                }
            }
        });
        
        var value2 = {'buttons':event.target.id};
        
        $.ajax({
            type: "POST",
            url: "/includes/traitements/ad.php",
            dataType:"json",
            data:value2, 
            success: function(data){

                let toolBarAd = document.getElementById('toolBarAd'); 
                let toolBarUo = document.getElementById('toolBarUo');
                let toolBarMa = document.getElementById('toolBarMa');

                let testEditAd = document.getElementById('editAd'); 
                let testRemoveAd = document.getElementById('removeAd'); 
                let testNewUo = document.getElementById('newUo');
                let testNewMa = document.getElementById('newMa'); 

                if (testNewMa) {
                    testNewMa.remove();
                }

                if (testEditAd) {
                    testEditAd.remove();
                }

                if (testRemoveAd) {
                    testRemoveAd.remove();
                }

                if (testNewUo) {
                    testNewUo.remove();
                }

                let removeUoRemove = document.getElementById('removeUo'); 
                let editUoRemove = document.getElementById('editUo'); 

                if (removeUoRemove) {
                    removeUoRemove.remove();
                }

                if (editUoRemove) {
                    editUoRemove.remove();
                }

                if (data.CAN_INTERACTION && data.idAd != "") {

                    let aEditAd = document.createElement('a');
                    aEditAd.id = "editAd";
                    aEditAd.classList.add('nav-link')
                    aEditAd.href = "/pages/editSite.php?ad=" + data.idAd

                    let h3EditAd = document.createElement('h3');
                    h3EditAd.classList.add('bi')
                    h3EditAd.classList.add('bi-pencil-square')
                    h3EditAd.style.color = "rgb(179, 173, 173)";

                    aEditAd.prepend(h3EditAd);

                    toolBarAd.append(aEditAd)

                    let aRemoveAd = document.createElement('a');
                    aRemoveAd.id = "removeAd";
                    aRemoveAd.classList.add('nav-link')
                    aRemoveAd.href = "/pages/removeSite.php?ad=" + data.idAd

                    let h3RemoveAd = document.createElement('h3');
                    h3RemoveAd.classList.add('bi')
                    h3RemoveAd.classList.add('bi-trash3')
                    h3RemoveAd.style.color = "rgb(179, 173, 173)";

                    aRemoveAd.prepend(h3RemoveAd);

                    toolBarAd.append(aRemoveAd)

                    let aNewUo = document.createElement('a');
                    aNewUo.id = "newUo";
                    aNewUo.classList.add('nav-link')
                    aNewUo.href = "/pages/addSite.php?ad=" + data.idAd

                    let h3NewUo = document.createElement('h3');
                    h3NewUo.classList.add('bi')
                    h3NewUo.classList.add('bi-plus-circle')
                    h3NewUo.style.color = "rgb(179, 173, 173)";

                    aNewUo.prepend(h3NewUo);

                    toolBarUo.append(aNewUo)

                    let aNewMa = document.createElement('a');
                    aNewMa.id = "newMa";
                    aNewMa.classList.add('nav-link')
                    aNewMa.href = "/pages/addMateriel.php?ad=" + data.idAd

                    let h3NewMa = document.createElement('h3');
                    h3NewMa.classList.add('bi')
                    h3NewMa.classList.add('bi-plus-circle')
                    h3NewMa.style.color = "rgb(179, 173, 173)";

                    aNewMa.prepend(h3NewMa);

                    toolBarMa.append(aNewMa)
                }
            }
        });
    });
});