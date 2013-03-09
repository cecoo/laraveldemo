<?php
class Photo_Controller extends Base_Controller
{
    public function action_index()
    {
    	$photos = Photo::with('author')->order_by('created_at', 'desc')->paginate(20);
		return View::make('photo.index')->with('photos', $photos);
    }

}