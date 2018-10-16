<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Complaint extends Model
{
    protected $guarded = ['id'];

    private $states = [
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

    private $dependencies = [
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

    private $shortDependencies = [
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

    private function getDataBy($field)
    {
        return DB::table('complaints')
            ->select($field, DB::raw('count(id) as total'))
            ->groupBy($field)
            ->pluck('total', $field)
            ->all();
    }

    private function makeDataArray($data, $filter = false) 
    {
        if ($filter) {
            foreach ($data as $key => $value) {
                if (! is_int($key))
                    unset($data[$key]);
            }
        }

        $result = [];

        for ($id = 1; $id < 31; $id++)
            $result[] = (array_has($data, $id)) ? $data[$id] : 0;
        
        return $result;
    }

    public function getAsArrayCountByStatesOrder()
    {
        $data = $this->getDataBy('state_id');
        
        return $this->makeDataArray($data, false);
    }

    public function getAsArrayCountByDependenciesOrder()
    {
        $data = $this->getDataBy('dependency_id');
        
        return $this->makeDataArray($data, true);
    }
}
