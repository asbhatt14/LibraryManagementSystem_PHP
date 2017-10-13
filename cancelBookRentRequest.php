<?php
require "dbConnect.php";
require "books.php";
require "student.php";
require "Transcations.php";

$databaseConnection = new DatabaseConnection;
$book = new Books;
$student = new Students;
$transcation = new Transcations;

$databaseConnection->tempConnection();

$requestId = $bookId= $stdId = "";
$updatedBookCopies = $numOfBooksRent = "";

if(!empty($_GET["requestId"])){
    $requestId = $_GET["requestId"];
}

$databaseConnection->updateRequestStatus($requestId);
echo "<script>
alert('Request Canceld');
window.location.href='adminIndex.php';
</script>";
exit();
?>