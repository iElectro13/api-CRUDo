<?php
    
    require '../config/db.php';

    class Date{

        private $db;

        public function __construct(){
            try{
                $this->db = new Db();
                $this->db = $this->db->conectionDb();
            }catch(PDOException $exepcion){

                echo 'Error de conexión' . $exepcion->getMessage();
    
            }  
        }

        public function getAllDates(){
            $sql = "SELECT * from date";
            try{
                $resp = $this->db->query($sql);
                if($resp->rowCount() > 0 ){
                    $dates = $resp->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($dates);
                } else {
                    echo json_encode("No hay ninguna cita");
                }

            }catch(PDOException $e){
                echo 'Error de consulta' . $e->getMessage();
            }
        }

        public function deleteSingle($id){
            $sql = "DELETE FROM date WHERE date_id = $id";
            try{
                $resp = $this->db->prepare($sql);
                $resp->execute();
                if($resp->rowCount() > 0 ){
                    echo json_encode("Cita borrada");
                } else {
                    echo json_encode("No hay ninguna cita con ese id");
                }

            }catch(PDOException $e){
                echo 'Error de consulta' . $e->getMessage();
            }
        }
    }

?>