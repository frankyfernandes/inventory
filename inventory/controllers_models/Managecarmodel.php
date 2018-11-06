<?php
    require_once('./DB_Connection.php');

    class Managecarmodel extends DB_Connection{
        private $modelname;

        function __construct(){
            parent::__construct();
        }

        public function getter(){
            if(isset($_POST['model_name'])){
                echo json_encode($_POST);
            }


        }

        public function addmodel(){

        }

        public function getmodel(){

        }
    }

    $mcm = new Managecarmodel;
    $mcm->getter();
?>