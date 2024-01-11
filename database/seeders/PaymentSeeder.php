<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;


class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [

            [

                'stripe_key' => 'pk_test_iuZQxlR1VnoQU8pwFC0Vcc4o',

                'stripe_secret' => 'sk_test_NEFeA1X8GjWoKqUH4QoB3ElT'

            ],

        ];



        foreach ($plans as $plan) {

            Payment::create($plan);

        }
    }
}
