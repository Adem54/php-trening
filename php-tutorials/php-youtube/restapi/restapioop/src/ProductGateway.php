<?php

//this class uses the gateway pattern basically its methods server as a gateway to the products table in the database we'll add the php opening tag and the class definition the methods

class ProductGateway
{
    private PDO $conn;
    public function __construct(Database $database)
    {
        //Bu class icerisinde database action lari gerceklestirecegimz icin, surekli olarak, Database baglantisina ihtiyacimiz var
        $this->conn = $database->getConnection();

    }

    public function getAll():array 
    {
        $sql = "SELECT * 
                FROM products";
        $stmt = $this->conn->query($sql);
        $data = [];
        //!fetch methodu query nin sagladigi record lardan sirasi ile her seferinde bir sonraki ni cagiracaktir, ki , ve whild parametresi icerisinde dogrudan atama olmaya devam etttigi surece while dongusu calisacak, ne zamana kadar ta ki, fetch in artik dondurecegi veri kalmayana kadar, bu sayede, query nin sagladigi tum verileri tek tek alacak ve her seferinde  $row a atayacak $row dan da $data ya aktarabilecek bu sekilde... esasinda dogrudan $stmt->fetchAll(PDO::FETCH_ASSOC)  da ayni islemi yapiyor zaten
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $row["is_available"] = (bool)$row["is_available"];
            $data[] = $row;

        }

        return $data;
        
    }

    public function create(array $newProduct):string
    {
      try {
     // ! 1.yontem  $sql = "INSERT INTO products (name,size,is_available) values(?,?,?)";  // $data = [ $newProduct["name"],$newProduct["size"],$newProduct["is_available"] ]; // $stmt->execute($data);
     // ! 2.yontem  $sql = "INSERT INTO products (name,size,is_available) values(:name, :size, :is_available)";    // $newProduct ["name"=>"Product12", "size"=>17, "is_available"=>true]; // $stmt->execute($newProduct);
     //!3.yontem de asagidaki gibi olan
        $sql = "INSERT INTO products (name,size,is_available) values(:name, :size, :is_available)";
        $stmt = $this->conn->prepare($sql);
       // $newProduct ["name"=>"Product12", "size"=>17, "is_available"=>true];
        // $stmt->execute($newProduct);
        $stmt->bindValue(":name", $newProduct["name"], PDO::PARAM_STR);
        $stmt->bindValue(":size", $newProduct["size"] ?? 0,PDO::PARAM_INT);
        $stmt->bindValue(":is_available", (bool)($newProduct["is_available"] ??  false), PDO::PARAM_BOOL);
        $stmt->execute();
        $result = $this->conn->lastInsertId();
        return $result;
      } catch (\Throwable $th) {
          echo($th->getMessage());
          return "";
      }
    }
}


?>