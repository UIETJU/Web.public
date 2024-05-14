const hamMenuBtn = document.querySelector(".header__main-ham-menu-cont");
const smallMenu = document.querySelector(".header__sm-menu");
const headerHamMenuBtn = document.querySelector(".header__main-ham-menu");
const headerHamMenuCloseBtn = document.querySelector(
  ".header__main-ham-menu-close"
);
const headerSmallMenuLinks = document.querySelectorAll(".header__sm-menu-link");
const mainHeader = document.querySelector(".header");
const transparentHeader = document.querySelector(".transparent-header");
const headerLinks = document.querySelectorAll(".header__link");

hamMenuBtn.addEventListener("click", () => {
  if (smallMenu.classList.contains("header__sm-menu--active")) {
    smallMenu.classList.remove("header__sm-menu--active");
  } else {
    smallMenu.classList.add("header__sm-menu--active");
  }
  if (headerHamMenuBtn.classList.contains("d-none")) {
    headerHamMenuBtn.classList.remove("d-none");
    headerHamMenuCloseBtn.classList.add("d-none");
  } else {
    headerHamMenuBtn.classList.add("d-none");
    headerHamMenuCloseBtn.classList.remove("d-none");
  }
});

for (let i = 0; i < headerSmallMenuLinks.length; i++) {
  headerSmallMenuLinks[i].addEventListener("click", () => {
    smallMenu.classList.remove("header__sm-menu--active");
    headerHamMenuBtn.classList.remove("d-none");
    headerHamMenuCloseBtn.classList.add("d-none");
  });
}

// Logo Click Event
const headerLogoConatiner = document.querySelector(".header__logo-container");
headerLogoConatiner.addEventListener("click", () => {
  location.href = "index.php";
});

// Quote Generator
//Add new Quotes to the array.
var quotes = [
  '"कर्मण्येवाधिकारस्ते मा फलेषु कदाचन । मा कर्मफलहेतुर्भूर्मा ते सङ्गोऽस्त्वकर्मणि ।।"',
  '"यस्य कृत्यं न जानन्ति मन्त्रं वा मन्त्रितं परे । कृतमेवास्य जानन्ति स वै पण्डित उच्यते ॥"',
  '"बुद्धियुक्तो जहातीह उभे सुकृतदुष्कृते । तस्माद्योगाय युज्यस्व योगः कर्मसु कौशलम् ॥"',
  '"यदा संहरते चायं कूर्मोऽङ्गानीव सर्वशः । इन्द्रियाणीन्द्रियार्थेभ्यस्तस्य प्रज्ञा प्रतिष्ठिता ॥"',
  '"विद्वत्त्वं दक्षता शीलं सङ्कान्तिरनुशीलनम् । शिक्षकस्य गुणाः सप्त सचेतस्त्वं प्रसन्नता ॥"',
  '"विद्यां चाविद्यां च यस्तद्वेदोभ्य सह । अविद्यया मृत्युं तीर्त्वाऽमृतमश्नुते ॥"',
];

// without if statement this script would run on all pages causing errors in console. This script will check if the page is homepage or not and if it is
// homepage then the quote will show!
if (
  window.location.href.includes("index.php") ||
  !window.location.href.includes(".php")
) {
  function newQuote() {
    var num = Math.floor(Math.random() * quotes.length);
    document.getElementById("quoteDisplay").innerHTML = quotes[num];
  }

  setTimeout(() => {
    newQuote();
  }, 800);
}

// dark theme test

// try {
//   document.querySelectorAll("section").forEach((section) => {
//     section.style.backgroundColor = "#000";
//     document.body.style.backgroundColor = "#000";
//   });

//   document.querySelectorAll("section .heading-sec__main").forEach((heading) => {
//     heading.style.color = "#fff";
//   });

//   document.querySelectorAll("section .heading-sec__sub").forEach((heading) => {
//     heading.style.color = "#fff";
//   });

//   document.querySelectorAll("section h3, section p").forEach((text) => {
//     text.style.color = "#fff";
//   });

//   if (
//     window.location.href.includes("results") ||
//     window.location.href.includes("contact")
//   ) {
//     document.querySelectorAll("section h2, section a").forEach((text) => {
//       text.style.color = "#fff";
//     });
//   }
//   if (window.location.href.includes("placements")) {
//     document.querySelectorAll("table th, td, tr").forEach((text) => {
//       text.style.color = "#fff";
//     });
//   }
// } catch (error) {
//   console.log("Something wrong happened!");
// }
