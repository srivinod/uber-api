<?php
 
class DbHandler {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();
    }
 
    public function getAllData() {		
		$query_result = mysqli_query($this->conn, "SELECT * FROM cabs ORDER BY id desc");
		$responseData = array();
		foreach($query_result as $resultData)
		{	
			$responseData['id'] = $resultData['id'];
			$responseData['cab_number'] = $resultData['cabnumber'];
			$responseData['cab_availability'] = $resultData['availability'];
			$responseData['created_at'] = $resultData['created_at'];
			$data[] = $responseData ;
		}		 
		return $data ;
    }
	
	public function getOneData($dataId) {	
		$query_result = mysqli_query($this->conn, "SELECT * FROM cabs WHERE id = $dataId");
		$responseData = array();
		foreach($query_result as $resultData)
		{	
			$responseData['id'] = $resultData['id'];
			$responseData['cab_number'] = $resultData['cabnumber'];
			$responseData['cab_color'] = $resultData['cabcolor'];
			$responseData['cab_availability'] = $resultData['availability'];
			$responseData['created_at'] = $resultData['created_at'];
			$data[] = $responseData ;
		}		 		
		return $data;
    }
	
	public function getNearbyCabs($location_value) {	
		$query_result = mysqli_query($this->conn, "SELECT * FROM cabs WHERE location BETWEEN $location_value-100 AND $location_value+100");
		$responseData = array();
		foreach($query_result as $resultData)
		{	
			$responseData['id'] = $resultData['id'];
			$responseData['cab_number'] = $resultData['cabnumber'];
			$responseData['cab_color'] = $resultData['cabcolor'];
			$responseData['cab_availability'] = $resultData['availability'];
			$responseData['cab_distance'] = $resultData['location']-$location_value;
			$responseData['created_at'] = $resultData['created_at'];
			$data[] = $responseData ;
		}		 		
		return $data;
    }

	public function bookNearbyCab($book_cab_number) {	
		$query_result = mysqli_query($this->conn, "UPDATE cabs SET availability = '1' WHERE cabnumber = '$book_cab_number'");
		
		if(mysqli_affected_rows($this->conn) > 0){
			return "Data Inserted into the table";
		}else{
			return "Insert Operation Failed";
		}
    }	


	public function calculateFare($travel_distance,$travel_time) {	
 			$responseData['Total Kilometers'] = $travel_distance;
			$responseData['Total Time'] = $travel_time; // times has to be in minutes
			$timeFare = $travel_time*1;
			$distanceFare = $travel_distance*2;
			$totalFare = $timeFare+$distanceFare;
			$responseData['total_fare'] = $totalFare;
			$data[] = $responseData ;
			return $data;
    }

}

?>
