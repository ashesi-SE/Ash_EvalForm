<?php
	include_once("create_class.php");
	
	class classes extends create_class{
		function classes(){
			create_class::create_class();
		}
		
		function get_class(){
			$query = "SELECT * FROM classes";
			return $this->query($query);
		}
        
        
        function insert_class($class,$teams){
				$query = "INSERT INTO create_teams(class,teams) VALUES('$class','$teams')";
				return $this->query($query);
			}
        	
			function update_class($class,$teams){
				$query = "UPDATE create_teams SET class='$class', teams='$teams' ";
				return $this->query($query);
			}
        
        
        
        
        
        }

		
         
		

		
	
?>