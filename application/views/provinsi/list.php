    <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Provinsi</h2>
                    <h3 class="section-subheading text-muted">Kumpulan dari beberapa Provinsi di Indonesia</h3>
            </div>
                
                <div class="row">
                    <?php if(isset($provinsi)) : ?>
                    <?php foreach ($provinsi as $provin) : ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="<?php echo base_url('upload/provinsi/'.$provin['gambar'])?>" alt="..." /></a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?= $provin['nama_provinsi']; ?></div>
                                <a role="button" href="<?= base_url(); ?>daerah/list/<?= $provin['id_provinsi'] ?>" class="btn btn-primary">Lihat &raquo;</a>
                            </div>
                            
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
