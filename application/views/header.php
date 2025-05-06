<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Website</title>

  <!-- Material Icons -->
  <link href="<?= site_url('asset/font/material-icon/material-icons.css'); ?>" rel="stylesheet">
  <!-- Materialize CSS -->
  <link type="text/css" rel="stylesheet" href="<?= site_url('asset/css/materialize.min.css'); ?>" media="screen,projection"/>
  
  <style>
    .nav-wrapper {
        background: linear-gradient(to right, #ffe259, #ffa751); /* warm gradient */
    }

    .brand-logo {
      font-family: 'Segoe UI', sans-serif;
      font-weight: bold;
      color: #5d4037;   
      padding-left: 20px;
      margin-left: 20px;
    }

    .nav-wrapper ul li a {
      font-weight: 500;
    }

    .sidenav {
      background-color: #fff5f0;
    }

    .sidenav li a {
      color: #5d4037;
      font-weight: 500;
    }

    .sidenav li.divider {
      background-color: #ffccbc;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">
        <a href="<?= site_url(); ?>" class="brand-logo">Stecu Kalcer</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="<?= base_url('Welcome/create'); ?>">Create User</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <!-- Mobile Menu -->
  <ul class="sidenav" id="mobile-demo">
    <li><a href="<?= site_url(); ?>">Home</a></li>
    <li><a href="<?= site_url('welcome/create'); ?>">Create</a></li>
    <li class="divider"></li>
    <li><a href="#">Login</a></li>
  </ul>

  <!-- Materialize JS -->
  <script type="text/javascript" src="<?= site_url('asset/js/materialize.min.js'); ?>"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.sidenav');
      M.Sidenav.init(elems);
    });
  </script>

  <main class="container">
