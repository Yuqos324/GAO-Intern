<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type"=> "INT",
                "unsigned"=> true,
                "auto_increment"=> true,
            ],
            "first_name" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
            ],
            "last_name" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
            ],
            "email" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
            ],
            "password" => [
                "type"=> "TEXT",
            ]
        ];
        $this->forge->addKey('id', true);
        $this->forge->addKey('email', false, true);
        $this->forge->addField($fields);
        $this->forge->createTable('users', true); 
    }

    public function down()
    {
        //
    }
}
