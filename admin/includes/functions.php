<?php 


function confirm($result){
    
    global $connection;
     if(!$result){
        
        die("Failed Query".mysqli_error($connection));
    }
    
    
}





//INSERT

function addCategories(){
    
global $connection;
if(isset($_POST['submit'])){
                                
                                $cat_title = $_POST['cat_title'];
                                
                                
                                if($cat_title == "" || empty($cat_title)){
                                    
                                    
                                    echo"The field cannot be empty";
                                    
                                    
                                }
                                else{
                                    
                                    
                                    
                                    $query = "INSERT INTO categories(cat_title)";
                                    $query .= "VALUE ('{$cat_title}')";
                                    
                                    $create_category_query = mysqli_query($connection, $query);
                                    
                                    if(!$create_category_query){
                                        
                                        
                                        die("Query Failed".mysqli_error($connection));
                                        
                                        
                                    }
                               }
                        }
                            
}



//READ FROM DATABASE

function FindALlcategories(){
    global $connection;
    
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

                                           
                                           
                                               while($row = mysqli_fetch_assoc($select_categories)){
                                                    $cat_id = $row['cat_id']; 
                                                    $cat_title = $row['cat_title'];

                                                    echo "<tr>";    
                                                    echo "<td>{$cat_id}</td>";     

                                                    echo "<td>{$cat_title}</td>";
                                                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>"; 
                                                     

                                                     echo"</tr>";
                     }

    
    
    
}

//DELETE

function Delete_Categories(){
    global $connection;
    
    
    if(isset($_GET['delete'])){
                                               
      $the_cat_id = $_GET['delete'];
                                               
      $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
      $delete_query = mysqli_query($connection, $query);
      header("Location: categories.php");

     }
                                           
    
    
    
}



                            


















?>