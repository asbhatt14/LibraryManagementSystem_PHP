<?php

class Transcations{

    var $transcationID;
    var $bookID;
    var $stdID;
    var $issueDate;
    var $dueDate;
    var $returnDate;
    var $Description;

    var $servername = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "libraryManagement";
    var $conn1 = "";

    function setTranscationID($transcationID){
        $this->transcationID = $transcationID;
    }

    function setStdId($stdID){
        $this->stdID = $stdID;
    }

    function setbookID($bookID){
        $this->bookID = $bookID;
    }
    
    function setissueDate($issueDate){
        $this->issueDate = $issueDate;
    }

    function setdueDate($dueDate){
        $this->dueDate = $dueDate;
    }

    function setreturnDate($returnDate){
        $this->returnDate = $returnDate;
    }

    function setDescription($Description){
        $this->Description = $Description;
    }

    function insertTranscation(){

        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
        mysql_select_db($this->dbname);
          
        $sql = "INSERT INTO Transcation (bookID, stdid, issueDate, dueDate, returnDate, Description)
        VALUES ('$this->bookID', '$this->stdID','$this->issueDate','$this->dueDate','$this->returnDate','$this->Description')";
    
            if ($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }

        $conn->close();
    }

    function updateTranscationReturnDate($id,$returnDate){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
        mysql_select_db($this->dbname);

        $sql = "UPDATE Transcation SET
        returnDate = '$returnDate'
        where transcationId = $id
        ";

        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>