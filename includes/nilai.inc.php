<?php
class Nilai{
	
	private $conn;
	private $table_name = "nilai";
	
	public $id;
	public $kt;
	public $jm;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert(){
		
		$stmt = $this->readHasil();
		while($row1=$stmt->fetch(PDO::FETCH_ASSOC))
  		{
    		$jum_nilai=$row1['SUM(jum_nilai)'];
		}

		if($this->jm + $jum_nilai <= 1){
			$query = "insert into ".$this->table_name." values('',?,?)";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $this->kt);
			$stmt->bindParam(2, $this->jm);
			$stmt->execute();
			return true;
		}else{
			return false;
		}
		
	}

	function readHasil(){
		
		$query = 'SELECT SUM(jum_nilai) from `nilai`';

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY id_nilai ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	// used when filling up the update product form
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_nilai=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id = $row['id_nilai'];
		$this->kt = $row['ket_nilai'];
		$this->jm = $row['jum_nilai'];
	}
	
	// update the product
	function update(){
		$stmt = $this->readHasil();
		while($row1=$stmt->fetch(PDO::FETCH_ASSOC))
  		{
    		$jum_nilai=$row1['SUM(jum_nilai)'];
		}
		
		if($this->jm + $jum_nilai <= 1){
			$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					ket_nilai = :kt,  
					jum_nilai = :jm
				WHERE
					id_nilai = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':kt', $this->kt);
		$stmt->bindParam(':jm', $this->jm);
		$stmt->bindParam(':id', $this->id);
		$stmt->execute();
		return true;
		// execute the query
		
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_nilai = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>