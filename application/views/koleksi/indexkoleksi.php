        <!-- Main -->
        <main>
            <!-- Welcome section -->
            <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Koleksi </h2>
                </div>
            </div>
        <?php if(isset($koleksi)) : ?>
        <?php foreach ($koleksi as $kol) : ?>
        <div class="row">
            <div class="col">
                <a target="_BLANK" href="<?= base_url(); ?>pdf/exportPdf/<?= $kol['id_koleksi']?>" class="btn btn-danger align-self-center">Export</a><br><br>
            </div>
        </div>
                
        <div class="section-inner" style="padding-bottom: 0px!important">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft">
                        <div id="post-content" class="gap row">
                            <div class="col-md-12 gap">
                                <div class="row">   
                                    <img src="<?php echo base_url('upload/koleksi/'.$kol['gambarkoleksi'])?>" class="img-post" alt="image" style="width:70%">
                                </div>  
                            </div>
                        </div>
                    </div>
                    <!--Kolom Tabel-->
                    <div id="main-sidebar" class="col-md-6 divider-wrapperPost wow fadeInRight">
<!--                        <h4 class="widget-title" style="color:rgb(22, 21, 21)margin:0;margin-left:2em;"><strong>Data Objek</strong></h4>-->
                        <div class="row">
                            <div class="content">
                                <div class="container">
                                  <div class="table-responsive">
                                    <table class="table custom-table">
                                        <tr>
                                              <th scope="col">Nomor Koleksi</th>
                                              <td>-</td>
                                        </tr>
                                        <tr>
                                              <th scope="col">Nama Koleksi</th>
                                              <td><?= $kol['nama_koleksi'] ?></td>
                                        </tr>                                        
                                        <tr> 
                                              <th scope="col">Kelompok Koleksi</th>
                                              <td><?= $kol['kel_koleksi'] ?></td>
                                        </tr>
                                        <tr> 
                                              <th scope="col">Lokasi Penemuan</th>
                                              <td><?= $kol['lok_temuan'] ?></td>
                                        </tr>
                                        <tr> 
                                              <th scope="col">Bahan</th>
                                              <td><?= $kol['bahan'] ?></td>
                                        </tr>
                                        <tr> 
                                              <th scope="col">Tahun Pembuatan</th>
                                              <td><?= $kol['thn_buat'] ?></td>
                                        </tr>
                                        <tr> 
                                              <th scope="col">Lokasi Penyimpanan</th>
                                              <td><?= $kol['lok_simpan'] ?></td>
                                        </tr>
                                    </table>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="p-5 bg-white rounded shadow mb-5">
                    <!-- Detail tabs bawah-->
                    <ul id="myTab" role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
                      <li class="nav-item flex-sm-fill">
                        <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active">Deskripsi</a>
                      </li>
                      <li class="nav-item flex-sm-fill">
                        <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Dokumentator</a>
                      </li>
                      <li class="nav-item flex-sm-fill">
                        <a id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Ukuran</a>
                      </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
                        <p class="text-muted"><?= $kol['deskripsi'] ?></p>
                        <p class="text-muted">
                        Fungsi Semula &ensp; :  <?= $kol['fungsi'] ?>
                        </p>
                        <p class="text-muted">
                        Sejarah Singkat &ensp;:  <?= $kol['sejarah'] ?>
                        </p>
                      </div>
                      <div id="profile" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                        <p class="text-muted">Tanggal Pendataan &emsp;&emsp;&nbsp;&nbsp;&nbsp;: <?= $kol['tanggal'] ?> </p>
                        <p class="text-muted">Nomor Dokumentasi Foto : <?= $kol['no_dokum'] ?> </p>
                        <p class="text-muted">Dokumentator Foto &emsp;&emsp;&ensp; : <?= $kol['dokum_foto'] ?></p>
                        <p class="text-muted">Dokumentator Data &emsp;&emsp;&ensp;: <?= $kol['dokum_data'] ?></p>
                        <p class="text-muted">Narasumber : <?= $kol['narasumber'] ?></p>
                        <p class="text-muted">Lembaga Dokumentator : <?= $kol['lembaga'] ?></p>
                        <p class="text-muted">Referensi Silang : <a href="<?= $kol['referensi'] ?>"><?= $kol['referensi'] ?></a></p>
                      </div>
                      <div id="contact" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                        <p class="text-muted">Panjang&emsp;: <?= $kol['panjang'] ?></p>
                        <p class="text-muted">Lebar  &ensp;&ensp;&ensp;&ensp;: <?= $kol['lebar'] ?></p>
                        <p class="text-muted">Tinggi &ensp;&ensp;&ensp;: <?= $kol['tinggi'] ?></p>
                        <p class="text-muted">Diameter&ensp;: <?= $kol['diameter'] ?></p>
                        <p class="text-muted">Tebal &emsp;&ensp;&ensp;: <?= $kol['tebal'] ?></p>
                      </div>
                    </div>
                    <!-- End rounded tabs -->
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
         </div>
                
                
                
            </section>