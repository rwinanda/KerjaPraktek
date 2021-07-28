<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Hasil Cari</h2>
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
    </div>

        <br>
                
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
</section>