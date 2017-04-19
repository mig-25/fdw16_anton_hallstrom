<?php 
include_once("config.php");

$id = $_GET['id'];

$sql = "SELECT * FROM books WHERE book_id=:id"; 
$query = $conn->prepare($sql); 
$query->execute(array(':id' => $id)); 

// Fetch the book, and author id
while($row = $query->fetch()) { 
    $booktitle = $row['book_title']; 
    $authorid = $row['author_id']; 
    $bookpages = $row['book_pages'];
}

$authorSql = "SELECT * FROM authors"; 
$authorQuery = $conn->prepare($authorSql); 
$authorQuery->execute();
?>

<?php 
if(isset($_POST['update'])) { 
    $id = $_POST['id']; 

    $joketext=$_POST['booktitle']; 
    $authorid=$_POST['authorid']; 
    $bookpages=$_POST['bookpages'];


    $sql = "UPDATE books SET book_title=:booktitle, book_pages=:bookpages, author_id=:authorid WHERE book_id=:id";

    $query = $conn->prepare($sql); 
    // binds placeholders to variables
    $query->bindParam(':id', $id); 
    $query->bindParam(':booktitle', $joketext); 
    $query->bindparam(':authorid', $authorid);
     $query->bindparam(':bookpages', $bookpages);

    // executes what the query contains 
    $query->execute(); 

    header("Location: index.php"); 
} 
?> 
<!DOCTYPE html> 

<html> 
<head> 
<meta charset="UTF-8"> 
<title></title> 
</head> 
 <link rel="stylesheet" href="main.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.7.0/chosen.jquery.min.js"></script>
  <script src="main.js"></script>
<body>  
    <div class="btn"><a class="btn--link" href="index.php">Home</a></div> <br/><br/> 

    <form name="form1" method="post" action="edit.php"> 
        <table class="book-table book-table--edit">
        <tr> 
            <td>Title</td> 

            <td><textarea name="booktitle" rows="6" cols="40" ><?php echo $booktitle; ?></textarea></td>
        </tr> 
        <tr> 
            <td>Pages</td> 

            <td><input name="bookpages" value="<?php echo $bookpages; ?>" rows="6" cols="40" onfocus="this.placeholder = ''" placeholder="<?php echo $bookpages; ?>"></input></td>
        </tr> 
        <tr> 
            <td>Author</td>  
        <td>   
 
        <select name="authorid" > 
          <optgroup label="Authors">
                
     
    <?php 
    while($author = $authorQuery->fetch()) { 
    if ($author['author_id'] == $authorid) { 

    echo "<option class='chosen-select' value=\"{$author['author_id']}\" selected>{$author['firstName']} {$author['lastName']}</option>"; 
    } else { 

     echo "<option class='chosen-select' value=\"{$author['author_id']}\">{$author['firstName']} {$author['lastName']}</option>"; 
    }        
    } 
    ?>  
              </optgroup>
        </select> 
            </td> 
        </tr> 

        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?></td> 
            <td><input class="btn--link btn-update" type="submit" name="update" value="Update"></td> 
        </tr>   
    </table> 
</form>
</body>
</html>