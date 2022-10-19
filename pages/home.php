<?php
require_once("../include/auth.php");
redirectUser();

//unset($_SESSION['connected']);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=², initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>


    <title>Document</title>
</head>
<body>
    <style>.main-carousel{
            width: 100%;
            height: 500px;
    }
    .carousel-cell{
        width: 20%;
        height: 100%;
    }
    </style>

<div class="main-carousel">
  <div class="carousel-cell"><img src="https://www.imgacademy.com/themes/custom/imgacademy/images/helpbox-contact.jpg" alt=""></div>
  <div class="carousel-cell"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzk984jy6gaGDTIgJtqn9Vz2PI0w1PdKkz2jtuKjdrx_MLhqFlwgrOLxuVq__xmDCI_CM&usqp=CAU" alt=""></div>
  <div class="carousel-cell"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqFOnmObxC_NvvJVdkU_zlYo9EUgK0sx_AEAt4cQC5A-pSvHv4VDsGYzeDR9OXKXduAi0&usqp=CAU" alt=""></div>
  <div class="carousel-cell"><img src="https://www.imgacademy.com/themes/custom/imgacademy/images/helpbox-contact.jpg" alt=""></div>
  <div class="carousel-cell"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzk984jy6gaGDTIgJtqn9Vz2PI0w1PdKkz2jtuKjdrx_MLhqFlwgrOLxuVq__xmDCI_CM&usqp=CAU" alt=""></div>
  <div class="carousel-cell"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqFOnmObxC_NvvJVdkU_zlYo9EUgK0sx_AEAt4cQC5A-pSvHv4VDsGYzeDR9OXKXduAi0&usqp=CAU" alt=""></div>
  <div class="carousel-cell"><img src="https://www.imgacademy.com/themes/custom/imgacademy/images/helpbox-contact.jpg" alt=""></div>
  <div class="carousel-cell"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzk984jy6gaGDTIgJtqn9Vz2PI0w1PdKkz2jtuKjdrx_MLhqFlwgrOLxuVq__xmDCI_CM&usqp=CAU" alt=""></div>
  <div class="carousel-cell"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqFOnmObxC_NvvJVdkU_zlYo9EUgK0sx_AEAt4cQC5A-pSvHv4VDsGYzeDR9OXKXduAi0&usqp=CAU" alt=""></div>
</div>

<script>$('.main-carousel').flickity({
  // options
  cellAlign: 'left',
  contain: true
});
</script>

</body>
</html>