<?php
include 'config.php';

$id = $_GET['edit'];


if (isset($_POST['update'])) {

    if (empty($_POST['id_user']) || empty($_POST['first_Name']) || empty($_POST['Last_Name']) || empty($_POST['Date']) || empty($_POST['Salary']) || empty($_POST['Department']) || empty($_POST['Function']) || $_FILES['Image']['name'] == "" ) {
        echo "<p style='color: #dc3545!important;'>Please Fill Out All Input<p/>";
    
    }else{
    
        $id_user = $_POST['id_user'];
        $first_Name = $_POST['first_Name'];
        $Last_Name = $_POST['Last_Name'];
        $Date = $_POST['Date'];
        $Salary = $_POST['Salary'];
        $Function = $_POST['Function'];
        $Department = $_POST['Department'];
        $Image = $_FILES['Image']['name'];
        $Image_tm_name = $_FILES["Image"]["tmp_name"];
        $Image_tm_folder = 'img_upload/'.$Image;
    
        
    
        $update = "UPDATE  employee SET `id_user`='$id_user',`first_Name`='$first_Name',`Last_Name`='$Last_Name',`Date`='$Date',`Salary`='$Salary',`Function`='$Function',`Department`='$Department',`Image`= '$Image' WHERE id = $id ";
        
        $uplod = mysqli_query($conn,$update);
        
       
        if (move_uploaded_file($Image_tm_name, $Image_tm_folder)) {
            header('Location: data_employee.php');
           echo "<p style='color: #28a745!important;'>Add Successfully<p/>";
        }else{
            echo "<p style='color: #dc3545!important;'>Error<p/>";
        }
    
    }
    
    
    
   
    };
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link rel="icon" href="icon.png" />
    <link rel="stylesheet" href="nav.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">


</head>

<body id="body-pd">

      
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/de64f094-c656-4e0a-8adb-7598d554b33a/dacc9y0-e2e447f7-83c9-4be0-9a06-af75e0044cff.png" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">My Slaves</span> </a>
            <div class="nav_list"> <a href="index.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> <a href="Employee.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Add Employee</span> </a> <a href="data_employee.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Employee List</span> </a> <a href="#" class="nav_link"> <i class='bx bx-search-alt-2 nav_icon'></i> <span class="nav_name">Search</span> </a> <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a> <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a> </div>
            </div> <a href="#" class="nav_link" > <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light" style="height: 109vh;">
    <div class="login-box">
  <h2>UPDATE</h2>
  <a href="data_employee.php" class="nav_link"> <i class='bx bx-arrow-back'></i> GO BACK</a>
  <?php 

$select = mysqli_query($conn, "SELECT * FROM employee WHERE id = $id" );


?>

  <form class="form-style-9" action="" method="POST" enctype="multipart/form-data">
  <?php while ($row = mysqli_fetch_assoc($select)) {
     $id_user = $row['id_user'];
     $first_Name = $row['first_Name'];
     $Last_Name = $row['Last_Name'];
     $Date = $row['Date'];
     $Salary = $row['Salary'];
     $Department = $row['Department'];
     $Function = $row['Function'];
     
     
  }

?>
<ul>
<li>
    <input type="text" name="id_user" id="id_user" value="<?php echo $id_user;?>" class="field-style field-split align-left" placeholder="Your ID" style="
    width: 100%; text-align: center;"/>
  
</li>
<li>
    <input type="text" name="first_Name" id="first_Name" value="<?php echo $first_Name;?>" class="field-style field-split align-left" placeholder="First Name" />
    <input type="text" name="Last_Name" id="Last_Name" value="<?php echo $Last_Name;?>"  class="field-style field-split align-right" placeholder="Last Name" />
</li>
<li>
<input placeholder="Date" type="text"  value="<?php echo $Date;?>" id="Datesi" name="Date" onfocus="(this.type='date')" class="field-style field-full align-none" placeholder="Subject" />
</li>
<li>
    <input type="text" id="Salary" value="<?php echo $Salary;?>" name="Salary" class="field-style field-split align-left" class="field-style field-full align-none" placeholder="Salary" />
	<select  name="Function"  id="Functionsi"  class=" field-style field-split align-left form-select form-select-lg mb-3" aria-label=".form-select-sm example" style="
    border-radius: 5px;
    margin-left: 2%;">
  <option selected>Select Your Function</option>
  <option <?php if($Function=="1") echo 'selected="selected"'; ?> value="1">One</option>
  <option <?php if($Function=="2") echo 'selected="selected"'; ?> value="2">Two</option>
  <option <?php if($Function=="3") echo 'selected="selected"'; ?> value="3">Three</option>
</select>
</li>
<li>
    <input type="text" name="Department" value="<?php echo $Department;?>" class="field-style field-split align-left"  placeholder="Department" style="
    width: 100%; text-align: center;" />

</li>
<li>
<input type="file" id="Imagesi" accept="image/png, image/gif, image/jpeg" name="Image" class="field-style field-full align-none textwhite" placeholder="Subject" />
</li>
<li>
<a>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
<input  type="submit" name="update" value="U P D A T E" id="Submit" style="FONT-SIZE: 133%;COLOR: #03e9f4;"> 



</a>
</li>

</ul>



</form>


</div>
    </div>
    
<script src="nav.js"></script>
</body>
</html>