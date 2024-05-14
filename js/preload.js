/**
 *
 *   Preload.js
 *
 * This javascript file loads the images on the load of the website. It is crucial for the gallery element on the homepage. If gallery is implemented
 * on any other page then this script must be used on the page with the link of the images also available in the gallery.
 *
 */

imagesUrlArray = [
  'assets/events/plantation-drive.jpeg',
  'assets/events/Cultural FUNanaza.JPG',
  'assets/events/Blooddonation.PNG',
  'assets/events/women-emp.jpeg',
  'assets/events/dam-trip1.jpeg',
  'assets/events/maiden-drive.jpeg',
  'assets/events/dyt23quiz.png',
  'assets/events/ValedictoryDYT23.png',
];

function preload(urlArray) {
  for (const url of urlArray) {
    const image = new Image();
    image.src = url;
  }
}

preload(imagesUrlArray);
