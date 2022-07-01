// togglemood key
let mood = "dark";

const root = document.documentElement.style;

function toggleMood() {
	if (mood == "dark") {
		LightMood()
	}

	else {
		DarkMood();

	}
}

function LightMood() {
	root.setProperty("--bg_color", "#ececec");
	root.setProperty("--card-bg_color", "#fff");
	root.setProperty("--font-color", "#2d2828");
	root.setProperty("--font-color-hover", "black");

	document.getElementById("toogleIcon").src = "./images/moon.svg";
	document.getElementById("toggle--btn--text").innerHTML = "Dark Mood";

	mood = "light";
}

function DarkMood() {
	root.setProperty("--bg_color", "#1d2239");
	root.setProperty("--card-bg_color", "#292e48");
	root.setProperty("--font-color", "#ddd");
	root.setProperty("--font-color-hover", "#fff");

	document.getElementById("toogleIcon").src = "./images/sun.svg";
	document.getElementById("toggle--btn--text").innerHTML = "Light Mood";

	mood = "dark";
}

export default toggleMood;