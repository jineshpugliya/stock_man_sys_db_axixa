<?php 
function getsubcat($id="",$r='name'){
    
    $dbobj=new Db('subcategories');
    if($id)
        return $dbobj->find($id,$r)[$r];
    return $dbobj->all();

}
function getcat($id="", $r = 'name')
{
    $dbobj = new Db('categories');
    if($id)
        return $dbobj->find($id, $r)[$r];
    return $dbobj->all();

}