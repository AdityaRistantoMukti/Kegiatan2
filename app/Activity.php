<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Activity extends Model
{
    use AutoNumberTrait;

    protected $table = 'activitys';
    protected $guarded = [];

    public function getAutoNumberOptions()
    {
        return [
            'kode_activity' => [
                'format' => function() {
                    return 'MK/'.date('Ymd').'/?';
                },
                'length' => 5
            ]
            ];
    }
}
