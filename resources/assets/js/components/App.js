import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { getDataFromFetch } from '../services/Service';
import { Header } from './Header';
import { Footer } from './Footer';
import { HorizontalBar } from 'react-chartjs-2';

class App extends Component {
    
    constructor(props) {
		super(props)
		this.state = {
			statesChartData: undefined,
			statesChartOptions: undefined,
			dependenciesChartData: undefined,
			dependenciesChartOptions: undefined
		};
	}
    
    componentDidMount() {
        getDataFromFetch(this);
    }

    render() {
        return (
            <div className="container">

                <Header />

                <p className="title-2">Denuncias por estado</p>

                { ! this.state.statesChartData && 'cargando...' }

                { 
                    this.state.statesChartData && 
                        <HorizontalBar 
                            id="states-chart" 
                            height={450} 
                            options={this.state.statesChartOptions} 
                            data={this.state.statesChartData} /> 
                }

                <p className="title-2">Denuncias por dependencia</p>

                { ! this.state.dependenciesChartData && 'cargando...' }

                {
                    this.state.dependenciesChartData && 
                        <HorizontalBar 
                            id="states-chart" 
                            height={200} 
                            options={this.state.dependenciesChartOptions} 
                            data={this.state.dependenciesChartData} /> 
                } 

                <Footer />

            </div>
        );
    }
}

if (document.getElementById('app'))
    ReactDOM.render(<App />, document.getElementById('app'));
