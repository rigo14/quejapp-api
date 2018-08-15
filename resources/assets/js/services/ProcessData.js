const states = [
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

const dependencies = [
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

const processStateData = fetchedAPIData => {
    // objeto donde se almacenarán las denuncias ordenadas por estados
    let statesData = {};
    // crear un arreglo de denuncias con el nombre del estado para cada estado
    fetchedAPIData.forEach(data => {
        // si el estado no se encuentra en el el objeto, crearlo como un arreglo
        if (!statesData[data.queja_estado])
            statesData[data.queja_estado] = [];
        // colocar la denuncia dentro del arreglo del estado que corresponde
        statesData[data.queja_estado].push(data);
    });
    // contador de denuncias por estado
    let statesReportsCounter = [];
    // recorrer cada estado y contar la cantidad de quejas (por estado)
    states.forEach(state => {
        if (state in statesData)
            statesReportsCounter.push(statesData[state].length);
        else
            statesReportsCounter.push(0);
    });
    // devolver los datos ya procesados
    return statesReportsCounter;
}

const processDependenciesData = fetchedAPIData => {
    // objeto donde se almacenarán los denuncias ordenadas por dependencias
    let dependenciesData = {};
    // crear un arreglo de denuncias con el nombre de la dependencia
    fetchedAPIData.forEach(data => {
        // si la dependencia no se encuentra en el el objeto, crearla como un arreglo
        if (!dependenciesData[data.queja_dependencia])
            dependenciesData[data.queja_dependencia] = [];
        // colocar la denuncia dentro del arreglo que corresponde
        dependenciesData[data.queja_dependencia].push(data);
    });
    // contador de denuncias por dependencia
    let dependenciesReportsCounter = [];
    // recorrer cada dependencia y contar la cantidad de quejas
    dependencies.forEach(dependency => {
        if (dependency in dependenciesData)
            dependenciesReportsCounter.push(dependenciesData[dependency].length);
        else
            dependenciesReportsCounter.push(0);
    });
    // devolver los datos ya procesados
    return dependenciesReportsCounter;
};

export function getData(component) {

    const source = 'http://quejapp.test/api/denuncias';

    fetch(source)
        .then(async data => {
            // los datos obtenidos del fetch
            const fetchedAPIData = await data.json();

            // * * * POR ESTADO * * * //

            // la cuenta de denuncias por estado
            let statesReportsCounter = processStateData(fetchedAPIData.data);
            // el objeto de configuración de datos del chart por estado
            let statesChartData = {
                labels: states,
                datasets: [{
                    label: 'Cantidad de denuncias',
                    backgroundColor: 'rgba(255,99,132,0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1,
                    hoverBackgroundColor: 'rgba(255,99,132,0.4)',
                    hoverBorderColor: 'rgba(255,99,132,1)',
                    data: statesReportsCounter
                }]
            };
            // el objeto de configuración de opciones del chart por estado
            let statesChartOptions = {

            };

            // * * * POR DEPENDENCIAS * * * //

            // contador de denuncias por dependencia
            let dependenciesReportsCounter = processDependenciesData(fetchedAPIData.data);

            // el objeto de configuración de datos del chart por dependencia
            let dependenciesChartData = {
                labels: dependenciesShortNames,
                datasets: [{
                    label: 'Cantidad de denuncias por dependencia',
                    backgroundColor: 'rgba(255,99,132,0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1,
                    hoverBackgroundColor: 'rgba(255,99,132,0.4)',
                    hoverBorderColor: 'rgba(255,99,132,1)',
                    data: dependenciesReportsCounter
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
