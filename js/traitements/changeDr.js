let nodes = document.querySelectorAll('input[name="drSelector"]');

nodes.forEach((node) => {
    node.addEventListener("change", (event) => {

        var value = {'dr':event.target.id};
        let section = document.getElementById('ad');
        let carousel = section.firstElementChild;
        
        section.removeChild(carousel);

        carousel = document.createElement('div');
        carousel.classList.add("carousel");
        section.prepend(carousel)
    
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

                $.each(data, function (index, value) {

                    var $cellElems = $('<input type="radio" name="adSelector" id="' + value.ID_Site + '">');
                    flkty.append( $cellElems)

                    var $cellElem = $('<div class="carousel-cell"> <label for="' + value.ID_Site + '"> <img src="'+value.Image+'" alt="Icon maison"> <p><b>' + value.Reference + "</b></p> <br> <p class=\"adress\"><b>" + value.Adresse + '</b></p></label></div>');
                    flkty.append( $cellElem)

                })
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

                if (data.CAN_INTERACTION && data.idDr != "") {

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

                    let aEdit = document.createElement('a');
                    aEdit.id = "editDr";
                    aEdit.classList.add('nav-link')
                    aEdit.href = "/pages/editSite.php?dr=" + data.idDr

                    let h3Edit = document.createElement('h3');
                    h3Edit.classList.add('bi')
                    h3Edit.classList.add('bi-pencil-square')

                    aEdit.prepend(h3Edit);

                    toolBarDr.append(aEdit)

                    let aRemove = document.createElement('a');
                    aRemove.id = "removeDr";
                    aRemove.classList.add('nav-link')
                    aRemove.href = "/pages/removeSite.php?dr=" + data.idDr

                    let h3Remove = document.createElement('h3');
                    h3Remove.classList.add('bi')
                    h3Remove.classList.add('bi-trash3')

                    aRemove.prepend(h3Remove);

                    toolBarDr.append(aRemove)

                    let aNew = document.createElement('a');
                    aNew.id = "newA";
                    aNew.classList.add('nav-link')
                    aNew.href = "/pages/addSite.php?dr=" + data.idDr

                    let h3New = document.createElement('h3');
                    h3New.classList.add('bi')
                    h3New.classList.add('bi-plus-circle')

                    aNew.prepend(h3New);

                    toolBarAd.append(aNew)
                }
            }
        });
    });
});