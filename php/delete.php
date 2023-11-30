<?php
// Process delete operation after confirmation
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Include config file
    require_once "config.php";

    // Start a session to get the user ID if it's not already started
    session_start();

    // Prepare a delete statement
    $sql_delete_post = "DELETE FROM posts WHERE id = ?";
    $sql_update_user_property = "UPDATE users SET property = property - 1 WHERE id = ?";

    if ($stmt_delete_post = mysqli_prepare($link, $sql_delete_post)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt_delete_post, "i", $param_id_delete);

        // Set parameters
        $param_id_delete = trim($_POST["id"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt_delete_post)) {
            // If the post is deleted successfully, update the user's property value
            if ($stmt_update_user_property = mysqli_prepare($link, $sql_update_user_property)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt_update_user_property, "i", $param_user_id);

                // Set parameters
                $param_user_id = $_SESSION["id"]; // Assuming you store the user ID in a session

                // Attempt to execute the prepared statement
                mysqli_stmt_execute($stmt_update_user_property);

                // Close the update statement
                mysqli_stmt_close($stmt_update_user_property);
            }

            // Redirect to the landing page
            header("location: dashboard.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt_delete_post);

    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter
    if (empty(trim($_GET["id"]))) {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Post</title>
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
                    <h2 class="mt-5 mb-3">Delete Post</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this post?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="dashboard.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>