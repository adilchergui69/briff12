<?php
include 'config.php';

$selected = $_GET['select'];
if (isset($_GET['search']) && $selected!="") {
  $input_search = $_GET['input_search'];
  $select = mysqli_query($conn, "SELECT * FROM employee WHERE $selected LIKE'%$input_search%'");
 }else{
  $select = mysqli_query($conn, "SELECT * FROM employee");
 }
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="icon" href="icon.png" />

  <link rel="stylesheet" href="data_employee/fonts/icomoon/style.css">

  <link rel="stylesheet" href="data_employee/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="data_employee/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="data_employee/css/style.css">
  <link rel="stylesheet" href="nav.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

  <title>Employee List</title>
</head>

<body id="body-pd">

  <header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <div class="header_img"> <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/de64f094-c656-4e0a-8adb-7598d554b33a/dacc9y0-e2e447f7-83c9-4be0-9a06-af75e0044cff.png" alt=""> </div>
  </header>
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">My Slaves</span> </a>
        <div class="nav_list"> <a href="index.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> <a href="Employee.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Add Employee</span> </a> <a href="data_employee.php" class="nav_link active"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Employee List</span> </a> <a href="#" class="nav_link"> <i class='bx bx-search-alt-2 nav_icon'></i> <span class="nav_name">Search</span> </a> <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a> <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a> </div>
      </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
    </nav>
  </div>
  <!--Container Main start-->
  <div class="">




    <div class="content">

      <div class="container" style="max-width: 85%;">

         

        <div class="table-responsive custom-table-responsive">
          <form  action="data_employee.php" method="GET">
            <br><br>
            <h3 id="Title">All Employee</h3>
            <br>

 
            <div class="input-group" id="search">
            
            <select name="select" id="Functionsi" class=" field-style field-split align-left form-select form-select-lg" aria-label=".form-select-sm example" style="border-radius: 5px;margin-left: 56%;margin-right: 1%;">
              <option selected disabled value=""> Select Your Function</option>
              <option <?php  ?> value="id_user">ID</option>
              <option <?php  ?> value="Department">DEPARTMENT</option>
              <option <?php ?> value="first_Name">NAME</option>
             
              
            </select>
            <input id="search-input" name="input_search" type="search" id="form1"  placeholder="Search" class="form-control" />
                <button id="search-button" name="search" type="submit" class="btn btn-primary">
                Search</button>
               
                </form>
              <div >
              
              </div>
     
             
            </div>


          <table class="table custom-table">
            <thead>
              <tr>

                <th scope="col">
                  <label class="control control--checkbox">
                    <input type="checkbox" class="js-check-all" />
                    <div class="control__indicator"></div>
                  </label>
                </th>

                <th scope="col">ID</th>
                <th scope="col"> Image</th>
                <th scope="col">first Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Date</th>
                <th scope="col">Salary</th>
                <th scope="col">Function</th>
                <th scope="col">Department</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php






              if (isset($_GET['delete'])) {
                $id = $_GET['delete'];
                mysqli_query($conn, "DELETE FROM employee WHERE id = $id ");
                header('location:data_employee.php');
              }

              while ($row = mysqli_fetch_assoc($select)) {


              ?>

                <tr class="spacer">
                  <td colspan="100"></td>
                </tr>
                <tr class="">
                  <th scope="row" style="padding-top: 4%;">
                    <label class="control control--checkbox">
                      <input type="checkbox" />
                      <div class="control__indicator"></div>
                    </label>
                  </th>
                  <td style="padding-top: 4%;"><?php echo $row['id_user']; ?></td>
                  <td><img src="img_upload/<?php echo $row['Image']; ?>" height="100" alt="" srcset=""></td>
                  <td style="padding-top: 4%;"><?php echo $row['first_Name']; ?></td>
                  <td style="padding-top: 4%;"> <?php echo $row['Last_Name']; ?></td>
                  <td style="padding-top: 4%;"><?php echo $row['Date']; ?></td>
                  <td style="padding-top: 4%;"><?php echo $row['Salary']; ?> <i class='bx bx-bitcoin' style='color:#ef8e19'></i> </td>
                  <td style="padding-top: 4%;"><?php echo $row['Function']; ?></td>
                  <td style="padding-top: 4%;"><?php echo $row['Department']; ?></td>
                  <td style="padding-top: 2%;"><a href="data_update.php?edit=<?php echo $row['id']; ?>" class="btn bg-success text-white w-100 mb-1"><i class='bx bxs-edit'></i>Edit</a>
                    <br> <a href="data_employee.php?delete=<?php echo $row['id']; ?>" class="btn bg-danger text-white w-100"><i class='bx bx-trash'></i>Delete</a>
                  </td>
                </tr>
              <?php };
              $conn->close(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!--Container Main end-->





  <script src="nav.js"></script>
  <script src="data_employee/js/jquery-3.3.1.min.js"></script>
  <script src="data_employee/js/main.js"></script>
</body>

</html>