// import {React}
import React from 'react';

import axios from "axios";

function Card() {
	axios.get('http://localhost:8000/control.php')
  .then(res => {
    console.log(res.data);
  });

	return (
		<section className="Card">
			<strong>Card</strong>
		</section>
	)
}

export default Card;