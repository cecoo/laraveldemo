<?php
class Group_Controller extends Base_Controller
{
    public function action_index()
    {
        $groups = Group::with('author')->order_by('created_at', 'desc')->paginate(20);
		return View::make('group.index')->with('groups', $groups);
    }
    

}