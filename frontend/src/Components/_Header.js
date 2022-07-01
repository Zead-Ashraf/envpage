// import {React}
import React from 'react';


// import (moodeToggle callback)

import toggleMood from "../Scripts/moodToggle"

function Header() {
	return (
		<section id="Header" className="Header">
			<nav className="navbar">
				<ul className="navbar--container navbar--logo">
					<a href="#"><li className="logo">envpage</li></a>
				</ul>
				<ul className="navbar--container navbar--items">
					<a href="#"><li className="navbar--item">Home</li></a>
					<a href="#"><li className="navbar--item">PHPinfo</li></a>
					<a href="#"><li className="navbar--item">phpMyAdmin</li></a>
					<a href="#"><li className="navbar--item">GitHub</li></a>
					<button className="mood_toggle--btn" id="mood_toggle--btn" onClick={toggleMood}>
						<li className="navbar--item mood_toggle--item">
							<img className="toogleIcon" id="toogleIcon" src={`./images/sun.svg`} />
							<span id="toggle--btn--text" className="toggle--btn--text">Light Mood</span>
						</li>
					</button>
				</ul>
			</nav>
		</section>
	)
}

export default Header;