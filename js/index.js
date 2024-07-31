const hamMenuBtn = document.querySelector('.hamburger');
const menu = document.querySelector('.menu');
const menuOpenIcon = document.querySelector('.menu-toggle-open');
const menuCloseIcon = document.querySelector('.menu-toggle-close');

hamMenuBtn.addEventListener('click', () => {
  menu.classList.toggle('active');
  menuOpenIcon.classList.toggle('hidden');
  menuCloseIcon.classList.toggle('hidden');
});

document.querySelectorAll('.menu-links a').forEach(link => {
  link.addEventListener('click', () => {
    menu.classList.remove('active');
    menuOpenIcon.classList.remove('hidden');
    menuCloseIcon.classList.add('hidden');
  });
});

// Logo Click Event
const headerLogoContainer = document.querySelector('.header__logo');
headerLogoContainer.addEventListener('click', () => {
  location.href = 'index.php';
});

//This Code snippet detects whether the screen is touch enabled or not.
//It is being used to apply different stylings for more responsive UX.
//It adds classes touch/no-touch to the bidy dynamically.

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

    // Function to hide the modal after 8 seconds
    function hideModal() {
      setTimeout(function () {
        modal.style.display = 'none';
      }, 8000); // Hide modal after 8 seconds (8000 milliseconds)
    }

    // Call displayModal once to show the modal after the delay
    displayModal();

    // Call hideModal to hide the modal after 8 seconds
    hideModal();

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

//Quote Meaning Flip//
document.addEventListener("DOMContentLoaded", function () {
  var quoteElement = document.getElementById("quote");
  var meaningElement = document.getElementById("quote-meaning");

  // Function to flip the quote to its meaning and back
  function toggleFlip() {
    if (quoteElement.classList.contains("hidden")) {
      meaningElement.classList.add("flipped");
      setTimeout(function () {
        meaningElement.classList.add("hidden");
        quoteElement.classList.remove("hidden");
        quoteElement.classList.add("visible");
      }, 600); // Match the transition time for a smooth flip
    } else {
      quoteElement.classList.add("flipped");
      setTimeout(function () {
        quoteElement.classList.add("hidden");
        meaningElement.classList.remove("hidden");
        meaningElement.classList.add("visible");
      }, 600); // Match the transition time for a smooth flip
    }
  }

  // Flip the quote to its meaning after a delay (e.g., 5 seconds)
  setTimeout(toggleFlip, 2500); // 5000ms = 5 seconds

  // Flip the quote to its meaning and back when the quote or meaning is clicked
  quoteElement.addEventListener("click", toggleFlip);
  meaningElement.addEventListener("click", toggleFlip);
});