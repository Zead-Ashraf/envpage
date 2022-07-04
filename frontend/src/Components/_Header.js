// import {React}
import React from 'react';

// import (moodeToggle callback)

import toggleMood from "../Scripts/moodToggle"

function Header(props) {
	return (
		<section id="Header" className="Header">
			<nav className="navbar">
				<ul className="navbar--container navbar--logo">
					<a href="#">
						<li className="brand">
							{/*! there wont be more than one brand*/}
							{props.content ? props.content.brand : props.content}
						</li>
					</a>
				</ul>
				<ul className="navbar--container navbar--items">
					{/** start: generate navbar items dynamically according to json data*/}
					{
						props.content ? 
							props.content.favoriteSports.map(
								function(elem) {
									return <a href="#"><li className="navbar--item">{elem}</li></a>
								}
						) 
						: props.content
					}
					{/** end: generate navbar items dynamically according to json data*/}
					<button className="mood_toggle--btn" id="mood_toggle--btn" onClick={toggleMood}>
						<li className="navbar--item mood_toggle--item">
							<img className="toogleIcon" id="toogleIcon" src={props.content ? props.content.toggleIcon : props.content} />
							<span id="toggle--btn--text" className="toggle--btn--text">
								{/*! there wont be more than one btn*/}
								{props.content ? props.content.toggleBtn : props.content}
							</span>
						</li>
					</button>
				</ul>
			</nav>
		</section>
	)
}

export default Header;