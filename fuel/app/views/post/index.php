<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FuelPHP Framework</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<div class="container">
	<div class="header clearfix">
		<h3 class="text-muted">Project name</h3>
	</div>

<?php if ($error_message): ?>
	<div class="alert alert-danger" role="alert"><?php echo $error_message; ?></div>
<?php endif; ?>

	<h1>Test</h1>

	<div class="well">
		<?php echo Form::open(null, array(Config::get('security.csrf_token_key') => Security::fetch_token())); ?>
		<form method>
			<div class="form-group">
				<label for="body">本文</label>
				<textarea name="body" class="form-control" rows="2"></textarea>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		<?php echo Form::close(); ?>
	</div>

<?php if ($posts): ?>
	<table class="table">
		<tr>
			<th>id</th>
			<th>body</th>
			<th>sort_order</th>
		</tr>
<?php foreach ($posts as $post): ?>
		<tr>
			<td><?php echo $post->id; ?></td>
			<td><?php echo $post->body; ?></td>
			<td><?php echo $post->sort_order; ?></td>
		</tr>
<?php endforeach; ?>
	</table>
<?php endif; ?>

	<footer class="footer">
		<p>&copy; 2015 Company, Inc.</p>
	</footer>
</div> <!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<?php echo Asset::js('bootstrap.js'); ?>
</body>
</html>
