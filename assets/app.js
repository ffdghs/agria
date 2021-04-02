import './css/app.css';

import React    from 'react';
import ReactDOM from 'react-dom';

import { SearchBar } from './js/components/Searchbar';


// Recherche si la page actuelle contient une balise racine React.
let reactRoot = document.getElementById('react-root');

// Est-ce que la balise a été trouvée ?
if(reactRoot !== undefined) {
    console.log('test');

    // Oui, démarrage de React.
    ReactDOM.render(<SearchBar />, reactRoot);
}


