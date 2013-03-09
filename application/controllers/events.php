<?php
class Events_Controller extends Base_Controller
{
    public function action_index()
    {
		$events = Events::with('author')->order_by('created_at', 'desc')->paginate(20);
		
		return View::make('events.index')->with('events', $events);
    }
    

}