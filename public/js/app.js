getById("navigationToggle").onclick = toggleMobileNavigation;

function toggleMobileNavigation() {
	nav = document.getElementsByClassName("nav-right")[0];
	nav.classList.toggle("is-active");
}


// =================
// Helpers
// =================

function getById(element) {
	return document.getElementById(element);
}