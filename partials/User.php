<?php
require_once 'connect.php';



class User extends Database
{
    protected $tableName = "crud";


    //function to add data
    public function add($data)
    {
        if (!empty($data)) {
            $field = $placeholder = [];
            foreach ($data as $key => $value) {
                $field = $key;
                $placeholder = ":{field}";
            }
        }

        $sql = "INSERT INTO {$this->tableName} (" . implode(',', $field) . ") VALUES (" . implode(',', $placeholder) . ")";
        $stmt = $this->conn->prepare($sql);

        try {
            $this->conn->beginTransaction();
            $stmt->execute($data);
            $LastInsertedId = $this->conn->lastInsertId();
            $this->conn->commit();
            return $LastInsertedId;
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
            $this->conn->rollBack();
        }
    }


    // function to get rows
    public function getRows($start = 0, $limit = 4)
    {
        $sql = "SELECT * FROM {$this->tableName} ORDER BY DESC LIMIT {$start}, {$limit}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $results = [];
        }
        return $results;
    }


    // function to get one row
    public function getRow($field, $value)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE {$field} = :{$field}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $result = [];
        }
        return $result;
    }

    //function to count row
    public function getCount()
    {
        $sql = "SELECT COUNT(*) as pcount FROM {$this->tableName} ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result =  $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['pcount'];
    }


    //function to upload photo 
    public function uploadPhoto($file)
    {
        if (!empty($file)) {
            $fileTempPath = $file['tmp_name'];
            $fileName = $file['file_name'];
            $fileType = $file['file_type'];
            $fileNameCmps = explode(".",$fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time().$fileName) . "." . $fileExtension;
            $allowedExtension = ["jpg", "png", "jpeg"];
            if(in_array($fileExtension, $allowedExtension)){
                $uploadFileDir = getcwd(). "/uploads/";
                $destFilePath = $uploadFileDir . $newFileName;
                if(move_uploaded_file($fileTempPath, $destFilePath)){
                    return $newFileName;
                }


            }
        }
    }
}
