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
                  <li class="active"><a href="index.php" class="nav-link">Home</a></li>
                  <li><a href="agents.php" class="nav-link">Agents</a></li>
                  <li><a href="property.php" class="nav-link">Property</a></li>
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
              <p class="text-center mb-5"><span class="small address d-flex align-items-center justify-content-center"> <span class="icon-room mr-3 text-primary"></span> <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span></span></p>
            
                <div class="d-flex media-38289 justify-content-around mb-5">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen
"></span> <span>2911 Sq Ft.</span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
                </div>
              <p><a href="#" class="btn btn-primary text-white px-4 py-3">Learn More</a></p>
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
             <input type="hidden" name="status" type="text" class="form-control" value="For Rent" text="For Rent" id="status-filter">
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

    $statusFilter = '';
    if (isset($_POST['status']) && ($_POST['status'] == 'For Rent' || $_POST['status'] == 'For Sale')) {
        $statusFilter = $_POST['status'];
    }
    #echo "Generated SQL: " . isset($_POST['status']) . "<br>" . $_POST['status'] . "<br>";
    // Build the SQL query based on the filter values
    $sql = "SELECT * FROM posts WHERE
            ((type = ? or ? = '')
            AND (bedrooms = ? OR ? = '')
            AND (bathrooms = ? OR ? = '')
            AND (name LIKE ? OR ? = '')
            AND (address LIKE ? OR ? = '')
            AND (price LIKE ? OR ? = '')
            AND (category LIKE ?))";
    
    // Prepare the SQL statement
    $stmt = $link->prepare($sql);

    // Bind parameters
    $stmt->bind_param('sssssssssssss',
        $type, $type,
        $bedroom, $bedroom,
        $bathroom, $bathroom,
        $name, $name,
        $address, $address,
        $price, $price,
        $statusFilter
    );

    // Execute the statement
    $stmt->execute();
    #echo "Generated SQL: " . $stmt->sqlstate . "<br>";
    // Get the result set
    $result = $stmt->get_result();

    // Fetch and display the results
    echo '<div class="site-section bg-black">';
    echo '<div class="container">';
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
        // Display your post data here
        echo '<div class="col-md-4 mb-5">';
        echo '<div class="media-38289">';
			  echo "<a href='property-single.php?id={$row['id']}'><img src='php/{$row['image']}' alt='Post Image' class='img-fluid'></a>";
        echo '<div class="text">';
        echo '<div class="d-flex justify-content-between mb-3">';
        echo '<div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>2911 Sq Ft.</span></div>';
        echo "<div class='bed d-flex align-items-center'><span class='wrap-icon icon-bed'></span> <span>{$row['bedrooms']}</span></div>";
        echo "<div class='bath d-flex align-items-center'><span class='wrap-icon icon-bath'></span> <span>{$row['bathrooms']}</span></div>";
        echo '</div>';
        echo "<h3 class='mb-3'><a href='property-single.php?id={$row['id']}'>\${$row['price']}</a></h3>";
        echo "<span class='d-block small address d-flex align-items-center'> <span class='icon-room mr-3 text-primary'></span> <span>{$row['address']}</span></span>";
        echo '</div>';
        echo '</div>';
        echo '</div>';

        /*echo "<p>Name: {$row['name']}</p>";
        echo "<p>Address: {$row['address']}</p>";
        echo "<p>Price: {$row['price']}</p>";
        echo "<p>Type: {$row['type']}</p>";
        echo "<p>Bedrooms: {$row['bedrooms']}</p>";
        echo "<p>Bathrooms: {$row['bathrooms']}</p>";
        echo "<img src='php/{$row['image']}' alt='Post Image'>";
        echo "<a href='property-single.php?id={$row['id']}'>View Details</a>";
        echo "<hr>";*/
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    // Close the statement
    $stmt->close();
}
?>
    

    <div class="site-section">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-lg-6">
            <div class="h-100 p-5 bg-black">
              <div class="row">
                <div class="col-md-6 text-center mb-4">
                  <div class="service-38201">
                    <span class="flaticon-house-2"></span>
                    <h3>Estate Insurance</h3>
                    <p>Estate Management</p>
                  </div>
                </div>
                <div class="col-md-6 text-center mb-4">
                  <div class="service-38201">
                    <span class="flaticon-bathtub"></span>
                    <h3>Elegant Bathtub</h3>
                    <p>Estate Management</p>
                  </div>
                </div>
                <div class="col-md-6 text-center mb-4">
                  <div class="service-38201">
                    <span class="flaticon-house-1"></span>
                    <h3>Fresh Air</h3>
                    <p>Estate Management</p>
                  </div>
                </div>
                <div class="col-md-6 text-center mb-4">
                  <div class="service-38201">
                    <span class="flaticon-calculator"></span>
                    <h3>Estate Calculator</h3>
                    <p>Estate Management</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 ml-auto">
            <h3 class="heading-29201">About Us</h3>
            
            <p class="mb-5">Perspiciatis quidem harum provident repellat sint.</p>

            <div class="service-39290 d-flex align-items-start mb-5">
              <div class="media-icon mr-4">
                <span class="flaticon-house-1"></span>
              </div>
              <div class="text">
                <h3>Mission</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo rem sit dolorem saepe ex voluptatum nam nulla et!</p>
              </div>
            </div>

            <div class="service-39290 d-flex align-items-start mb-5">
              <div class="media-icon  mr-4">
                <span class="flaticon-calculator"></span>
              </div>
              <div class="text">
                <h3>Vission</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo rem sit dolorem saepe ex voluptatum nam nulla et!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-black block-14">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center">
            <h3 class="heading-29201 text-center text-white">Latest Properties</h3>
            
            <p class="mb-5 text-white">Perspiciatis quidem, harum provident, repellat sint officia quos fugit tempora id deleniti.</p>
          </div>
        </div>
        

        <div class="owl-carousel nonloop-block-14">
          <div class="media-38289">
            <a href="property-single.php" class="d-block"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
            <div class="text">
              <div class="d-flex justify-content-between mb-3">
                <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen
"></span> <span>2911 Sq Ft.</span></div>
                <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
              </div>
              <h3 class="mb-3"><a href="#">$570,000</a></h3>
              <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
            </div>
          </div>

          <div class="media-38289">
            <a href="property-single.php" class="d-block"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
            <div class="text">
              <div class="d-flex justify-content-between mb-3">
                <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen
"></span> <span>2911 Sq Ft.</span></div>
                <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
              </div>
              <h3 class="mb-3"><a href="#">$1,570,000</a></h3>
              <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
            </div>
          </div>

          <div class="media-38289">
              <a href="property-single.php" class="d-block"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
              <div class="text">
                <div class="d-flex justify-content-between mb-3">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen
"></span> <span>2911 Sq Ft.</span></div>
                  <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
                </div>
                <h3 class="mb-3"><a href="#">$980,000</a></h3>
                <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
              </div>
            </div>


          <div class="media-38289">
            <a href="property-single.php" class="d-block"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
            <div class="text">
              <div class="d-flex justify-content-between mb-3">
                <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen
"></span> <span>2911 Sq Ft.</span></div>
                <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
              </div>
              <h3 class="mb-3"><a href="#">$570,000</a></h3>
              <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
            </div>
          </div>

          <div class="media-38289">
            <a href="property-single.php" class="d-block"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
            <div class="text">
              <div class="d-flex justify-content-between mb-3">
                <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen
"></span> <span>2911 Sq Ft.</span></div>
                <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2.</span></div>
                  <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>
              </div>
              <h3 class="mb-3"><a href="#">$1,570,000</a></h3>
              <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>156/10 Sapling Street, Harrison, ACT 2914</span></span>
            </div>
          </div>

          <div class="media-38289">
              <a href="property-single.php" class="d-block"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
              <div class="text">
                <div class="d-flex justify-content-between mb-3">
                  <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen
"></span> <span>2911 Sq Ft.</span></div>
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

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-6 text-center">
            <h3 class="heading-29201 text-center">Our Agents</h3>
            
            <p class="mb-5">Perspiciatis quidem, harum provident, repellat sint officia quos fugit tempora id deleniti.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-5 mb-md-0">
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
          <div class="col-md-4 mb-5 mb-md-0">
            <div class="person-29381">
              <div class="media-39912">
                <img src="images/person_3.jpg" alt="Image" class="img-fluid">
              </div>
              <h3><a href="#">Melinda David</a></h3>
              <span class="meta d-block mb-4">10 Properties</span>
              <div class="social-32913">
                <a href="#"><span class="icon-facebook"></span></a>
                <a href="#"><span class="icon-twitter"></span></a>
                <a href="#"><span class="icon-instagram"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-5 mb-md-0">
            <div class="person-29381">
              <div class="media-39912">
                <img src="images/person_2.jpg" alt="Image" class="img-fluid">
              </div>
              <h3><a href="#">Jessica Soft</a></h3>
              <span class="meta d-block mb-4">18 Properties</span>
              <div class="social-32913">
                <a href="#"><span class="icon-facebook"></span></a>
                <a href="#"><span class="icon-twitter"></span></a>
                <a href="#"><span class="icon-instagram"></span></a>
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
            <div class="pic mr-4"><img src="images/person_2.jpg" alt=""></div>
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
            <div class="pic mr-4"><img src="images/person_3.jpg" alt=""></div>
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


    <div class="site-section bg-light">
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-md-6 text-center">
            <h3 class="heading-29201 text-center">Blog Posts</h3>
            
            <p class="mb-5">Perspiciatis quidem, harum provident, repellat sint officia quos fugit tempora id deleniti.</p>
          </div>
        </div>

        <div class="row">
          
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="single.php">
                <img src="images/img_1.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="single.php">Lorem ipsum dolor sit amet</a></h2>
                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="single.php">
                <img src="images/img_2.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="single.php">Lorem ipsum dolor sit amet</a></h2>
                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="single.php">
                <img src="images/img_3.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="single.php">Lorem ipsum dolor sit amet</a></h2>
                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
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
    <script>
    document.getElementById('rent-tab').addEventListener('click', function() {
      document.getElementById('status-filter').value = 'For Rent';
      document.getElementById('status-filter').text = 'For Rent';
    });

    document.getElementById('sale-tab').addEventListener('click', function() {
      document.getElementById('status-filter').value = 'For Sale';
      document.getElementById('status-filter').text = 'For Sale';
    });
  </script>
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

