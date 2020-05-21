<?php
class DashboardPostPage extends DbClass  {

    protected function getAllDashboardPost(){
        $sql = "SELECT * FROM Dashboard";
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