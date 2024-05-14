/*
 * Gallery.js
 * This js file would make the gallery functional. from loading images and text, to updating links and performing animations on the data change.
 */

class GalleryItem {
  constructor(title, description, photoUrl, learnMoreUrl, albumUrl = "") {
    this.title = title;
    this.description = description;
    this.photoUrl = photoUrl;
    this.learnMoreUrl = learnMoreUrl;
    this.albumUrl = albumUrl;
  }
}

const galleryArr = [
  new GalleryItem(
    "Valedictory Ceremony, DYT-2023",
    "Display Your Talent-2023 organised by the Department of Students Welfare, University of Jammu concluded here today at University of Jammu with huge fanfare. Prof. Bechan Lal, esteemed Vice Chancellor, Cluster University of Jammu was the Chief Guest on the occasion. Winners of different events were felicitated by the Chief Guest.  He cited the example of Ancient Indian Learning Methodology, which was inclusive and focused on multifaceted growth and development of the students and beautifully related it to the intention behind the National Education Policy of Govt. of India.",
    "assets/events/ValedictoryDYT23.png",
    "http://www.jammuuniversity.ac.in/node/5815",
    "https://photos.app.goo.gl/C5EQTUFYs7DDrGtp7"
  ),

  new GalleryItem(
    "Quiz@DYT-2023",
    "The competitions of ‘Classical Dance’, ‘Quiz’ and ‘Folk Dance’ were conducted at ‘Display Your Talent-2023’ organized by the Department of Students Welfare, University of Jammu. Anadi Mishra and Anant Mishra from UIET secured First position",
    "assets/events/dyt23quiz.png",
    "http://www.jammuuniversity.ac.in/node/5812",
    "https://photos.app.goo.gl/C5EQTUFYs7DDrGtp7"
  ),
  new GalleryItem(
    "आगाज़-2022",
    "The first ever Freshers Party “AAGHAZ-2022” was a roaring success, filled with laughter, fun, and memories. Hosted on 12th April 2023 at Campus auditorium, the event brought together new students, seniors, and faculty for an unforgettable evening.",
    "assets/events/Freshers.png",
    "assets/events/Freshers2022.pdf"
  ),
  new GalleryItem(
    "Induction Program",
    "UIET and Kathua Campus organized an Induction cum Motivational lecture (7th in the series) under Expert Lecture series on the topic “Personality Development”. The lecture was organized on the second day of one week long plantation drive.",
    "assets/events/plantation-drive.jpeg",
    "https://www.jammuuniversity.ac.in/index.php/node/5043"
  ),
  new GalleryItem(
    "Cultural Funanaza",
    "UIET and Kathua Campus hosted a memorable Cultural Fest “Funanza”, a student-driven activity that was packed with fun, frolic, and a myriad of scintillating performances by students, alumni and local artists.",
    "assets/events/Cultural FUNanaza.JPG",
    "https://jammuuniversity.ac.in/node/4823"
  ),
  new GalleryItem(
    "Blood Donation",
    "UIET and kathua Campus organized a Blood Donation Camp in collaboration with the Work for Blood Donor Society (WBDS), J&K for thalassemia child patients in the run-up to International Blood Donation Day.",
    "assets/events/Blooddonation.PNG",
    "https://www.jammuuniversity.ac.in/node/4787"
  ),
  new GalleryItem(
    "Talk on Domestic Violence",
    "UIET organized an awareness talk titled “Domestic Violence and Women Empowerment” for the students of UIET, MCA, MBA and English departments of the Campus.",
    "assets/events/women-emp.jpeg",
    "https://jammuuniversity.ac.in/node/4782"
  ),
  new GalleryItem(
    "Dam Trip",
    "UIET celebrated the National Technology Day on 11th & 12th May 2023 by organising a field visit of its students to the 206 MW Shahpur Kandi Dam Project located on Ravi River downstream of Ranjit Sagar Dam in collaboration with the Department of Water Resource, Govt. of Punjab.",
    "assets/events/dam-trip1.jpeg",
    "https://www.jammuuniversity.ac.in/node/4536"
  ),
  new GalleryItem(
    "Maiden One Week Drive",
    "UIET organized Maiden One Week Environmental Consciousness Drive wherein more than 200 earthen water pots were placed in the campus premises including academic block, administrative block and hostels.",
    "assets/events/maiden-drive.jpeg",
    "https://www.jammuuniversity.ac.in/node/4818"
  ),
];

// assigning variables

const galleryImage = document.querySelector(".gallery-image-container img");
const galleryTitle = document.querySelector(".gallery-desc-title");
const galleryDescription = document.querySelector(".gallery-desc-text");
const galleryDescriptionBox = document.querySelector(".gallery-description");
const galleryLearnMore = document.querySelector(".gallery-event-btn");
const galleryPausenBtn = document.querySelector(".gallery-pause-btn");
const galleryAlbumBtn = document.querySelector(".gallery-album-btn");
// Logic for gallery

galleryLearnMore.onclick = () => {
  window.open(
    "https://www.jammuuniversity.ac.in/index.php/node/5043",
    "_blank"
  );
};

let count = 1;
let isPlaying = true;
isAnimationOccured = false;
// pause/play gallery
galleryPausenBtn.addEventListener("click", () => {
  isPlaying = !isPlaying;
  if (isPlaying) {
    galleryPausenBtn.innerHTML = `<i class="fa-solid fa-pause"></i>`;
  } else {
    galleryPausenBtn.innerHTML = `<i class="fa-solid fa-play"></i>`;
  }
});
// interval function
setInterval(() => {
  if (isPlaying) {
    if (!isAnimationOccured) {
      galleryImage.style.animation = "fade-show 1s ease";
      galleryDescriptionBox.style.animation = "fade-text-show 0.5s ease";
      setTimeout(() => {
        galleryImage.style.removeProperty("animation");
        galleryDescriptionBox.style.removeProperty("animation");
      }, 1500);
    }
    if (count < galleryArr.length) {
      galleryImage.src = galleryArr[count].photoUrl;
      galleryTitle.innerText = galleryArr[count].title;
      galleryDescription.innerText = galleryArr[count].description;
      galleryLearnMore.onclick = () => {
        window.open(galleryArr[count - 1].learnMoreUrl, "_blank");
      };
      galleryAlbumBtn.onclick = () => {
        window.open(galleryArr[count - 1].albumUrl, "_blank");
      };
      count++;
    } else {
      count = 0;
      galleryImage.src = galleryArr[count].photoUrl;
      galleryTitle.innerText = galleryArr[count].title;
      galleryDescription.innerText = galleryArr[count].description;
      galleryLearnMore.onclick = () => {
        window.open(galleryArr[count - 1].learnMoreUrl, "_blank");
      };
      galleryAlbumBtn.onclick = () => {
        window.open(galleryArr[count - 1].albumUrl, "_blank");
      };
      count++;
    }
  }
}, 5000);
