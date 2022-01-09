<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="<?= base_url("public/fontawesome/css/all.min.css") ?>" rel="stylesheet">
	<link href="<?= base_url("public/css/style.css") ?>" rel="stylesheet">

	<title>Pagina de Gatos</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="<?= base_url('public/img/cat_logo.png') ?>" alt="" width="30" height="24" class="d-inline-block align-text-top">
				Gatitos System
			</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link <?= (isset($page) ? ($page == "home" ? "active" : "") : "")  ?>" href="<?= base_url() ?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= (isset($page) ? ($page == "list" ? "active" : "") : "")  ?>" href="<?= base_url("gato/list") ?>">Lista</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= (isset($page) ? ($page == "new" ? "active" : "") : "")  ?>" href="<?= base_url("gato/new") ?>">Nuevo</a>
					</li>
				</ul>
			</div>

		</div>
	</nav>
