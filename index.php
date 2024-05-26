<?php
require './../DB/db-connect.php';

if (!$conn) {
  die("Connection Failed! " . mysqli_connect_error());
}

$sql = "SELECT image FROM Gallery";
$result = $conn->query($sql);

$flyers = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $url = $row['image'];
    if (strpos($url, 'drive.google.com') !== false) {
      if (preg_match('/file\/d\/(.*?)\/view/', $url, $matches)) {
        $url = 'https://lh3.googleusercontent.com/d/' . $matches[1];
      }
    }
    $flyers[] = $url;
  }
}
$conn->close();
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
  <meta name="description" content="University Institute of Engineering & Technology (UIET) Kathua, is a constituent Engineering College of University of Jammu, J&K, India.">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>University Institute of Engineering and Technology, Kathua</title>
  <link rel="icon" href="./assets/png/uiet_header.png">
  <link rel="stylesheet" href="css/style.css?t=<?php echo time(); ?>">
  <link rel="stylesheet" href="./css/chatbot.css?t=<?php echo time(); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="preload" href="./assets/events/Cultural FUNanaza.JPG" as="image">
</head>

<body>
  <?php require_once "components/main-header.php"; ?>

  <section class="home-hero" id="home">
    <div class="home-hero__content">
      <h1 class="heading-primary" onclick="newQuote()">
        <ul>
          <li>University Institute of Engineering and Technology, Kathua</li>
          <li id="quoteDisplay"></li>
        </ul>
      </h1>
    </div>
  </section>

  <div class="chatbox">
    <div class="chatbox--bar">
      <span>UIEboT</span>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
        <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
      </svg>
    </div>
    <div class="chatarea"></div>
    <div class="chatbox--compose">
      <input type="text" placeholder="Ask something...">
      <div class="send-box">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
          <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
        </svg>
      </div>
    </div>
  </div>
  <div class="chatbot-btn">
    <img src="assets/png/UieBot.png" alt="UIEBOT">
  </div>

  <?php if (count($flyers) > 0) : ?>
    <div id="flyerModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <div class="carousel">
          <span class="prev">&#10094;</span>
          <span class="next">&#10095;</span>
          <div class="carousel-inner" id="carousel-inner">
            <?php foreach ($flyers as $index => $url) : ?>
              <img src="<?php echo htmlspecialchars($url); ?>" alt="Flyer <?php echo $index + 1; ?>" class="flyer-image <?php echo $index === 0 ? 'active' : ''; ?>">
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <section id="about" class="about sec-pad">
    <div class="main-container">
      <h2 class="heading heading-sec heading-sec__mb-med">
        <span class="heading-sec__main">About UIET</span>
        <span class="heading-sec__sub">
          The University Institute of Engineering & Technology (UIET) was established by the University of Jammu in 2017 as a ‘Centre of Excellence to provide quality education in Engineering & Technology.
          <br><br>
          The First Academic Session for B.Tech. programme in UIET started in 2017 under the centrally sponsored Rashtriya Uchchattar Shiksha Abhiyan (RUSA) with two streams in Engineering
          <strong>Civil Engineering (C.E.)</strong> and
          <strong>Computer Science Engineering (C.S.E.)</strong> with an intake of <strong>60</strong> in each stream. UIET has the distinction of being inaugrated by the Prime Minister of India, Shri Narendra Modi ji!
        </span>
      </h2>
      <div class="about__content">
        <div class="about__content-main">
          <h3 class="about__content-title">
            <i style="color: red" class="fa-solid fa-location-dot fa-sm"></i> Location
          </h3>
          <div class="about__content-details">
            <p class="about__content-details-para">
              University Institute of Engineering and Technology is located at
              <strong>Janglote Rd, Kathua, Jammu and Kashmir 184104.</strong>
              <br>
              <i class="fa-solid fa-map-location-dot fa-sm" style="color: dodgerblue"></i>
              <a target="_blank" class="blue-link top-space" href="https://maps.app.goo.gl/BrSA1ZLaXqr8aXPMA">View on Google Maps</a>
            </p>
          </div>
        </div>
        <div class="about__content-facilities">
          <h3 class="about__content-title">
            <i style="color: coral" class="fa-solid fa-house fa-sm"></i> Facilities
          </h3>
          <div class="facilities">
            <div class="facilities_facility">Hostel Facility</div>
            <div class="facilities_facility">Workshop</div>
            <div class="facilities_facility">Laboratory</div>
            <div class="facilities_facility">Library</div>
            <div class="facilities_facility">Sports</div>
            <div class="facilities_facility">High-Speed Internet</div>
            <div class="facilities_facility">Canteen</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Events Section Start -->
  <section id="uiet-events" class="projects sec-pad">
    <div class="main-container">
      <h2 class="heading heading-sec">
        <span class="heading-sec__main heading-text--small">What's happening @UIET!</span>
      </h2>
      <div class="events-container">
        <!--CALENDAR-->
        <div class="calendar-desktop">
          <iframe src="https://embed.styledcalendar.com/#IOYkzSeHNEIQq7dX4ASg" title="Styled Calendar" class="styled-calendar-container" style="width: 100%; border: none;" data-cy="calendar-embed-iframe"></iframe>

        </div>
        <div class="calendar-mobile">
          <object data="https://calendar.google.com/calendar/embed?height=600&wkst=2&bgcolor=%23F6BF26&ctz=Asia%2FKolkata&showNav=0&showTitle=1&showPrint=0&showTz=0&showCalendars=0&showTabs=0&mode=AGENDA&src=aXRjZWxsLnVpZXRqdUBnbWFpbC5jb20&color=%23039BE5" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></object>
        </div>
      </div>
    </div>
  </section>
  <!-- Events Section Ends -->
  <!-- Youtube Embeds -->
  <!-- <section id="youtube-embeds" class="projects sec-pad-alt">
        <div class="main-container-max">
          <h2 class="heading heading-sec">
            <span class="heading-sec__main heading-text--small">Video Presentations</span>
          </h2>
          <div class="yt-embed">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/aDmVDAZOccw?si=ftqX7MUf8GnypPQ6" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/58GWIXH9-S8?si=PHAEp2rEOtAsTBqk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
          </div>
        </div>
      </section> -->

  <!-- Youtube embeds ends here -->
  </div>
  </section>
  <!-- Gallery Starts -->
  <section id="gallery" class="projects sec-pad-alt">
    <div class="main-container">
      <h2 class="heading heading-sec heading-sec__custom">
        <span class="heading-sec__main">Gallery</span>
        <div class="gallery-container">
          <div class="gallery-image-container">
            <img src="assets/events/Freshers.png" alt="gallery-img" />
          </div>
          <div class="gallery-description">
            <h1 class="gallery-desc-title">आगाज़-2022</h1>
            <p class="gallery-desc-text">
              The first ever Freshers Party “AAGHAZ-2022” was a roaring success, filled with laughter, fun, and
              memories. Hosted on 12th April 2023 at Campus auditorium, the event brought together new students,
              seniors, and faculty for an unforgettable evening.
            </p>
            <div class="gallery-desc-button-holder">
              <button class="gallery-desc-button gallery-event-btn">Event Note</button>
              <button class="gallery-desc-button gallery-album-btn gallery-rounded-btn" aria-label="Gallery Album Button"><i class="fa-solid fa-image"></i></button>
              <button class="gallery-desc-button gallery-pause-btn gallery-rounded-btn" aria-label="Gallery Pause Button"><i class="fa-solid fa-pause"></i></button>
            </div>
          </div>
        </div>
      </h2>
    </div>
  </section>
  <section id="admission" class="projects sec-pad">
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
              <img class="projects__row-img-fit crop-fit" src="assets/jpeg/uietthumbnail-min.jpg" alt="UIET Kathua" />
            </picture>
          </div>
          <div class="projects__row-content">
            <h3 class="projects__row-content-title">Admissions 2024-25!</h3>
            <h3 class="projects__row-content-desc">Preference for admissions:</h3>
            <ol class="projects__row-content-desc">
              <li>Round-1:-<a class=" exams" href="https://jeemain.nta.ac.in" target="_blank">JEE Mains Score 📃</a></li>
              <li>Round-2(if seats vaccant):-<a class="exams" href="https://cuetug.ntaonline.in/universities/eligibility/Nzk=" target="_blank">CUET-UG Score 📃</a></li>
              <li>Round-3(if seats vaccant):-<a class="exams" href="https://www.cbse.gov.in/cbsenew/cbse.html" target="_blank">Higher Secondary Score 📃</a>
              </li>
            </ol>
            <div class="side-img-link-container">
              <a href="https://drive.google.com/file/d/1ikDsfxCggasVyDdQD0wsOaBazohtwx9Z/view?usp=sharing" class="btn btn--theme dynamicBgClr" target="_blank">Admission Notice 2024</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Section>
  <?php require_once "components/footer.php" ?>
  <script src="./js/script.js"></script>
  <script src="./js/index.js"></script>
  <script src="./js/preload.js"></script>
  <script src="./js/gallery.js"></script>
  <script src="./js/chatbot.js"></script>
  <script async type="module" src="https://embed.styledcalendar.com/assets/parent-window.js"></script>
</body>

</html>