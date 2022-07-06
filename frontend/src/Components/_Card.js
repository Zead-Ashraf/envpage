// import {React}
import React from 'react';

function Card(props) {
	return (
		<section className="Card">
			<strong>{props.project.name}</strong>
			<br />
			<strong>{props.project.path}</strong>
			<br />
			<strong>{props.project.img_path}</strong>
			<hr />
			</section>
	)
}

export default Card;