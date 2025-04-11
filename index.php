
<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Responsive landing page headphones</title>
</head>
<body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="admin.php" class="nav__logo">
                <img src="assets/img/logo.png" alt=""> 
                ADMIN
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#specs" class="nav__link">Specs</a>
                    </li>
                    <li class="nav__item">
                        <a href="#case" class="nav__link">Case</a>
                    </li>
                    <li class="nav__item">
                        <a href="#products" class="nav__link">Products</a>
                    </li>
                    <li class="nav__item">
                    <?php
      $conn = mysqli_connect('localhost','root','','nama') or die('connection failed');
      $select_rows = mysqli_query($conn, "SELECT * FROM `shop1`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>


<a href="cart2.php" class="nav__link">cart <span><?php echo $row_count; ?></span> </a>

                       
                    </li>
                </ul>

                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-function-line"></i>
            </div>
        </nav>
    </header>

    <main class="main">
        <!--=============== HOME ===============-->
        <section class="home section" id="home">
            <div class="home__container container grid">
                <div>
                    <img src="assets/img/images.jpg" alt="" class="home__img">
                </div>
                
                <div class="home__data">
                    <div class="home__header">
                        <h1 class="home__title">On </h1>
                        <h2 class="home__subtitle">BUTTON</h2>
                    </div>

                    <div class="home__footer">
                        <h3 class="home__title-description">Overview</h3>
                        <p class="home__description">A temperature controller machine for poultry maintains optimal conditions in chicken coops by regulating ambient temperature using sensors and automated systems. This ensures a healthy environment, promoting growth and preventing stress, disease, and mortality, ultimately enhancing productivity.
                        </p>
                        <a href="#" class="button button--flex">
                            <span class="button--flex">
                                <i class="ri-shopping-bag-line button__icon"></i></i> Add to Bag
                            </span>
                            <span class="home__price">$299</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
            <!--=============== SPONSOR ===============-->
            <section class="sponsor section">
                <div class="sponsor__container container grid">
                    <img src="assets/img/sponsor1.png" alt="" class="sponsor__img">
                    <img src="assets/img/sponsor2.png" alt="" class="sponsor__img">
                    <img src="assets/img/sponsor3.png" alt="" class="sponsor__img">
                    <img src="assets/img/sponsor4.png" alt="" class="sponsor__img">
                </div>
            </section>

            <!--=============== SPECS ===============-->
            <section class="specs section grid" id="specs">
            <h2 class="section__title section__title-gradient">Specs</h2>

            <div class="specs__container container grid">
                <div class="specs__content grid">
                    <div class="specs__data">
                        <i class="ri-bluetooth-line specs__icon"></i>
                        <h3 class="specs__title">Connection</h3>
                        <span class="specs__subtitle">WIRELESS</span>
                    </div>

                    <div class="specs__data">
                        <i class="ri-battery-charge-line specs__icon"></i>
                        <h3 class="specs__title">Battery</h3>
                        <span class="specs__subtitle">Duration 40h</span>
                    </div>

                    <div class="specs__data">
                        <i class="ri-plug-line specs__icon"></i>
                        <h3 class="specs__title">Load</h3>
                        <span class="specs__subtitle">Fast charge 4.2-AAC</span>
                    </div>

                    <div class="specs__data">
                        <i class="ri-mic-line specs__icon"></i>
                        <h3 class="specs__title">machine</h3>
                        <span class="specs__subtitle">Supports Apple Siri <br> and Google</span>
                    </div>
                </div>
                
                <div>
                    <img src="assets/img/26690-16722529.jpg" alt="" class="specs__img">
                </div>
            </div>
        </section>


            <!--=============== CASE ===============-->
            <section class="case section grid" id="case">
            <h2 class="section__title section__title-gradient">Case</h2>

            <div class="case__container container grid">
                <div>
                    <img src="assets/img/26690-16722529.jpg" alt="" class="case__img">
                </div>

                <div class="case__data">
                    <p class="case__description">Here are the steps to install a temperature controller machine for poultry:

                        Choose Location: Select a suitable spot in the chicken coop that allows for even temperature distribution.
                        Gather Tools and Materials: Ensure you have all necessary tools (screwdriver, drill, etc.) and the temperature controller unit.
                        Mount the Controller: Securely mount the temperature controller on a wall, ideally at eye level for easy access.
                        Install Sensors: Place temperature sensors in strategic locations within the coop to accurately monitor conditions.
                        Connect Heating/Cooling Systems: Wire the controller to your heating and cooling sys
                    </p>
                    <a href="#" class="button button--flex">
                        <i class="ri-information-line button__icon"></i> More info
                    </a>
                </div>
            </div>
        </section>


            <!--=============== DISCOUNT ===============-->
            <section class="discount section">
            <div class="discount__container container grid">
                <div class="discount__animate">
                    <h2 class="discount__title">TO UNDERSTAND MORE ABOUT HOW TO INSTALL <br> STEP BY STEP</h2>
                    <p class="discount__description">WATCH THE VIDEO BY CLICKING THE BUTTON ON THE RIGHT</p>
                </div>
        
                <div class="buttons12">
                    <button id="watchButton" class="play">
                        <i class="fa fa-play-circle-o" aria-hidden="true"></i> Watch
                    </button>
                </div>
        
                <div class="trailer" id="videoTrailer">
                    <div class="loading" id="loadingIndicator">Loading...</div>
                    <video id="videoElement" src="video/Does_James_Contradict_Paul_on_Justification_(0).mp4" muted controls autoplay></video>
                    <img class="close" src="assets/img/images21.jpg" alt="Close" onclick="toggleVideo();" />
                     
       
                </div>
            </div>
        </section>
        
        <style>
            .trailer {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 2000;
                width: 80%;
                max-width: 800px;
                display: flex;
                justify-content: center;
                align-items: center;
                backdrop-filter: blur(20px);
                opacity: 0;
                transition: opacity 0.5s ease, visibility 0.5s ease;
                visibility: hidden;
                flex-direction: column; /* Stack elements vertically */
            }
        
            .trailer.active {
                visibility: visible;
                opacity: 1;
            }
        
            .trailer video {
                width: 100%;
                height: auto;
            }
        
            .close {
                cursor: pointer;
                position: absolute;
                top: 10px;
                right: 10px;
                width: 30px;
                height: auto;
            }
        
            .loading {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 3000;
                font-size: 20px;
                color: white;
                display: none;
            }
        </style>
        <script>

const watchButton = document.getElementById('watchButton');

const videoTrailer = document.getElementById('videoTrailer');

const videoElement = document.getElementById('videoElement');

const loadingIndicator = document.getElementById('loadingIndicator');

const timeSlider = document.getElementById('timeSlider');

watchButton.addEventListener('click', toggleVideo);

function toggleVideo() {

if (videoTrailer.classList.contains('active')) {

videoTrailer.classList.remove('active');

videoElement.pause(); // Pause video when closing

} else {

videoTrailer.classList.add('active');

loadingIndicator.style.display = 'block'; // Show loading indicator

videoElement.play(); // Play video when opening

}

}

videoElement.addEventListener('waiting', () => {

loadingIndicator.style.display = 'block'; // Show loading when waiting

});

videoElement.addEventListener('playing', () => {

loadingIndicator.style.display = 'none'; // Hide loading when playing

});

videoElement.addEventListener('canplay', () => {

loadingIndicator.style.display = 'none'; // Hide loading when video can play

timeSlider.max = videoElement.duration; // Set slider max to video duration

});

videoElement.addEventListener('timeupdate', () => {

timeSlider.value = videoElement.currentTime; // Update slider value

});

// Seek video when slider is changed

timeSlider.addEventListener('input', () => {

videoElement.currentTime = timeSlider.value; // Change video current time

});

// Check if video can be loaded

videoElement.addEventListener('error', () => {

console.error('Error loading video.');

loadingIndicator.innerText = 'Error loading video. Please try again.';

loadingIndicator.style.display = 'block';

});

</script>
          <!-- Products Section -->
          <?php
$conn = mysqli_connect('localhost', 'root', '', 'nama') or die('connection failed');

if (isset($_POST['add_to_cart'])) {
    $image = $_POST['image'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Insert into the cart table
    $insert_cart = mysqli_query($conn, "INSERT INTO `shop1` (image, product_name, price, description) VALUES ('$image', '$product_name', '$price', '$description')");

    // if ($insert_cart) {
    //     echo "<script>alert('Product added to cart successfully!');</script>";
    // } else {
    //     echo "<script>alert('Failed to add product to cart.');</script>";
    // }
}
?>

<section class="products section" id="products">
    <h2 class="section__title section__title-gradient products__line">Choose <br> your machine</h2>
    <div class="products__container container grid">
        <?php
        $select_products = mysqli_query($conn, "SELECT * FROM `upload`");
        if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($select_products)) {
        ?>
                <article class="products__card">
                    <div class="products__content">
                        <img src="img/<?php echo $fetch_product['image']; ?>" alt="" class="products__img">
                        <h3 class="products__title"><?php echo $fetch_product['product_name']; ?></h3>
                        <span class="products__price"><?php echo $fetch_product['price']; ?></span>
                        <button class="button button--flex products__button">
                            <i class="ri-shopping-bag-line button__icon"></i>
                            <form action="index567.php" method="post">
                                <input type="hidden" name="image" value="<?php echo $fetch_product['image']; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
                                <input type="hidden" name="price" value="<?php echo $fetch_product['price']; ?>">
                                <input type="hidden" name="description" value="<?php echo $fetch_product['description']; ?>">
                                <input type="submit" class="btn" value="Add to Cart" name="add_to_cart">
                            </form>
                        </button>
                    </div>
                </article>
        <?php 
            } // Closing the while loop
        } else {
            echo "<p>No products found.</p>"; // Optional: Message if no products are found
        }
        ?>
    </div>
</section>
        <!--=============== FOOTER ===============-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <a href="#" class="footer__logo">
                    <img src="assets/img/logo.png" alt="">
                </a>
    
                <div class="footer__content">
                    <h3 class="footer__title">Products</h3>
    
                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">machine1</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">machine2</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">machine3</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">machine4</a>
                        </li>
                    </ul>
                </div>
    
                <div class="footer__content">
                    <h3 class="footer__title">Support</h3>
    
                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">Product help</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Register</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Updates</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Provides</a>
                        </li>
                    </ul>
                </div>
    
                <div class="footer__content">
                    <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get comment from form
    $comment = $_POST['comment'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO comments (comment) VALUES (?)");
    $stmt->bind_param("s", $comment);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New comment added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!-- HTML Form -->
<form action="" method="POST" class="footer__form">
    <input type="text" name="comment" placeholder="Enter your comment" class="footer__input" required>
    <button type="submit" class="button button--flex">
        <i class="ri-send-plane-line button__icon"></i> Comment
    </button>
</form>
    
                    <div class="footer__social">
                        <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                            <i class="ri-twitter-line"></i>
                        </a>
                    </div>
                </div>
            </div>

            <p class="footer__copy">
                <a href="https://www.youtube.com/c/Bedimcode/" target="_blank" class="footer__copy-link">&#169; Bedimcode. All right reserved</a>
            </p>
        </footer>

        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-s-line scrollup__icon"></i>
        </a>
        
        <!--=============== SCROLL REVEAL ===============-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
    </body>
</html>
