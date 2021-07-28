<div class="container">
<div class="row mt-4">
  <div class="col">
    <div class="card">
    <?php foreach ($daerah as $kab) : ?>
      <h5 class="card-header">Update Daerah</h5>
      <div class="card-body">
        <form action="<?= base_url() ?>daerah/prosesUpdateDaerah/<?= $kab['id_daerah'] ?>/<?= $kab['id_provinsi'] ?>" enctype="multipart/form-data" method="POST">
          <div class="form-group">
            <label for="nama_daerah">Nama Daerah</label>
            <input type="text" class="form-control" name="nama_daerah" id="nama_daerah" value="<?= $kab['nama_daerah'] ?> " placeholder="Masukan Nama Daerah" >
              <input type="hidden" id="id_daerah" name="id_daerah" value="<?= $kab['id_daerah'] ?> ">
            </div>
            <div class="form-group">
            <label for="gambardaerah">Gambar</label>
            <input type="file" id="gambardaerah" name="gambardaerah" >
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
    <?php endforeach; ?>
</div>

</div>