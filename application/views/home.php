<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Profile List</title>
  <link href="<?= site_url('asset/font/material-icon/material-icons.css'); ?>" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="<?= site_url('asset/css/materialize.min.css'); ?>" media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    body {
      background-color: #ffffff;
      color: #f5f5f5;
      font-family: 'Segoe UI', sans-serif;
    }

    h4 {
      font-weight: bold;
      text-align: center;
      margin-top: 40px;
      color: #000;
      margin-bottom: 40px;
    }

    .profile-card {
      background-color: #ffffff;
      color: #000;
      border: 2px solid #fff;
      border-radius: 12px;
      padding: 20px;
      text-align: center;
      position: relative;
      margin-bottom: 20px;
      transition: transform 0.2s ease-in-out;
    }

    .profile-card:hover {
      transform: scale(1.03);
      box-shadow: 0 4px 20px rgba(255, 255, 255, 0.1);
    }

    .profile-image {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background-color: #444;
      margin: 10px auto 20px;
      overflow: hidden;
    }

    .profile-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .input-display {
      background-color: transparent;
      border: 1px solid #000;
      padding: 8px 12px;
      border-radius: 6px;
      color: #000;
      margin-bottom: 10px;
      font-size: 14px;
    }

    .action-links {
      position: absolute;
      top: 10px;
      left: 5px;
      width: 100%;
      display: flex;
      justify-content: space-between;
      padding: 0 10px;
      font-size: 13px;
    }

    .action-links a {
      color: #000;
      text-decoration: none;
      font-weight: bold;
    }

    .no-data {
      text-align: center;
      color: #ccc;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <main class="container">
    <h4>User Profile List</h4>
    <div class="row">
      <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $p): ?>
          <div class="col s12 m6 l3">
            <div class="profile-card z-depth-2">
              <div class="action-links">
                <a href="<?= site_url('welcome/update/' . $p->id); ?>">edit</a>
                <a href="<?= site_url('welcome/delete/' . $p->id); ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">delete</a>
              </div>
              <div class="profile-image">
                <img src="<?= base_url('upload/post/' . $p->filename); ?>" alt="Profile">
              </div>
              <div class="input-display"><?= htmlspecialchars($p->name); ?></div>
              <div class="input-display"><?= htmlspecialchars($p->description); ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="no-data">Tidak ada data pengguna tersedia.</p>
      <?php endif; ?>
    </div>
  </main>

  <script src="<?= site_url('asset/js/materialize.min.js'); ?>"></script>
</body>
</html>
