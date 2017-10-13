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

$transcationId = $returnDate = $bookId =$updatedBookCopies = $stdId = "";
$dueDate = "";

if(!empty($_GET["transcationId"])){
    $transcationId = $_GET["transcationId"];
    $returnDate = $_GET["returnDate"];
}

echo $transcationId;

$sql = "SELECT * from Transcation WHERE transcationId = $transcationId ";
$result = mysqli_query($databaseConnection->conn1, $sql);

if(mysqli_num_rows($result) > 0) {
	while($row=mysqli_fetch_assoc($result)){
        $bookId = $row['bookID'];   
        $stdId = $row['stdid'];    
        $dueDate = $row['dueDate']; 
	}
}

$sqlBook = "SELECT * from Book where bookID = $bookId ";
$resultBook = mysqli_query($databaseConnection->conn1, $sqlBook);

if(mysqli_num_rows($resultBook) > 0) {
	while($row=mysqli_fetch_assoc($resultBook)){
        $updatedBookCopies = $row['NumOfCopies'];
        $updatedBookCopies = $updatedBookCopies + 1;
	}
}

$sqlStudent = "SELECT * from Student where stdid = $stdId ";
$resultStudent = mysqli_query($databaseConnection->conn1, $sqlStudent);
if(mysqli_num_rows($resultStudent) > 0) {
	while($row=mysqli_fetch_assoc($resultStudent)){
        $numOfBooksRent = $row['numOfBooksRent'];
        $numOfBooksRent = $numOfBooksRent + 1;
	}
}

// if($returnDate>$dueDate){

// }else{
    
// }

// $returnDate = '2017-11-29';
// $fineAmount = 3.0 * (($returnDate - $dueDate)/(1000 * 60 * 60 * 24));

// echo $fineAmount;

$transcation->updateTranscationReturnDate($transcationId,$returnDate);
$book->updateBookQuantity($bookId,$updatedBookCopies);
$student->updateStudentBookQuantity($stdId,$numOfBooksRent);

echo "<script>
alert('Book Returned Succesfully');
window.location.href='userIndex.php';
</script>";
exit();
?>