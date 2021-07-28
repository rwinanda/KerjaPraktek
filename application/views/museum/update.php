<div class="container">
<div class="row mt-4">
  <div class="col">
    <div class="card">
    <?php foreach ($museum as $mus) : ?>
      <h5 class="card-header">Update Museum</h5>
      <div class="card-body">
        <form action="<?= base_url() ?>museum/prosesUpdateMuseum/<?= $mus['id_museum'] ?>/<?= $mus['id_daerah'] ?>" enctype="multipart/form-data" method="POST">
          <div class="form-group">
            <label for="nama_museum">Nama Museum</label>
            <input type="text" class="form-control" name="nama_museum" id="nama_museum" value="<?= $mus['nama_museum'] ?>" placeholder="Masukan Nama Museum">
              <input type="hidden" id="id_museum" name="id_museum" value="<?= $mus['id_museum'] ?> ">
            </div>
            <div class="form-group">
            <label for="gambardaerah">Gambar</label>
            <input type="file" id="gambarmuseum" name="gambarmuseum" >
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
    <?php endforeach; ?>
</div>

</div>