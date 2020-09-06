<?php
namespace App\Database\Seeds;
use CodeIgniter\I18n\Time;

class OrangSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [[
            'nama'       => 'Rian',
            'alamat'     => 'Kp cibeureum',
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ],
        [
            'nama'       => 'Dodi Ferdiansyah',
            'alamat'     => 'Bagdad',
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ],
        [
            'nama'       => 'Erik',
            'alamat'     => 'asdasd sdasm',
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ]];

        // Simple Queries
        // $this->db->query("INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)",
        //     $data
        // );

        // Using Query Builder
    //    $this->db->table('orang')->insert($data);
       $this->db->table('orang')->insertBatch($data);
    }
}