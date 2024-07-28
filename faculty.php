<?php
// for main site production
require '../../DB/db-connect.php';

if (!$conn) {
  die("Connection Failed! " . mysqli_connect_error());
}

$faculty_result = ($conn->query("SELECT * FROM Faculty WHERE role='lecturer' ORDER BY REPLACE(REPLACE(name,'Er.',''),'Dr.','')"));
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
    Faculty - University's Institute of Engineering and Technology, Kathua
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
  <?php require_once "components/header.php" ?>
  <section id="faculty" class="projects sec-pad--top">
    <div class="main-container">
      <h2 class="heading heading-sec heading-sec__mb-bg">
        <span class="heading-sec__main">Faculty</span>
      </h2>
      <div class="uiet--grid uiet--grid-cards uiet--animated-grid">
        <!-- GRID start -->
        <?php
        if (!empty($faculty_row))
          foreach ($faculty_row as $rows) {
            ?>
            <div class="uiet--faculty-card"
              style="background-image: linear-gradient(rgba(0,0,0,0),rgba(0,0,0,0.8)), url(<?php echo "https://lh3.googleusercontent.com/d/" . explode("id=", $rows['photo'])[1] ?>);">
              <div class="uiet--faculty-info">
                <h4>
                  <?php echo $rows['name']; ?>
                </h4>
                <span>
                  <?php echo $rows['role'] . " - " . $rows['department']; ?>
                </span>
                <p class="uiet--faculty-qualifications">
                  <?php echo $rows['qualifications']; ?>
                </p>
                <p class="uiet--faculty-bio">
                  <?php echo $rows['bio']; ?>
                </p>
                <div class="faculty-social-media-handles">
                  <!-- <?php //echo "<a href=\"tel:$rows[phone]\"><i class=\"fa-solid fa-phone\" style=\"color: #11d531;\"></i></a>"; 
                      ?> -->
                  <?php echo "<a href=\"mailto:$rows[email]\"><i class=\"fa-solid fa-envelope\" style=\"color: #dd8e1c;\"></i></a>"; ?>
                  <?php
                  if ($rows["linkedinUrl"] != null && !str_contains($rows["linkedinUrl"], "NULL")) {
                    $socialUrl = !str_contains($rows['linkedinUrl'], 'http') ? "https://" . $rows['linkedinUrl'] : $rows['linkedinUrl'];

                    $icon = '';
                    $color = '';

                    if (str_contains(strtolower($socialUrl), 'linkedin')) {
                      $icon = 'fa-linkedin';
                      $color = '#0A66C2';
                    } elseif (str_contains(strtolower($socialUrl), 'scholar.google')) {
                      $icon = 'fa-google';
                      $color = '#4285F4';
                    } elseif (str_contains(strtolower($socialUrl), 'facebook')) {
                      $icon = 'fa-facebook';
                      $color = '#1877F2';
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
                  <?php echo "<a href=\"$rows[CVURL]\" target=\"_blank\"><i class=\"fa-solid fa-file-pdf\" style=\"color: #f40;\"></i></a>"; ?>
                </div>
              </div>
            </div>
          <?php } ?>
        <!-- Grid Ends -->
      </div>
    </div>
  </section>
  <div class="disclaimer">
    <h4>Important Dislosure</h4>
    <p>Due to Administrative reasons entire staff at UIET is engaged at Annual Academic Arrangement basis, inconvinience
      is regretted, <a class="highlight"
        href="https://drive.google.com/file/d/1Ej44pR_8y65LI9jSKxv9Q2S_vXwKNUXT/view?usp=sharing">more on this... <i
          class="fa-regular fa-file-lines"></i></a>
    </p>
  </div>
  <?php require_once "components/footer.php" ?>
  <script src="./js/index.js"></script>
</body>

</html>