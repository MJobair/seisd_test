
<?php

$databaseHost='localhost';
$databaseName='test';
$databaseUsername='root';
$databasePassword='';
$cont=mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);
if(!$cont){
	die("Connection failed: ".mysqli_connect_error());
}
else{
 echo"Connected Successfully";
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Library Managemant</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="test2.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addbook.php">Add book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="borrow.php">Borrow</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="returnbook.php">Return Book</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0"action="" method="post">
                <input class="form-control mr-sm-2" type="text" name ="bookdata" placeholder="Title/Aurher name/ISBN">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search" >Search Book</button>
            </form>
        </div>
    </nav>
    <?php
          if(isset($_POST['search'])){
            $on=$_POST['bookdata'];
            $query = "SELECT * FROM tbl_book WHERE name= '$on' or pbdate='$on' or isbn='$on'";
            $data=mysqli_query($cont,$query);
            if($data){
            $track_data = mysqli_fetch_assoc($data);
            
        ?>
        
        <div class=" d-flex justify-content-center"><p class="pt-5 font-weight-bolder userfont">Book Information</p>
                                    </div>

    <table class="table table-bordered text-center mt-5">
      <!--<thead>
        <tr>
          <th>Process</th>
          <th>Status</th>
        </tr>
      </thead>-->
      <tbody>
      
        <tr>
          <td class="py-5">Book Name</td>
          <td class="py-5"><?php echo $track_data['name'];?></td>
        </tr>
        <tr>
          <td class="py-5">Publisher Name</td>
          <td class="py-5"><?php echo $track_data['pbname'];?></td>
        </tr>
        <tr>
          <td class="py-5">Author Name</td>
          <td class="py-5"><?php echo $track_data['pbdate'];?></td>
        </tr>
        <tr>
          <td class="py-5">ISBN</td>
          <td class="py-5"><?php echo $track_data['isbn'];?></td>
        </tr>
        <tr>
          <td class="py-5">Edition</td>
          <td class="py-5"><?php echo $track_data['edition'];?></td>
        </tr>
        
      </tbody>
      <?php
      //  }
      ?>
    </table>
            <?php }
            else{  ?>
    <p class="text-center">NO Order Found!</p>
   <?php } 
   }
   ?>

<form action="" method="post">
                                <div class="container box pb-3">
                                    <div class=" d-flex justify-content-center"><p class="pt-5 font-weight-bolder userfont">Borrow BOOK</p>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <input type="text"  placeholder="Enter Your Book ISBN" name="isbn">
                                        <span id="userNameMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <input type="text"  placeholder="Enter User ID" name="user"  >
                                        <span id="userEmailMess" class="text-danger"></span>
                                    </div>
                                    <div class="my-2 boxinfo ">
                                        <select name="ncopy">
                                    <option value="">Enter number of copies</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                                </div>
        
                                    <div class=" my-2 boxinfo">
                                    <label style="font-weight:bold;">Current Date</label>
                                        </div>
                                        <div class=" my-2 boxinfo">
                                        <input type="date" name="cd"  ?>
                                        <span id="userNumMess" class="text-danger"></span>
                                    </div>
                                    <div class=" my-2 boxinfo">
                                    <label style="font-weight:bold;">Return Date</label>
                                        </div>
                                        <div class=" my-2 boxinfo">
                                        <input type="date" name="rd"  ?>
                                        <span id="userNumMess" class="text-danger"></span>
                                    </div>
                                    
                                    <div class="my-2 d-flex" >
                                        <input type="submit" class="btn btn-sm btn-outline-danger btnSin px-5 font-weight-bolder mt-3" value="Borrow" name="borrow" required>
                                    </div>
                                    
                                </div>
                            </form>


<?php

if(isset($_POST['borrow'])){
	$id=$_POST['user'];
    $isbn=$_POST['isbn'];
    $ncopy=$_POST['ncopy'];
    $cd=$_POST['cd'];
    $rd=$_POST['rd'];
    
	if($id=="" || $cd=="" || $ncopy=="" || $rd=="" || $isbn==""  ){
		echo "All fields should be filled.Either one or many fields are empty.";
    }
    else{

      $inst2="SELECT * FROM `tbl_book` WHERE isbn='$isbn'"; 
          $data2=mysqli_query($cont,$inst2);
          $row = mysqli_fetch_assoc($data2);
          $oncopy=$row['ncopy'];    
      
          
          if($oncopy!= 0){
            $inst="INSERT INTO tbl_borrow(userid,isbn,cd,rd,ncopy) VALUES('$id','$isbn','$cd','$rd','$ncopy')"; 
          $data=mysqli_query($cont,$inst);  
            $nncopy=$oncopy-$ncopy;
              
              if($data == TRUE)
                        {
                            $inst1="UPDATE tbl_book set ncopy='$nncopy' WHERE isbn='$isbn' "; 
                            $dataX=mysqli_query($cont,$inst1);
                            echo "<script>alert('Data updated successfully..!');</script>";   
                        }
                else{echo mysqli_error($cont);}
          }
          else {
            echo "<script>alert('bOOK nOT available..!');</script>";
          }
    }
}
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>