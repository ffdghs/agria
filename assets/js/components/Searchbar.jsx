import React from 'react';


export class SearchBar extends React.Component {

    mapMain = document.querySelector('#map-main'); 
    pinGorille = document.querySelector('#Pin-Gorille'); 
    pinDik = document.querySelector('#Pin-Dik'); 
    pinPelican = document.querySelector('#Pin-Pelican'); 
    // mapGorille = document.querySelector('#map-gorille');
    // mapDikDik = document.querySelector('#map-dikdik'); 
    // mapPelican = document.querySelector('#map-pelican'); 

    databaseValues = [];

    state = {

        search: '',         // saisie de la recherche
        searchResults: [],          // résultats trouvés pour la recherche en cours
        selected: ''
    };


    componentDidMount() {

        // Déclenche une requête HTTP (AJAX) pour récupérer les données de la base SQL
        window.fetch('/database').then((response) => {

            // Récupération de la réponse HTTP, désérialisation du JSON
            return response.json(); // équivalent à JSON.parse()

        }).then((databaseValues) => {

            console.log(databaseValues);

            this.databaseValues = databaseValues;
        });
    }

    onChangeInput = (event) => {

        // La variable search va contenir la nouvelle chaîne à rechercher
        let search = event.target.value.trim().toLowerCase();

        let searchResults = [];

        // Enregistrement de la saisie de l'utilisateur
        this.setState({ search: event.target.value });

        // Y a t'il une saisie valable ?
        if (search.length == 0) {
            // Non, efface les résultats de la recherche
            this.setState({ searchResults: [] });

            // On quitte immédiatement
            return;
        }

        for (const value of this.databaseValues) {
            // console.log(value);

            /*
             * Vérifier si la valeur en base de données (value) contient la saisie 
             * de l'utilisateur (search)
             */
            if (value.name_animal.toLowerCase().includes(search) == true) {

                searchResults.push(value.name_animal);
            }
        }

        // searchResults = searchResults.map((searchResult) => <p>{ searchResult }</p>);
        searchResults = searchResults.map((searchResult, index) => {

            return (
                <p key={index} onClick={(e) => {
                    this.setState({ search: searchResult, selected: searchResult, searchResults: [] })
                    this.onSubmit;
                }}>{searchResult}</p>

            )
        });

        this.setState({ searchResults: searchResults });
    }

    onSubmit = (event) => {
        event.preventDefault();
        this.setState({search:''});
        if (this.state.search == 'Le Gorille') {
            this.pinGorille.classList.replace('d-none','d-block');
            this.pinDik.classList.replace('d-block','d-none');
            this.pinPelican.classList.replace('d-block','d-none');
            // let scroll = document.querySelector('#Pin-Dik-5');
            // scroll.scrollIntoView();
        }
        if (this.state.search == 'Le Dik Dik') {
            this.pinGorille.classList.replace('d-block','d-none');
            this.pinDik.classList.replace('d-none','d-block');
            this.pinPelican.classList.replace('d-block','d-none');
        }
        if (this.state.search == 'Le Pélican blanc') {
            this.pinGorille.classList.replace('d-block','d-none');
            this.pinDik.classList.replace('d-block','d-none');
            this.pinPelican.classList.replace('d-none','d-block');
        }
        document.location.href = '/explore#map-main';

    }

    render() {
        return (

            <form onSubmit={this.onSubmit}>
                <div className="input-group mb-3">
                    <input placeholder="Je connais mon animal" className="form-control" onChange={this.onChangeInput} value={this.state.search}/>
                    <button className="btn-searchBar" type="submit"><i className="fas fa-search"></i></button>
                </div>
                { this.state.searchResults.length > 0 &&
                    <article className="search-results">{this.state.searchResults}</article>
                }
            </form>
        );
    }
}