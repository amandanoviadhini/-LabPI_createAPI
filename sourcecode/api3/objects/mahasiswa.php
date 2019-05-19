<?php
    class Mahasiswa{
        private $conn;
        private $table_name = "mahasiswa";
    
        // object properties. Sesuaikan dengan nama-nama kolom pada tabel.
        public $nim;
        public $nama;
        public $prodi;
        public $alamat;
    
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }

        function read(){
 
            // select all query
            $query = "SELECT
                        *
                    FROM
                        " . $this->table_name;
         
            // prepare query statement
            $stmt = $this->conn->prepare($query);
         
            // execute query
            $stmt->execute();
         
            return $stmt;
    }
}
?>