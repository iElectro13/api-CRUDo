<?php
    
    require '../config/db.php';
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Content-Type: application/json; charset=utf-8');

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


        //Get all from "date" table
        public function getAllDates(){
            $sql = "SELECT * from date ORDER BY date_id DESC";
            try{
                $resp = $this->db->query($sql);
                if($resp->rowCount() > 0 ){
                    $dates = $resp->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($dates);
                }

            }catch(PDOException $e){
                echo 'Error de consulta: ' . $e->getMessage();
            }
        }

        //Get date by id
        public function getById($id){
            $sql = "SELECT * from date WHERE date_id = $id";
            try{
                $resp = $this->db->query($sql);
                if($resp->rowCount() > 0 ){
                    $dates = $resp->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($dates);
                }

            }catch(PDOException $e){
                echo 'Error de consulta: ' . $e->getMessage();
            }
        }

        //Create new date
        public function newDate($name, $topic, $date){
            $sql = "INSERT INTO date (name, topic, date) VALUES (:name, :topic, :date)";
            try{
                $resp = $this->db->prepare($sql);
                $resp->bindParam(':name', $name);
                $resp->bindParam(':topic', $topic);
                $resp->bindParam(':date', $date);
                $resp->execute();
                if($resp->rowCount() > 0 ){
                    $dates = $resp->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($dates);
                } else {
                    echo json_encode("Nada creado");
                }

            }catch(PDOException $e){
                echo 'Error de consulta: ' . $e->getMessage();
            }
        }

        //Update a date
        public function updateDate($id, $name, $topic, $date){
            $sql = "UPDATE date SET name=:name, topic=:topic, date=:date WHERE date_id = :id";
            try{
                $resp = $this->db->prepare($sql);
                $resp->bindParam(':id', $id);
                $resp->bindParam(':name', $name);
                $resp->bindParam(':topic', $topic);
                $resp->bindParam(':date', $date);
                $resp->execute();
                if($resp->rowCount() > 0 ){
                    $dates = $resp->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($dates);
                } else {
                    echo json_encode("Nada actualizado");
                }

            }catch(PDOException $e){
                echo 'Error de consulta: ' . $e->getMessage();
            }
        }

        //Delete a single date from "date" table
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
                echo 'Error de consulta: ' . $e->getMessage();
            }
        }
    }

?>