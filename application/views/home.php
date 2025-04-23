<?php 
echo $this->session->flashdata('error');
?>

<ul class="collection">
  <?php foreach ($home_post as $data):?>
    <li class="collection-item avatar">
        <img src="<?= site_url('upload/post/'.$data['filename']); ?>" alt="" class="circle">
        <p class="title" style="font-weight: bold"><?= $data['name']; ?></p>
        <small><?= $data['description']; ?></small>
        <a href="<?= site_url('welcome/index/'.$data['id']); ?>" class="secondary_content">
          <i class="material-icons" style="margin-left: 50px">visibility</i>
        </a>
    </li>
<?php endforeach; ?>

</ul>

