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
        //!Bu id ile yapilacak tum islemler icin gecerlidir, delete, update, get...cunku oncelikle aranan spesifik product yok ise hic bir islem yapilamayacaktir ki bu tum islemlerde ortak olan kisimdir
        $product = $this->productGateway->get($id);
        if(!$product)
        {
            //http://localhost/main/php-trening/php-tutorials/php-youtube/restapi/restapioop/products/454  olmayan bir id ararsak 
            http_response_code(404);
            echo json_encode(["message"=>"Product not found"]);
            return;
        }

        switch ($method) {
            case 'GET':
                http_response_code(200);//default olarak da doner ama yine de biz donduruyoruz bilincinde olalim ne yaptgimiz in diye
                echo json_encode($product);
                break;
                /*
                Kullanici postman de, http://localhost/main/php-trening/php-tutorials/php-youtube/restapi/restapioop/products/1 de iken body-raw kismina bu product 1 id li data nin yeni degeri olarak su seklde atama yapr
                {
                    "name": "Product111",
                    "size": 29,
                    "is_available": false
                }
                bunu soyle dusun fetch ile patch request e gonderilen data demektir bu, ozellikle mobile uygulamalarda bu sekilde endpointlere ihtyacimz var oralarda web-form lar bulunmayabiliyor..
                */
            case 'PATCH':
                  //!Burda data gonderilecek, json olarak ondan dolayi asagidaki postta yaptimgz bircok islemi aynen burda da yapacagiz  
                  $data = file_get_contents("php://input");
               
                  $data = (array)json_decode($data, true);//!array casting de eger data null ise onu [] bor array e cevirir
                  $errors =  $this->getValidationError($data, false);
                  if(!empty($errors))
                  {
                      http_response_code(422);//unprocessible entity anlamina gelir bu status-code olarak
                      echo json_encode(["errors"=>$errors]);
                      break;
                  }

                   $rowCount = $this->productGateway->update($product, $data);
                      http_response_code(200);//normalde default olarak status-code 200 gelir ama biz kendmiz 201 olarak atayabiliyoruz successfull result icin
                      echo json_encode(["message"=>"Product $id updated", "rows"=>$rowCount, "result"=>true ]);

            case 'DELETE':
                $rowCount = $this->productGateway->delete($id);
                http_response_code(200);//normalde default olarak status-code 200 gelir ama biz kendmiz 201 olarak atayabiliyoruz successfull result icin
                echo json_encode(["message"=>"Product $id deleted", "rows"=>$rowCount, "result"=>true ]);
           
            default:
                http_response_code(405);//not allowed
                //Ve hangi endpointlerin allowed oldugunu burda header ile belirtiriz 
                header("Allow: GET, PATCH, DELETE");
                break;
        }
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
                $errors =  $this->getValidationError($data);
                if(!empty($errors))
                {
                    http_response_code(422);//unprocessible entity anlamina gelir bu status-code olarak
                    echo json_encode(["errors"=>$errors]);
                    break;
                }
                 $id = $this->productGateway->create($data);
                    http_response_code(201);//normalde default olarak status-code 200 gelir ama biz kendmiz 201 olarak atayabiliyoruz successfull result icin
                    echo json_encode(["message"=>"A New Product created", "id"=>$id, "result"=>true ]);
              
                break;
            default:
            //Burda kullanic ornegin delete request yapiyor 200 status kodu donduruyor herhangi bir sonuc dondurmemesine ragmen, o zman bizim swtich caselerimizde olmayan bir request yapilirsa bizim status kodu not allowed olan sonucu dondurmemiz gerekir
                # code...
                http_response_code(405);//not allowed
                //Ve hangi endpointlerin allowed oldugunu burda header ile belirtiriz 
                header("Allow: GET, POST");
                break;
        }
    }

    //!private yapma daki ana sebep oncelikle, eger bu fonksiyon sadece bu class icerisinde kullanilacak ise o zaman private yapilmalidir, ilk sorumuz su bu fonksiyonun amaci ne, disarida invoke edilecek mi disaryi acmali miyiz
//!Burasinin hem, create hem de update icin calismasi icin, 2.parametre olarak is_new_record diye bool in bir paramtre vererek, eger new record ise o zaman, create , degilse update diyerek fleksibel bir validation fonks olustruruz
    private function getValidationError(array $data, bool $is_new=true):array
    {   
        $errors = [];
        //name field must be filled-required
        if($is_new && empty($data["name"]))
        {
            $errors[] = "name is required";
        }
        //size is optional...if there is no size, it is assigned as default value
        if(array_key_exists("size", $data))
        {
            if(filter_var($data["size"], FILTER_VALIDATE_INT)=== false )//if size value is not int, cunku 0 olarak atanabilir ve bu da bool false olarak, evalutea-degerlendirilebiliyor php tarafindan
            {
                $errors[] = "size must be integer";
            }
        }

        return $errors;
    }
}

//!method:GET URL:/products Action:list
//!method:GET URL:/products/123 Action:show
//!method:POST URL:/products Action:create
//!method:PUT OR PATCH URL:/products/123 Action:update
//!method:DELETE URL:/products/123 Action:delete
?>