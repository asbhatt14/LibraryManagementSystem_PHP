<?php

class DatabaseConnection{

    var $servername = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "libraryManagement";
    var $conn1 = "";

    function createConection()
    {
        
            // Create connection
            $conn = mysqli_connect($this->servername, $this->username, $this->password);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            mysqli_close($conn);
    }

    function createDataBase()
    {

        // Create database
            $conn = mysqli_connect($this->servername, $this->username, $this->password);

            $sql = "CREATE DATABASE libraryManagement";
            if ($conn->query($sql) === TRUE) {
                echo "Database created successfully";
            } else {
                echo "Error creating database: " . $conn->error;
            }

            mysqli_close($conn);
    }

    function createAdminTable()
    {

            // sql to create table
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

            mysql_select_db($this->dbname);

            $sql = "CREATE TABLE Admin (
            adminId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            adminUserName VARCHAR(30) NOT NULL,
            password VARCHAR(30) NOT NULL,
            adminName VARCHAR(30) NOT NULL,
            adminGender VARCHAR(30) NOT NULL,
            adminEmail VARCHAR(50),
            address VARCHAR(50),
            city VARCHAR(50),
            province VARCHAR(30),
            zipcode VARCHAR(30),
            joinDate date
            )";

            if (mysqli_query($conn, $sql)) {
                echo "Table Admin created successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }

            mysqli_close($conn);

    }

    function createBookTable()
    {

            // sql to create table
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

            mysql_select_db($this->dbname);

            $sql = "CREATE TABLE Book (
            bookID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            bookTitle VARCHAR(30) NOT NULL,
            author VARCHAR(30) NOT NULL,
            publisher VARCHAR(50),
            edition VARCHAR(50),
            ISBN_no VARCHAR(50),
            price VARCHAR(30),
            NumOfCopies INT(6)
            )";

            if (mysqli_query($conn, $sql)) {
                echo "Table Book created successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }

            mysqli_close($conn);

    }

    function createStudentTable()
    {

            // sql to create table
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

            mysql_select_db($this->dbname);

            $sql = "CREATE TABLE Student (
				stdid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				name VARCHAR(30) NOT NULL,
				gender VARCHAR(30) NOT NULL,
				email VARCHAR(50),
				url VARCHAR(200),
                course VARCHAR(100),
				dob date,
				address VARCHAR(50),
				city VARCHAR(50),
				province VARCHAR(30),
				zipcode VARCHAR(30),
                numOfBooksRent INT(6)
				)";

            if (mysqli_query($conn, $sql)) {
                echo "Table Student created successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }

            mysqli_close($conn);

    }

    function createLibraryUser()
    {

            // sql to create table
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

            mysql_select_db($this->dbname);

            $sql = "CREATE TABLE LibraryUSer (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                loginId VARCHAR(50) NOT NULL,
				password VARCHAR(30) NOT NULL,
				gender VARCHAR(30) NOT NULL,
				CreationDate date
				)";

            if (mysqli_query($conn, $sql)) {
                echo "Table LibraryUSer created successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }

            mysqli_close($conn);

    }

    function createTranscationTable()
    {

            // sql to create table
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

            mysql_select_db($this->dbname);

            $sql = "CREATE TABLE Transcation (
				transcationId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                bookID INT(6) UNSIGNED, FOREIGN KEY (bookID) REFERENCES Book(bookID),
                stdid INT(6) UNSIGNED, FOREIGN KEY (stdid) REFERENCES Student(stdid),
                issueDate date,
                dueDate date,
                returnDate date,
                Description VARCHAR(100)
				)";

            if (mysqli_query($conn, $sql)) {
               // echo "Table LibraryUSer created successfully";
            } else {
               // echo "Error creating table: " . mysqli_error($conn);
            }

            mysqli_close($conn);

    }    


	function insertAdminData()
	{
			$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

            mysql_select_db($this->dbname);
            

			//Comment Code After Inserting Record On Load
            
            $sql = "INSERT INTO Admin (adminUserName,password,adminName, adminGender, adminEmail, address, city, province, zipcode, joinDate)
            VALUES('admin','admin@123','Ankur','Male','asbhat14@gmail.com','225 Van Horne','Toronto','ON','M2J2T9','2017-10-11')";

			//Comment Code After Inserting Record On Load


				if ($conn->query($sql) === TRUE) {
					//echo "New record created successfully";
				} else {
					//echo "Error: " . $sql . "<br>" . $conn->error;
				}

		$conn->close();
    }
    
    function createRequestTable(){
              // sql to create table
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
              
            mysql_select_db($this->dbname);

            $sql = "CREATE TABLE RequestTable (
                requestId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                bookID INT(6) UNSIGNED, FOREIGN KEY (bookID) REFERENCES Book(bookID),
                stdid INT(6) UNSIGNED, FOREIGN KEY (stdid) REFERENCES Student(stdid),
                status VARCHAR(6)
                )";

            if (mysqli_query($conn, $sql)) {
                echo "Table LibraryUSer created successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }

            mysqli_close($conn);      
    }

    function insertRequest($bookId,$stdID){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
        mysql_select_db($this->dbname);
    
        $sql = "INSERT INTO RequestTable (bookID, stdid, status)
        VALUES ('$bookId', '$stdID','ON')";
    
            if ($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }

        $conn->close();
    }

    function updateRequestStatus($id){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
        mysql_select_db($this->dbname);

        $sql = "UPDATE RequestTable SET 
		status = 'OFF'
		WHERE requestId= $id";

        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
        }

		$conn->close();
    }


    function tempConnection(){
		 $servername = "localhost";
		 $username = "root";
		 $password = "";
		 $dbname = "libraryManagement";
		
		$this->conn1 = mysqli_connect($servername,$username,$password,$dbname);
	}
    
}

?>