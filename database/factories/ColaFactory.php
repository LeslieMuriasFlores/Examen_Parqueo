<?php

namespace Database\Factories;

use App\Models\cola;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = cola::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //definir los campos de la tabla y como queremos que sean llenados
           // 'vehiculo_id' => $this->faker->numberBetween('1','100'),
            //'parqueo_id' => $this->faker->numberBetween('1','100'),

        ];
    }
}
