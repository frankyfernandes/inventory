<?php
    require_once('./DB_Connection.php');
    class Managecarmodel extends DB_Connection{
        private $model_name;
        private $manufacturer_id;
        private $model_quantity;
        private $model_color;
        function __construct(){
            parent::__construct();
        }
        public function getter(){
            $return_msg = "Something went wrong.";
            if(isset($_POST['model_name']) && $_POST['model_name'] != ''){
                //echo json_encode($_POST);
                $this->model_name = $_POST['model_name'];
                $this->manufacturer_id = $_POST['manufacturer_id'];
                $this->model_quantity = $_POST['model_quantity'];
                $this->model_color = $_POST['model_color'];
                $return_msg = "Successfully updated data.";
                if(!$this->addmodel()){
                    $return_msg = "Something went wrong.";
                }
                return $return_msg;
                
            }

            if(isset($_GET['getcarmodels'])){
               $return_val =  $this->getmodels();
                return json_encode($return_val);
            }



            return $return_msg;
        }
        public function addmodel(){
            $model_check_quantity_query = "select model_quantity,id from car_model where model_name = '".$this->model_name."' and model_color='".$this->model_color."';";
            $model_check_quantity_result = parent::get_data($model_check_quantity_query);
            $model_check_quantity = 0;
            if(sizeof($model_check_quantity_result)>0){
                $model_check_quantity = $model_check_quantity_result[0]['model_quantity'];
                $model_id = $model_check_quantity_result[0]['id'];
                $new_model_quantity = $model_check_quantity + $this->model_quantity;
                $update_model_query = "update car_model set model_quantity =".$new_model_quantity." where id = ".$model_id.";";
                return $update_model_result = parent::set_data($update_model_query);
                
            }
            $insert_model_query = "insert into car_model(model_name,manufacturer_id,model_quantity,model_color) values('".$this->model_name."','".$this->manufacturer_id."','".$this->model_quantity."','".$this->model_color."')";
            return $insert_model_result = parent::set_data($insert_model_query);
        }
        public function getmodels(){

            $get_car_models_query = "SELECT manufacturer,model_name,sum(model_quantity) as total_count FROM car_model m inner join car_manufacturer b on m.manufacturer_id = b.id group by model_name order by b.manufacturer,m.model_name";
            return $get_car_models_result = parent::get_data($get_car_models_query);

        }
    }
    $mcm = new Managecarmodel;
    echo $response_msg = $mcm->getter();
?>