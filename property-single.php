<!doctype html>
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

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
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
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <span class="h4 text-primary mb-4 d-block">$1,570,000</span>
              <h1 class="mb-2">Beautiful House In Australia</h1>
              <p class="text-center mb-5"><span class="small address d-flex align-items-center justify-content-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span></p>
            
                <div class="d-flex media-38289 justify-content-around mb-5">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
                </div>
              <p><a href="#" class="btn btn-primary text-white px-4 py-3">Buy Now</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <?php
// property_single.php

// Include config file
require_once "php/config.php";

// Check if the ID parameter is provided
if (isset($_GET["id"])) {
    // Retrieve the post ID from the URL
    $post_id = $_GET["id"];

    // Prepare a SELECT statement
    $sql = "SELECT * FROM posts WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $post_id);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Get the result set
            $result = mysqli_stmt_get_result($stmt);

            // Fetch the post data
            if ($row = mysqli_fetch_assoc($result)) {
                // Display the post details
                echo "<h2>{$row['name']}</h2>";
                echo "<p>Address: {$row['address']}</p>";
                echo "<p>Price: {$row['price']}</p>";
                echo "<p>Type: {$row['type']}</p>";
                echo "<p>Bedrooms: {$row['bedrooms']}</p>";
                echo "<p>Bathrooms: {$row['bathrooms']}</p>";
                echo "<img src='{$row['image']}' alt='Property Image'>";
            } else {
                echo "No post found with the provided ID.";
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }

    // Close the connection
    mysqli_close($link);
} else {
    echo "No post ID provided.";
}
?>
<!--     
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non alias labore similique, laboriosam consequuntur tempora, quas accusantium voluptatibus eius, maiores, minima! Ipsam tempore ex qui voluptatum quo voluptas! Incidunt, pariatur.</p>
            <p>Dolorem quaerat tenetur corporis praesentium, soluta debitis culpa asperiores, minus delectus quibusdam amet recusandae aliquam voluptatibus dicta quis, facere tempora eum placeat repellendus maxime nesciunt voluptates totam sapiente commodi. Tenetur.</p>
            <p>Labore natus ullam suscipit distinctio debitis voluptas minima ipsam. Odit, reprehenderit minima distinctio, dolorum ipsam velit, minus labore eum commodi quia quae doloribus impedit blanditiis architecto fugiat delectus provident quas.</p>
            <p>Asperiores temporibus adipisci dolor quasi assumenda est, itaque corrupti, neque facilis beatae natus voluptatibus aperiam mollitia esse ipsam! Quam perferendis facere sed beatae repudiandae rerum laudantium necessitatibus. Incidunt, dolorem, officiis?</p>
            <p>Mollitia impedit omnis ullam earum est, quaerat consectetur voluptates quia, dolore asperiores ipsum eligendi quae iste, facere porro debitis nostrum obcaecati culpa eius perspiciatis alias distinctio. Perferendis, magnam mollitia fuga.</p>
            <p><a href="#" class="btn btn-primary text-white">Contact Agent</a></p>
          </div>
          <div class="col-md-3 ml-auto">
            <h3 class="mb-5">Agent</h3>
            <div class="person-29381">
              <div class="media-39912">
                <img src="images/person_1.jpg" alt="Image" class="img-fluid">
              </div>
              <h3><a href="#">Josh Long</a></h3>
              <span class="meta d-block mb-4">4 Properties</span>
              <div class="social-32913">
                <a href="#"><span class="icon-facebook"></span></a>
                <a href="#"><span class="icon-twitter"></span></a>
                <a href="#"><span class="icon-instagram"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    
    <div class="site-section bg-black">
      <div class="container">


        <div class="row justify-content-center">
          <div class="col-md-6 text-center">
            <h3 class="heading-29201 text-center text-white">More Related Properties</h3>
            
            
          </div>
        </div>
        
        <div class="row">

          <div class="col-md-4 mb-5">
            <div class="media-38289">
              <a href="property-single.php" class="d-block"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
              <div class="text">
                <div class="d-flex justify-content-between mb-3">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
                </div>
                <h3 class="mb-3"><a href="#">$570,000</a></h3>
                <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-5">
            <div class="media-38289">
            <a href="property-single.php" class="d-block"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
            <div class="text">
              <div class="d-flex justify-content-between mb-3">
                <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>
                <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
              </div>
              <h3 class="mb-3"><a href="#">$1,570,000</a></h3>
              <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
            </div>
          </div>
          </div>
          <div class="col-md-4 mb-5">
            <div class="media-38289">
              <a href="property-single.php" class="d-block"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
              <div class="text">
                <div class="d-flex justify-content-between mb-3">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
                </div>
                <h3 class="mb-3"><a href="#">$980,000</a></h3>
                <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-5">
            <div class="media-38289">
              <a href="property-single.php" class="d-block"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
              <div class="text">
                <div class="d-flex justify-content-between mb-3">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
                </div>
                <h3 class="mb-3"><a href="#">$570,000</a></h3>
                <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-5">
            <div class="media-38289">
            <a href="property-single.php" class="d-block"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
            <div class="text">
              <div class="d-flex justify-content-between mb-3">
                <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>
                <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
              </div>
              <h3 class="mb-3"><a href="#">$1,570,000</a></h3>
              <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
            </div>
          </div>
          </div>
          <div class="col-md-4 mb-5">
            <div class="media-38289">
              <a href="property-single.php" class="d-block"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
              <div class="text">
                <div class="d-flex justify-content-between mb-3">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
                </div>
                <h3 class="mb-3"><a href="#">$980,000</a></h3>
                <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
              </div>
            </div>
          </div>
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

  </body>

</html>

