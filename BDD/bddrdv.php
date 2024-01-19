<?php

class BddRdv {
    private $host;
    private $username;
    private $password;
    private $database;
    private $conn;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function insertRdv($date, $time, $patientId) {
        $sql = "INSERT INTO rdv (date, time, patient_id) VALUES ('$date', '$time', '$patientId')";
        if ($this->conn->query($sql) === TRUE) {
            echo "Rdv inserted successfully";
        } else {
            echo "Error inserting rdv: " . $this->conn->error;
        }
    }

    // Add other methods as needed

    public function close() {
        $this->conn->close();
    }
}

?>
