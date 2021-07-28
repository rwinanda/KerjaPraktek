<div class="container">
<div class="row mt-4">
  <div class="col">
    <div class="card">
      <h5 class="card-header">Tambah Koleksi</h5>
      <div class="card-body">
        <form action="<?= base_url() ?>koleksi/prosesTambahKoleksi/<?= $id ?>" enctype="multipart/form-data" method="POST">
            <input type="hidden" id="id_museum" name="id_museum" value="<?= $id ?> ">
            <div class="form-group">
                <label for="nama_koleksi">Nama Koleksi</label>
                <textarea class="form-control" name="nama_koleksi" id="nama_koleksi" placeholder="Masukan Nama Koleksi" required></textarea>
            </div>
            <div class="form-group">
                <label for="nama_koleksi">Kelompok Koleksi</label>
                <textarea class="form-control" name="kel_koleksi" id="kel_koleksi" placeholder="Masukan Kelompok Koleksi" required></textarea>
            </div>
            <div class="form-group">
                <label for="nama_koleksi">Lokasi Penemuan</label>
                <textarea class="form-control" name="lok_temuan" id="lok_temuan" placeholder="Masukan Lokasi Penemuan" required></textarea>
            </div>
            <div class="form-group">
                <label for="nama_koleksi">Bahan</label>
                <textarea class="form-control" name="bahan" id="bahan" placeholder="Masukan Bahan" required></textarea>
            </div>
            <div class="form-group">
            <label for="nama_koleksi">Tahun Pembuatan</label>
                <textarea class="form-control" name="thn_buat" id="thn_buat" placeholder="Masukan Tahun Pembuatan" required></textarea>
            </div>
            <div class="form-group">
                <label for="gambarkoleksi">Gambar Koleksi</label>
                <input type="file" id="gambarkoleksi" name="gambarkoleksi" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Pendataan</label>
                <input type="date" id="tanggal" name="tanggal" required>   
            </div>
            <div class="form-group">
                <label for="dokum_data">Dokumentasi Data</label>
                <textarea class="form-control" name="dokum_data" id="dokum_data" placeholder="Masukan Dokumentasi Data" required></textarea>
            </div>
            <div class="form-group">
                <label for="dokum_foto">Dokumentasi Foto</label>
                <textarea class="form-control" name="dokum_foto" id="dokum_foto" placeholder="Masukan Dokumentasi Foto" required></textarea>
            </div>
            <div class="form-group">
                <label for="narasumber">Narasumber</label>
                <textarea class="form-control" name="narasumber" id="narasumber" placeholder="Masukan Narasumber" required></textarea>
            </div>
            <div class="form-group">
                <label for="panjang">Panjang</label>
                <textarea class="form-control" name="panjang" id="panjang" placeholder="Masukan Panjang Koleksi" required></textarea>
            </div>
            <div class="form-group">
                <label for="lebar">Lebar</label>
                <textarea class="form-control" name="lebar" id="lebar" placeholder="Masukan Lebar Koleksi" required></textarea>
            </div>
            <div class="form-group">
                <label for="tinggi">Tinggi</label>
                <textarea class="form-control" name="tinggi" id="tinggi" placeholder="Masukan Tinggi Koleksi" required></textarea>
            </div>
            <div class="form-group">
                <label for="tebal">Tebal</label>
                <textarea class="form-control" name="tebal" id="tebal" placeholder="Masukan Tebal Koleksi" required></textarea>
            </div>
            <div class="form-group">
                <label for="diameter">Diameter</label>
                <textarea class="form-control" name="diameter" id="diameter" placeholder="Masukan Diameter Koleksi" required></textarea>
            </div>
            <div class="form-group">
                <label for="fungsi">Fungsi</label>
                <textarea class="form-control" name="fungsi" id="fungsi" placeholder="Masukan Fungsi" required></textarea>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukan Deskripsi" required></textarea>
            </div>
            <div class="form-group">
                <label for="sejarah">Sejarah</label>
                <textarea class="form-control" name="sejarah" id="sejarah" placeholder="Masukan Sejarah Koleksi" required></textarea>
            </div>
            <div class="form-group">
                <label for="no_dokum">Nomor Dokumentasi</label>
                <textarea class="form-control" name="no_dokum" id="no_dokum" placeholder="Masukan Nomor Dokumentasi Foto" required></textarea>
            </div>
            <div class="form-group">
                <label for="lok_simpan">Lokasi Simpan</label>
                <textarea class="form-control" name="lok_simpan" id="lok_simpan" placeholder="Masukan Lokasi Tempat Simpan" required></textarea>
            </div>
            <div class="form-group">
                <label for="referensi">Referensi</label>
                <textarea class="form-control" name="referensi" id="referensi" placeholder="Masukan Referensi" required></textarea>
            </div>
            <div class="form-group">
                <label for="lembaga">Lembaga</label>
                <textarea class="form-control" name="lembaga" id="dokum_foto" placeholder="Masukan Nama Lembaga" required></textarea>
            </div>
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea class="form-control" name="catatan" id="catatan" placeholder="Masukan Catatan" required></textarea>
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>