<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Complaint extends Model
{
    protected $guarded = ['id'];

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
