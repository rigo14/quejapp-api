<?php

use Illuminate\Database\Seeder;

class ModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            [ 'name' => 'Aguascalientes'],
            [ 'name' => 'Baja California'],
            [ 'name' => 'Baja California Sur'],
            [ 'name' => 'Campeche'],
            [ 'name' => 'CDMX'],
            [ 'name' => 'Chiapas'],
            [ 'name' => 'Chihuahua'],
            [ 'name' => 'Coahuila'],
            [ 'name' => 'Colima'],
            [ 'name' => 'Durango'],
            [ 'name' => 'Guanajuato'],
            [ 'name' => 'Guerrero'],
            [ 'name' => 'Hidalgo'],
            [ 'name' => 'Jalisco'],
            [ 'name' => 'Michoacán'],
            [ 'name' => 'Morelos'],
            [ 'name' => 'Nayarit'],
            [ 'name' => 'Nuevo León'],
            [ 'name' => 'Oaxaca'],
            [ 'name' => 'Puebla'],
            [ 'name' => 'Querétaro'],
            [ 'name' => 'Quintana Roo'],
            [ 'name' => 'San Luis Potosí'],
            [ 'name' => 'Sinaloa'],
            [ 'name' => 'Sonora'],
            [ 'name' => 'Tabasco'],
            [ 'name' => 'Tamaulipas'],
            [ 'name' => 'Tlaxcala'],
            [ 'name' => 'Veracruz'],
            [ 'name' => 'Yucatán'],
            [ 'name' => 'Zacatecas']
        ];

        foreach($states as $state) 
            App\State::create($state);

        $dependencies = [
            [ 'name' => 'Seguridad Pública' ],
            [ 'name' => 'Secretaría de Gobierno' ],
            [ 'name' => 'Secretaría de Relaciones Exteriores' ],
            [ 'name' => 'Secretaría de Hacienda y Crédito Público' ],
            [ 'name' => 'Secretaría de Medio Ambiente y Recursos Naturales' ],
            [ 'name' => 'Secretaría de Educación Pública' ],
            [ 'name' => 'Secretaría de Salud' ],
            [ 'name' => 'Secretaría de Cultura' ],
            [ 'name' => 'Procuraduría General de la República' ],
            [ 'name' => 'Consejería Jurídica del Ejecutivo Federal' ],
            [ 'name' => 'Secretaría de Turismo' ],
            [ 'name' => 'Secretaría del Trabajo y Prevención Social']
        ];

        foreach($dependencies as $dependency) 
            App\Dependency::create($dependency);

        $complaints = [
            [
                'complaint' => 'queja A queja A queja A ...',
                'city' => 'La Paz',
                'dependency' => 'dependencia secreta',
                'person_name' => 'ricardo',
                'contact' => '6123456789',
                'state_id' => 3
            ],
            [
                'complaint' => 'queja B queja B queja B ...',
                'city' => 'Guadalajara',
                'person_name' => 'Veronica',
                'contact' => 'ver@mail.com',
                'state_id' => 14,
                'dependency_id' => 1
            ]
        ];
                
         foreach($complaints as $complaint) 
            App\Complaint::create($complaint);

    }
}
