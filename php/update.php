<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $address = $price = $type = $bathroom = $bedroom = "";
$name_err = $address_err = $price_err = $type_err = $image_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    // Validate address address
    $input_address = trim($_POST["address"]);
    if (empty($input_address)) {
        $address_err = "Please enter an address.";
    } else {
        $address = $input_address;
    }

    // Validate price
    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Please enter the price amount.";
    } elseif (!ctype_digit($input_price)) {
        $price_err = "Please enter a positive integer value.";
    } else {
        $price = $input_price;
    }

    // Validate type
    $type = trim($_POST["type"]);
    if (empty($type)) {
        $type_err = "Please select a type.";
    }

    // Validate bathrooms
    $bathroom = trim($_POST["bathroom"]);

    // Validate bedrooms
    $bedroom = trim($_POST["bedroom"]);

    // Validate image
    $input_image = $_FILES["image"]["name"];

    if (!empty($input_image)) {
        $target_directory = "uploads/";
        $target_file = $target_directory . basename($input_image);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is an actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            $image_err = "File is not an image.";
            $uploadOk = 0;
        }

        // Check if the file already exists
        if (file_exists($target_file)) {
            $image_err = "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            $image_err = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowed_formats = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowed_formats)) {
            $image_err = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // If everything is ok, try to upload the file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // File uploaded successfully, store file path in the database
                $image = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Check input errors before inserting into the database
    if (empty($name_err) && empty($address_err) && empty($price_err) && empty($type_err) && empty($image_err)) {
        // Prepare an update statement
        $sql = "UPDATE posts SET name=?, address=?, price=?, image=?, type=?, bathrooms=?, bedrooms=? WHERE id=?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssi", $param_name, $param_address, $param_price, $param_image, $param_type, $param_bathroom, $param_bedroom, $param_id);

            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_price = $price;
            $param_image = $image;
            $param_id = $id;
            $param_type = $type;
            $param_bathroom = $bathroom;
            $param_bedroom = $bedroom;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Posts updated successfully. Redirect to the landing page
                header("location: dashboard.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else {
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

                    // Retrieve individual field value
                    $name = $row["name"];
                    $address = $row["address"];
                    $price = $row["price"];
                    $image = $row["image"];
                    $type = $row['type'];
                    $bathroom = $row['bathrooms'];
                    $bedroom = $row['bedrooms'];
                } else {
                    // URL doesn't contain valid id. Redirect to the error page
                    header("location: error.php");
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
        // URL doesn't contain the id parameter. Redirect to the error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Post</title>
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
                    <h2 class="mt-5">Update Post</h2>
                    <p>Please edit the input values and submit to update the post.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" name="type" class="form-control" value="<?php echo $name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>">
                            <span class="invalid-feedback"><?php echo $price_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Bedrooms</label>
                            <input type="text" name="bedroom" class="form-control" value="<?php echo $bedroom; ?>">
                            
                        </div>
                        <div class="form-group">
                            <label>Bathrooms</label>
                            <input type="text" name="bathroom" class="form-control" value="<?php echo $bathroom; ?>">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $image; ?>">
                            <span class="invalid-feedback"><?php echo $image_err;?></span>
                        </div>
                        <div class="form-group">

                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="dashboard.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>