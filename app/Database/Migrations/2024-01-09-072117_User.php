<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class User extends Migration
{
    public function up()
    {
        
        //Memuat sruktur tabel untuk product
        $this->forge->addField([
            'Id' => [
                'type'                  => 'INT',
                'constraint'            => 5,
                'unsigned'              => true,
                'auto_increment'        => true,
            ],
            'nama' =>[
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'username' =>[
                'type'        => 'VARCHAR',
                'constraint'  => '50',
            ],
            'password' =>[
                'type'        => 'VARCHAR',
                'constraint'  => '50',
            ],
            'level' =>[
                'type'        => 'ENUM'
                 'value'      => 'admin','operator',
               
            ],
           
        ]);
        $this->forge->addKey('Id', true);
        $this->forge->createTable('Users');
    }
    
    public function down ()
    {
        //
    }
}

