<?php
class ViewBanned extends BannedPage  {
    public function showAllBanned(){
        $datas = $this->getAllBanned();
        foreach ((array) $datas as $data) {

            if(!$data){
                echo"<p>Some</p>";
            }
            else{
                
                echo"<p>Banned: " . $data["UserName"]. "</p>";
            }
            
            }
        }
    }