// import {React}
import React from 'react';

// import {axios}

import axios from "axios";


// import components
import Header from "./_Header"
import Body from "./_Body" 
import Footer from "./_Footer"



function App() {
	// * start: fetch HeaderData
	const [HeaderData, setHeaderData] = React.useState(null);

	React.useEffect(() => {
  		axios.get("./textsContent/Header.json")
  		.then(res => setHeaderData(res.data));
	}, []);
	// * end: fetch HeaderData

	// * start: fetch CardData
	const [CardData, setCardData] = React.useState(null);

  	React.useEffect(() => {
  		axios.get('http://localhost:8000/control.php')
  		.then(res => setCardData(res.data));
	}, []);
	// * end: fetch CardData

	return (
		<main>
			<Header content={HeaderData} />
			<Body content={CardData}/>
			<Footer />
		</main>
	)
}


export default App;