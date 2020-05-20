<?php
class ViewComments extends CommentsPage  {
    public function showAllComments(){
        $datas = $this->getAllComments();
        foreach($datas as $data){
            echo"
            <p>Comments: " . htmlspecialchars ($data["CommentText"]). "</p>
          ";
        }
    }
}