<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
  .update-container {
    max-width: 600px;
    margin: 40px auto;
    padding: 32px;
    background-color: #f4f6f8;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  .form-title {
    margin-bottom: 24px;
    font-size: 24px;
    font-weight: 600;
    text-align: center;
    color: #1976d2;
  }

  .image-preview {
    max-height: 200px;
    margin: 20px auto;
    display: block;
    border-radius: 12px;
    object-fit: cover;
  }

  .file-label {
    margin-top: 12px;
  }

  .submit-btn {
    margin-top: 28px;
    width: 100%;
    padding: 12px;
    font-size: 16px;
    border-radius: 8px;
  }

  .error-text {
    color: red;
    font-size: 14px;
    margin-bottom: 16px;
    text-align: center;
  }
</style>

<div class="update-container z-depth-2">
  <div class="form-title">Edit Profil</div>

  <?php if (validation_errors()): ?>
    <div class="error-text"><?= validation_errors(); ?></div>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')): ?>
    <div class="error-text"><?= $this->session->flashdata('error'); ?></div>
  <?php endif; ?>

  <form action="<?= site_url('welcome/update/'.$post->id); ?>" method="post" enctype="multipart/form-data">
    
    <!-- Nama -->
    <div class="input-field">
      <input name="name" id="name" type="text" class="validate" value="<?= $post->name; ?>" required>
      <label for="name" class="active">Nama</label>
    </div>

    <!-- Deskripsi -->
    <div class="input-field">
      <textarea name="description" id="description" class="materialize-textarea" required><?= $post->description; ?></textarea>
      <label for="description" class="active">Job Position</label>
    </div>

    <!-- Gambar -->
    <img class="responsive-img image-preview" id="image" src="<?= site_url('upload/post/'.$post->filename); ?>" alt="Preview Gambar">

    <div class="file-field input-field">
      <div class="btn blue darken-2">
        <span>Upload Gambar</span>
        <input type="file" name="image1" id="file" accept=".jpg,.jpeg,.png" onchange="thumbnail();">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Pilih gambar baru (opsional)">
      </div>
    </div>

    <!-- Submit -->
    <button class="btn blue darken-2 submit-btn" type="submit">Simpan Perubahan</button>
  </form>
</div>

<script type="text/javascript">
  M.textareaAutoResize(document.querySelector('#description'));

  function thumbnail() {
    const preview = document.querySelector('#image');
    const file = document.querySelector('#file').files[0];
    const reader = new FileReader();

    reader.onloadend = function () {
      preview.src = reader.result;
    }

    if (file) {
      reader.readAsDataURL(file);
    }
  }
</script>
