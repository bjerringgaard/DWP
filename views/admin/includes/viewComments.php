<?php

class ViewComments extends CommentsPage  {

    public function showAllComments(){
        $datas = $this->getAllComments();
        foreach($datas as $data){
            //echo <p>Navn " . $data['CommentText'] . "</p>;

            echo"
            <p>Comments: " . $data["CommentText"]. "</p>
          ";
            

        }

    }
}