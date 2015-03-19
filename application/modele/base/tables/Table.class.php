<?php

abstract class Table {
    
    /**
     * All tables must contain an id
     * The id is false if the instance is not in DB
     * Otherwise, the id is set to the current record
     */
    protected $id;
    
    
    /**
     *The CRUD Adpater
     */
    protected $crudAdapter;

    public function __construct() {
        $this->id = false;
        $this->crudAdapter = Controleur::$CRUDAdapter;
    }
    

    /** Save the instance inside DB.
     * Ask crudAdpater to do that
     */

    public function save() {
        $this->crudAdapter->save($this);
    }
    

    /** delete the instance from DB.
     * Ask crudAdpater to do that
     */
    public function delete() {
        $this->crudAdpater->delete($this);
    }
    /**
     * Return the table name
     * in fact return the name of the class in lower case
     * This is done by reflexion. PHP tells us the name of the (real) current class
     */
    public function getTableName() {
        return strtolower(get_class($this));
    }
    
    /**
     * @return true if the instance is not saved in DB
     */
    
    public function isNew() {
        return $this->id===false;
    }

    /**
     * @return the id of the current element
     */
    
    public function getId() {
        return $this->id;
    }
    
    /**
     * Change the id of the current element (only if it was not saved ie the instance was new)
	 * or set the curent element as new if it deleted from database
     */
    public function setId($id) {
        if(($this->id===false AND $id !== false)
			OR ($this->id!==false AND $id === false))
			$this->id = $id;
    }
    
}
