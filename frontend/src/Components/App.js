// import {React}
import React from 'react';

// import {axios}

import axios from "axios";


// import components
import Header from "./_Header"
import Body from "./_Body" 
import Card from "./_Card" 
import Footer from "./_Footer"



function App() {
	// * start: fetch HeaderData
	const [HeaderData, setHeaderData] = React.useState(null);

	React.useEffect(() => {
  		axios.get("./textsContent/Header.json")
  		.then(res => setHeaderData(res.data));
	}, []);
	// * end: fetch HeaderData

	return (
		<main>
			<Header content={HeaderData} />
			<Body />
			<Footer />
		</main>
	)
}


export default App;