<div class="container">
<div class="row mt-4">
  <div class="col">
    <div class="card">
      <h5 class="card-header">Tambah Post</h5>
      <div class="card-body">
        <form action="<?php echo base_url() ?>prov/prosesTambahProv" enctype="multipart/form-data" method="POST">
          <div class="form-group">
            <label for="nama_provinsi">Nama Provinsi</label>
            <textarea class="form-control" name="nama_provinsi" id="nama_provinsi"  placeholder="Masukan Nama Provinsi" required></textarea>
            </div>
            <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" id="gambar" name="gambar" required>
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
