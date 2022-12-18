<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="row">
    <?= view_cell('\App\Controllers\Admin\Menu::option') ?>
</div>
<div class="row">

    <h1> UPLOAD IMAGE </h1>

    <form action="<?= base_url('/admin/menu/insert') ?>" method="post" enctype="multipart/form-data">
        Image : <input type="file" name="gambar" required>

        <br>
        <input type="submit" name="save" value="SAVE">
    </form>

</div>

<?= $this->endSection() ?>