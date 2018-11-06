<?php
    require_once('./DB_Connection.php');
    class Managecarmanufacturer extends DB_Connection{
        private $manufacturer;
        function __construct(){
            parent::__construct();
        }
        public function getter(){
            if(isset($_POST['manufacturer'])){
                $data = $_POST['manufacturer'];
                $data = htmlentities(trim($data),ENT_QUOTES);
                $this->manufacturer = $data;
                $return_val = $this->addmanufacturer();

                $response_msg = "Successfully updated data.";
                if(!$return_val){
                    $response_msg = "Something went wrong.";
                    return $response_msg;
                }
                return $response_msg;
            }
            
            if(isset($_GET['getmanufacturers'])){
                
               $return_val =  $this->getmanufacturers();
               file_put_contents('frlog.txt',print_r($return_val,true),FILE_APPEND);
               if(sizeof($return_val) > 0){
                   return json_encode($return_val);
               }
               $return_val = array("message"=>false);
               return json_encode($return_val);
            }
        }

        public function addmanufacturer(){
            $insert_manufacturer_query = "insert into car_manufacturer (manufacturer) values('".$this->manufacturer."')";
            $return_val = parent::set_data($insert_manufacturer_query);
            return $return_val; // returns boolean
        }

        public function getmanufacturers(){
            $select_manufacturers = "select * from car_manufacturer";
            $return_val = parent::get_data($select_manufacturers);
            return $return_val; // returns array
        }
    }

    $acm = new Managecarmanufacturer;

    echo $response_msg = $acm->getter();


?>