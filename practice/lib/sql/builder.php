<?php

class lib_sql_builder extends Lib_Connection{

    public function __construct() {
        //echo get_class($this);
    }

    function select($table,$columns,$condition){
        $col=[];
        foreach($columns as $_field){
                $col[]="{$_field}";
        }
        $cols = implode(",",$col);
        return "SELECT {$cols} FROM {$table} $condition";
        }
    
    
    
        function insert($table,$data){
            $columns=$values=[];
            foreach($data as $_field => $_value){
                    //$columns[]="{$_field}";
                    //$values[]="'".addslashes($_value)."'";
                    $columns[]=sprintf("%s",$_field);
                    $values[]=sprintf("'%s'",addslashes($_value));
            }
            
            $columns = implode(",",$columns);
            $values=implode(",",$values);
            //echo "INSERT INTO {$table} ({$columns}) VALUES ({$values});";echo"<br>";
            return "INSERT INTO {$table} ({$columns}) VALUES ({$values});";
        }
    
        function update($table,$data,$condition){
            $columns=$condit=[];
            foreach($data as $_field => $_values){
                $columns[]="`{$_field}`="."'".addslashes($_values)."'";
            }
            $columns=implode(",",$columns);
            foreach($condition as $_field=> $_values){
                $condit[]="`{$_field}`=".addslashes($_values);
            }
            $condit=implode(" AND ",$condit);
            // echo "UPDATE {$table} SET {$columns} WHERE {$condit};";echo"<br>";
                return "UPDATE {$table} SET {$columns} WHERE {$condit};";
        }
    
        function delete($table,$condition){
            $condit=[];
            foreach($condition as $_field => $_values){
                $condit[]="`{$_field}`="."'".addslashes($_values)."'";
            }
            $condit=implode(" AND ",$condit);
            //echo "DELETE FROM {$table} WHERE {$condit};";echo"<br>";
            return "DELETE FROM {$table} WHERE {$condit};";
        }
    
    }
 

?>