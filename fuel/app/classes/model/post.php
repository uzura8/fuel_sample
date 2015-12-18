<?php

class Model_Post extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'body' => array(
			'validation' => array('trim', 'required'),
		),
		'sort_order' => array(
			'validation' => array('required', 'valid_string' => array('numeric')),
		),
	);

	protected static $_observers = array(
		'Orm\Observer_Validation' => array(
			'events' => array('before_save'),
		),
	);

	public function save_with_sort_order($body)
	{
		$this->body = $body;
		if ( ! $this->sort_order)
		{
			$this->sort_order = self::get_max_sort_order() + 1;
		}

		return $this->save();
	}

	public static function get_max_sort_order()
	{
		return (int)self::query()->max('sort_order');
	}

	public static function get_all()
	{
		return self::query()->order_by(array('sort_order' => 'asc'))->get();
	}
}
