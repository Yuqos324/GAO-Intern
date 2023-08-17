<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'first_name' => 'check',
            'last_name' => 'test',
            'email'    => 'checktest@mail.com',
            'password'    => md5("secret"),
        ];

        $this->db->table('users')->insert($data);
    }
}
