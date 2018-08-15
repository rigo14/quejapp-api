import React, { Component } from 'react';
import ReactDOM from 'react-dom';
// import { getData } from '../services/ProcessData';
import { getDataFromFetch } from '../services/Service';
import { Header } from './Header';
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
        getDataFromFetch(this)
    }

    render() {
        return (
            <div className="container">
                <Header />

                <p className="dark mp3">
                    Cantidad de denuncias por estado
        		</p>

                {!this.state.statesChartData && 'cargando...'}

                {this.state.statesChartData && <HorizontalBar options={this.state.statesChartOptions} data={this.state.statesChartData} height={450} />}

                <p className="dark mp3">
                    Cantidad de denuncias por dependencia
        		</p>

                {!this.state.dependenciesChartData && 'cargando...'}

                {this.state.dependenciesChartData && <HorizontalBar options={this.state.dependenciesChartOptions} data={this.state.dependenciesChartData} height={200} />}

            </div>
        );
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}