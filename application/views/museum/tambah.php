<div class="container">
<div class="row mt-4">
  <div class="col">
    <div class="card">
      <h5 class="card-header">Tambah Museum</h5>
      <div class="card-body">
        <form action="<?= base_url() ?>museum/prosesTambahMuseum/<?= $id ?>" enctype="multipart/form-data" method="POST">
            <input type="hidden" id="id_daerah" name="id_daerah" value="<?= $id ?> ">
            <div class="form-group">
            <label for="nama_museum">Nama Museum</label>
            <textarea class="form-control" name="nama_museum" id="nama_museum" placeholder="Masukan Nama Museum" required></textarea>
            </div>
            <div class="form-group">
            <label for="gambarmuseum">Gambar Museum</label>
            <input type="file" id="gambarmuseum" name="gambarmuseum" required>
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>