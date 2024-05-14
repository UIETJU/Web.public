/**
 * Modal JS fiile
 *
 * This file contains the javascript code that is needed to view and hide the modal on any page given the page have div tag of modal and this script imported
 * into the body at the end. The code below will wait for 2000 milliseconds = 2 seconds and then will load the modal on the page and when the user
 * clicks the X button it hides the modal until the page is reloaded by the user.
 *
 */

const placementModal = document.querySelector(".modal");
const sections = document.querySelectorAll("section");
document.onload = setTimeout(() => {
  placementModal.classList.remove("hidden");
  document.querySelectorAll("section").forEach((section) => {
    section.style.opacity = "0.5";
  });
  document.querySelector("footer").style.opacity = "0.5";
}, 2000);
const btnCross = document.querySelector(".btn-cross");
btnCross.addEventListener("click", () => {
  placementModal.classList.add("hidden");
  document.querySelectorAll("section").forEach((section) => {
    section.style.opacity = "1";
  });
  document.querySelector("footer").style.opacity = "1";
});
