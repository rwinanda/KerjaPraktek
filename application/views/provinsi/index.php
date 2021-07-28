
<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Provinsi</h2>
            <h3 class="section-subheading text-muted">Kumpulan dari beberapa Provinsi di Indonesia</h3>
        </div>
        
    <div class="row">
        <div class="col">
            <?php if (isset($_SESSION['username']) && ($_SESSION['id_role']==1 )) : ?>
                <a href="<?= base_url() ?>prov/tambah" class="btn btn-primary align-self-center">Tambah Provinsi</a><br><br>
            <?php endif; ?>
        </div>
    </div>
    
        
<!--
    <form action="<?= base_url('prov/index')?>" method="POST" class="flex mt-2">
                
                <input type="text" type="search" placeholder="Cari Nama Provinsi" name="keyword" class="py-2 px-4 focus:ring focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                <button class="ml-2 py-1 px-9 bg-gray-50 rounded-md" type="submit" name="submit">Search</button>

    </form>    
-->
        
    <!--    fitur searching-->
    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="card card-sm" action="<?= base_url('prov/index')?>" method="POST">
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
        <?php if(isset($provinsi)) : foreach ($provinsi as $provin) : ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <center>
                            <!-- Tampilan Gambar-->
                            <img width="200" height="280" src="<?php echo base_url('upload/provinsi/'.$provin['gambar'])?>" alt="..." />
                            </center>
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><?= $provin['nama_provinsi']; ?></div>
                            <a role="button" href="<?= base_url(); ?>daerah/index/<?= $provin['id_provinsi'] ?>" class="btn btn-primary">Lihat &raquo;</a>
                            <?php if (isset($_SESSION['username']) && ($_SESSION['id_role']==1 )) : ?>
                            <a role="button" href="<?= base_url(); ?>prov/update/<?= $provin['id_provinsi'] ?>" class="btn btn-primary">Edit</a>
                            <a role="button" href="<?= base_url(); ?>prov/hapus/<?= $provin['id_provinsi'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin menghapus data?')">Hapus</a>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
        <?php endforeach; endif; ?>
    </div>
    <?=$this->pagination->create_links();?>
    </div>
</section>
