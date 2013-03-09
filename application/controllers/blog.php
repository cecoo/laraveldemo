<?php
class Blog_Controller extends Base_Controller
{
	public function action_index()
	{
			// lets get our posts and eager load the
		// author
		$blogs = Blog::with('author')->order_by('created_at', 'desc')->paginate(20);
		// show the home view, and include our
		// posts too
		//$posts->appends(array('a' => 'app'));
		//print_r($blogs);exit;
		return View::make('blog.index')->with('blogs', $blogs);
	}

	public function action_add()
	{
		$method = Request::method();
		if($method =='POST'){
		

			// let's setup some rules for our new data
			// I'm sure you can come up with better ones
	   $rules = array(
		'title' 	=> 'required|min:3|max:128',
		'content' 		=> 'required',	
		'file' => 'mimes:jpg,gif,png'	
		);
        //
		//Input::upload('picture', 'path/to/pictures', 'filename.ext');
		//File::cpdir($directory, $destination);
		//File::rmdir($directory);
		//echo File::mime('gif'); // outputs 'image/gif'
		//if (File::is('jpg', 'path/to/file.jpg'))
		//{
		//File::extension('picture.png');File::delete('path/to/file');
		//File::append('path/to/file', 'appended file content');
		//}File::put('path/to/file', 'file contents');$contents = File::get('path/to/file');
		// make the validator
			// let's get the new post from the POST data
			// this is much safer than using mass assignment
		$image = Input::file();
		$pictrue = '';
		$title = Input::get('title');
		$content = Input::get('content');
		$description = Input::get('title');
		if(empty($description)) $description = substr($content,0, 120);
		$author_id =Input::get('author_id');
		$tags =Input::get('tags');
		if(!empty($image['file']['name'])){
			$ext = File::extension($image['file']['name']);//$image['file']['tmp_name']
			Input::upload('file', path('public').'data', md5(date('YmdHis').$image['file']['name']).'.'.$ext);
			$pictrue = md5(date('YmdHis').$image['file']['name']).'.'.$ext;
		}
		
		$new_blog = array(
		'title' 	=> $title,
		'description' 	=> $description,
		'content' 		=> $content,
		'author_id' => $author_id,
		'views' => 0,
		'pictrue'   => $pictrue,
		'tags'   => $tags
			);
		$v = Validator::make($new_blog, $rules);

		if ( $v->fails() )
		{
			// redirect back to the form with
			// errors, input and our currently
			// logged in user
			return Redirect::to('blog/add')
			->with('user', Auth::user())
			->with_errors($v)
			->with_input();
		}
		

		// create the new post
		$blog = new Blog($new_blog);
		$blog->save();
	
		// redirect to viewing our new post
		return Redirect::to('blog/view/'.$blog->id);
		}
		else{
			// get the current user
			$user = Auth::user();

			// show the create post form, and send
			// the current user to identify the post author
			return View::make('blog.add')->with('user', $user);
		}


	}

	public function action_edit($id)
	{
		$method = Request::method();
		$user = Auth::user();

		$blog = Blog::find($id);
		if($user->id != $blog->author->id)
		{
			return View::make('blog.view')
			->with('blog', $blog);
		}
		if($method =='POST')
		{
         
			// let's setup some rules for our new data
			// I'm sure you can come up with better ones
	   $rules = array(
		'title' 	=> 'required|min:3|max:128',
		'content' 		=> 'required',	
		'file' => 'mimes:jpg,gif,png'	
		);
        //
		//Input::upload('picture', 'path/to/pictures', 'filename.ext');
		//File::cpdir($directory, $destination);
		//File::rmdir($directory);
		//echo File::mime('gif'); // outputs 'image/gif'
		//if (File::is('jpg', 'path/to/file.jpg'))
		//{
		//File::extension('picture.png');File::delete('path/to/file');
		//File::append('path/to/file', 'appended file content');
		//}File::put('path/to/file', 'file contents');$contents = File::get('path/to/file');
		// make the validator
			// let's get the new post from the POST data
			// this is much safer than using mass assignment
		$image = Input::file();
		$pictrue = '';
		$title = Input::get('title');
		$content = Input::get('content');
		$description = Input::get('title');
		if(empty($description)) $description = substr($content,0, 120);
		$author_id =Input::get('author_id');
		$tags =Input::get('tags');
		if(!empty($image['file']['name'])){
			$ext = File::extension($image['file']['name']);//$image['file']['tmp_name']
			Input::upload('file', path('public').'data', md5(date('YmdHis').$image['file']['name']).'.'.$ext);
			$pictrue = md5(date('YmdHis').$image['file']['name']).'.'.$ext;
		}
		
		$new_blog = array(
		'title' 	=> $title,
		'description' 	=> $description,
		'content' 		=> $content,
		'author_id' => $author_id,
		'views' => 0,
		'pictrue'   => $pictrue,
		'tags'   => $tags
			);
		$v = Validator::make($new_blog, $rules);

		if ( $v->fails() )
		{
			// redirect back to the form with
			// errors, input and our currently
			// logged in user
			return Redirect::to('blog/add')
			->with('user', Auth::user())
			->with_errors($v)
			->with_input();
		}
		
		$blog->title = $title;
		$blog->description = $description;
		$blog->content = $content;
		$blog->author_id = $author_id;
		$blog->tags = $tags;
	    if(!empty($pictrue)) $blog->pictrue = $pictrue;
		$blog->save();

		// redirect to viewing our new post
		return Redirect::to('blog/view/'.$blog->id);
		}
		else
		{

			// show the full view, and pass the post
			// we just aquired
			return View::make('blog.edit')->with('blog', $blog);
		}
	}

	public function action_view($id)
	{
		// get our post, identified by the route
		// parameter
		$blog = Blog::find($id);
        $blog->views += 1;
        $blog->save();
		// show the full view, and pass the post
		// we just aquired
		return View::make('blog.view')
		->with('blog', $blog);
	}

	public function action_delete($id)
	{
	}

	public function action_search()
	{
		return View::make('blog.search');
	}
}