<?php
require '../../DB/db-connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VJ2HYZPRCX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-VJ2HYZPRCX');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="University Institute of Engineering & Technology (UIET) Kathua, is a constituent Engineering College of University of Jammu, J&K, India.">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to University Institute of Engineering and Technology, Kathua</title>
    <link rel="icon" href="./assets/png/uiet_header.png">
    <link rel="stylesheet" href="css/styles.css?t=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/ed322df7d9.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once "components/header.php"; ?>
    <?php
    // Function to convert Google Drive link
    function convertGoogleDriveLink($url)
    {
        if (strpos($url, 'drive.google.com') !== false) {
            if (preg_match('/open\?id=(.*)/', $url, $matches)) {
                $url = 'https://lh3.googleusercontent.com/d/' . $matches[1];
            }
        }



        return $url; // Return the original URL if it doesn't match the expected pattern
    }

    $sql = "SELECT institution_name, quote, quote_meaning, bgimage FROM Home ORDER BY RAND() LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $institutionName = !empty($row["institution_name"]) ? $row["institution_name"] : "University Institute of Engineering and Technology, Kathua";
        $quote = !empty($row["quote"]) ? $row["quote"] : "विद्यया अमृतमश्नुते";
        $quoteMeaning = !empty($row["quote_meaning"]) ? $row["quote_meaning"] : "By knowledge, one attains immortality.";
        $bgimage_url = !empty($row["bgimage"]) ? convertGoogleDriveLink($row["bgimage"]) : 'https://lh3.googleusercontent.com/d/17bKM5cvEkkFsebaHJdIp7mEWIO5pO-PP';
    } else {
        $institutionName = "University Institute of Engineering and Technology, Kathua";
        $quote = "विद्यया अमृतमश्नुते";
        $quoteMeaning = "By knowledge, one attains immortality.";
        $bgimage_url = 'https://lh3.googleusercontent.com/d/17bKM5cvEkkFsebaHJdIp7mEWIO5pO-PP';
    }
    ?>
    <section class="home-hero" id="home"
        style="background-image: url('<?php echo htmlspecialchars($bgimage_url); ?>');">
        <div class="home-hero__content">
            <h1 class="heading-primary">
                <ul>
                    <li><?php echo htmlspecialchars($institutionName); ?></li>
                    <li id="quote" class="flip-quote"><?php echo htmlspecialchars($quote); ?></li>
                    <li id="quote-meaning" class="hidden flip-meaning"><?php echo htmlspecialchars($quoteMeaning); ?>
                    </li>
                </ul>
            </h1>
        </div>
    </section>
    <!-- Modal Notifcation Code -->
    <?php
    $sql = "SELECT flyerURL FROM Modal";
    $result = $conn->query($sql);
    $flyers = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $url = $row['flyerURL'];
            if (strpos($url, 'drive.google.com') !== false) {
                if (preg_match('/open\?id=(.*)/', $url, $matches)) {
                    $url = 'https://lh3.googleusercontent.com/d/' . $matches[1];
                }
            }



            $flyers[] = $url;
        }
    }
    ?>
    <?php if (count($flyers) > 0): ?>
        <div id="flyerModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="carousel">
                    <span class="prev">&#10094;</span>
                    <span class="next">&#10095;</span>
                    <div class="carousel-inner" id="carousel-inner">
                        <?php foreach ($flyers as $index => $url): ?>
                            <img src="<?php echo htmlspecialchars($url); ?>" alt="Flyer <?php echo $index + 1; ?>"
                                class="flyer-image <?php echo $index === 0 ? 'active' : ''; ?>">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <section id="about" class="projects sec-pad-even">
        <div class="main-container">
            <h2 class="heading heading-sec heading-sec__mb-med">
                <span class="heading-sec__main">About UIET</span>
                <span class="heading-sec__sub">
                    The University Institute of Engineering & Technology (UIET) was established by the University of
                    Jammu in 2017 as a ‘Centre of Excellence to provide quality education in Engineering & Technology.
                    <br><br>
                    The First Academic Session for B.Tech. programme in UIET started in 2017 under the centrally
                    sponsored Rashtriya Uchchattar Shiksha Abhiyan (RUSA) with two streams in Engineering
                    <strong>Civil Engineering (C.E.)</strong> and
                    <strong>Computer Science Engineering (C.S.E.)</strong> with an intake of <strong>60</strong> in each
                    stream. UIET has the distinction of being inaugrated by the Prime Minister of India, Shri Narendra
                    Modi ji!
                </span>
            </h2>
        </div>
        </div>
    </section>
    <!-- Gallery Starts -->
    <section id="gallery" class="projects sec-pad-odd spacer">
        <?php
        $sql = "SELECT image, description, title, NoteURL, AlbumURL FROM Gallery ORDER BY id DESC";
        $result = $conn->query($sql);
        $slides = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $url = $row['image'];
                if (strpos($url, 'drive.google.com') !== false) {
                    if (preg_match('/open\?id=(.*)/', $url, $matches)) {
                        $url = 'https://lh3.googleusercontent.com/d/' . $matches[1];
                    }
                }



                $slides[] = [
                    'image' => $url,
                    'description' => $row['description'],
                    'title' => $row['title'],
                    'NoteURL' => $row['NoteURL'],
                    'AlbumURL' => $row['AlbumURL'],
                ];
            }
        }
        ?>
        <div class="main-container">
            <h2 class="heading heading-sec heading-gallery">
                <span class="heading-sec__main">Gallery</span>
            </h2>
            <div class="carousel-container">
                <div class="carousel-slides">
                    <?php foreach ($slides as $slide): ?>
                        <div class="carousel-slide">
                            <div class="gallery-container">
                                <div class="gallery-image-container">
                                    <img src="<?php echo $slide['image']; ?>" alt="<?php echo $slide['title']; ?>"
                                        loading="lazy" />
                                </div>
                                <div class="gallery-description">
                                    <h1 class="gallery-desc-title"><?php echo $slide['title']; ?></h1>
                                    <p class="gallery-desc-text"><?php echo $slide['description']; ?></p>
                                    <div class="gallery-btn-holder">
                                        <?php if (!empty($slide['NoteURL'])): ?>
                                            <a href="<?php echo $slide['NoteURL']; ?>" class="gallery-btn">
                                                <i class="fa-solid fa-newspaper gallery-btn alt-btn btn"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($slide['AlbumURL'])): ?>
                                            <a href="<?php echo $slide['AlbumURL']; ?>" class="gallery-btn">
                                                <i class="fa-solid fa-images gallery-btn alt-btn btn"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-button prev ">&laquo;</button>
                <button class="carousel-button next ">&raquo;</button>
            </div>
            <div class="carousel-indicators">
                <?php for ($i = 0; $i < count($slides); $i++): ?>
                    <button class="carousel-indicator" data-slide-to="<?php echo $i; ?>"></button>
                <?php endfor; ?>
                <button class="carousel-pause-play" aria-label="Pause/Play Button"><i
                        class="fa-solid fa-pause"></i></button>
            </div>
        </div>
    </section>
    <!-- Notifcation Window -->
    <section id="Notify" class="projects sec-pad-even spacer">
        <div class="notifications-wrapper">
            <div class="notifications-container">
                <?php
                // Fetch notifications based on type
                $types = ['Academic', 'Administrative', 'Miscellaneous'];

                foreach ($types as $type) {
                    $sql = "SELECT title, file_url, posted_at FROM Notify WHERE type='$type' ORDER BY posted_at DESC";
                    $result = $conn->query($sql);

                    echo "<div class='notification-column' id='{$type}-notifications'>";
                    echo "<h2>" . ucfirst($type) . " Notifications</h2>";
                    echo "<div class='notifications'>";

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<p><a href='" . $row['file_url'] . "' target='_blank'>" . $row['title'] . "</a><span class='notification-date'>" . $row['posted_at'] . "</span></p>";
                        }
                    } else {
                        echo "<p>No notifications available.</p>";
                    }

                    echo "</div>";
                    echo "<a href='https://drive.google.com/drive/folders/1KQXPjhaNkt4hwJBelqJ4BnIu3Vgqq0gGTXrUFT2g8A84ETIfQQMGvUJb1XhdAwpXDaKSjWDN' class='alt-btn btn'>Archive</a>";
                    echo "</div>";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </section>
    <!-- Events Section Start -->
    <section id="uiet-events" class="projects sec-pad-odd">
        <div class="main-container">
            <h2 class="heading heading-sec">
                <span class="heading-sec__main heading-text--small">What's happening @UIET!</span>
            </h2>
            <div class="events-container">
                <!--CALENDAR-->
                <div class="calendar-desktop">
                    <iframe src="https://embed.styledcalendar.com/#IOYkzSeHNEIQq7dX4ASg" title="Styled Calendar"
                        class="styled-calendar-container" style="width: 100%; border: none;"
                        data-cy="calendar-embed-iframe"></iframe>

                </div>
                <div class="calendar-mobile">
                    <object
                        data="https://calendar.google.com/calendar/embed?height=600&wkst=2&bgcolor=%23F6BF26&ctz=Asia%2FKolkata&showNav=0&showTitle=1&showPrint=0&showTz=0&showCalendars=0&showTabs=0&mode=AGENDA&src=aXRjZWxsLnVpZXRqdUBnbWFpbC5jb20&color=%23039BE5"
                        style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></object>
                </div>
            </div>
        </div>
    </section>
    </div>
    </section>

    <section id="admission" class="projects sec-pad-even spacer">
        <div class="main-container">
            <h2 class="heading heading-sec heading-sec__mb-bg">
                <span class="heading-sec__main">Admission</span>
                <span class="heading-sec__sub center-text">Welcome future UIETian!</span>
            </h2>
            <div class="projects__content">
                <div class="projects__row">
                    <div class="projects__row-img-cont">
                        <picture class="projects__row-img-fit crop-fit">
                            <source srcset="assets/webp/uietthumbnail.webp" type="image/webp" />
                            <source srcset="assets/jpeg/uietthumbnail-min.jpg" type="image/jpeg" />
                            <img class="projects__row-img-fit crop-fit" src="assets/jpeg/uietthumbnail-min.jpg"
                                alt="UIET Kathua" />
                        </picture>
                    </div>
                    <div class="projects__row-content">
                        <h3 class="projects__row-content-title">Admissions 2024-25!</h3>
                        <h3 class="projects__row-content-desc">Preference for admissions:</h3>
                        <ol class="projects__row-content-desc">
                            <li>Round-1:-<a class="highlight" href="https://jeemain.nta.ac.in" target="_blank">JEE Mains
                                    Score</a></li>
                            <li>Round-2(if seats vaccant):-<a class="highlight"
                                    href="https://examsaudit.ntaonline.in/CUET_landing/public/eligibility/Nzk="
                                    target="_blank">CUET-UG Score</a></li>
                            <li>Round-3(if seats vaccant):-<a class="highlight"
                                    href="https://www.cbse.gov.in/cbsenew/cbse.html" target="_blank">Higher Secondary
                                    Score</a>
                            </li>
                        </ol>
                        <h4 class="projects__row-content-desc disclaimer">Update: Apply for Mop-Up Round admissions!
                            <br> Counse;ling to be held on 9th September, 2024!
                        </h4>
                        <div class="side-img-link-container">
                            <a href="https://drive.google.com/file/d/1ikDsfxCggasVyDdQD0wsOaBazohtwx9Z/view?usp=sharing"
                                class="btn alt-btn" target="_blank">Admission Notice 2024</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Section>

    <?php require_once "components/footer.php" ?>
    <script src="./js/index.js?t=<?= time(); ?>"></script>
    <script async type="module" src="https://embed.styledcalendar.com/assets/parent-window.js"></script>
</body>

</html>