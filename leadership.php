<?php
// for main site production
require './../DB/db-connect.php';

if (!$conn) {
    die("Connection Failed! " . mysqli_connect_error());
}

$faculty_result = ($conn->query("SELECT * FROM Leadership ORDER BY id ASC"));
$faculty_row = [];
if ($faculty_result->num_rows > 0) {
    $faculty_row = $faculty_result->fetch_all(MYSQLI_ASSOC);
}
mysqli_close($conn);

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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content=" The University Institute of Engineering & Technology (UIET) was established by the University of Jammu in 2017 as a ‘Centre of Excellence to provide quality education in Engineering & Technology." />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        Leadership - Jammu University's Institute of Engineering and Technology, Kathua
    </title>
    <link rel="icon" href="./assets/png/uiet_header.png" />
    <link rel="stylesheet" href="css/styles.css<?php echo "?t=" . time(); ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap"
        rel="stylesheet" />
    <script src="https://kit.fontawesome.com/ed322df7d9.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once "components/navbar.php" ?>
    <section id="leadership" class="projects sec-pad--top">
        <div class="main-container">
            <h2 class="heading heading-sec heading-sec__mb-bg">
                <span class="heading-sec__main">Leadership</span>
            </h2>
            <div class="uiet-leadership--box uiet--animated-grid">
                <!-- FlexBox Start start -->
                <?php
                if (!empty($faculty_row))
                    foreach ($faculty_row as $rows) {
                        ?>
                        <div class="uiet-leadership--card">
                            <div class="uiet-leadership-card--img">
                                <img src="<?php echo "https://lh3.googleusercontent.com/d/" . explode("id=", $rows['Picture'])[1] ?>"
                                    alt="">
                            </div>
                            <div class="uiet-leadership-card--info">
                                <div class="uiet-leadership-subbox">
                                    <h2 class="uiet-leadership-info--title">
                                        <?php echo $rows['Name'] ?>
                                    </h2>
                                    <p class="uiet-leadership-info--name">
                                        <?php echo $rows['Designation']; ?>
                                    </p>
                                    <br>
                                    <q class="uiet-leadership-info--desc">
                                        <?php echo $rows['Message']; ?>
                                    </q>
                                    <div class="uiet-leadership--contactbox">
                                        <?php echo "<a href=\"mailto:$rows[Email]\"><i class=\"fa-solid fa-envelope\" style=\"color: #3e7eb5;\"></i></a>"; ?>
                                        <?php echo "<a href=\"tel:$rows[PhNumber]\"><i class=\"fa-solid fa-phone\" style=\"color: #22db1f;\"></i></a>"; ?>
                                        <?php echo "<a href=\"$rows[Profilelink]\" target=\"_blank\"><i class=\"fa-solid fa-file-pdf\" style=\"color: #ec4f27;\"></i></a>"; ?>
                                        <?php
                                        if ($rows["Sociallink"] != null && !str_contains($rows["Sociallink"], "NA")) {
                                            $socialUrl = !str_contains($rows['Sociallink'], 'http') ? "https://" . $rows['Sociallink'] : $rows['Sociallink'];

                                            $icon = '';
                                            $color = '';

                                            if (str_contains(strtolower($socialUrl), 'linkedin')) {
                                                $icon = 'fa-linkedin';
                                                $color = '#0A66C2';
                                            } elseif (str_contains(strtolower($socialUrl), 'scholar.google')) {
                                                $icon = 'fa-google-scholar';
                                                $color = '#4285F4';
                                            } elseif (str_contains(strtolower($socialUrl), 'facebook')) {
                                                $icon = 'fa-facebook';
                                                $color = '#1877F2';
                                            } elseif (str_contains(strtolower($socialUrl), 'instagram')) {
                                                $icon = 'fa-instagram';
                                                $color = '#1DA1F2';
                                            } elseif (str_contains(strtolower($socialUrl), 'twitter')) {
                                                $icon = 'fa-twitter';
                                                $color = '#1DA1F2';
                                            } else {
                                                // Default to a generic link icon if the platform is not recognized
                                                $icon = 'fa-link';
                                                $color = '#000000';
                                            }

                                            echo "<a href=\"$socialUrl\" target=\"_blank\"><i class=\"fa-brands $icon\" style=\"color: $color;\"></i></a>";
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                <!-- FlexBox Ends -->
            </div>
        </div>
    </section>
    <?php require_once "components/footer.php" ?>
    <script src="./js/index.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        ScrollReveal().reveal(".uiet-leadership--card")
    </script>
</body>

</html>