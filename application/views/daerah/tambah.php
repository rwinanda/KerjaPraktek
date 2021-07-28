<div class="container">
<div class="row mt-4">
  <div class="col">
    <div class="card">
      <h5 class="card-header">Tambah Post</h5>
      <div class="card-body">
        <form action="<?= base_url() ?>daerah/prosesTambahDaerah/<?= $id ?>" enctype="multipart/form-data" method="POST">
            <input type="hidden" id="id_provinsi" name="id_provinsi" value="<?= $id ?> ">
            <div class="form-group">
            <label for="nama_daerah">Nama Daerah</label>
            <textarea class="form-control" name="nama_daerah" id="nama_daerah" placeholder="Masukan Nama Daerah" required></textarea>
            </div>
            <div class="form-group">
            <label for="gambardaerah">Gambar Daerah</label>
            <input type="file" id="gambardaerah" name="gambardaerah" required>
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
