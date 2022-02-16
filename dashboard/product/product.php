<?php

class Product
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData($table = 'product')
    {
        $result = $this->db->con->query("SELECT * FROM {$table}");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getLimitedData($table = 'product')
    {
        $result = $this->db->con->query("SELECT * FROM {$table} LIMIT 3");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getRecentedData($table = 'product')
    {
        $result = $this->db->con->query("SELECT * FROM {$table} ORDER BY id DESC LIMIT 3");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getProduct($item_id = null, $table = 'product')
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE id={$item_id}  ");

            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }

    public function addProduct($name, $price,$description, $image, $image2, $image3, $image4, $brand)
    {
        function img($imgg)
        {
            if (isset($imgg) && $imgg["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "rar" => "application/rar", "pdf" => "application/pdf");
                $filename = rand(0, 1000) . $imgg["name"];
                $filetype = $imgg["type"];
                $filesize = $imgg["size"];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                if (in_array($filetype, $allowed)) {
                    if (file_exists("../../uploads/products/" . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        $result = move_uploaded_file($imgg["tmp_name"], "../../uploads/products/" . $filename);
                        echo "Your file was uploaded successfully.";
                    }
                } else {
                    echo "Error: There was a problem uploading your file. Please try again.";
                }
                if ($result) {
                    return "'" . $filename . "'";
                } else {
                    echo "Error: " . $imgg["error"];
                }
            }
        }
        $image = img($image);
        $image2 = img($image2);
        $image3 = img($image3);
        $image4 = img($image4);
        if (isset($name) && isset($price) &&isset($description) && isset($image) && isset($image2) && isset($image3) && isset($image4) && isset($brand)) {
            $params = array(
                "name" => $name,
                "price" => $price,
                "description"=>$description,
                "image" => $image,
                "image2" => $image2,
                "image3" => $image3,
                "image4" => $image4,
                "brand" => $brand
            );
            $this->insertIntoProduct($params);
        }
    }
    public function insertIntoProduct($params = null, $table = "product")
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
    public function deleteProduct($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM product WHERE id={$item_id}");
            return $result;
        }
    }
    public function updateProduct($item_id = null, $name, $price,$description, $image, $image2, $image3, $image4, $brand)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("UPDATE product SET name ={$name},price={$price},description={$description},image={$image},image2={$image2},image3={$image3},image4={$image4},brand={$brand} WHERE id={$item_id}");
            return $result;
        }
    }
}
