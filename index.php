<?php
include("database/dbcon.php");  
if (isset($_POST['submit'])) {

    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $contact = $_POST['contact'];

    if ($first_name != "" && $last_name != "" && $contact != "") {
        // Corrected SQL query to insert both first name and last name
        $insert = "INSERT INTO `student` (firstname,lastname, contact) VALUES ('$first_name', '$last_name', '$contact')";
        $data = mysqli_query($conn, $insert);

        if ($data) {
            echo "<script> alert('Data successfully submitted');</script>";  
        } else {
            echo "<script> alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "Fill the form completely";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation=</title>
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
<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h4 class="mb-0">CRUD Operations</h4>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="content">
        
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-white text-center">
                        <h4>Registration Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="First Name" name="firstname" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Last Name" name="lastname" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="tel" class="form-control" name="contact" placeholder="Contact" required>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        User Information
                    </div>
                    <div class="card-body">
                    <?php
// Fetch student records
$no = 1;
$select = mysqli_query($conn, "SELECT * FROM `student`");

// Ensure to use associative array keys for clarity
?>
<table id="userTable" class="display table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Sno</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($result = mysqli_fetch_assoc($select)): ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($result['firstname']); ?></td>
            <td><?php echo htmlspecialchars($result['lastname']); ?></td>
            <td><?php echo htmlspecialchars($result['contact']); ?></td>
            <td>
                <a href="update.php?id=<?php echo $result['id']; ?>" class="btn btn-primary btn-sm">
                    <i class="fas fa-edit"></i> Update
                </a>
                <a href="delete.php?id=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm ms-2">
                    <i class="fas fa-trash"></i> Delete
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

                    </div>
                </div>
            </div>
        </div>
    </div>

  
    <footer>
        <!-- Footer -->
<footer class="bg-dark text-white mt-4 py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p class="mb-0">Developed by Samreen Aqeel</p>
      </div>
      
    </div>
  </div>
</footer>
      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
</body>
</html>

