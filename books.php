<?php

class Books{
    var  $id;
	var  $bookTitle;
	var  $authorName;
	var  $publisherName;
	var  $edition;
	var  $ISBN_num;
	var  $price;
    var  $numCopies;

    var $servername = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "libraryManagement";
	var $conn1 = "";
    
    function setId($id)
	{
		$this->id = $id;
	}
	function setBookTtile($bookTitle)
	{
		$this->bookTitle = $bookTitle;
	}
	function setAuthorName($authorName)
	{
		$this->authorName = $authorName;
	}
	function setPublisherName($publisherName)
	{
		$this->publisherName = $publisherName;
	}
	function setEdition($edition)
	{
		$this->edition = $edition;
	}
	function setISBN_num($ISBN_num)
	{
		$this->ISBN_num = $ISBN_num;
	}
	function setPrice($price)
	{
		$this->price = $price;
	}
	function setNumCopies($numCopies)
	{
		$this->numCopies = $numCopies;
	}


	function getId()
	{
		echo $this->id ."<br/>";
	}
	function getBookTtile()
	{
		echo $this->bookTitle ."<br/>";
	}
	function getAuthorName()
	{
		echo $this->authorName ."<br/>";
	}
    function getPublisherName()
	{
		echo $this->publisherName ."<br/>";
	}
	function getEdition()
	{
		echo $this->edition ."<br/>";
	}
	function getISBN_num()
	{
		echo $this->ISBN_num ."<br/>";
	}
	function getPrice()
	{
		echo $this->price ."<br/>";
	}
	function getNumCopies()
	{
		echo $this->numCopies ."<br/>";
    }
    
    function insertBookDetails()
	{
			$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

            mysql_select_db($this->dbname);
  
			//Comment Code After Inserting Record On Load
			$sql = "INSERT INTO Book (bookTitle, author, publisher, edition, ISBN_no, price, NumOfCopies)
            VALUES ('How Life Learned to Live: Adaptation in Nature','Ronald S. Calinger','MIT Press','1','ISBN 978-0-262-20045-5','100',10),
            ('Physics in Molecular Biology','Frank H','Cambridge University Press','3','ISBN 0-521-84419-3','70',10),
            ('The Early Universe','Jerrold Grossman','Addison Wesley','5','ISBN 0-201-11604-9','72',10),
            ('Methods of theoretical physics','Linda Pulsinellir','New York: McGraw-Hill','4','ISBN 978-0-07-043316-8','60',10)";
            
		
	        // $sql = "INSERT INTO Book (bookTitle, author, publisher, edition, ISBN_no, price, NumOfCopies)
	        // VALUES ('$this->bookTitle', '$this->authorName','$this->publisherName','$this->edition','$this->ISBN_num','$this->price',$this->numCopies)";
        
				if ($conn->query($sql) === TRUE) {
					//echo "New record created successfully";
				} else {
					//echo "Error: " . $sql . "<br>" . $conn->error;
				}

		    $conn->close();
	}

	function updateBookDetails($id)
	{
			$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

            mysql_select_db($this->dbname);
  
			
			$sql = "UPDATE Book SET 
			bookTitle = '$this->bookTitle',author = '$this->authorName',publisher = '$this->publisherName',edition ='$this->edition',
			ISBN_no ='$this->ISBN_num',price = '$this->price',NumOfCopies = $this->numCopies
			WHERE bookID= $id";

		
				if ($conn->query($sql) === TRUE) {
					//echo "New record created successfully";
				} else {
					//echo "Error: " . $sql . "<br>" . $conn->error;
				}

		    $conn->close();
	}

	function updateBookQuantity($id,$updatedBookCopies){
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

		mysql_select_db($this->dbname);
		
		$sql = "UPDATE Book SET 
		NumOfCopies = $updatedBookCopies
		WHERE bookID= $id";

	
			if ($conn->query($sql) === TRUE) {
				//echo "New record created successfully";
			} else {
				//echo "Error: " . $sql . "<br>" . $conn->error;
			}

		$conn->close();
	}

	function deleteBookDetails($id){
		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		mysql_select_db($this->dbname);

		// sql to delete a record
			$sql = "DELETE FROM Book WHERE bookID=$id";

			if ($conn->query($sql) === TRUE) {
			//	echo "Record deleted successfully";
			} else {
			//	echo "Error deleting record: " . $conn->error;
			}

		$conn->close();
	}
	
}
?>