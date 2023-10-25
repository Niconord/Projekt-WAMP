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
<div class="card-group" style="width: 18rem;">
    <img class="card-img-top" src="uploads/<?php echo $billede->filmBillede; ?>" alt="Kort">
    <div class="card-body">


        <div class="col-12 border-bottom pb-3"><p class="OverInfoContainer">Filmens Navn: </p><br><h2><?php
            echo $info->filmnavn
            ?></h2></div>
        <div class="col-12 border-bottom pb-3">Filmgenre: <br><?php
            echo $info->filmgenre
            ?></div>
        <div class="col-12 border-bottom pb-3">Filmbeskrivelse: <br><?php
            echo $info->filmbeskrivelse
            ?></div>
        <div class="col-12 border-bottom pb-3">Fun facts: <br><?php
            echo $info->filmfunfact
            ?></div>
        <div class="col-12 border-bottom pb-3">Filmens længde: <br><?php
            echo $info->filmlaengde
            ?></div>
        <div class="col-12 border-bottom pb-3">Producer: <br><?php
            echo $info->filmproducer
            ?></div>
        <div class="col-12 border-bottom pb-3">Medvirkende: <br><?php
            echo $info->filmstjerner
            ?></div>
        <div class="col-12 border-bottom pb-3">Release Dato: <br><?php
            echo $info->filmrelease
            ?></div>
        <div class="col-12 border-bottom pb-3">Filmhistorie: <br><?php
            echo $info->filmstoryline
            ?></div>

    </div>
</div>
</div>
<?php
}
?>

<a href="index.php"><h4 class="d-flex justify-content-center p-2">Tilbage til filmoversigten</h4></a>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>