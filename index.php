<?php
$path = "";
if (isset($_GET['path']))
    $path = $_GET['path'];
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Moje súbory</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="javascript/script.js"></script>
</head>
<body>
<header class="main-header">
    <h1 class="files-h1">Moje súbory</h1>
</header>
<section id="main-section">
    <article id="main-article">
        <div id="table-div" class="table-responsive-md">
            <header id="article-header">
                <?php
                $href = "index.php";
                if (strrpos(rtrim($path,'/'),'/'))
                    $href = "?path=".substr($path,0,strrpos(rtrim($path,"/"),'/')+1);
                echo "<a id='previous-folder' href='$href'><img src='pictures/previous-folder.svg' width='32' height='32' alt='previous-folder'></a>";
                echo "<h2 id='article-h2'>files/$path</h2>"
                ?>
            </header>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="sort" onclick="nameSort()">Názov súboru</th>
                        <th class="sort" onclick="sizeSort()">Veľkosť súboru</th>
                        <th class="sort" onclick="datumSort()">Dátum súboru</th>
                    </tr>
                </thead>
                <tbody id="table-content">
                    <?php
                    $dir_handle = @opendir("../files/".$path) or die("Nastala neočakávaná chyba. Nebolo možné otvoriť adresár.");
                    while ($file = readdir($dir_handle)){
                        if ($file != "." and $file !="..")
                        {
                            if (is_dir("../files/".$path.$file)){
                                echo "<tr class='dir-tr' onclick=\"window.location='?path=$path$file/'\"><td class='file-name'>$file</td><td></td><td></td></tr>";

                            }else{
                                $fileName=0;
                                if (strpos($file,"-timestamp")){
                                    $type = substr($file,strrpos($file,"."));
                                    $fileName = substr($file,0,strrpos($file,"_"));
                                    $fileName = $fileName.$type;
                                }
                                else
                                    $fileName = $file;

                                echo "<tr><td class='file-name'>$fileName</td><td class='file-size'>".(filesize("../files/".$path.$file)/1000)." kB</td><td class='file-datum'>".date("d.m.Y H:i:s", filectime("../files/".$path.$file))."</td></tr>";
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </article>
    <div id="upload-image">
        <a id="upload-href" href="upload-form.html" data-toggle="tooltip" title="Pridať súbor"><img src="pictures/upload.svg" alt="upload"></a>
    </div>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</section>
<footer>
    <span id="designedBy">Designed by <a id="footer-href" href="http://147.175.121.202/~xpopikt/7243zadanie1/index.html">Tomáš Popík &copy; </a></span>
</footer>
</body>
</html>
