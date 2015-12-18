<?php

class Controller_Post extends Controller
{
	public function action_index()
	{
		$post = Model_Post::forge();
		$val = self::get_validation($post);
		$posted = array();
		$error_message = '';

		if (Input::method() == 'POST')
		{
			try
			{
				if ( ! Security::check_token()) throw new FuelException('csrf error');
				if ( ! $val->run()) throw new FuelException($val->show_errors());
				$posted = $val->validated();

				DB::start_transaction();
				$post->save_with_sort_order($posted['body']);
				DB::commit_transaction();
			}
			catch(FuelException $e)
			{
				if (DB::in_transaction()) DB::rollback_transaction();
				$error_message = $e->getMessage();
			}
		}

		$posts = Model_Post::get_all();

		return Response::forge(View::forge('post/index', array(
			'posted' => $posted,
			'error_message' => $error_message,
			'posts' => $posts,
		)));
	}

	private static function get_validation(Model_Post $post)
	{
		$val = Validation::forge();
		$val->add_model($post);
		$val->field('sort_order')->delete_rule('required');

		return $val;
	}
}
