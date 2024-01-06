// Smooth scroll to top.
document.getElementById('top-arrow').addEventListener('click', function (e) {
    e.preventDefault();
    window.scrollTo({top: 0, behavior: 'smooth'});
});

// Show and hide on scroll.
window.addEventListener('scroll', () => {
    let scroll = this.scrollY;
    let arrow = document.getElementById('top-arrow');

    if (scroll === 0) {
        if (arrow.style.display === 'inline-block') {
            arrow.style.display = 'none';
        }
    } else {
        if (arrow.style.display === 'none') {
            arrow.animate([
                {
                    opacity: 0
                },
                {
                    opacity: 1
                }
            ], 2000);
            arrow.style.display = 'inline-block';
        }
    }
});


// Lightbox.
let slideIndex;

function prevNext(n) {
    showSlide(slideIndex += n);
}

function showSlide(n) {
    let i;
    let slides = document.getElementsByClassName("slides");
    let captionText = document.getElementById("caption");
    let numberText = document.getElementById("number");
    if (n > slides.length) {
        slideIndex = 1;
    }

    if (n < 1) {
        slideIndex = slides.length;
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
    captionText.innerHTML = slides[slideIndex - 1].querySelector('img').alt;
    numberText.innerHTML = slideIndex + '/' + slides.length;
}

slideIndex = 1;

function showModal(name) {
    let ID = name.dataset.id;
    let modalId = name.dataset.ref;
    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            let thisModal = document.getElementById(modalId);
            thisModal.innerHTML = this.responseText;
            let openModal = new bootstrap.Modal(thisModal);
            openModal.show();
            slideIndex = 1;
            showSlide(slideIndex);

            thisModal.addEventListener('hidden.bs.modal', function () {
                thisModal.innerHTML = '';
            });
        }
    };
    xhttp.open("GET", "/wp-content/themes/london/parts/lightbox.php?id=" + ID, true);
    xhttp.withCredentials = true;
    xhttp.send();
}

document.getElementById("content").addEventListener("click", function (event) {
    if (event.target.hasAttribute("data-ref")) {
        event.preventDefault();
        showModal(event.target);
    }
});

// Show content.
let targetData = document.querySelectorAll("[data-show]");
targetData.forEach(setDataClick);

function setDataClick(item, index, arr) {
    item.addEventListener('click', function () {

        let strId = arr[index].dataset.bsTarget;
        let aboutId = strId.replace("#", "");

        if (document.getElementById(aboutId).innerHTML.trim() === '') {
            let ID = arr[index].dataset.id;
            let xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById(aboutId).innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "/wp-content/themes/london/parts/show.php?id=" + ID, true);
            xhttp.send();
        }
    });
}

// data-bs-toggle="modal" data-bs-target="#containerModal"
// Opens in modal links with the specified target and toggle.
let containerModal = document.getElementById('containerModal');

if (typeof (containerModal) !== 'undefined' && containerModal !== null) {
    containerModal.addEventListener('show.bs.modal', function (event) {
        let link = event.relatedTarget;

        let link_source = link.getAttribute('href');
        let link_alt = link.getAttribute('title');
        let pdf_src = link_source.includes(".pdf");

        let modalBodyImg = containerModal.querySelector('#inlineFrameImg');
        let modalBodyIframe = containerModal.querySelector('#inlineFramePdf');
        if (pdf_src === true) {
            modalBodyIframe.src = link_source;
            modalBodyIframe.title = link_alt;
            modalBodyIframe.style.display = "block";
            modalBodyImg.style.display = "none";
        } else {
            modalBodyImg.src = link_source;
            modalBodyImg.alt = link_alt;
            modalBodyImg.style.display = "block";
            modalBodyIframe.style.display = "none";
        }
    });
}

let targetLinks = document.querySelectorAll(".dropdown-item");
targetLinks.forEach(setToggle);

let internalLinks = document.querySelectorAll(".internal");
internalLinks.forEach(setToggle);

function setToggle(item) {
    item.addEventListener('click', function (event) {
        let strId = event.target.getAttribute("href");
        let toggleId = strId.replace("#", "");
        let bsToggle = document.body.querySelector('[data-id="' + toggleId + '"]')
        bsToggle.click()
    });
}