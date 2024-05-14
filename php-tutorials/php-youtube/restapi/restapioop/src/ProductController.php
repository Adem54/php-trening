<?php

declare(strict_types=1);

class ProductController
{
    //!Cook onemli bir nokta biz, burda direk ProductControllerGateway i newlemek yerine, constructor icerisine dependency-injection olarak enjekte ederiz...Tabi burda su mantigi hep dusunelim..once interface den, sonra abstract class ve sonra base class yazip ardindan, class imizi yazarsak o zaman dependency injection da parametreye type-class oalrak, base class, ya da interface i yazarsak, artik ProductController i loosely coupled, zayif bagimli hale getirerek, tamamen ProductControllerGateway e bagimli olmaktan kurtarmis oluruz!!!!

    private ProductGateway $productGateway;
    public function __construct(ProductGateway $productGateway )
    {
        $this->productGateway = $productGateway;
    }


    //method-POST,GET,PUT,DELETE 
    public function processRequest(string $method, ?string $id):void
    {
       
        if($id)//!eger id gonderilirse, endpoint e yapilan, get,post request inde, id gonderilip gonderilmemesini kontrol edebiliyoruz
        {
            //effect single result
            $this->processResourceRequest($method,$id);
        }else
        {
            //effects collection result(like array)
            $this->processCollectionRequest($method);
        }
    }

    //!Burasi da productions ile ilgili id gonderilere yapilacak tum degisiklikleri handle edecegimz fonksiyonddur
    private function processResourceRequest(string $method, string $id):void 
    {

    }

    //!Burasi liste donene tum endpointleri karsilar, productions ile ilgili
    //Yani parametrede sadece productions var ise burayi kullaniyoruz... dikkat edelim buraya.. 
    private function processCollectionRequest(string $method):void 
    {
        switch ($method) {
            case 'GET':
                $result = $this->productGateway->getAll();
                echo json_encode($result);
                break;
            case 'POST':
                //Ilk once gelen data yi requestten almamiz gerekiyor
                //post request oldugu icin, burda ne olacak bir form dan data gelecek buraya
                //Default olarak, http request data sini json olarak encode ederek gonderir, bunu alabilmek icin dogrudan file_get_content
                //$data = $_POST; bu yanlis bu sekilde alamayiz 
                //!Postman dan gondeilen data yi da bu sayede alabildik...COOOOK ONEMLI BIR NOKTA!!!!!
                $data = file_get_contents("php://input");
               
                $data = (array)json_decode($data, true);//!array casting de eger data null ise onu [] bor array e cevirir
               
                 //!Gelmesi gereken request data nin null olup olmadigi kontrol edilmeli mutlaka, backend-validation i mutlaka yapmaliyiz, more-robust api olmasi icin
                 //Eger array casting yaparsak eger (array) $data null ise onu [] bos array a cevirir 
                 var_dump($data);
                if(count($data) > 0)
                {
                    $id = $this->productGateway->create($data);
                    http_response_code(201);//normalde default olarak status-code 200 gelir ama biz kendmiz 201 olarak atayabiliyoruz successfull result icin
                    echo json_encode(["message"=>"A New Product created", "id"=>$id, "result"=>true ]);
                }else{
                    echo json_encode(["message"=>"Please send the request data", "id"=>0, "result"=>false]);    
                }
              
                break;
            default:
                # code...
                break;
        }
    }
}

//!method:GET URL:/products Action:list
//!method:GET URL:/products/123 Action:show
//!method:POST URL:/products Action:create
//!method:PUT OR PATCH URL:/products/123 Action:update
//!method:DELETE URL:/products/123 Action:delete
?>