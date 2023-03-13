<?php

namespace Database\Seeders;

use App\Models\WebStatistic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebStatsSeedeer extends Seeder
{
    public function run()
    {
        $dateTime = date('Y-m-d h:i:s', time());

        $data = [
            [
                'attribute' => 'users',
                'value' => 0,
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
            ],
            [
                'attribute' => 'roles',
                'value' => 0,
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
            ],
            [
                'attribute' => 'permissions',
                'value' => 0,
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
            ],
            [
                'attribute' => 'posts',
                'value' => 0,
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
            ],
            [
                'attribute' => 'cosplayers',
                'value' => 0,
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
            ],
        ];

        WebStatistic::insert($data);
    }
}
