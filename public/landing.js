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
    modal.style.display = "flex";
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


document.getElementById('cari').addEventListener('click', function() {
    document.getElementById('search').style.display = 'flex';
    document.getElementById('navigate').style.display = 'none';
    document.getElementById('result-box').style.display = 'flex';
});

document.getElementById('closeSearch').addEventListener('click', function() {
    document.getElementById('search').style.display = 'none';
    document.getElementById('navigate').style.display = 'flex';
    document.getElementById('result-box').style.display = 'none';
});

window.addEventListener('click', function(event) {
    var search = document.getElementById('search');
    var nav = document.getElementById('navigate');
    var result = document.getElementById('result-box');
    if (event.target == search) {
        search.style.display = 'none';
        nav.style.display = 'flex';
        result.style.display = 'none';
    }
});


// let isShaking = false;

//     function handleScroll(event) {
//         if (isShaking) return;

//         const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
//         const scrollHeight = document.documentElement.scrollHeight;
//         const clientHeight = window.innerHeight || document.documentElement.clientHeight;

//         // Check if scroll position is at the top or bottom
//         if (scrollTop === 0 || scrollTop + clientHeight >= scrollHeight) {
//             event.preventDefault();
//             document.body.classList.add('shake');
//             isShaking = true;

//             setTimeout(function() {
//                 document.body.classList.remove('shake');
//                 isShaking = false;
//             }, 500);
//         }
//     }

//     window.addEventListener('scroll', handleScroll, { passive: false });

    const sections = document.querySelectorAll("section");
    
    sections.forEach(section => {
        section.addEventListener("scroll", () => {
            // Remove the shake class initially
            section.classList.remove("shake");

            // Check if the scroll position is at the top or bottom
            if (section.scrollTop === 0) {
                // Top of the section
                section.classList.add("shake");
                setTimeout(() => section.classList.remove("shake"), 500); // Remove shake after animation
            } else if (section.scrollHeight - section.scrollTop === section.clientHeight) {
                // Bottom of the section
                section.classList.add("shake");
                setTimeout(() => section.classList.remove("shake"), 500); // Remove shake after animation
            }
        });
    });


    document.getElementById('mobile-menu').addEventListener('click', function() {
        if (window.innerWidth <= 740) {
            var nav = document.querySelector('.nav ul');
            var toggle = document.getElementById('mobile-menu');
            var search = document.getElementById('search');
            var result = document.getElementById('result-box');
            if (nav.style.display === "flex") {
                nav.style.display = "none";
                search.style.display = "none";
                result.style.display = "none";
                toggle.classList.remove('active');
            } else {
                nav.style.display = "flex";
                search.style.display = "flex";
                result.style.display = "none";
                toggle.classList.add('active');
            }
        }
    });
    
    window.addEventListener('resize', function() {
        var nav = document.querySelector('.nav ul');
        var search = document.getElementById('search');
        var result = document.getElementById('result-box');
        result.style.display = "none";
        if (window.innerWidth > 740) {
            nav.style.display = "flex"; // Show nav on larger screens
            search.style.display = "none";
        } else {
            nav.style.display = "none"; // Hide nav on smaller screens to ensure correct toggle behavior
            result.style.display = "none";
            var toggle = document.getElementById('mobile-menu');
            toggle.classList.remove('active');
        }
    });
    

    // const cardContainers = document.querySelectorAll('.card-container');

    // function handleScroll() {
    //     cardContainers.forEach(container => {
    //         const rect = container.getBoundingClientRect();
    //         if (rect.top < window.innerHeight && rect.bottom >= 0) {
    //             container.classList.add('visible');
    //             container.classList.remove('hidden');
    //         } else {
    //             container.classList.add('hidden');
    //             container.classList.remove('visible');
    //         }
    //     });
    // }

    // // Attach the scroll event to the window
    // window.addEventListener('scroll', handleScroll);

    // // Initial check to see if the element is in view
    // handleScroll();

    window.addEventListener('scroll', scroool);
    function scroool(){
        var scroools = document.querySelectorAll('.scroool');

        for (var i = 0; i < scroools.length; i++) {
            var windowHeight = window.innerHeight;
            var scrooolTop = scroools[i].getBoundingClientRect().top;
            var scrooolPoint = 150;

            if(scrooolTop < windowHeight - scrooolPoint) {
                scroools[i].classList.add('active');
            } else {
                scroools[i].classList.remove('active');
            }
        }
    }

    // document.getElementById('shop').addEventListener('scroll', scrol);
    // function scrol(){
    //     var scrols = document.querySelectorAll('.scrol');

    //     for (var i = 0; i < scrols.length; i++) {
    //         var windowHeight = window.innerHeight;
    //         var scrolTop = scrols[i].getBoundingClientRect().top;
    //         var scrolPoint = 50;

    //         if(scrolTop < windowHeight - scrolPoint) {
    //             scrols[i].classList.add('active');
    //         } else {
    //             scrols[i].classList.remove('active');
    //         }
    //     }
    // }