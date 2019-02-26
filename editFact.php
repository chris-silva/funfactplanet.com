<?php

require_once "info.php";

$originalFact = $_POST['originalFact'];
$editedFact = $_POST['editedFact'];

$editedFact = addslashes($editedFact);
$originalFact = addslashes($originalFact);

$query = "UPDATE facts SET fact='$editedFact' WHERE fact='$originalFact'";
mysqli_query($link, $query);
?>