<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $address = $price = $type = $bathroom = $bedroom = $body = "";
$surface = $terrain = $rooms = $parking = $partitioning = $floor = $comfort = "";
$year = $structure = $bridge = $seismic = $heating = $furnished = $termostem = $front = "";
$balcony = $free_since = $image = "";
$name_err = $address_err = $price_err = $type_err = $image_err = $body_err = "";

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

    $surface = trim($_POST["surface"]);
    $terrain = trim($_POST["terrain"]);
    $rooms = trim($_POST["rooms"]);
    $parking = trim($_POST["parking"]);
    $partitioning = trim($_POST["partitioning"]);
    $floor = trim($_POST["floor"]);
    $comfort = trim($_POST["comfort"]);
    $year = trim($_POST["year"]);
    $structure = trim($_POST["structure"]);
    $bridge = trim($_POST["bridge"]);
    $seismic = trim($_POST["seismic"]);
    $heating = trim($_POST["heating"]);
    $furnished = trim($_POST["furnished"]);
    $termostem = trim($_POST["termostem"]);
    $front = trim($_POST["front"]);
    $balcony = trim($_POST["balcony"]);
    $free_since = trim($_POST["free_since"]);


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
        if ($_FILES["image"]["size"] > 50000000) {
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

    // Validate body
    $body = trim($_POST["body"]);
    if (empty($body)) {
        $body_err = "Please enter a body for the post.";
    }
    $category = isset($_POST["for_sale"]) ? "For Sale" : "For Rent";
    // Check input errors before inserting into the database
    if (empty($name_err) && empty($address_err) && empty($price_err) && empty($type_err) && empty($image_err) && empty($body_err)) {
        // Prepare an update statement
        $sql = "UPDATE posts SET name = ?, address = ?, price = ?, image = ?, type = ?, bedrooms = ?, bathrooms = ?, body = ?, surface = ?, terrain = ?, rooms = ?, parking = ?, partitioning = ?, floor = ?, comfort = ?, year = ?, structure = ?, bridge = ?, seismic = ?, heating = ?, furnished = ?, termostem = ?, front = ?, balcony = ?, free_since = ?, category = ? WHERE id = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssi", 
            $param_name, $param_address, $param_price, $param_image, $param_type, 
            $param_bedroom, $param_bathroom, $param_body, $param_surface, $param_terrain, 
            $param_rooms, $param_parking, $param_partitioning, $param_floor, $param_comfort, 
            $param_year, $param_structure, $param_bridge, $param_seismic, $param_heating, 
            $param_furnished, $param_termostem, $param_front, $param_balcony, 
            $param_free_since, $param_category, $param_id);


            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_price = $price;
            $param_image = $image;
            $param_type = $type;
            $param_bedroom = $bedroom;
            $param_bathroom = $bathroom;
            $param_body = $body;
            $param_surface = $surface;
            $param_terrain = $terrain;
            $param_rooms = $rooms;
            $param_parking = $parking;
            $param_partitioning = $partitioning;
            $param_floor = $floor;
            $param_comfort = $comfort;
            $param_year = $year;
            $param_structure = $structure;
            $param_bridge = $bridge;
            $param_seismic = $seismic;
            $param_heating = $heating;
            $param_furnished = $furnished;
            $param_termostem = $termostem;
            $param_front = $front;
            $param_balcony = $balcony;
            $param_free_since = $free_since;
            $param_id = $id;
            $param_category = isset($_POST["for_sale"]) ? "For Sale" : "For Rent";
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
                    $body = $row['body'];
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
                    // URL doesn't contain valid id. Redirect to the error page
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
                            <input type="text" name="type" class="form-control" value="<?php echo $type; ?>">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Surface (m^2)</label>
                            <textarea name="surface" class="form-control"><?php echo $surface; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Terrain (m^2)</label>
                            <textarea name="terrain" class="form-control"><?php echo $terrain; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Rooms</label>
                            <textarea name="rooms" class="form-control"><?php echo $rooms; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Parking</label>
                            <textarea name="parking" class="form-control"><?php echo $parking; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Partitioning</label>
                            <textarea name="partitioning" class="form-control"><?php echo $partitioning; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Floor</label>
                            <textarea name="floor" class="form-control"><?php echo $floor; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Comfort</label>
                            <textarea name="comfort" class="form-control"><?php echo $comfort; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Year</label>
                            <textarea name="year" class="form-control"><?php echo $year; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Structure</label>
                            <textarea name="structure" class="form-control"><?php echo $structure; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Bridge</label>
                            <textarea name="bridge" class="form-control"><?php echo $bridge; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Seismic Classification</label>
                            <textarea name="seismic" class="form-control"><?php echo $seismic; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Heating</label>
                            <textarea name="heating" class="form-control"><?php echo $heating; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Furnished</label>
                            <textarea name="furnished" class="form-control"><?php echo $furnished; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Termostem</label>
                            <textarea name="termostem" class="form-control"><?php echo $termostem; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Front Door</label>
                            <textarea name="front" class="form-control"><?php echo $front; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Balconies</label>
                            <textarea name="balcony" class="form-control"><?php echo $balcony; ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Free Since</label>
                            <textarea name="free_since" class="form-control"><?php echo $free_since; ?></textarea>
                            
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
                            <label>Body</label>
                            <input type="text" name="body" class="form-control <?php echo (!empty($body_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $body; ?>">
                            <span class="invalid-feedback"><?php echo $body_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $image; ?>">
                            <span class="invalid-feedback"><?php echo $image_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>For Sale</label>
                            <input type="checkbox" name="for_sale" <?php echo ($category === 'For Sale') ? 'checked' : ''; ?>>
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
