<?php 
    include './helpers/db_connect.php';
    class connexion{
        private $name;
        private $password;
        private $admin='admin';
        private $teacher='teacher';
        protected $DB;
        protected $DBConnect;
        public function __construct($name,$password){
            $this->DB=new db();
            $this->DBConnect=$this->DB->connect();
            $this->name=$name;
            $this->password=$password;
        }
        private function request($name,$table){
            $stmt = $this->DBConnect->prepare("SELECT * FROM $table WHERE USERNAME = :username");
            $stmt->bindParam(':username', $name);
            $stmt->execute();
            $res=$stmt->fetch(PDO::FETCH_ASSOC);
            return $res;
        }
        public function connect(){
            $res=$this->request($this->name,$this->teacher);
            if($res){
                $this->Conexion($res,$this->teacher,"Location: ./Menu.php",$this->name,$this->password);
            }else{
                $res=$this->request($this->name,$this->admin);
                $this->Conexion($res,$this->admin,"Location: ./admins/adminTable.php",$this->name,$this->password);
            }
        }
        private function Conexion($res,$role,$path,$name,$password){
            $Dname=$res["USERNAME"];
            $Dpassword=$res["PASSWORD"];
            if ($name === $Dname && $password === $Dpassword) {
                $_SESSION['role'] = $role;
                header($path);
                exit();
            }
        }
    }
?>