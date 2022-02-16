<?php
session_start();

class User
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function Register($username, $email, $password, $avatar, $role)
    {

        if (isset($username) && isset($email) && isset($password) && isset($avatar) && isset($role)) {
            $sqll = "SELECT * FROM user WHERE email=$email";
            $resultt =  $this->db->con->query($sqll);
            if ($resultt->num_rows > 0) {
                echo "<script>alert('the email already exist')</script>";
            } else {

                $params = array(
                    "username" => $username,
                    "email" => $email,
                    "password" => $password,
                    "avatar" => $avatar,
                    "role" => $role,
                );
                $this->insertIntoUser($params);
            }
        }
    }
    public function insertIntoUser($params = null, $table = "user")
    {
        if ($this->db->con != null) {
            if ($params != null) {
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
                // echo  $query_string;
                $result = $this->db->con->query($query_string);

                return $result;
            }
        }
    }
    public function signIn($email, $password)
    {
        if ($this->db->con != null) {
            if (isset($email) && isset($password)) {
                $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
                $result =  $this->db->con->query($sql);
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['role'] = $row['role'];
                    header("Location: index.php");
                } else {
                    echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
                }
            }
        }
    }
    public function getData($table = 'user')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function deleteUser($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM user WHERE id={$item_id}");
            return $result;
        }
    }
    public function updateUser($item_id = null, $username, $email, $avatar, $role)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("UPDATE user SET username={$username},email={$email},avatar={$avatar} ,role= {$role} WHERE id={$item_id}");
            return $result;
        }
    }
}
