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

$sqlRequest = "SELECT * FROM RequestTable WHERE requestId = $requestId ";
$resultRequest = mysqli_query($databaseConnection->conn1, $sqlRequest);

if(mysqli_num_rows($resultRequest) > 0) {
	while($row=mysqli_fetch_assoc($resultRequest)){
        $bookId = $row['bookID'];
        $stdId = $row['stdid'];
	}
}

$sqlBooks = "SELECT * from Book where bookID = $bookId ";
$result = mysqli_query($databaseConnection->conn1, $sqlBooks);
if(mysqli_num_rows($result) > 0) {
	while($row=mysqli_fetch_assoc($result)){
        $updatedBookCopies = $row['NumOfCopies'];
        $updatedBookCopies = $updatedBookCopies - 1;
	}
}

$sqlStudent = "SELECT * from Student where stdid = $stdId ";
$resultStudent = mysqli_query($databaseConnection->conn1, $sqlStudent);
if(mysqli_num_rows($resultStudent) > 0) {
	while($row=mysqli_fetch_assoc($resultStudent)){
        $numOfBooksRent = $row['numOfBooksRent'];
        $numOfBooksRent = $numOfBooksRent - 1;
	}
}

$issueDate = date("Y/m/d");
$dueDate = date('Y-m-d', strtotime($issueDate. ' + 15 days'));

$transcation->setbookID($bookId);
$transcation->setStdId($stdId);
$transcation->setissueDate($issueDate);
$transcation->setdueDate($dueDate);
$transcation->setDescription("Transcation Approved");

$transcation->insertTranscation();
$book->updateBookQuantity($bookId,$updatedBookCopies);
$student->updateStudentBookQuantity($stdId,$numOfBooksRent);
$databaseConnection->updateRequestStatus($requestId);

echo "<script>
alert('Request Approved');
window.location.href='adminIndex.php';
</script>";
exit();
?>