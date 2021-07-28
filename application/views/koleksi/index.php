    <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Koleksi Museum <?= $nama_museum ?></h2>
                    <h3 class="section-subheading text-muted">Beberapa peninggalan koleksi yang ada di museum</h3>
            </div>
            <div class="row">
            <div class="col">
              <?php if (isset($_SESSION['username']) && ($_SESSION['id_role']==1 || $_SESSION['id_museum']==$id_koleksi)) : ?>
                <a href="<?= base_url() ?>koleksi/tambah/<?= $id_museum ?>" class="btn btn-primary align-self-center">Tambah Koleksi</a>
                <?php endif; ?>
                </div>
                </div><br><br>
        
            <!--    fitur searching-->
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <form class="card card-sm" action="" method="POST">
                        <div class="card-body row no-gutters align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-search h4 text-body"></i>
                            </div>

                            <div class="col">
                                <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Cari Nama Provinsi" name="keyword">
                            </div>

                            <div class="col-auto">
                                <button class="btn btn-lg btn-success" name="submit" type="submit">Search</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div><br>
                
                <div class="row">
                    <?php if(isset($koleksi)) : ?>
                    <?php foreach ($koleksi as $kol) : ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <center>
                                <img width="200" height="280" src="<?php echo base_url('upload/koleksi/'.$kol['gambarkoleksi'])?>" alt="..." />
                                </center>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?= $kol['nama_koleksi'] ?></div>
                                <a role="button" href="<?= base_url(); ?>koleksi/indexkoleksi/<?= $kol['id_koleksi'] ?>" class="btn btn-primary">Lihat &raquo;</a>
                                <?php if (isset($_SESSION['username']) && ($_SESSION['id_role']==1 || $_SESSION['id_museum']==$kol['id_museum'] )) : ?>
                                <a role="button" href="<?= base_url(); ?>koleksi/update/<?= $kol['id_koleksi'] ?>" class="btn btn-primary">Edit</a>
                                <a role="button" href="<?= base_url(); ?>koleksi/hapus/<?= $kol['id_koleksi'] ?>/<?= $kol['id_museum'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin menghapus data?')">Hapus</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!--Pagination-->
            <div class="wrapper" style="float:center">
            <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
            
                <!-- Navigasi Kiri -->
                <?php if($halaman == 1) :?>
                    <li class="page-link"><span>Pertama</span></li>
                    <li class="page-link"><span>&laquo;</span></li>
                <?php else: ?>
                    <li class="page-link"><a href="<?= base_url('/koleksi/index/'.$id_museum.'/1')?>">Pertama</a></li>
                    <li class="page-link"><a href="<?= base_url('/koleksi/index/'.$id_museum.'/'.$sebelumnya)?>">&laquo;</a></li>
                <?php endif; ?>

                <!-- Navigasi Angka -->
                <?php for($i=1; $i<=$total_halaman; $i++): 
                    $halaman_aktif = $halaman == $i ? 'active' : '' ?>
                     <a class="page-link active <?= $halaman_aktif ?>" href="<?= base_url('/koleksi/index/'.$id_museum.'/'.$i)?>"><?= $i ?></a>
                <?php endfor; ?>

                <!-- Navigasi Kanan -->
                <?php if($halaman == $total_halaman): ?>
                    <li class="page-link"><span>&raquo;</span></li>
                    <li class="page-link"><span>Akhir</span></li>
                <?php else : ?>
                    <li class="page-link"><a href="<?= base_url('/museum/index/'.$id_museum.'/'.$berikutnya)?>">&raquo;</a></li>
                    <li class="page-link"><a href="<?= base_url('/museum/index/'.$id_museum.'/'.$total_halaman)?>">Akhir</a></li>
                <?php endif;?>

            </ul>
            </nav>
        </div>
        </section>