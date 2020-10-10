<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Training</title>

	<?php wp_head(); ?>

    <style>
        body {
            padding-top: 3.5rem;
        }
        img {
            width: 100%;
            height: auto;
        }
    </style>

</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php home_url(); ?>">Workout</a>
	    <?php wp_nav_menu( [
		    'container_class' => 'collapse navbar-collapse',
		    'menu_class'      => 'navbar-nav mr-auto',
		    'theme_local'     => 'workout',
	    ] ); ?>
    </div>
</nav>

<main role="main">