const statesNames = [
    'Aguascalientes',
    'Baja California',
    'Baja California Sur',
    'Campeche',
    'CDMX',
    'Chiapas',
    'Chihuahua',
    'Coahuila',
    'Colima',
    'Durango',
    'Guanajuato',
    'Guerrero',
    'Hidalgo',
    'Jalisco',
    'Michoacán',
    'Morelos',
    'Nayarit',
    'Nuevo León',
    'Oaxaca',
    'Puebla',
    'Querétaro',
    'Quintana Roo',
    'San Luis Potosí',
    'Sinaloa',
    'Sonora',
    'Tabasco',
    'Tamaulipas',
    'Tlaxcala',
    'Veracruz',
    'Yucatán',
    'Zacatecas'
];

const dependenciesNames = [
    'Seguridad Pública',
    'Secretaría de Gobierno',
    'Secretaría de Relaciones Exteriores',
    'Secretaría de Hacienda y Crédito Público',
    'Secretaría de Medio Ambiente y Recursos Naturales',
    'Secretaría de Educación Pública',
    'Secretaría de Salud',
    'Secretaría de Cultura',
    'Procuraduría General de la República',
    'Consejería Jurídica del Ejecutivo Federal',
    'Secretaría de Turismo',
    'Secretaría del Trabajo y Prevención Social'
];

const dependenciesShortNames = [
    'SSP',
    'SEGOB',
    'SRE',
    'SHCP',
    'SEMARNAT',
    'SEP',
    'SALUD',
    'CULTURA',
    'PGR',
    'CJEF',
    'SECTUR',
    'STPS'
];

export function getDataFromFetch(component) {
    const source = 'http://quejapp.test/api/denuncias';

    fetch(source)
        .then(async fetchedData => {
            // los datos obtenidos del fetch
            const data = await fetchedData.json();

            /* POR ESTADO */

            // el objeto de configuración de datos del chart por estado
            let statesChartData = {
                labels: statesNames,
                datasets: [{
                    label: 'Cantidad',
                    backgroundColor: 'rgba(255,99,132,0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1,
                    hoverBackgroundColor: 'rgba(255,99,132,0.4)',
                    hoverBorderColor: 'rgba(255,99,132,1)',
                    data: data.statesComplaints
                }]
            };
            // el objeto de configuración de opciones del chart por estado
            let statesChartOptions = {

            };

            /* POR DEPENDENCIA */

            // el objeto de configuración de datos del chart por dependencia
            let dependenciesChartData = {
                labels: dependenciesShortNames,
                datasets: [{
                    label: 'Cantidad',
                    backgroundColor: 'rgba(255,99,132,0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1,
                    hoverBackgroundColor: 'rgba(255,99,132,0.4)',
                    hoverBorderColor: 'rgba(255,99,132,1)',
                    data: data.dependenciesComplaints
                }]
            };
            // el objeto de configuración de opciones del chart por dependencia
            let dependenciesChartOptions = {
                /*
                scales: {
                    yAxes: [{
                        ticks: {
                            minRotation: 45,
                        },
                    }]
                }
                */
            };

            // colocar todos los datos en el state del componente
            component.setState({
                statesChartData: statesChartData,
                statesChartOptions: statesChartOptions,
                dependenciesChartData: dependenciesChartData,
                dependenciesChartOptions: dependenciesChartOptions
            });
        });
}