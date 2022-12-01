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
        section.prepend(carousel)

        carousel2 = document.createElement('div');
        carousel2.classList.add("carousel");
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

                $.each(data, function (index, value) {

                    var $cellElems = $('<input type="radio" name="uoSelector" id="' + value.ID_Site + '">');
                    flkty.append( $cellElems)

                    var $cellElem = $('<div class="carousel-cell"> <label for="' + value.ID_Site + '"> <img src="'+value.Image+'" alt="Icon maison"> <p><b>' + value.Reference + "</b></p> <br> <p class=\"adress\"><b>" + value.Adresse + '</b></p></label></div>');
                    flkty.append( $cellElem)

                })
                /*let script = document.createElement('script');
                script.src = "/js/traitements/changeAd.js";
                section.prepend(script);*/
            }
        });


        var value3 = {'materiels':event.target.id};
        
        $.ajax({
            type: "POST",
            url: "/includes/traitements/ad.php",
            dataType:"json",
            data:value3, 
            success: function(data){
                $.each(data, function (index, value) {

                    var $cellElems = $('<input type="radio" name="maSelector" id="' + value.Reference_Materiel + '">');
                    flkty2.append( $cellElems)

                    var $cellElem = $('<div class="carousel-cell"> <label for="' + value.Reference_Materiel + '"> <img src="'+value.image+'" alt="Icon Matériels"> <p><b>' + value.Reference_Materiel + '</b></p></label></div>');
                    flkty2.append( $cellElem)
                })
            }
        });
        
        var value2 = {'buttons':event.target.id};
        
        $.ajax({
            type: "POST",
            url: "/includes/traitements/ad.php",
            dataType:"json",
            data:value2, 
            success: function(data){
                console.log(data);
            }
        });
    });
});