    <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Museum</h2>
                    <h3 class="section-subheading text-muted">Kumpulan dari beberapa daerah di Indonesia</h3>
            </div>
                
        <div class="row">
            <div class="col">
                <?php if (isset($_SESSION['username']) && ($_SESSION['id_role']==1 )) : ?>
                <a href="<?= base_url() ?>museum/tambah/<?= $id_daerah ?>" class="btn btn-primary align-self-center">Tambah Museum</a><br><br>
                <?php endif; ?>
            </div>
        </div>
        <br><br>
                
<!--
            <div class="col">
             <form action="" method="POST" class="form-inline my-2 mx-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" 
                            placeholder="Cari Nama Kabupaten" name="keyword" autocomplete="off" style="border-radius:15px">
                          <button class="py-2 px-6 bg-gray-50 rounded-md" 
                           type="submit" name="submit" style="margin-left:20px;">Search</button>
                        </form>
            </div>
-->
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
                    <?php if(isset($museum)) : ?>
                    <?php foreach ($museum as $mus) : ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <center>
                                <img img width="400" height="280" src="<?php echo base_url('upload/museum/'.$mus['gambarmuseum'])?>" alt="..." />
                                </center>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?= $mus['nama_museum'] ?></div>
                              
                                <a role="button" href="<?= base_url(); ?>koleksi/index/<?= $mus['id_museum'] ?>" class="btn btn-primary">Lihat &raquo;</a>
                                <?php if (isset($_SESSION['username']) && ($_SESSION['id_role']==1 || $_SESSION['id_museum']==$mus['id_museum'] )) : ?>
                                <a role="button" href="<?= base_url(); ?>museum/update/<?= $mus['id_museum'] ?>" class="btn btn-primary">Edit</a>
                                <a role="button" href="<?= base_url(); ?>museum/hapus/<?= $mus['id_museum'] ?>/<?= $mus['id_daerah']?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin menghapus data?')">Hapus</a>
                            <?php endif; ?>
                            </div>
                            
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
<!--            Pagination-->
            <div class="wrapper" style="float:center">
            <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
            
                <!-- Navigasi Kiri -->
                <?php if($halaman == 1) :?>
                    <li class="page-link"><span>Pertama</span></li>
                    <li class="page-link"><span>&laquo;</span></li>
                <?php else: ?>
                    <li class="page-link"><a href="<?= base_url('/museum/index/'.$id_daerah.'/1')?>">Pertama</a></li>
                    <li class="page-link"><a href="<?= base_url('/museum/index/'.$id_daerah.'/'.$sebelumnya)?>">&laquo;</a></li>
                <?php endif; ?>

                <!-- Navigasi Angka -->
                <?php for($i=1; $i<=$total_halaman; $i++): 
                    $halaman_aktif = $halaman == $i ? 'active' : '' ?>
                    <a class="page-link active <?= $halaman_aktif ?>" href="<?= base_url('/museum/index/'.$id_daerah.'/'.$i)?>"><?= $i ?>
                    </a>
                <?php endfor; ?>

                <!-- Navigasi Kanan -->
                <?php if($halaman == $total_halaman): ?>
                    <li class="page-link"><span>&raquo;</span></li>
                    <li class="page-link"><span>Akhir</span></li>
                <?php else : ?>
                    <li class="page-link"><a href="<?= base_url('/museum/index/'.$id_daerah.'/'.$berikutnya)?>">&raquo;</a></li>
                    <li class="page-link"><a href="<?= base_url('/museum/index/'.$id_daerah.'/'.$total_halaman)?>">Akhir</a></li>
                <?php endif;?>

            </ul>
            </nav>
        </div>
        </section>