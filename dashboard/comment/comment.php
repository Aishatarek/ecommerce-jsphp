<?php

class Comment
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData($table = 'comments')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function addComment($user_id, $post_id, $description)
    {
        if (isset($_SESSION['user_id'])) {
            if (isset($user_id) && isset($post_id) && isset($description)) {
                $params = array(
                    "user_id" => $user_id,
                    "post_id" => $post_id,
                    "description" => $description,

                );
                $this->insertIntoComment($params);
            }
        } else {
            echo "<script>alert('you must sign in');</script>";
        }
    }
    public function insertIntoComment($params = null, $table = "comments")
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
    public function deleteComment($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM comments WHERE id={$item_id}");
            return $result;
        }
    }
    public function updateComment($item_id = null, $user_id, $post_id, $description)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("UPDATE comments SET user_id={$user_id},post_id={$post_id},description={$description} WHERE id={$item_id}");
            return $result;
        }
    }
}
