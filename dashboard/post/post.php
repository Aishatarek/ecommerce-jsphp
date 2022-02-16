<?php

class Post
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData($table = 'posts')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getRecentedData($table = 'posts')
    {
        $result = $this->db->con->query("SELECT * FROM {$table} ORDER BY id DESC LIMIT 3");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function addPost($title,$description, $photo)
    {

        if (isset($title) && isset($description) && isset($photo)) {
            $params = array(
                "title" => $title,  
                "description" => $description,
                "photo" => $photo
            );
            $this->insertIntoPost($params);
        }
    }
    public function insertIntoPost($params = null, $table = "posts")
    {
        if ($this->db->con != null) {
            if ($params != null) {
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
                //echo  $query_string;
                $result = $this->db->con->query($query_string);

                return $result;
            }
        }
    }
    public function deletePost($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM posts WHERE id={$item_id}");
            return $result;
        }
    }
    public function updatePost($item_id = null,$title, $description, $photo)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("UPDATE posts SET title={$title},description={$description},photo={$photo} WHERE id={$item_id}");
            return $result;
        }
    }
}
