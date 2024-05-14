/**
 *
 * This javascript file makes the chatbot works and reply to different queries entered by the user. This works on the concept of keyword matching from the arrays to predict the
 * response. This pre trainted chatbot can be updated by adding the keyword inside the arrays and then handling those keywords from if/else statements to provide a
 * response as added by the user.
 */

// Variables
const chatBox = document.querySelector(".chatbox");
const chatBtn = document.querySelector(".chatbot-btn");
const chatBoxCloseBtn = document.querySelector(".chatbox--bar svg");
const chatBoxSendBtn = document.querySelector(".chatbox--compose svg");
const textBoxContent = document.querySelector(".chatbox--compose input");
const chatArea = document.querySelector(".chatarea");

// User Agent FIX
if (navigator.userAgent.indexOf("iPhone") > -1) {
  document
    .querySelector("[name=viewport]")
    .setAttribute(
      "content",
      "width=device-width, initial-scale=1, maximum-scale=1"
    );
}

// Sound
const audio = new Audio("./assets/sounds/notification.mp3");

// Main Functions
function generateLinks(link, linkText) {
  const linkElement = document.createElement("a");
  linkElement.href = `${link}`;
  linkElement.classList.add("left-msg");
  linkElement.textContent = linkText;
  linkElement.target = "_blank";
  chatArea.append(linkElement);
  chatArea.scrollTo(0, chatArea.scrollHeight);
}

function generateText(text) {
  setTimeout(() => {
    const textElement = document.createElement("p");
    textElement.classList.add("left-msg");
    textElement.textContent = text;
    chatArea.append(textElement);
    chatArea.scrollTo(0, chatArea.scrollHeight);
  }, 900);
}

function generateImage(url) {
  setTimeout(() => {
    const imgElement = document.createElement("img");
    imgElement.classList.add("left-content");
    imgElement.classList.add("uiet--bot-img-msg");
    imgElement.src = url;
    imgElement.style.height = "100px";
    imgElement.style.width = "100px";
    imgElement.style.borderRadius = "1rem !important";
    chatArea.append(imgElement);
    chatArea.scrollTo(0, chatArea.scrollHeight);
  }, 900);
}

function generateTypingMessage() {
  setTimeout(() => {
    const typingElement = document.createElement("div");
    typingElement.classList.add("uiet-msg-box-typing");
    // console.log("appened typing...");
    typingElement.classList.add("left-content");
    for (let i = 1; i <= 3; i++) {
      const dot = document.createElement("div");
      dot.classList.add("chatbot-dot");
      dot.classList.add(`chatbot-dot-${i}`);
      typingElement.appendChild(dot);
    }
    chatArea.append(typingElement);
    chatArea.scrollTo(0, chatArea.scrollHeight);
    setTimeout(() => {
      chatArea.removeChild(typingElement);
    }, 500);
  }, 500);
}

function generateResponse(message) {
  let generatedMsg = "";
  const tokens = ["bus", "hostel", "canteen", "workshop", "library"];
  const greetingTokens = [
    "hi",
    "Hii",
    "hello",
    "Hello",
    "hey",
    "hey there",
    "hey!",
    "hey there!",
    "good morning",
    "goodday",
    "gm",
    "namaste",
    "heya",
  ];
  const healthState = [
    "wassup",
    "wassup?",
    "wassup ?",
    "how are you",
    "how are you?",
    "how are you ?",
    "kya haal hai",
    "kya haal hai?",
    "kya haal hai ?",
    "hey wassup",
    "hey wassup?",
    "hey wassup ?",
    "hi wassup",
    "hi wassup?",
    "hi wassup ?",
  ];
  const others = [
    "ok",
    "fine",
    "thanks",
    "no problem",
    "ok thanks",
    "okay",
    "okay thanks",
  ];
  const happyText = [
    "awesome",
    "great",
    "excellent",
    "brilliant",
    "wow",
    "nice",
    "cool",
    "ok great",
  ];
  const exitText = [
    "bye",
    "goodbye",
    "seeya",
    "okay",
    "nothing",
    "ok bye",
    "cya",
    "okay bye",
    "ok bye",
  ];
  const staffText = ["coordinator", "vc", "rector"];
  const aboutTokens = [
    "uiet",
    "streams",
    "cs",
    "civil",
    "computer science",
    "cse",
    "contact",
    "email",
    "phone",
    "course",
    "courses",
    "location",
    "located",
    "directions",
    "direction",
    "admission",
    "fees",
  ];

  if (greetingTokens.includes(message)) {
    generatedMsg = "Hello there! 👋🏻";
  } else if (others.includes(message)) {
    generatedMsg = "👍";
  } else if (healthState.includes(message)) {
    generatedMsg = "Everything's eUTopian! 😇";
  } else if (
    (message.includes("provide") ||
      message.includes("offer") ||
      message.includes("have") ||
      message.includes("about")) &&
    tokens.find((v) => message.includes(v))
  ) {
    if (tokens.find((v) => message.includes(v))) {
      if (message.includes("bus")) {
        generatedMsg =
          "UIET offers Bus service from Jewel, Jammu to Janglote, Kathua!";
      } else if (message.includes("hostel")) {
        generatedMsg =
          "UIET offers Hostel Facility for Boys. Hostel for girls is not yet functional! ";
      } else if (message.includes(tokens[2])) {
        generatedMsg =
          "UIET has in-house canteen for students. You can enjoy snacks and connect with your pals!";
      } else if (message.includes(tokens[3])) {
        generatedMsg =
          "UIET has basic workshops giving students practical exposure!";
      } else {
        generatedMsg =
          "Our is library where students can find a vast array of books to learn and improve.";
      }
    } else {
      generatedMsg = "Sorry, we don't have what you asked yet! 😔";
    }
  } else if (staffText.find((text) => message.includes(text))) {
    if (message.includes(staffText[0])) {
      generatedMsg =
        "Dr. Sourabh Shastri, from Department of MCA is our in-charge Coordinator!";
    } else if (
      message.includes(staffText[1]) ||
      message.includes("vice chancellor")
    ) {
      generatedMsg = "Prof. Umesh Rai is our Vice-Chancellor!";
    } else {
      generatedMsg = "Dr. Meenakshi Kilam, from DIQA is our Rector!";
    }
  } else if (aboutTokens.find((text) => message.includes(text))) {
    if (message.includes(aboutTokens[0]) && message.includes("about")) {
      generatedMsg =
        "The University Institute of Engineering & Technology (UIET) is the constituent Engineering college of the University of Jammu. It was established in 2017 as a Centre of Excellence to provide quality education in Engineering & Technology. The institution has the distinction of being inaugrauted by the Prime Minister, Shri Narendra Modi ji!";
      setTimeout(() => {
        generateLinks(
          "https://maps.app.goo.gl/BrSA1ZLaXqr8aXPMA",
          "Our Location"
        );
      }, 1000);
    } else if (
      message.includes(aboutTokens[1]) ||
      message.includes("course") ||
      message.includes("courses")
    ) {
      (generatedMsg =
        "UIET offers B.Tech courses in Computer Science Engineering (CSE) and Civil engineering (CE) with an intake of 60 in each stream."),
        setTimeout(() => {
          generateLinks(
            "https://uietju.in/documents/Notifications/Admission/2023/LEBrouchure.pdf",
            "UIET also offers Lateral Entry into 2nd Year of B.Tech with intake of 6 in each stream."
          );
        }, 800);
    } else if (
      message.includes(aboutTokens[2]) ||
      message.includes(aboutTokens[4]) ||
      message.includes(aboutTokens[5])
    ) {
      generatedMsg =
        "UIET offers B.Tech in computer science and engineering with an intake of 60.";
    } else if (
      message.includes(aboutTokens[aboutTokens.length - 1]) ||
      message.includes(aboutTokens[aboutTokens.length - 2])
    ) {
      generatedMsg =
        "The approximate fee per annum is around ₹40,000 (quite affordable, isn't it!🤩). For admission related info, check the brochures by clicking the links below:-";
      setTimeout(() => {
        generateLinks(
          "https://uietju.in/documents/Notifications/Admission/2023/Brochure2023.pdf",
          "Admission Brochure"
        );
        generateLinks(
          "https://uietju.in/documents/Notifications/Admission/2023/LEBrouchure.pdf",
          "Lateral Entry Brochure"
        );
      }, 1000);
    } else if (message.includes(aboutTokens[3])) {
      generatedMsg =
        "UIET offers B.Tech in civil engineering with an intake of 60. Intake for Lateral Entry is 6.";
    } else if (
      message.includes("located") ||
      message.includes("direction") ||
      message.includes("location")
    ) {
      generatedMsg = "UIET is located at Janglote, Kathua.";
      setTimeout(() => {
        generateLinks(
          "https://maps.app.goo.gl/BrSA1ZLaXqr8aXPMA",
          "See on Map"
        );
      }, 1000);
    } else {
      generatedMsg = "You can reach us via a phone call or an email!";
      setTimeout(() => {
        generateLinks("mailto:uietkc@gmail.com", "uietkc@gmail.com");
        generateLinks("tel:01922291102", "01922291102");
      }, 900);
    }
  } else if (tokens.find((v) => message.includes(v))) {
    generatedMsg = "Yes we do offer this service! 🙌";
  } else if (exitText.includes(message)) {
    generatedMsg = "Ok, Seeya 🫡";
  } else if (happyText.includes(message)) {
    generatedMsg = "That's great to hear! 🤩";
  } else {
    generatedMsg =
      "Sorry! I am still learning, please try more specific phrasing.";
    setTimeout(() => {
      generateLinks(
        "",
        "You can try 'tell me about uiet' or 'do you offer bus service' etc."
      );
    }, 1000);
  }
  return generatedMsg;
}

function playAudio() {
  audio.volume = 0.1;
  audio.play();
}

function replyMessage(message) {
  let replyMessage = "Hello, How may I help you ?";
  const messageElement = document.createElement("P");
  messageElement.classList.add("left-msg");
  if (message == "hello") {
    replyMessage = "Hello there! 👋🏻";
  } else if (message != replyMessage) {
    replyMessage = generateResponse(message);
  }
  messageElement.textContent = replyMessage;
  chatArea.appendChild(messageElement);
  chatArea.scrollTo(0, chatArea.scrollHeight);
  playAudio();
}

function sendMessage(message) {
  const messageElement = document.createElement("P");
  messageElement.classList.add("right-msg");
  messageElement.textContent = message;
  chatArea.appendChild(messageElement);
  textBoxContent.value = "";
  generateTypingMessage();
  setTimeout(() => {
    replyMessage(message);
  }, 1000);
  chatArea.scrollTo(0, chatArea.scrollHeight);
}

// Event Listeners
chatBtn.addEventListener("click", () => {
  chatBox.style.display = "flex";
  replyMessage("Hello, How may I help you ?");
});

chatBoxCloseBtn.addEventListener("click", () => {
  chatBox.style.display = "none";
  chatArea.replaceChildren();
});

textBoxContent.addEventListener("keydown", (event) => {
  if (event.key == "Enter") {
    sendMessage(textBoxContent.value.toLowerCase());
  }
});

chatBoxSendBtn.addEventListener("click", () => {
  sendMessage(textBoxContent.value.toLowerCase());
});
