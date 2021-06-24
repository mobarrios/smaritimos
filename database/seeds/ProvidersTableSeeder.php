<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('providers')->insert([
                [
                    'id'    => 1,
                    'name'=>'Proveedor A',
                    'address'=>'Ruta Provincial 6 l 195',
                    'cuit'=> 331111119,
                    'email'=> 'ventas@proveedora.com.ar',
                ]
                ,[
                    'id'    => 2,
                    'name'=>'Proveedor B',
                    'address'=>'Ruta 24 km 20200',
                    'cuit'=> 331122119,
                    'email'=> 'ventas@proveedorb.com.ar',
                ],
                [
                    'id'    => 3,
                    'name'=>'Proveedor C',
                    'address'=>'Maipu 1210',
                    'cuit'=> 32244488779,
                    'email'=> 'ventas@proveedorc.com.ar',
                ]
            ]
        );

    }
}
