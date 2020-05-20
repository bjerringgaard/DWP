<?php
class ViewBanned extends BannedPage  {
    public function showAllBanned(){
        $datas = $this->getAllBanned();
        foreach($datas as $data){
            echo"
            <p>Banned: " . $data["UserName"]. "</p>
          ";
        }
    }
}