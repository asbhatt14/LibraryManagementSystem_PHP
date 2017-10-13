<?php

class Students{
    var $stdID;
    var $stdName;
    var $stdGender;
    var $dateOfBirth;
    var $stdEmail;
    var $webURL;
    var $stdCourse;
    var $address;
    var $city;
    var $province;
    var $postalCode;
    var $passwordLogin;

    var $servername = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "libraryManagement";
    var $conn1 = "";
    
    function setStdID($stdID)
	{
		$this->stdID = $stdID;
    }
    
    function setStdName($stdName){
        $this->stdName = $stdName;
    }

    function setStdGender($stdGender){
        $this->stdGender = $stdGender;
    }

    function setDateOfBirth($dateOfBirth){
        $this->dateOfBirth = $dateOfBirth;
    }

    function setStdEmail($stdEmail){
        $this->stdEmail = $stdEmail;
    }

    function setWebURL($webURL){
        $this->webURL = $webURL;
    }

    function setStdCourse($stdCourse){
        $this->stdCourse = $stdCourse;
    }

    function setAddress($address){
        $this->address = $address;
    }

    function setCity($city){
        $this->city = $city;
    }

    function setProvince($province){
        $this->province = $province;
    }

    function setPostalCode($postalCode){
        $this->postalCode = $postalCode;
    }
    function setPassword($passwordLogin){
        $this->passwordLogin = $passwordLogin;
    }

    function insertStudent(){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
        mysql_select_db($this->dbname);

        $sql = "INSERT INTO Student (name, gender, email, url, course, dob, address, city,province,zipcode,numOfBooksRent)
        VALUES ('$this->stdName', '$this->stdGender','$this->stdEmail','$this->webURL','$this->stdCourse','$this->dateOfBirth','$this->address','$this->city','$this->province','$this->postalCode',2)";
    
            if ($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }

        $conn->close();
    }
    function insertLibraryUser(){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
        mysql_select_db($this->dbname);

        $dateTime = date("Y/m/d");

        $sql = "INSERT INTO LibraryUSer (loginId, password, gender, CreationDate)
        VALUES ('$this->stdEmail', '$this->passwordLogin','Male','$dateTime')";
    
            if ($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }

        $conn->close();
    }
    function updateStudentDetails($id){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
        mysql_select_db($this->dbname);

        
        $sql = "UPDATE Student SET 
        name = '$this->stdName',gender = '$this->stdGender',url ='$this->webURL',
        course ='$this->stdCourse',dob = '$this->dateOfBirth',address = '$this->address',city = '$this->city',province = '$this->province',zipcode = '$this->postalCode'
        WHERE stdid= $id";

    
            if ($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }

        $conn->close();
    }

    function updateStudentBookQuantity($id,$numOfBooksRent){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
        mysql_select_db($this->dbname);

        
        $sql = "UPDATE Student SET 
        numOfBooksRent = $numOfBooksRent
        WHERE stdid= $id";

    
            if ($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }

        $conn->close();
    }

    function changePassword($newPassword,$login_session){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
        mysql_select_db($this->dbname);
        $sql = "UPDATE LibraryUSer SET 
        password = '$newPassword'
        WHERE loginId= '$login_session'";
            if ($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
    }
}
?>