<?php
require "settings/init.php";

if (!empty($_POST["data"])) {
    $data = $_POST["data"];
    $file = $_FILES;

    if(!empty($file["filmBillede"]["tmp_name"])){
        move_uploaded_file($file["filmBillede"]["tmp_name"], "uploads/" . basename($file["filmBillede"]["name"]));
    }



    $sql = "INSERT INTO film (filmnavn, filmgenre, filmbeskrivelse, filmlaengde, filmrelease, filmproducer, filmstjerner, filmfunfact, filmstoryline, filmBillede) VALUES(:filmnavn, :filmgenre, :filmbeskrivelse, :filmlaengde, :filmrelease, :filmproducer, :filmstjerner, :filmfunfact, :filmstoryline, :filmBillede)";
    $bind = [
            ":filmnavn" => $data["filmnavn"],
            ":filmgenre" => $data["filmgenre"],
            ":filmbeskrivelse" => $data["filmbeskrivelse"],
            ":filmlaengde" => $data["filmlaengde"],
            ":filmrelease" => $data["filmrelease"],
            ":filmproducer" => $data["filmproducer"],
            ":filmstjerner" => $data["filmstjerner"],
            ":filmstoryline" => $data["filmstoryline"],
            ":filmfunfact" => $data["filmfunfact"],
            ":filmBillede" => (!empty($file["filmBillede"]["tmp_name"])) ? $file["filmBillede"]["name"]: NULL,
    ];

    $db->sql($sql, $bind, false);
    header('location: insert.php');
    exit;

}
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Insert til database</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="https://cdn.tiny.cloud/1/sukhkz3zmnkup81prn7lr2mudda6ow0dgpkl7yc293kv8ib3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


    <script>
        tinymce.init({
            selector: '#filmBeskrivelseEdit'
        });
    </script>

</head>

<body>

<form method="post" action="insert.php" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12">
            <label class="form-label" for="filmBillede">Filmbillede</label>
            <input type="file" class="form-control" id="filmBillede" name="filmBillede">
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="filmnavn">Filmnavn</label>
                <input class="form-control" type="text" name="data[filmnavn]" id="filmnavn" placeholder="Filmnavn" value="">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="filmgenre">Film genre</label>
                <input class="form-control" type="text" name="data[filmgenre]" id="filmgenre" placeholder="Film genre" value="">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="filmbeskrivelse">Film beskrivelse</label>
                <input class="form-control" type="text" name="data[filmbeskrivelse]" id="filmbeskrivelse" placeholder="Film beskrivelse" value="">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="filmlaengde">Filmens Længde</label>
                <input class="form-control" type="text" name="data[filmlaengde]" id="filmlaengde" placeholder="Filmens længde" value="">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="filmproducer">Filmens Producer</label>
                <input class="form-control" type="text" name="data[filmproducer]" id="filmproducer" placeholder="Filmens producer" value="">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="filmstjerner">Filmens Stjerner</label>
                <input class="form-control" type="text" name="data[filmstjerner]" id="filmstjerner" placeholder="Filmens stjerner" value="">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="filmrelease">Filmens release dato</label>
                <input class="form-control" type="text" name="data[filmrelease]" id="filmrelease" placeholder="Hvornår kommer filmen ud?" value="">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="filmstoryline">Filmens storyline</label>
                <input class="form-control" type="text" name="data[filmstoryline]" id="filmstoryline" placeholder="Filmens storyline" value="">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="filmfunfact">Filmens fun fact</label>
                <input class="form-control" type="text" name="data[filmfunfact]" id="filmfunfact" placeholder="Filmens fun facts" value="">
            </div>
        </div>

        <h1>TinyMCE</h1>
        <form method="post">
            <textarea id="filmBeskrivelseEdit">Indsæt information her</textarea>
        </form>


        <div class="col-12 col-md-6 offset-md-6">
            <button class="form-control btn btn-primary" type="submit" id="btnSubmit">Gem din film her</button>
        </div>
    </div>
</form>






<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

