<?php
 class model_abstract{
    public function getquerybuilder(){
        return new lib_sql_builder();
    }

    public function getdataobject(){
        return new lib_dataobject();
    }
}

?>