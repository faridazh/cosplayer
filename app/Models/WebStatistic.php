<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebStatistic extends Model
{
//    protected $fillable = [
//        'attribute',
//        'value',
//    ];

    protected $casts = [
        'attribute' => 'string',
        'value' => 'integer',
    ];

    public function saveCount(string $attribute, int $value)
    {
        $this->where('attribute', $attribute)->update(['value' => $value]);
    }
}
