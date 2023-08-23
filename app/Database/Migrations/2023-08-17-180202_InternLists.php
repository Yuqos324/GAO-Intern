<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InternLists extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type"=> "INT",
                "unsigned"=> true,
                "auto_increment"=> true,
            ],
            "name" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
            ],
            "cof" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
            ],
            "current_edu" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
                "null" => false,
            ],
            "edu_status" => [
                "type"=> "VARCHAR",
                "constraint"=>"200",
            ],

        ];
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('interns', true);
    }

    public function down()
    {
        //
    }
}
