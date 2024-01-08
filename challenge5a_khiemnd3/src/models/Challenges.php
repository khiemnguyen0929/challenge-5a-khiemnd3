<?php

class Challenges {

    private $conn;
    
    function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = 'SELECT * FROM challenge';
        $stmt = $this->conn->query($query);
        $result = $stmt->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $result;
    }

    public function getFromId($id) {
        $query = 'SELECT title, description, url FROM challenge WHERE id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($title, $desc, $url);
        while ($stmt->fetch()) {
            $stmt->close();
            $result = [
                'title' => $title,
                'desc' => $desc,
                'url' => $url
            ];
            return $result;
        }
    }

    public function delete($id) {
        unlink(__DIR__.'/../..'.$this->getFromId($id)['url']);
        $query = 'DELETE FROM challenge WHERE id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s',  $id);
        $stmt->execute();
        $done = $stmt->affected_rows;
        $stmt->close();
        return $done;
    }

    public function create($title, $desc, $url) {
        $query = 'INSERT INTO challenge SET title = ?, description = ?, url = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sss', $title, $desc, $url);
        $stmt->execute();
        $done = $stmt->affected_rows;
        $stmt->close();
        return $done;
    }

    public function getAllId() {
        $query = 'SELECT id FROM challenge';
        $stmt = $this->conn->query($query);
        $tmp = $stmt->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        $result = array();
        foreach($tmp as $v) {
            array_push($result, $v['id']);
        }
        return $result;
    }
}