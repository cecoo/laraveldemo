<?php
class Group extends Eloquent
{
    private $rules = array(
        'name' => 'required|max:80',
        'description'  => 'required',
        'description'  => 'required',
    );
    private $errors;
	public function author()
    {
    	return $this->belongs_to('User', 'author_id');
    }
    
    public function validate($data)
    {
    	$v = Validator::make($data, $this->rules);
    	if($v->fails())
    	{
    		$this->errors = $v->errors;
    		return false;
    	}
    	return true;
    }
    
    public function errors()
    {
    	return $this->errors;
    }
}