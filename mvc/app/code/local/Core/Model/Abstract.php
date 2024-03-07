<?php
class Core_Model_Abstract{
    protected $_data=[];
    protected $data=[];
    protected $resourceClass='';
    protected $collectionClass='';
    protected $modelClass= '';
    protected $resource=null;
    protected $collection=null;

    public function __construct(){
        $this->init();
    }

    public function init(){ 

    }

    public function setResourceClass($resourceClass){

    }

    public function setCollectionClass($collectionClass){

    }

    public function setId($id){
        //  echo 'no:core_model_abstract';
        //  echo $this->_data[$this->getResource()->getPrimaryKey()];
         $this->_data[$this->getResource()->getPrimaryKey()] = $id;
         return $this;
    }

    public function getId(){
        //return $this->_data[$this->getResource()->getPrimaryKey()];
        //  echo isset($this->_data[$this->getResource()->getPrimaryKey()])
        //  ?$this->_data[$this->getResource()->getPrimaryKey()]
        //  :false;
        return isset($this->_data[$this->getResource()->getPrimaryKey()])
        ?$this->_data[$this->getResource()->getPrimaryKey()]
        :false;
    }

    public function __call($name, $args) {
         $name = $this->camelTodashed(substr($name, 3));
        //$name = substr($name, 3);
        

        return isset($this->_data[$name]) 
             ? $this->_data[$name]
             :'';
            //: (isset($args[0])?$args[0]:null);
 
    }

    public function dashesToCamelCase($string, $capitalizeFirstCharacter = false) 
    {
        $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }
        return $str;
    }
    public function camelTodashed($className) {
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1_', $className));
    }
    
    public function getResource(){
        return new $this->resourceClass();
    }

    public function getCollection(){
        $collection = new $this->collectionClass();
        // var_dump($collection);
        $collection->setResource($this->getResource());
        $collection->setModelClass($this->modelClass);
        $collection->select();
       // echo "<pre>"."core-model-abstract";
        //var_dump($collection);
        return $collection;
    }

    // public function getPrimaryKey(){

    // }

    

    // public function getTablename(){

    // }

    public function __set($key,$value){

    }

    public function __get($key){

    }

    public function __unset($key){

    }

    public function getData($key=null){
        return $this->_data;
    }

    public function setData($data){
        $this->_data=$data;
        return $this;
    }

    public function addData($key,$value){
        $this->_data[$key] = $value;
        return $this;
    }

    public function removeData($key=null){

    }

    protected function _beforeSave()
    {
        return $this;
    }
    protected function _afterSave()
    {
        return $this;
    }

    public function save(){
    
      // echo 123; print_r($this->getData());
        $this->_beforeSave();
        $this->getResource()->save($this);
         $this->_afterSave();
        return $this;
    }

    public function delete(){
        $this->getResource()->delete($this);
        return $this;
    }

    public function load($id,$column=null){
        $this->_data=$this->getResource()->load($id,$column);
        return $this;
        //$data=$this->getResource()->load($id,$column);
        //echo get_class($this->getResource());
        // echo $_tableName=$this->getResource()->getTablename();
        // echo $_primaryKey=$this->getResource()->getPrimaryKey();
        //echo "SELECT * FROM {$this->getResource()->getTablename()} WHERE {$this->getResource()->getPrimaryKey()}= 1 LIMIT 1";
    }

    
}
?>