<?php
//Route::controller(Controller::detect());
Route::get('(:bundle)', function()
{
	return '欢迎使用管理后台';
});
Route::get('(:bundle)/pannel', function()
{
	return '欢迎使用管理后台控制面板'.URI::full().'cc'.Request::ip();
});
