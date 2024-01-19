<?php

namespace App\Models;

use CodeIgniter\Model;

class Authmodel extends Model
{
    protected $table      		= 'user';
    protected $primaryKey 		= 'Id';
    protected $useAutoIncrement = false;
    protected $returnType 		= 'object';
    protected $allowedFields 	= ['Id','Nama','Username','Password','Level'];

    public function cekuser($username, $password)
    {
    	$db			= \Config\Database::connect();
    	$builder 	= $db->table('user');
    	return $builder->getWhere(['username'=>$username,'password'=>$password]);
    }
}