let nodes = document.querySelectorAll('input[name="drSelector"]');

nodes.forEach((node) => {
    node.addEventListener("change", (event) => {

        var value = {'dr':event.target.id};
        let section = document.getElementById('ad');
        let carousel = section.firstElementChild;
        
        section.removeChild(carousel);

        carousel = document.createElement('div');
        carousel.classList.add("carousel");
        carousel.classList.add('bg-dark')
        carousel.classList.add('border-0')
        section.prepend(carousel)

        let sectionUO = document.getElementById('uo');
        let carouselUO = sectionUO.firstElementChild;
        sectionUO.removeChild(carouselUO);
        carouselUO = document.createElement('div');
        carouselUO.classList.add("carousel");
        carouselUO.classList.add('bg-dark')
        carouselUO.classList.add('border-0')
        sectionUO.prepend(carouselUO)

        var flktyUO = new Flickity( carouselUO, {
            groupCells: true, 
            pageDots: false
        });

        var $cellElemUO = $('<div class="carousel-cell"> <h3 class="nothing text-secondary">Vide</h3></div>');
        flktyUO.append($cellElemUO)

        let sectionMA = document.getElementById('ma');
        let carouselMA = sectionMA.firstElementChild;
        sectionMA.removeChild(carouselMA);
        carouselMA = document.createElement('div');
        carouselMA.classList.add("carousel");
        carouselMA.classList.add('bg-dark')
        carouselMA.classList.add('border-0')
        sectionMA.prepend(carouselMA)

        var flktyMA = new Flickity( carouselMA, {
            groupCells: true, 
            pageDots: false
        });

        var $cellElemMA = $('<div class="carousel-cell"> <h3 class="nothing text-secondary">Vide</h3></div>');
        flktyMA.append($cellElemMA)
    
        var flkty = new Flickity( carousel, {
            groupCells: true, 
            pageDots: false
        });


        $.ajax({
            type: "POST",
            url: "/includes/traitements/dr.php",
            dataType:"json",
            data:value, 
            success: function(data){
                let passed = false;
                $.each(data, function (index, value) {

                    var $cellElems = $('<input type="radio" name="adSelector" id="' + value.ID_Site + '">');
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
                script.src = "/js/traitements/changeAd.js";
                carousel.prepend(script);
            }
        });

        var value2 = {'buttons':event.target.id};

        $.ajax({
            type: "POST",
            url: "/includes/traitements/dr.php",
            dataType:"json",
            data:value2, 
            success: function(data){
                
                let toolBarDr = document.getElementById('toolBarDr'); 
                let toolBarAd = document.getElementById('toolBarAd');
                let toolBarUo = document.getElementById('toolBarUo');
                let toolBarMa = document.getElementById('toolBarMa');

                let testEditDr = document.getElementById('editDr'); 
                let testRemoveDr = document.getElementById('removeDr'); 
                let testNewAd = document.getElementById('newA'); 

                if (testEditDr) {
                    testEditDr.remove();
                }

                if (testRemoveDr) {
                    testRemoveDr.remove();
                }

                if (testNewAd) {
                    testNewAd.remove();
                }

                let newAdRemove = document.getElementById('newAd'); 
                let editAdRemove = document.getElementById('editAd'); 
                let removeAdRemove = document.getElementById('removeAd'); 

                if (newAdRemove) {
                    newAdRemove.remove();
                }

                if (editAdRemove) {
                    editAdRemove.remove();
                }

                if (removeAdRemove) {
                    removeAdRemove.remove();
                }

                let newUoRemove = document.getElementById('newUo'); 
                let removeUoRemove = document.getElementById('removeUo'); 
                let editUoRemove = document.getElementById('editUo'); 

                if (newUoRemove) {
                    newUoRemove.remove();
                }

                if (removeUoRemove) {
                    removeUoRemove.remove();
                }

                if (editUoRemove) {
                    editUoRemove.remove();
                }

                let newMaRemove = document.getElementById('newMa'); 

                if (newMaRemove) {
                    newMaRemove.remove();
                }

                if (data.CAN_INTERACTION && data.idDr != "") {


                    let aEdit = document.createElement('a');
                    aEdit.id = "editDr";
                    aEdit.classList.add('nav-link')
                    aEdit.href = "/pages/editSite.php?dr=" + data.idDr

                    let h3Edit = document.createElement('h3');
                    h3Edit.classList.add('bi')
                    h3Edit.classList.add('bi-pencil-square')
                    h3Edit.style.color = "rgb(179, 173, 173)";

                    aEdit.prepend(h3Edit);

                    toolBarDr.append(aEdit)

                    let aRemove = document.createElement('a');
                    aRemove.id = "removeDr";
                    aRemove.classList.add('nav-link')
                    aRemove.href = "/pages/removeSite.php?dr=" + data.idDr

                    let h3Remove = document.createElement('h3');
                    h3Remove.classList.add('bi')
                    h3Remove.classList.add('bi-trash3')
                    h3Remove.style.color = "rgb(179, 173, 173)";

                    aRemove.prepend(h3Remove);

                    toolBarDr.append(aRemove)

                    let aNew = document.createElement('a');
                    aNew.id = "newA";
                    aNew.classList.add('nav-link')
                    aNew.href = "/pages/addSite.php?dr=" + data.idDr

                    let h3New = document.createElement('h3');
                    h3New.classList.add('bi')
                    h3New.classList.add('bi-plus-circle')
                    h3New.style.color = "rgb(179, 173, 173)";

                    aNew.prepend(h3New);

                    toolBarAd.append(aNew)
                }
            }
        });
    });
});