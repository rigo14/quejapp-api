import React from 'react';

export function Footer() {
    return (
        <footer className="text-center">
            <div className="">Quejapp es una aplicación que te permite realizar denuncias por dependencia gubernamental y estado, visualizar denuncias, conocer conceptos de corrupción y analizar qué tipo de acto corruptivo estás recibiendo/percibiendo a través de un cuestionario.</div>
            <div className="row">
                <div id="download-the-app" className="col-xs-12 col-sm-12 col-md-6 col-lg-6"><a href="https://play.google.com/store/apps/details?id=com.quejapp" target="_blank" rel="noopener noreferrer">Descarga la App móvil</a></div>
                <div id="copyright" className="col-xs-12 col-sm-12 col-md-6 col-lg-6">Copyright © Quejapp 2018</div>
            </div>
            
        </footer>
    );
}