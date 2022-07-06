// import {React, ReactDom}
import React from 'react';
import ReactDOM from 'react-dom/client';

// import components
import App from "./Components/App";

// import Styling
import './SCSS/index.scss';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);
