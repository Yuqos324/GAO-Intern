<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InternSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Yusuf',
            'cof' => 'Indonesia',
            'current_edu' => 'Diploma',
            'edu_status' => 'Ongoing'
        ];

        $this->db->table('interns')->insert($data);
    }
}
