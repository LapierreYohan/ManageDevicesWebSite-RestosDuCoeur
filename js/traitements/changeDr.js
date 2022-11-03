const nodes = document.querySelectorAll('input[name="drSelector"]');

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
            url: "/include/traitements/dr.php",
            dataType:"json",
            data:value, 
            success: function(data){

                $.each(data, function (index, value) {

                    var $cellElems = $('<input type="radio" name="adSelector" id="' + value.ID_Site + '">');
                    flkty.append( $cellElems)

                    var $cellElem = $('<div class="carousel-cell"> <label for="' + value.ID_Site + '"> <img src="/img/icon/Association départementale.png" alt="Icon maison"> <p>' + value.Reference + '</p></label></div>');
                    flkty.append( $cellElem)

                })
            }
        });

        var value2 = {'buttons':event.target.id};
        
        $.ajax({
            type: "POST",
            url: "/include/traitements/dr.php",
            dataType:"json",
            data:value2, 
            success: function(data){
                console.log(data);
            }
        });
    });
});