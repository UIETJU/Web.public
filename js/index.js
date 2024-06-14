const hamMenuBtn = document.querySelector('.header__main-ham-menu-cont');
const smallMenu = document.querySelector('.header__sm-menu');
const headerHamMenuBtn = document.querySelector('.header__main-ham-menu');
const headerHamMenuCloseBtn = document.querySelector(
  '.header__main-ham-menu-close'
);
const headerSmallMenuLinks = document.querySelectorAll('.header__sm-menu-link');
const mainHeader = document.querySelector('.header');
const transparentHeader = document.querySelector('.transparent-header');
const headerLinks = document.querySelectorAll('.header__link');

hamMenuBtn.addEventListener('click', () => {
  if (smallMenu.classList.contains('header__sm-menu--active')) {
    smallMenu.classList.remove('header__sm-menu--active');
  } else {
    smallMenu.classList.add('header__sm-menu--active');
  }
  if (headerHamMenuBtn.classList.contains('d-none')) {
    headerHamMenuBtn.classList.remove('d-none');
    headerHamMenuCloseBtn.classList.add('d-none');
  } else {
    headerHamMenuBtn.classList.add('d-none');
    headerHamMenuCloseBtn.classList.remove('d-none');
  }
});

for (let i = 0; i < headerSmallMenuLinks.length; i++) {
  headerSmallMenuLinks[i].addEventListener('click', () => {
    smallMenu.classList.remove('header__sm-menu--active');
    headerHamMenuBtn.classList.remove('d-none');
    headerHamMenuCloseBtn.classList.add('d-none');
  });
}

// Logo Click Event
const headerLogoConatiner = document.querySelector('.header__logo-container');
headerLogoConatiner.addEventListener('click', () => {
  location.href = 'index.php';
});

//This Code snippet detects whether the screen is touch enabled or not.
//It is being used to apply different stylings for more responsive UX.
//It adds a classes touch/no-touch to the bidy dynamically.

document.addEventListener('DOMContentLoaded', function () {
  if ('ontouchstart' in window || navigator.maxTouchPoints) {
    document.body.classList.add('touch');

    document.querySelectorAll('.btn').forEach((button) => {
      button.addEventListener('touchstart', function () {
        this.classList.add('hover');
      });

      button.addEventListener('touchend', function () {
        const self = this;
        setTimeout(function () {
          self.classList.remove('hover');
        }, 500); // Delay to simulate the hover state
      });
    });
  } else {
    document.body.classList.add('no-touch');
  }
});

//Dynamic MODAL Notifcations using Google Forms/AppScript
//This file contains the script for new modal notification system. The system is designed to display multiple modals as available in the database.
//The script ensures that modal is not displayed if the database is empty
//The modal is displayed as a carousel for multiple notifications.
//This is part of the google forms based novel CMS for easy web application updation/maintenance
document.addEventListener('DOMContentLoaded', function () {
  var modal = document.getElementById('flyerModal');
  if (modal) {
    // Function to show the current image
    function showImage(index) {
      var carouselImages = document.getElementsByClassName('flyer-image');
      for (var i = 0; i < carouselImages.length; i++) {
        carouselImages[i].classList.remove('active');
      }
      carouselImages[index].classList.add('active');
    }

    // Initialize the current index
    var currentIndex = 0;

    // Function to display the modal after a delay
    function displayModal() {
      setTimeout(function () {
        modal.style.display = 'block';
      }, 1000); // Display modal after 1 second (1000 milliseconds)
    }

    // Call displayModal once to show the modal after the delay
    displayModal();

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName('close')[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
      modal.style.display = 'none';
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = 'none';
      }
    };

    // Optionally, add a function to close the modal with the escape key
    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape') {
        modal.style.display = 'none';
      }
    });

    // Get the next and previous buttons
    var next = document.getElementsByClassName('next')[0];
    var prev = document.getElementsByClassName('prev')[0];

    // When the user clicks on next button
    next.onclick = function () {
      var carouselImages = document.getElementsByClassName('flyer-image');
      currentIndex = (currentIndex + 1) % carouselImages.length;
      showImage(currentIndex);
    };

    // When the user clicks on previous button
    prev.onclick = function () {
      var carouselImages = document.getElementsByClassName('flyer-image');
      currentIndex =
        (currentIndex - 1 + carouselImages.length) % carouselImages.length;
      showImage(currentIndex);
    };
  }
});

//Gallery
document.addEventListener('DOMContentLoaded', function () {
  const slides = document.querySelectorAll('.carousel-slide');
  const nextButton = document.querySelector('.carousel-button.next');
  const prevButton = document.querySelector('.carousel-button.prev');
  const indicators = document.querySelectorAll('.carousel-indicator');
  const pausePlayButton = document.querySelector('.carousel-pause-play');
  let currentIndex = 0;
  let isPlaying = true;
  let intervalId;

  function updateCarousel() {
    const slidesContainer = document.querySelector('.carousel-slides');
    slidesContainer.style.transform = `translateX(-${currentIndex * 100}%)`;

    indicators.forEach((indicator, index) => {
      if (index === currentIndex) {
        indicator.classList.add('active');
      } else {
        indicator.classList.remove('active');
      }
    });
  }

  function nextSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    updateCarousel();
  }

  function prevSlide() {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    updateCarousel();
  }

  function togglePlayPause() {
    if (isPlaying) {
      clearInterval(intervalId);
      pausePlayButton.innerHTML = '<i class="fa-solid fa-play"></i>';
    } else {
      intervalId = setInterval(nextSlide, 3000);
      pausePlayButton.innerHTML = '<i class="fa-solid fa-pause"></i>';
    }
    isPlaying = !isPlaying;
  }

  nextButton.addEventListener('click', nextSlide);
  prevButton.addEventListener('click', prevSlide);
  pausePlayButton.addEventListener('click', togglePlayPause);

  indicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
      currentIndex = index;
      updateCarousel();
    });
  });

  intervalId = setInterval(nextSlide, 3000);

  // Hide prev/next buttons on mobile
  if (window.innerWidth <= 780) {
    prevButton.style.display = 'none';
    nextButton.style.display = 'none';
  }
});
