let lastImage = document.getElementsByClassName("last-img")[0];
let cloudImage = document.getElementsByClassName("cloud-img")[0];
let midImage = document.getElementsByClassName("mid-img")[0];
let rumputsImage = document.getElementsByClassName("rumputs-img")[0];
let pohonImage = document.getElementsByClassName("pohon-img")[0];
let daunImage = document.getElementsByClassName("daun-img")[0];
let daunImage2 = document.getElementsByClassName("daun-img2")[0];
let daunImage3 = document.getElementsByClassName("daun-img3")[0];
let daunImage4 = document.getElementsByClassName("daun-img4")[0];
let birdImage = document.getElementsByClassName("bird-img")[0];
let kupuImage = document.getElementsByClassName("kupu-img")[0];
let serbukImage = document.getElementsByClassName("serbuk-img")[0];
let serbukImage1 = document.getElementsByClassName("serbuk-img1")[0];
let serbukImage2 = document.getElementsByClassName("serbuk-img2")[0];
let serbukImage3 = document.getElementsByClassName("serbuk-img3")[0];
let focusImage = document.getElementsByClassName("focus-img")[0];
// let leafImage = document.getElementsByClassName("leaf-img")[0];
let travel = document.querySelector("#home h1");
let button = document.querySelector(".btn");

window.addEventListener('scroll', function() {
    let value = window.scrollY;

    cloudImage.style.right = value * 0.9 + 'px';
    cloudImage.style.top = value * 0.9 + 'px';
    birdImage.style.left = value * 0.9 + 'px';
    birdImage.style.top = value * 0.7 + 'px';
    serbukImage.style.left = value * 0.4 + 'px';
    serbukImage.style.bottom = value * 0.2 + 'px';
    serbukImage1.style.left = value * 0.6 + 'px';
    serbukImage1.style.bottom = value * 0.1 + 'px';
    serbukImage2.style.left = value * 0.4 + 'px';
    serbukImage2.style.bottom = value * 0.2 + 'px';
    serbukImage3.style.left = value * 0.6 + 'px';
    serbukImage3.style.bottom = value * 0.1 + 'px';
    kupuImage.style.left = value * 0.3 + 'px';
    kupuImage.style.bottom = value * 0.1 + 'px';
    lastImage.style.top = value * 0.7 + 'px';
    rumputsImage.style.top = value * 0.1 + 'px';
    midImage.style.top = value * 0.1 + 'px';
    pohonImage.style.top = value * 0.3 + 'px';
    daunImage.style.top = value * 1.3 + 'px';
    daunImage2.style.top = value * 1.5 + 'px';
    daunImage3.style.top = value * 1.1 + 'px';
    daunImage4.style.top = value * 1 + 'px';
    // daunImage.style.transform = 'rotate(' + value * 0.05 + 'deg)';
    daunImage2.style.transform = 'rotate(' + value * 0.03 + 'deg)';
    daunImage3.style.transform = 'rotate(' + value * -0.05 + 'deg)';
    daunImage4.style.transform = 'rotate(' + value * 0.05 + 'deg)';
    daunImage.style.left = value * 0.4 + 'px';
    daunImage2.style.left = value * 0.6 + 'px';
    daunImage3.style.left = value * 0.6 + 'px';
    daunImage4.style.left = value * 0.8 + 'px';
    focusImage.style.top = value * 0 + 'px';
    leafImage.style.left = value * 1 + 'px';
    travel.style.right = value * 0.5 + 'px';
    button.style.marginTop = value * 0.1 + 'px';
});

document.getElementById("iconButton").addEventListener("click", function() {
    var shareIcons = document.getElementById("icons");
    var chatIcon = document.getElementById("chatIcon");
    var chatText = document.getElementById("chatText");

    if (shareIcons.style.display === "none" || !shareIcons.style.display) {
        shareIcons.style.display = "block";
        chatIcon.src = "";
        chatText.innerHTML = "X";
        chatText.style.margin = "0 5px"; // Optional: remove margin if needed
        document.getElementById("iconButton").classList.add("rotate");
        chatIcon.classList.add("hidden");

        // Animate each icon appearing one by one with rotation
        var icons = document.querySelectorAll("#icons .icon");
        icons.forEach((icon, index) => {
            setTimeout(() => {
                icon.classList.add("show");
            }, index * 100);
        });
    } else {
        shareIcons.style.display = "none";
        chatIcon.src = "icon/chat.png";
        chatText.innerHTML = "chat";
        document.getElementById("iconButton").classList.remove("rotate");
        chatIcon.classList.remove("hidden");

        // Hide icons with reverse animation
        var icons = document.querySelectorAll("#icons .icon");
        icons.forEach((icon, index) => {
            setTimeout(() => {
                icon.classList.remove("show");
            }, index * 100);
        });
    }
});


  document.getElementById("loginBtn").addEventListener("click", function() {
    var modal = document.getElementById("login-modal");
    modal.style.display = "block";
});

document.getElementById("close-modal").addEventListener("click", function() {
    var modal = document.getElementById("login-modal");
    modal.style.display = "none";
});

window.addEventListener("click", function(event) {
    var modal = document.getElementById("login-modal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
});
