// import {React}
import React from 'react';

// import components

import Card from "./_Card"

function Body(props) {
	return (
		<section className="Body">
		{/** start: generate cards dynamically according to json data*/}
			{
				props.content ?
				props.content.map(function(elem, ind) {
					return <Card key={ind} project={elem} />
				})
				: props.content
			}
		{/** end: generate cards dynamically according to json data*/}
		</section>
	)
}

export default Body;