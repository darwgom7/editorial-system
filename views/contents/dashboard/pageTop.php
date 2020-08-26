<?php
require_once './controllers/SessionController.php';
$session = new SessionController();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Editorial System</title>
		<link rel="stylesheet" href="./views/assets/styles/dashboard.css" />
		<link rel="stylesheet" href="./views/assets/styles/asidebar.css" />
		<link rel="stylesheet" href="./views/assets/styles/form.css" />
		<link rel="stylesheet" href="./views/assets/styles/button.css" />
		<link rel="stylesheet" href="./views/assets/styles/table-editorial-branch.css" />
		<link rel="stylesheet" href="./views/assets/styles/alert.css" />
		<link rel="stylesheet" href="./views/assets/styles/dialog.css" />
	</head>
	<body>
		<div class="container grid">
			<header class="header item"><h1>Editorial</h1></header>
			<nav id="topbar" class="nav item">
				<h4>Usuario!</h4>
				<a id="logout" class="form__link form__link--warning" href=""
					>Cerrar sesion</a
				>
			</nav>
			<aside id="sidebar" class="aside item">
				<nav class="sidenav sidenav__content" id="sidenav">
					<!--seccion contenedor imagen dashboard-->
					<figure class="sidenav__figure">
						<img
							class="sidenav__figure--image"
							src="./views/assets/images/dashboard_50.png"
							alt="logo dashboard"
						/>
						<figcaption class="sidenav__figure--info">
							Administrador
						</figcaption>
					</figure>
					<!--seccion contenedor link navegacion-->
					<ul class="sidenav__list">
					    <a class="link" href="home">
							<li class="sidenav__list--item">
								<img
									class="sidenav__list--item-icon"
									src="./views/assets/images/home_20.png"
									alt="icon user"
								/><span>Inicio</span>
							</li>
						</a>
						<a class="link" href="editorialBranch">
							<li class="sidenav__list--item">
								<img
									class="sidenav__list--item-icon"
									src="./views/assets/images/editorial-branch_20.png"
									alt="icon user"
								/><span>Sucursal</span>
							</li>
						</a>
						<li class="sidenav__list--item">
							<img
								class="sidenav__list--item-icon"
								src="./views/assets/images/publication_20.png"
								alt="icon user"
							/><span>Publicacion</span>
						</li>
					</ul>
				</nav>
			</aside>
			<section class="section item">
