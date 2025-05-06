<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
  .profile-container {
    max-width: 400px;
    margin: 40px auto;
    padding: 32px;
    background-color: #f4f4f4;
    border-radius: 12px;
    position: relative;
    text-align: center;
  }

  .profile-image-wrapper {
    position: relative;
    display: inline-block;
    margin-bottom: 20px;
  }

  .profile-image {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    background-color: #ccc;
    object-fit: cover;
  }

  .edit-button {
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: #1976d2;
    color: #fff;
    border-radius: 50%;
    width: 36px;
    height: 36px;
    border: none;
    cursor: pointer;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .file-input {
    display: none;
  }
</style>

<div class="profile-container z-depth-2">
  <?php if ($this->session->flashdata('error')): ?>
    <p style="color: red;"><?= $this->session->flashdata('error'); ?></p>
  <?php endif; ?>

  <form action="<?= site_url('welcome/create'); ?>" method="post" enctype="multipart/form-data">

    <!-- Profile Picture -->
    <div class="profile-image-wrapper">
      <img src="<?= base_url('assets/img/default-profile.png'); ?>" alt="Profile" class="profile-image" id="preview-img">
      <label for="image1" class="edit-button">Edit</label>
      <input type="file" name="image1" id="image1" class="file-input" accept=".jpg,.jpeg,.png" onchange="previewImage(this)">
    </div>

    <!-- Nama -->
    <div class="input-field">
      <input name="name" id="name" type="text" required>
      <label for="name">Nama</label>
    </div>

    <!-- Job Position -->
    <div class="input-field">
      <input name="description" id="description" type="text" required>
      <label for="description">Job Position</label>
    </div>

    <!-- Submit -->
    <div class="input-field">
      <button type="submit" class="btn blue darken-2">Simpan Profil</button>
    </div>

  </form>
</div>

<script>
  function previewImage(input) {
    const file = input.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('preview-img').src = e.target.result;
      }
      reader.readAsDataURL(file);
    }
  }
</script>
