<?php
class Model_Reply extends Model
{
    public function insert_Reply($title, $body, $author, $parent, $image="", $image_big="")
    {
        $sth = $this->DBH->prepare('INSERT INTO posts(title, body, author, parent,last_update,image, image_big) VALUES (:title, :body, :author, :parent, :last_update, :image, :image_big);');
        $sth->execute(array('title' => $title, 'body' => $body, 'author' => $author, 'parent' => $parent, 'last_update' => date("Y-m-d H:i:s"),'image'=>$image,'image_big' => $image_big));

        $sth = $this->DBH->prepare('UPDATE `posts` SET `last_update`=:last_update, `count`=`count`+1 WHERE `id`=:parent');
        $sth->execute(array('last_update' => date("Y-m-d H:i:s"), 'parent' => $parent));
    }
}