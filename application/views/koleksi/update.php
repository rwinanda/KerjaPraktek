<div class="container">
<div class="row mt-4">
  <div class="col">
    <div class="card">
    <?php foreach ($koleksi as $kol) : ?>
      <h5 class="card-header">Update Koleksi</h5>
      <div class="card-body">
        <form action="<?= base_url() ?>koleksi/prosesUpdateKoleksi/<?= $kol['id_koleksi'] ?>/<?= $kol['id_museum'] ?>" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="nama_koleksi">Nama Koleksi</label>
                <input type="text" class="form-control" name="nama_koleksi" id="nama_koleksi" value="<?= $kol['nama_koleksi'] ?>" placeholder="Masukan Nama Koleksi">
                  <input type="hidden" id="id_koleksi" name="id_koleksi" value="<?= $kol['id_koleksi'] ?> ">
            </div>
            <div class="form-group">
                <label for="kel_koleksi">Kelompok Koleksi</label>
                <input type="text" class="form-control" name="kel_koleksi" id="kel_koleksi" value="<?= $kol['kel_koleksi'] ?>" placeholder="Masukan Kelompok Koleksi" required>
            </div>
            <div class="form-group">
                <label for="lok_temuan">Lokasi Penemuan</label>
                <input type="text" class="form-control" name="lok_temuan" id="lok_temuan" value="<?= $kol['lok_temuan'] ?>" placeholder="Masukan Lokasi Penemuan" required>
            </div>
            <div class="form-group">
                <label for="bahan">Bahan</label>
                <input type="text" class="form-control" name="bahan" id="bahan" value="<?= $kol['bahan'] ?>" placeholder="Masukan Bahan" required>
            </div>
            <div class="form-group">
            <label for="thn_buat">Tahun Pembuatan</label>
                <input type="text" class="form-control" name="thn_buat" id="thn_buat" value="<?= $kol['thn_buat'] ?>" placeholder="Masukan Tahun Pembuatan" required>
            </div>
            <div class="form-group">
                <label for="gambarkoleksi">Gambar</label>
                <input type="file" id="gambarkoleksi" name="gambarkoleksi">
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Pendataan</label>
                <input type="date" id="tanggal" name="tanggal" value="<?= $kol['tanggal'] ?>" required>   
            </div>
            <div class="form-group">
                <label for="dokum_data">Dokumentasi Data</label>
                <input type="text" class="form-control" name="dokum_data" id="dokum_data" value="<?= $kol['dokum_data'] ?>" placeholder="Masukan Dokumentasi Data" required>
            </div>
            <div class="form-group">
                <label for="dokum_foto">Dokumentasi Foto</label>
                <input type="text" class="form-control" name="dokum_foto" id="dokum_foto" value="<?= $kol['dokum_foto'] ?>" placeholder="Masukan Dokumentasi Foto" required>
            </div>
            <div class="form-group">
                <label for="narasumber">Narasumber</label>
                <textarea class="form-control" name="narasumber" id="narasumber" placeholder="Masukan Narasumber" required><?= $kol['narasumber'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="panjang">Panjang</label>
                <textarea class="form-control" name="panjang" id="panjang" placeholder="Masukan Panjang Koleksi" required> <?= $kol['panjang'] ?> </textarea>
            </div>
            <div class="form-group">
                <label for="lebar">Lebar</label>
                <textarea class="form-control" name="lebar" id="lebar" placeholder="Masukan Lebar Koleksi" required><?= $kol['lebar'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="tinggi">Tinggi</label>
                <textarea class="form-control" name="tinggi" id="tinggi" placeholder="Masukan Tinggi Koleksi" required><?= $kol['tinggi'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="tebal">Tebal</label>
                <textarea class="form-control" name="tebal" id="tebal" placeholder="Masukan Tebal Koleksi" required><?= $kol['tebal'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="diameter">Diameter</label>
                <textarea class="form-control" name="diameter" id="diameter" placeholder="Masukan Diameter Koleksi" required><?= $kol['diameter'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="fungsi">Fungsi</label>
                <textarea class="form-control" name="fungsi" id="fungsi" placeholder="Masukan Fungsi" required><?= $kol['fungsi'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukan Deskripsi" required><?= $kol['deskripsi'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="sejarah">Sejarah</label>
                <textarea class="form-control" name="sejarah" id="sejarah" placeholder="Masukan Sejarah Koleksi" required><?= $kol['sejarah'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="no_dokum">Nomor Dokumentasi</label>
                <textarea class="form-control" name="no_dokum" id="no_dokum" placeholder="Masukan Nomor Dokumentasi Foto" required><?= $kol['no_dokum'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="lok_simpan">Lokasi Simpan</label>
                <textarea class="form-control" name="lok_simpan" id="lok_simpan" placeholder="Masukan Lokasi Tempat Simpan" required><?= $kol['lok_simpan'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="referensi">Referensi</label>
                <textarea class="form-control" name="referensi" id="referensi" placeholder="Masukan Referensi" required><?= $kol['referensi'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="lembaga">Lembaga</label>
                <textarea class="form-control" name="lembaga" id="lembaga" placeholder="Masukan Nama Lembaga" required><?= $kol['lembaga'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea class="form-control" name="catatan" id="catatan" placeholder="Masukan Catatan" required><?= $kol['catatan'] ?></textarea>
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
    <?php endforeach; ?>
</div>
</div>