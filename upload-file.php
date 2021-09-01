<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Info stránka</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<header id="info-header">
    <?php
    $upload = 1;
    if(!isset($_POST["submit"]) || $_FILES["fileUpload"]["error"] == 4){
        echo "<h1>Odosielanie súboru bolo <span>neúspešné</span></h1>";
        echo "<span>Nebol nahraný žiaden súbor.</span>";
        $upload = 0;
    }
    if($upload && $_FILES["fileUpload"]["error"] == 1){
        echo "<h1>Odosielanie súboru bolo <span>neúspešné</span></h1>";
        echo "<span>Súbor musí byť menší ako 2MB.</span>";
        $upload = 0;
    }
    if($upload && $_FILES["fileUpload"]["error"] == 3){
        echo "<h1>Odosielanie súboru bolo <span>neúspešné</span></h1>";
        echo "<span>Súbor bol iba čiastočne odoslaný. Skúste to prosím znova.</span>";
        $upload = 0;
    }
    if($upload && $_FILES["fileUpload"]["error"] == 5){
        echo "<h1>Odosielanie súboru bolo <span>neúspešné</span></h1>";
        echo "<span>Skúste to prosím znova.</span>";
        $upload = 0;
    }
    if ($upload == 1){
        $fileName = $_POST["fileName"];
        $fileType = $_FILES["fileUpload"]["type"];
        $type = substr($fileType,strpos($fileType,"/") +1);
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"../files/".$fileName."_".time()."-timestamp.".$type)){
            echo "<h1>Odosielanie súboru bolo <span>úspešné</span></h1>";
        }
        else{
            echo "<h1>Odosielanie súboru bolo <span>neúspešné</span></h1>";
            echo "<span>Skúste to prosím znova</span>";
        }
    }
        ?>
</header>
<section id="info-site-section">
    <a id="upload-href" href="upload-form.html" data-toggle="tooltip" title="Pridať súbor"><img src="pictures/upload.svg" alt="upload"></a>
    <a id="folder" href="index.php" data-toggle="tooltip" title="Zobraziť súbory"><img src="pictures/folder.svg" alt="folder"></a>

</section>
<footer>
    <span id="designedBy">Designed by <a id="footer-href" href="http://147.175.121.202/~xpopikt/7243zadanie1/index.html">Tomáš Popík &copy; </a></span>
</footer>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>

