<?php

declare(strict_types=1);

//Neden App\Repositories cunku biz composer.json icinde src yi belirttik onun altindakiler i veriyoruz
namespace App\Repositories;

use PDO;
use App\Database;
class UserRepository
{
    
    public function __construct(private Database $db)
    {

    }
    public function getAll():array 
    {
        $stmt = $this->db->connect()->query("select * from user");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}



?>