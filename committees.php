<?php
class Committee
{
    public $name;
    public $description;
    public $link;

    public function __construct($name, $description, $link)
    {
        $this->name = $name;
        $this->description = $description;
        $this->link = $link;
    }
}

// Example array of Committee objects
$committees = [
    new Committee("Committee on Ragging", "A body dedicated to preventing and addressing any instances of ragging, ensuring a safe and respectful environment for all students.", "https://drive.google.com/file/d/1xKJOaSI3tF8fgR9xnyUmzkvZrEMBM8BE/view?usp=drive_link"),
    new Committee("Committee on Sexual Harassment", "Responsible for creating awareness and addressing issues related to sexual harassment, maintaining a secure and dignified atmosphere.", "https://drive.google.com/file/d/1yuzdnDdcOmq4ZF5TdMcJFw0NfGSuTAaO/view?usp=drive_link"),
    new Committee("Committee on Discrimination", "Aims to promote equality and prevent discrimination on any grounds, fostering an inclusive campus culture.", "https://drive.google.com/file/d/18dpYghLC1vjPZIC4eqFzEE5sLaSn0_7S/view?usp=drive_link"),
    new Committee("Committee on Greivance Cell", "Provides a confidential platform for students and staff to voice and resolve personal and academic grievances.", "https://drive.google.com/file/d/1pMCPyrMKrgo7XXcvl0GwXUhWqk863FZy/view?usp=drive_link"),
    new Committee("Committee on Internal Quality Assurance", "Ensures the enhancement and maintenance of academic standards and quality across the institution.", "https://drive.google.com/file/d/1kj4mi8AP4sHUEmbbzZy8yXtqWH1M9t4Q/view?usp=drive_link"),
    new Committee("Committee on Discipline", "Upholds the code of conduct, ensuring orderly behavior and discipline within the college premises.", "https://drive.google.com/file/d/19SswoGQpKGbTxR1zIm1-uUlE9sQzx1cq/view?usp=drive_link")
];
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
    <meta name="description" content=" The University Institute of Engineering & Technology (UIET) was established by the University of Jammu in 2017 as a ‘Centre of Excellence to provide quality education in Engineering & Technology." />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        Committees - University Institute of Engineering and Technology, Kathua Campus, University of Jammu
    </title>
    <link rel="icon" href="./assets/png/uiet_header.png" />
    <link rel="stylesheet" href="css/style.css<?php echo "?t=" . time(); ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav>
        <?php require_once "components/navbar.php" ?>
    </nav>
    <section class="projects sec-pad">
        <div class="main-container">
            <h2 class="heading heading-sec heading-sec__mb-bg">
                <span class="heading-sec__main">Committees</span>
                <span class="heading-sec__sub center-text"> </span>
            </h2>
        </div>


        <div class="committees">
            <?php foreach ($committees as $currentCommittee): ?>
                        <div class="committee-card">
                            <h1 class="committee-title"><?= htmlspecialchars($currentCommittee->name); ?></h1>
                            <p class="committee-description"><?= htmlspecialchars($currentCommittee->description); ?></p>
                            <a class="btn btn--theme-inv" target="_blank" href="<?= htmlspecialchars($currentCommittee->link); ?>">Members</a>
                        </div>
            <?php endforeach; ?>

        </div>


    </section>

    <!-- Add more rows as needed -->
    <footer>
        <?php require_once "components/footer.php" ?>
    </footer>
    <script src="./js/index.js"></script>
</body>

</html>

<!-- <div class="committee-card">
    <h1 class="committee-title">Card Title</h1>
    <p class="committee-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem, aliquid?</p>
    <a href="">Learn More</a>
</div> -->