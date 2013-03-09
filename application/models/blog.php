<?php
class Blog extends Eloquent
{
    private $rules = array(
        'title' => 'required|max:80',
        'content'  => 'required',
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