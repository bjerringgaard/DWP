<?php
class ViewDashboardPost extends DashboardPostPage  {
    public function showAllDashboardPost(){
        $datas = $this->getAllDashboardPost();
        foreach($datas as $data){
            echo"
            <h4> " . htmlspecialchars ($data["PostTitle"]). "</h4>
            <p class='postedBy'>Post By: " . htmlspecialchars ($data["UserName"]). "</p>
            <p> " . htmlspecialchars ($data["PostDesc"]). "</p>
            <hr class='new1'>
          ";
        }
    }
}