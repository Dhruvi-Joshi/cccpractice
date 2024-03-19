<?php

class Core_Model_Resource_Collection_Abstract{
    
    protected $_resource = null;
    protected $_modelClass = [];
    protected $_select = [];
    protected $_isLoaded = false;
    protected $_data = [];

    public function setResource(Core_Model_Resource_Abstract $resource) {
        $this->_resource = $resource;
        return $this;
    }

    public function setModelClass($modelClass)
    {
         //echo "123";
        $this->_modelClass = $modelClass;
        return $this;
    }

    public function getData()
    {
        if (!$this->_isLoaded) {
            $this->load();
        }
        return $this->_data;
    }

    public function getFirstItem(){
        if (!$this->_isLoaded) {
            $this->load();
            //echo 123333;
        }
         //echo 133;print_r($this->_data[0]);
        return $this->_data[0];
    }

    public function select() {
        // echo 1;
        $this->_select['from'] = $this->_resource->getTablename();
        return $this;
    }

    public function addFieldToFilter($column, $filter) {
        // echo 2;
        //print_r ( $column .''. $filter .'');
        $this->_select['where'][$column][] = $filter; //echo=8(value) 
        return $this;
    }

    public function groupBy($field)
    {
        $this->_select['group'][] = $field;
        return $this;
    }


    public function load()
        {
            // echo 3;
            $sql = "SELECT * FROM {$this->_select['from']} ";
            //echo $sql;
            if(isset($this->_select['where']) && count($this->_select['where'])) {
                 //var_dump($this->_select['where']);
                $whereCond = [];
                foreach($this->_select['where'] as $_field => $_filters){
                   
                    foreach($_filters as $_value){    
                        if(!is_array($_value)) {
                            $_value = ['eq' => $_value];
                        }
                        //var_dump($_value);
                        foreach($_value as $_k => $_v){
                            switch ($_k) {
                                case 'gt':
                                    $whereCond[] = "`$_field` > '{$_v}' ";
                                    break;
                                case 'in':
                                    $whereCond[] = "`$_field` IN ( '{$_v}') ";
                                    break;
                                case 'eq':
                                    $whereCond[] = "`$_field` = '{$_v}' ";
                                    break;
                                // default:
                                    // $whereCond[] = "";
                            }
                        }
                    }
                    // $whereCond = implode(" AND ", $whereCond);
                    // $sql .= "WHERE $whereCond";
                }
                $whereCond = implode(" AND ", $whereCond);
                    $sql .= "WHERE $whereCond";
            }

            if(isset($this->_select['group']) && count($this->_select['group'])) {
                $sql .= " GROUP BY " . implode(', ', $this->_select['group']);
            }
            //echo $sql;echo"<br>";
            $result = $this->_resource->getAdapter()->fetchAll($sql);
            //print_r($result);
            foreach($result as $row) {
                $this->_data[] = Mage::getModel('catalog/product')->setData($row);
            }
            $this->_isLoaded = true;
            return $this;
        }

    
}



?>