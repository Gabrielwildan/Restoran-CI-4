<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="col-8">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        $error = session()->getFlashdata('info');
        foreach ($error as $key => $value) {
            echo $key . "=>" . $value;
            echo '</br>';
        }
        echo '</div>';
    }
    ?>
</div>

<div class="col">
    <h3> UPDATE DATA </h3>
</div>

<div class="col-8">
    <form action="<?= base_url('/admin/menu/update') ?>" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="" class="form-label">Kategori</label>
            <select class="form-control" name="idkategori" id="idkategori">
                <?php foreach ($kategori as $key => $value) : ?>
                    <option <?php if ($value['idkategori'] == $menu['idkategori']) echo 'selected' ?> value="<?= $value['idkategori'] ?>"><?= $value['kategori'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="menu" class="form-label">Menu</label>
            <input type="text" name="menu" value="<?= $menu['menu'] ?>" required class="form-control">
        </div>

        <div class="form-group">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" name="harga" value="<?= $menu['harga'] ?>" required class="form-control">
        </div>

        <div class="form-group">
            <label for="harga" class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <input type="hidden" name="gambar" value="<?= $menu['gambar'] ?>" required class="form-control">
        <input type="hidden" name="idmenu" value="<?= $menu['idmenu'] ?>" required class="form-control">

        <div class="form-group">
            <input class="btn btn-primary mt-3" type="submit" name="save" value="SAVE">
        </div>
    </form>
</div>

<?= $this->endSection() ?>