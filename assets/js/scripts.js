// Google TagManager
window.dataLayer = window.dataLayer || [];

function gtag() {
	dataLayer.push(arguments);
}

gtag('js', new Date());

gtag('config', 'UA-21923886-12', {
	'anonymize_ip': true,
	'cookie_prefix': 'gaCookie',
	'cookie_domain': 'piccioni.london',
	'cookie_expires': 60 * 60 * 24 * 28,
	'cookie_update': false
});

// Smooth scroll to top
document.getElementById('top-arrow').addEventListener('click', function (e) {
	e.preventDefault();
	window.scrollTo({top: 0, behavior: 'smooth'});
});

// Show and hide on scroll
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


// Lightbox
let slideIndex;

function prevNext(n) {
	showSlide(slideIndex += n);
}

function showSlide(n) {
	let i;
	let slides = document.getElementsByClassName("mySlides");
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
			let thisModal = document.getElementById(modalId)
			thisModal.innerHTML = this.responseText;
			let openModal = new bootstrap.Modal(thisModal);
			openModal.show();
			slideIndex = 1;
			showSlide(slideIndex);

			thisModal.addEventListener('hidden.bs.modal', function () {
				thisModal.innerHTML = '';
			})
		}
	};
	xhttp.open("GET", "https://piccioni.london/wp-content/themes/london/partial/lightbox.php?id=" + ID, true);
	xhttp.withCredentials = true;
	xhttp.send();
}

let refData = document.querySelectorAll("[data-ref]");
refData.forEach(setEventClick);

function setEventClick(item) {
	item.addEventListener('click', function (e) {
		e.preventDefault();
		showModal(item);
	});
}

// About the company
let targetData = document.querySelectorAll("[data-bs-target]");
targetData.forEach(setDataClick);

function setDataClick(item, index, arr) {
	item.addEventListener('click', function () {
		let strId = arr[index].dataset.bsTarget;
		let aboutId = strId.replace("#", "");
		let ID = arr[index].dataset.id;
		let xhttp = new XMLHttpRequest();

		xhttp.onreadystatechange = function () {
			if (this.readyState === 4 && this.status === 200) {
				if (document.getElementById(aboutId).innerHTML === '') {
					document.getElementById(aboutId).innerHTML = this.responseText;
				}
			}
		};
		xhttp.open("GET", "https://piccioni.london/wp-content/themes/london/partial/about.php?id=" + ID, true);
		xhttp.send();
	});
}
