<?php
    abstract class DB_Connection{
        private $hostname = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "inventory";

        protected $link;

        function __construct(){
            $this->db_connect();
        }

        public function db_connect(){

            if(!isset($this->link)){
                $this->link = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
                if(!$this->link){
                    $log = mysqli_connect_error()."|..failed";
                    $this->logger($log);
                }
            }
            
        }

        public function db_disconnect(){
            mysqli_close($this->link);
        }

        public function set_data($query){
            if(!mysqli_query($this->link,$query)){
                $log = $query."|".mysqli_error($this->link)."|..failed";
                $this->logger($log);
                return false;
            }
            return true;
        }

        public function get_data($query){
            $data = array();
            $result_set = mysqli_query($this->link,$query) or $this->logger($query."|".mysqli_error($this->link)."|..failed");
            while($row = mysqli_fetch_assoc($result_set)){
                array_push($data,$row);
            }
            return $data;
        }
       
        public function logger($log){
            $log = date("Y-m-d H:i:s")."|".$log.PHP_EOL;
            file_put_contents("inventory_audit_log.txt",$log);
        }
        function __destruct(){
            $this->db_disconnect();
        }
    }
?>