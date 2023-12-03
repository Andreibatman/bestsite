<?php
// Include config file
require_once "php/config.php";

// Define variable and initialize with empty value
$post_id = $title = $name = $category = $image = $body = $price = $bathrooms = $bedrooms = $surface = $rooms = $parking = $partitioning = $floor = $comfort = $year = $structure = $bridge = $seismic = $heating = $furnished = $termostem = $front = $free_since = $balcony = $address = $user_id = $user_name = $facebook = $twitter = $instagram = $phone = "";

// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Get URL parameter
    $id = trim($_GET["id"]);

    // Prepare a select statement
    $sql = "SELECT posts.*, users.name AS user_name, users.facebook, users.twitter, users.instagram, users.phone, users.image AS user_image, users.property AS num_properties
            FROM posts
            LEFT JOIN users ON posts.user_id = users.id
            WHERE posts.id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = $id;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                /* Fetch result row as an associative array */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field values
                $post_id = $row["id"];
                $name = $row["name"];
                $type = $row["type"];
                $category = $row["category"];
                $image = $row["image"];
                $body = $row["body"];
                $price = $row["price"];
                $bathrooms = $row["bathrooms"];
                $bedrooms = $row["bedrooms"];
                $surface = $row["surface"];
                $rooms = $row["rooms"];
                $parking = $row["parking"];
                $partitioning = $row["partitioning"];
                $floor = $row["floor"];
                $comfort = $row["comfort"];
                $year = $row["year"];
                $structure = $row["structure"];
                $bridge = $row["bridge"];
                $seismic = $row["seismic"];
                $heating = $row["heating"];
                $furnished = $row["furnished"];
                $termostem = $row["termostem"];
                $front = $row["front"];
                $free_since = $row["free_since"];
                $balcony = $row["balcony"];
                $address = $row["address"];
                $user_id = $row["user_id"];
                $user_name = $row["user_name"];
                $facebook = $row["facebook"];
                $twitter = $row["twitter"];
                $instagram = $row["instagram"];
                $phone = $row["phone"];
                $user_image = $row["user_image"];
                $num_properties = $row["num_properties"];
            } else {
                // URL doesn't contain valid id. Redirect to error page
                exit();
            }

        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    //mysqli_stmt_close($stmt);

    // Close connection
} else {
    // URL doesn't contain id parameter. Redirect to error page
    exit();
}
?>
<!doctype html>
<style>
  .enlarged-view {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    justify-content: center;
    align-items: center;
    z-index: 1000; /* Ensure it's on top of other elements */
}

.enlarged-image {
    max-width: 90%;
    max-height: 90%;
}
</style>
<html lang="en">

  <head>
    <title>DreamHouse &mdash; Imobiliare</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.theme.default.min.css">

    <!-- Owl Carousel JS -->
    <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>
  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="enlarged-view"></div>
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.php">DreamHouse</a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><a href="index.php" class="nav-link">Home</a></li>
                  <li><a href="agents.php" class="nav-link">Agents</a></li>
                  <li class="active"><a href="property.php" class="nav-link">Property</a></li>
                  <li><a href="about.php" class="nav-link">About</a></li>
                  <li><a href="blog.php" class="nav-link">Blog</a></li>
                  <li><a href="contact.php" class="nav-link">Contact</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

      <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style='background-image: url("php/<?php echo $image;?>")'>
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <span class="h4 text-primary mb-4 d-block">$<?php echo $price;?></span>
              <h1 class="mb-2"><?php echo $name;?></h1>
              <p class="text-center mb-5"><span class="small address d-flex align-items-center justify-content-center"> <span class="icon-room mr-3 text-primary"></span> <span><?php echo $address; ?></span></span></p>
            
                <div class="d-flex media-38289 justify-content-around mb-5">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span><?php echo $surface;?> Sq Ft.</span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span><?php echo $bedrooms;?></span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span><?php echo $bathrooms;?></span></div>
                </div>
              <p><a href="#" class="btn btn-primary text-white px-4 py-3">Buy Now</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <?php
    // Include config file
    require_once "php/config.php";

    // Check if the 'id' parameter is present in the URL
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get the post ID from the URL
        $post_id = trim($_GET["id"]);
    
        // Prepare a select statement to fetch images for the given post ID
        $sql = "SELECT image_path FROM post_images WHERE post_id = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $post_id);
        
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
            
                // Check if there are images for the post
                if (mysqli_num_rows($result) > 0) {
                    // Fetch image paths and store them in an array
                    $images = [];
                    while ($row = mysqli_fetch_assoc($result)) {
                        $images[] = $row["image_path"];
                    }
                    echo '<div class="site-section bg-black block-14 ">
                          <div class="container">';
                    // Output the carousel HTML with dynamic image sources
                    echo '<div class="owl-carousel nonloop-block-14 owl-nav">';
                    foreach ($images as $image) {
                        echo '<div class="media-38289">
                                <a href="#" class="d-block enlarge-image" data-image="php/'.$image.'"><img src="php/'.$image.'" alt="Image" class="img-fluid"></a>
                                
                              </div>';
                    }
                    echo '</div></div></div>';
                } else {
                    echo "No images found for the post.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close the statement
            //mysqli_stmt_close($stmt);
        }

        // Close the connection
        //mysqli_close($link);
    } else {
        echo "Invalid request. Please provide a valid post ID.";
    }
    ?>
    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <p><?php echo $body;?></p>
            <p><?php echo $rooms;?> Rooms</p>
            <p><a href="#" class="btn btn-primary text-white">Contact Agent</a></p>
          </div>
          <div class="col-md-3 ml-auto">
            <h3 class="mb-5">Agent</h3>
            <div class="person-29381">
              <div class="media-39912">
                <img src="php/<?php echo $user_image?>" alt="Image" class="img-fluid">
              </div>
              <h3><a href="#"><?php echo $user_name?></a></h3>
              <span class="meta d-block mb-4"><?php echo $num_properties?> Properties</span>
              <div class="social-32913">
                <a href="<?php echo $facebook?>"><span class="icon-facebook"></span></a>
                <a href="<?php echo $twitter?>"><span class="icon-twitter"></span></a>
                <a href="<?php echo $instagram?>"><span class="icon-instagram"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-black">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center">
            <h3 class="heading-29201 text-center text-white">More Related Properties</h3>
            
            
          </div>
        </div>
      <div class="row">
        <?php
        // Assuming you have a database connection established

        // Fetch 6 random posts from the 'posts' table
        $sql = "SELECT * FROM posts ORDER BY RAND() LIMIT 6";
        // Check if the query was successful
        if ($result = mysqli_query($link, $sql)) {
            // Loop through the fetched posts
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-4 mb-5">
                    <div class="media-38289">
                      <a href="property-single.php?id=<?php echo $row['id']; ?>" class="d-block">
                        <img src="php/<?php echo $row['image']; ?>" alt="Image" class="img-fluid">
                      </a>
                      <div class="text">
                        <div class="d-flex justify-content-between mb-3">
                          <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span><?php echo $row['surface'];?> Sq Ft.</span></div>
                          <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span><?php echo $row['bedrooms']?></span></div>
                          <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span><?php echo $row['bathrooms']?></span></div>
                        </div>
                        <h3 class="mb-3"><a href="#">$<?php echo $row['price'];?></a></h3>
                        <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span><?php echo $row['address'];?></span></span>
                      </div>
                    </div>
                </div>
            
                <?php
            }
          
            // Free result set
            mysqli_free_result($result);
        } else {
            echo "Error: " . mysqli_error($link);
        }
      
        // Close the database connection
        mysqli_close($link);
        ?>
        </div>
      </div>
    </div>

    <div class="site-section bg-primary">
      <div class="container block-13">
        <div class="nonloop-block-13 owl-carousel">
          <div class="testimonial-38920 d-flex align-items-start">
            <div class="pic mr-4"><img src="images/person_1.jpg" alt=""></div>
            <div>
              <span class="meta">Business Man</span>
              <h3 class="mb-4">Josh Long</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo sapiente unde pariatur id, hic quos nihil nulla veritatis!</p>
              <div class="mt-4">
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
              </div>
            </div>
          </div>

          <div class="testimonial-38920 d-flex align-items-start">
            <div class="pic mr-4"><img src="images/person_1.jpg" alt=""></div>
            <div>
              <span class="meta">Business Woman</span>
              <h3 class="mb-4">Jean Doe</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo sapiente unde pariatur id, hic quos nihil nulla veritatis!</p>
              <div class="mt-4">
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
              </div>
            </div>
          </div>

          <div class="testimonial-38920 d-flex align-items-start">
            <div class="pic mr-4"><img src="images/person_1.jpg" alt=""></div>
            <div>
              <span class="meta">Business Woman</span>
              <h3 class="mb-4">Jean Doe</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo sapiente unde pariatur id, hic quos nihil nulla veritatis!</p>
              <div class="mt-4">
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
                <span class="icon-star text-white"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3 class="text-white h5 mb-3">Subscribe</h3>
            <form action="" class="d-flex">
              <input type="text" class="form-control mr-3" placeholder="Enter your email">
              <input type="submit" class="btn btn-primary text-white" value="Send Now">
            </form>
          </div>
          <div class="col-md-3 ml-auto">
            <h3 class="text-white h5 mb-3">Subscribe</h3>
            <ul class="list-unstyled menu-arrow">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Testimonials</a></li>
              <li><a href="#">Terms of Service</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <h3 class="text-white h5 mb-3">About</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut dolores deserunt, obcaecati fuga quo. Autem explicabo sapiente, maiores.</p>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
                </p>
            </div>
          </div>

        </div>
      </div>
    </footer>
    
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
  document.addEventListener('DOMContentLoaded', function () {
      var enlargeImageLinks = document.querySelectorAll('.enlarge-image');
      var enlargedView = document.querySelector('.enlarged-view');

      enlargeImageLinks.forEach(function (link) {
          link.addEventListener('click', function (e) {
              e.preventDefault();

              // Get the image source from the data attribute
              var imageUrl = link.getAttribute('data-image');

              // Set the image source for the enlarged view
              enlargedView.innerHTML = '<img src="' + imageUrl + '" alt="Enlarged Image" class="enlarged-image">';

              // Toggle the visibility of the enlarged view
              enlargedView.style.display = 'flex';

              // Initialize Owl Carousel for the enlarged view
              $('.enlarged-view .owl-carousel').owlCarousel({
                  items: 1,
                  nav: true,
                  loop: true,
                  navText: ['<span style="z-index:10001" class="owl-nav enabled icon-arrow-left"></span>', '<span style="z-index:10001" class="owl-nav enabled icon-arrow-right"></span>'], // Customize navigation arrows
              });
          });
      });

      // Click event to close the enlarged view when clicked outside the image
      enlargedView.addEventListener('click', function () {
          this.style.display = 'none';
      });

      // Prevent the enlarged view from closing when clicking on the image itself
      enlargedView.querySelector('.enlarged-image').addEventListener('click', function (e) {
          e.stopPropagation();
      });
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>
  </body>

</html>

