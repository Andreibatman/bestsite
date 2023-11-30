<?php
// Include config file
require_once "config.php";

// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Get URL parameter
    $id = trim($_GET["id"]);

    // Prepare a select statement
    $sql = "SELECT * FROM posts WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = $id;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field values
                $name = $row["name"];
                $address = $row["address"];
                $price = $row["price"];
                $type = $row['type'];
                $bathroom = $row['bathrooms'];
                $bedroom = $row['bedrooms'];
                $body = $row['body'];
                $image = $row['image'];  // Added line to retrieve image URL
                $surface = $row['surface'];
                $terrain = $row['terrain'];
                $rooms = $row['rooms'];
                $parking = $row['parking'];
                $partitioning = $row['partitioning'];
                $floor = $row['floor'];
                $comfort = $row['comfort'];
                $year = $row['year'];
                $structure = $row['structure'];
                $bridge = $row['bridge'];
                $seismic = $row['seismic'];
                $heating = $row['heating'];
                $furnished = $row['furnished'];
                $termostem = $row['termostem'];
                $front = $row['front'];
                $balcony = $row['balcony'];
                $free_since = $row['free_since'];
                $category = $row['category'];    
            } else {
                // URL doesn't contain valid id. Redirect to error page
                exit();
            }

        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
} else {
    // URL doesn't contain id parameter. Redirect to error page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">View Post</h2>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b><?php echo $name; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <p><?php echo $type; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <p><?php echo $body; ?></p>
                    </div>
                    <!-- Display the image -->
                    <div class="form-group">
                        <label>Image</label>
                        <img src="<?php echo $image; ?>" alt="Post Image" class="img-fluid">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p><?php echo $address; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Surface (m^2)</label>
                        <p><?php echo $surface; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Terrain</label>
                        <p><?php echo $terrain; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Rooms</label>
                        <p><?php echo $rooms; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Parking</label>
                        <p><?php echo $parking; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Partitioning</label>
                        <p><?php echo $partitioning; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Floor</label>
                        <p><?php echo $floor; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Comfort</label>
                        <p><?php echo $comfort; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Year</label>
                        <p><?php echo $year; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Structure</label>
                        <p><?php echo $structure; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Bridge</label>
                        <p><?php echo $bridge; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Seismic</label>
                        <p><?php echo $seismic; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Heating</label>
                        <p><?php echo $heating; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Furnished</label>
                        <p><?php echo $furnished; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Termostem</label>
                        <p><?php echo $termostem; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Front Door</label>
                        <p><?php echo $front; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Free Since</label>
                        <p><?php echo $free_since; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Balconies</label>
                        <p><?php echo $balcony; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <p><?php echo $price; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Bedrooms</label>
                        <p><?php echo $bedroom; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Bathrooms</label>
                        <p><?php echo $bathroom; ?></p>
                    </div>
                    <div class="form-group">
                        <label>For Sale / For Rent</label>
                        <p><?php echo $category; ?></p>
                    </div>
                    <p><a href="dashboard.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
