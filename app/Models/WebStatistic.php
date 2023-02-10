<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebStatistic extends Model
{
    protected $fillable = [
        'attribute',
        'value',
    ];

    protected $casts = [
        'attribute' => 'string',
        'value' => 'integer',
    ];

    public function saveCount(string $attribute, int $value)
    {
        $stats = $this->where('attribute', $attribute)->first();
        if ($stats) {
            $stats->fill(['value' => $value]);
        }
        else
        {
            $this->attributes['attribute'] = $attribute;
            $this->attributes['value'] = $value;
            $this->save();
        }
    }
}
