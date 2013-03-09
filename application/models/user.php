<?php
class User extends Eloquent
{
	public function blogs()
	{
		return $this->has_many('Blog');
	}
	public function photos()
	{
		return $this->has_many('Photo');
	}
	public function events()
	{
		return $this->has_many('Event');
	}
	public function groups()
	{
		return $this->has_many('Group');
	}
}