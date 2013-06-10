<?php

class Home_Controller extends Base_Controller {

	public function action_index()
	{
		// METHOD (3)
		$view = View::make('home.index');
		$view->title = 'Homepage';
		$view->greeting = 'Hi';
		$view->thing = 'Everybody';
		$view->items = array('item 1','item 2','item 3','item 4');

		return $view;
	}
	
	public function action_about()
	{
		$view = View::make('home.about');
		$view->title = 'About This Lab';

		return $view;	
	}

}