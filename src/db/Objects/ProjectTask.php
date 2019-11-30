<?php 

class Project {
	public $id;
    public $projectId;
    public $taskID;

	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

    /**
     * Get the value of projectId
     */ 
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Set the value of projectId
     *
     * @return  self
     */ 
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * Get the value of taskID
     */ 
    public function getTaskID()
    {
        return $this->taskID;
    }

    /**
     * Set the value of taskID
     *
     * @return  self
     */ 
    public function setTaskID($taskID)
    {
        $this->taskID = $taskID;

        return $this;
    }
}

?>