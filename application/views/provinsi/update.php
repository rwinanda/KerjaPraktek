<div class="container">
<div class="row mt-4">
    <?php foreach ($provinsi as $provin) : ?>
  <div class="col">
    <div class="card">
      <h5 class="card-header">Update Provinsi</h5>
      <div class="card-body">
        <form action="<?= base_url() ?>prov/prosesUpdateProv/<?= $provin['id_provinsi'] ?>" enctype="multipart/form-data" method="POST">
          <div class="form-group">
            <label for="nama_provinsi">Nama Provinsi</label>
            <input type="text" class="form-control" name="nama_provinsi" id="nama_provinsi" value="<?= $provin['nama_provinsi'] ?> " placeholder="Masukan Nama Provinsi">
              <input type="hidden" id="id_provinsi" name="id_provinsi" value="<?= $provin['id_provinsi'] ?> ">
            </div>
            <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" id="gambar" name="gambar">
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
    <?php endforeach; ?>
</div>

</div>