<?php 

    class ConversaoData{
        
        public function paraMySQL($data){
            
            $dataArray = array();
            
            $dataArray = explode("/", $data);
            
            $dataMySQL = $dataArray[2]."-".$dataArray[1]."-".$dataArray[0];
            
            return $dataMySQL;
            
        }
        
        public function paraString($dataMySQL){
            
            $dataArray = array();
            
            $dataArray = explode("-", $dataMySQL);
            
            $data = $dataArray[2]."/".$dataArray[1]."/".$dataArray[0];
            
            return $data;
            
        }
        
    }

?>