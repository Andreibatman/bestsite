<?php
  require_once "php/config.php";
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve filter values
    $type = $_POST['type'];
    $bedroom = $_POST['bedroom'];
    $bathroom = $_POST['bathroom'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $price = $_POST['price'];

    // Build the SQL query based on the filter values
    $sql = "SELECT * FROM posts WHERE
            type = ? or ? = ''
            AND bedrooms = ? OR ? = ''
            AND bathrooms = ? OR ? = ''
            AND (name LIKE ? OR ? = '')
            AND (address LIKE ? OR ? = '')
            AND (price LIKE ? OR ? = '')";

    // Prepare the SQL statement
    $stmt = $link->prepare($sql);

    // Bind parameters
    $stmt->bind_param('ssssssssssss',
        $type, $type,
        $bedroom, $bedroom,
        $bathroom, $bathroom,
        $name, $name,
        $address, $address,
        $price, $price
    );

    // Execute the statement
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Fetch and display the results
    while ($row = $result->fetch_assoc()) {
        // Display your post data here
        echo "<p>Name: {$row['name']}</p>";
        echo "<p>Address: {$row['address']}</p>";
        echo "<p>Price: {$row['price']}</p>";
        echo "<p>Type: {$row['type']}</p>";
        echo "<p>Bedrooms: {$row['bedrooms']}</p>";
        echo "<p>Bathrooms: {$row['bathrooms']}</p>";
        echo "<img src='php/{$row['image']}' alt='Post Image'>";
        echo "<a href='property-single.php?id={$row['id']}'>View Details</a>";
        echo "<hr>";
    }

    // Close the statement
    $stmt->close();
}
?>
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
              <h1 class="mb-2">Our Properties</h1>
              <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta cupiditate ipsum porro, deserunt iure vel aliquam, eos quaerat.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <form method = "POST" action="index.php">
      <div class="realestate-filter">
        <div class="container">
          <div class="realestate-filter-wrap nav">
            <a href="#for-rent" class="active" data-toggle="tab" id="rent-tab" aria-controls="rent" aria-selected="true">For Rent</a>
            <a href="#for-sale" class="" data-toggle="tab" id="sale-tab" aria-controls="sale" aria-selected="false">For Sale</a>
          </div>
        </div>
      </div>
      
      <div class="realestate-tabpane pb-5">
        <div class="container tab-content">
           <div class="tab-pane active" id="for-rent" role="tabpanel" aria-labelledby="rent-tab">

             <div class="row">
               <div class="col-md-4 form-group">
                 <input name="type" type="text" id="" class="form-control w-100" placeholder="Type">
                   <!-- <option value="All Types">All Types</option>
                   <option value="Townhouses">Townhouses</option>
                   <option value="Duplexes">Duplexes</option>
                   <option value="Quadplexes">Quadplexes</option>
                   <option value="Condominiums">Condominiums</option>
                 </select>-->
               </div>
               <div class="col-md-4 form-group">
                 <input name="name" type="text" class="form-control" placeholder="Title">
               </div>
               <div class="col-md-4 form-group">
                 <input name="address" type="text" class="form-control" placeholder="Address">
               </div>
             </div>

             <div class="row">
               <div class="col-md-4 form-group">
                 <input name="bedroom" id="" class="form-control w-100" placeholder="Bedrooms">
                   <!-- <option value="Any Bedrooms">Any Bedrooms</option>
                   <option value="0">0</option>
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3+">3+</option>
                 </select> -->
               </div>
               <div class="col-md-4 form-group">
                 <input name="bathroom" id="" class="form-control w-100" placeholder="Bathrooms">
                   <!-- <option value="Any Bathrooms">Any Bathrooms</option>
                   <option value="0">0</option>
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3+">3+</option>
                 </select> -->
               </div>   
                <div class="col-md-4 form-group">
                  <input name="price" type="text" class="form-control" placeholder="Price">
                </div>  
             </div>
             <div class="row">
               <div class="col-md-4">
                 <input type="submit" class="btn btn-black py-3 btn-block" value="Submit">
               </div>
             </div>
            </div>
           </div>
        </div>
      </div>
    </form>
    

    
    <div class="site-section bg-black">
      <div class="container">
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

  </body>

</html>

