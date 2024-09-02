<?php
include("database/dbcon.php");
$id = $_GET['id'];
$select = mysqli_query($conn, "SELECT * FROM `student` WHERE id = '$id'");
$num = mysqli_num_rows($select);
$result = mysqli_fetch_array($select);

    if(isset($_POST['btn_update'])){
       
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $contact = $_POST['contact'];

    $update = mysqli_query($conn, "UPDATE student SET firstname='$first_name', lastname='$last_name', contact='$contact' WHERE id='$id'");

if ($update) {
    echo "<script> alert('data successfully updated');</script>";
    echo "<script> window.location.assign('index.php');</script>";

}else{
    echo "something Wrong";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS (Optional) -->
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="content">
      
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-white text-center">
                        <h4>Update Registration Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($result['firstname']); ?>" placeholder="First Name" name="firstname" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control"  value="<?php echo htmlspecialchars($result['lastname']); ?>" placeholder="Last Name" name="lastname" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="tel" class="form-control"  value="<?php echo htmlspecialchars($result['contact']); ?>" name="contact" placeholder="Contact" required>
                                </div>
                            </div>
                            <button type="submit" name="btn_update" class="btn btn-primary btn-block">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <footer class="bg-dark text-white mt-4 py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">Developed by Samreen Aqeel</p>
                </div>
            </div>
        </div>
    </footer>

  
   
</body>
</html>
