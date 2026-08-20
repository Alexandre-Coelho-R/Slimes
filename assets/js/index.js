const slides = document.querySelectorAll(".mySlides");
const dots = document.querySelectorAll(".dot");
let slideIndex = -1;
let tempo;

dots.forEach ((dot, index) => {
	dot.addEventListener("click", () => {
		slideIndex = index - 1;
		clearTimeout(tempo);
		showSlides();
	})
})

showSlides();

function showSlides() {
	for (let i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";  
	}

	slideIndex++
	if (slideIndex >= slides.length) slideIndex = 0

	for (let i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	}

	slides[slideIndex].style.display = "block";  
	dots[slideIndex].className += " active";
	
	tempo = setTimeout(showSlides, 1600);
}