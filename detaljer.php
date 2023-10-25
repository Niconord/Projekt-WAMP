<?php
require "settings/init.php";

if (isset($_GET['filmid'])) {

    $valgtFilmID = $_GET['filmid'];


    $filmBillede = $db->sql("SELECT filmBillede FROM film WHERE filmid = $valgtFilmID");
    $film = $db->sql("SELECT * FROM film WHERE filmid = $valgtFilmID");


}
?>

<!DOCTYPE html>
<html lang="da">
<head>
	<meta charset="utf-8">

	<title>Sigende titel</title>

	<meta name="robots" content="All">
	<meta name="author" content="Udgiver">
	<meta name="copyright" content="Information om copyright">

	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/styles.css" rel="stylesheet" type="text/css">

	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
foreach ($filmBillede as $billede){
?>

<?php
}
?>

<?php
foreach ($film as $info){
?>
<div class="row d-flex justify-content-evenly">
<div class="card-group" style="width: 40rem;">
    <img class="card-img-top" style="max-height: 25rem; object-fit: contain" src="uploads/<?php echo $billede->filmBillede; ?>" alt="Kort">
    <div class="card-body">


        <div class="col-12 border-bottom pb-3"><p class="OverInfoContainer">Filmens Navn: </p><br><h2><?php
            echo $info->filmnavn
            ?></h2></div>
        <div class="col-12 border-bottom pb-3"><p class="OverInfoContainer">Filmens genre: </p><br><?php
            echo $info->filmgenre
            ?></div>
        <div class="col-12 border-bottom pb-3"><p class="OverInfoContainer">Film Beskrivelse: </p><br><?php
            echo $info->filmbeskrivelse
            ?></div>
        <div class="col-12 border-bottom pb-3"><p class="OverInfoContainer">Film Fun Fact: </p><br><?php
            echo $info->filmfunfact
            ?></div>
        <div class="col-12 border-bottom pb-3"><p class="OverInfoContainer">Filmens Længde: </p><br><?php
            echo $info->filmlaengde
            ?></div>
        <div class="col-12 border-bottom pb-3"><p class="OverInfoContainer">Filmens producer: </p><br><?php
            echo $info->filmproducer
            ?></div>
        <div class="col-12 border-bottom pb-3"><p class="OverInfoContainer">Filmens stjerner: </p><br><?php
            echo $info->filmstjerner
            ?></div>
        <div class="col-12 border-bottom pb-3"><p class="OverInfoContainer">Filmens Udgivelsesdato: </p><br><?php
            echo $info->filmrelease
            ?></div>
        <div class="col-12 border-bottom pb-3"><p class="OverInfoContainer">Filmens Storyline: </p><br><?php
            echo $info->filmstoryline
            ?></div>

    </div>
</div>
</div>
<?php
}
?>

<a href="index.html"><h4 class="d-flex justify-content-center p-2">Tilbage til filmoversigten</h4></a>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>