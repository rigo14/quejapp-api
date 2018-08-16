//import icon from '../../../../public/quejapp-icon.png';
import React from 'react';

export function Header() {
    return (
        <header className="flex-center">
            {/* <img src={icon} className="App-icon" alt="logo" /> */}
            <div className="text-center">
                <label className="title">QUEJAPP</label>
                <div>Alza la voz.</div>
            </div>
        </header>
    );
}