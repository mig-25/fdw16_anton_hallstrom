<?php 

include_once("config.php");


if(isset($_POST['Submit'])) {    
    $booktitle = $_POST['booktitle'];
    $authorid = $_POST['authorid'];
    $bookpages = $_POST['bookpages'];  
    // checking empty fields
    if(empty($booktitle) || empty($authorid) || empty($bookpages)) {
                
        if(empty($booktext)) {
            echo "<font color='red'>Title is empty.</font><br/>";
        }
        
        if(empty($authorid)) {
            echo "<font color='red'>Author id is empty.</font><br/>";
        }
        
        if(empty($bookpages)) {
            echo "<font color='red'>Pages is empty</font><br/>";
        } 
        
        //link to the previous page
 
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database        
        $sql = "INSERT INTO books(book_title, author_id, book_pages) VALUES(:booktitle, :authorid, :bookpages)";
        $query = $conn->prepare($sql);
                
        $query->bindparam(':booktitle', $booktitle);
        $query->bindparam(':authorid', $authorid);
        $query->bindparam(':bookpages', $bookpages);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':joketext' => $joketext, ':authorId' => $authorId));
        
        //display success message
        echo "<h4 class='msg-success'>Data added successfully.</h4>";
        echo "<div class='btn'><a class='btn--link' href='index.php'>Visit Home</a></div>";
    } 
}
$authorSql = "SELECT * FROM authors"; 
$authorQuery = $conn->prepare($authorSql); 
$authorQuery->execute(); 

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
    
        
         <div class="btn"><a class="btn--link" href="index.php">Home</a></div> 
     
    <form method="post" name="form1" action="add_book.php"> 
        <table class="book-table book-table--edit">  
        <tr> 
            <td>Title</td> 

            <td><textarea name="booktitle" rows="6" cols="40" ><?php echo $booktitle; ?></textarea></td>
        </tr> 
        <tr> 
            <td>Pages</td> 

            <td><input name="bookpages" rows="6" cols="40" onfocus="this.placeholder = ''" placeholder="<?php echo $bookpages; ?>"></input></td>
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
            <td><input class="btn--link btn-update btn--edit" type="submit" name="Submit" value="Add Book"></td> 
        </tr>    
    </table>  
</form>
</body>
</html>