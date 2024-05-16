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
     
    }

    //id li, spesifik delete, update veya check islemlerinde kullanacagimz islemdir burasi 
    public function get(string $id):array | false
    {
        $sql = "SELECT * FROM products where id= :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id",$id, PDO::PARAM_INT);
       $stmt->execute();
       $data = $stmt->fetch(PDO::FETCH_ASSOC);
       return $data;//data var ise array dondurur data yi, data yok ise false dondurur ondan dolayi da biz bu sekilde data yi 2 farkli tip de dondurebiliyoruz
    }

    public function update(array $current, array $new):int //affected numberrows donecegiz ondan dolayi int
    {
   
        // ! 1.yontem  $sql = "INSERT INTO products (name,size,is_available) values(?,?,?)";  // $data = [ $newProduct["name"],$newProduct["size"],$newProduct["is_available"] ]; // $stmt->execute($data);
        // ! 2.yontem  $sql = "INSERT INTO products (name,size,is_available) values(:name, :size, :is_available)";    // $newProduct ["name"=>"Product12", "size"=>17, "is_available"=>true]; // $stmt->execute($newProduct);
        //!3.yontem de asagidaki gibi olan
        $sql = "UPDATE products SET name= :name, size= :size, is_available= :is_available where id= :id";
        $stmt = $this->conn->prepare($sql);
       // $newProduct ["name"=>"Product12", "size"=>17, "is_available"=>true];
        // $stmt->execute($newProduct);
        $stmt->bindValue(":name", $new["name"] ?? $current["name"], PDO::PARAM_STR);
        $stmt->bindValue(":size", $new["size"] ?? $current["size"],PDO::PARAM_INT);
        $stmt->bindValue(":is_available", (bool)($new["is_available"] ??  $current["is_available"]), PDO::PARAM_BOOL);
        $stmt->bindValue(":id", $current["id"],PDO::PARAM_INT);

        $stmt->execute();
        $result = $stmt->rowCount();
        return $result;
     
    }


    public function delete(string $id):int //!rowcount u return edecegiz
    {
        $sql = "DELETE  FROM products where id= :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id",$id, PDO::PARAM_INT);
       $stmt->execute();
       $result = $stmt->rowCount();
       
       return $result;//data var ise array dondurur data yi, data yok ise false dondurur ondan dolayi da biz bu sekilde data yi 2 farkli tip de dondurebiliyoruz
    }

}


?>