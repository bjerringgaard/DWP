<?php
class BannedPage extends DbClass  {
    protected function getAllBanned(){
        $sql = "SELECT * FROM user WHERE isBanned = 1";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if($numRows > 0){
            while($row = $result->fetch_assoc()){
             $data[] = $row;
            }
            return $data;
        }
    }
}