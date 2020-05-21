<?php
class ViewComments extends CommentsPage  {
    public function showAllComments(){
        $datas = $this->getAllComments();
        foreach($datas as $data){
            echo"
            <p class='maxTextWidth'>Comments: " . htmlspecialchars ($data["CommentText"]). "</p>
          ";
        }
    }
}