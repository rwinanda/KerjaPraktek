<section>
    <div id="headerwrap">
        <div class="container text-center ">
            <?php if(isset($post)) : ?>
            <?php foreach ($post as $objekk) : ?> 
                    <h2 class="section-heading" style="color:white"><?= $objekk['nama_post_tangible']; ?></h2>
            <?php endforeach; ?>
            <?php endif; ?> 
        </div>
    </div>
    <div style="float:left; margin-top:15px; margin-left:2cm;">     
            <?php if(isset($_SESSION['username'])) : ?>
            <a href="<?= base_url(); ?>objek/updateObjek/<?= $objekk['id_post_tangible']?>"><button type="button" class="btn btn-ButtonRoundPost" style="color:white" >Edit</button> </a>
            <?php endif; ?>
            <a target="_BLANK" href="<?= base_url(); ?>exportpdf/export/<?= $objekk['id_post_tangible']?>"><button type="button" class="btn btn-ButtonRoundPrint fa fa-print" style="color:white" > Pdf</button> </a>
            <button type="button" class="btn btn-ButtonRound"> <a href="<?= base_url(); ?>objek/index/<?= $id_tangible?>"><i class="previous">&laquo;</i> Kembali </a></button> 

    </div>  
    
    <div>
        <div class="section-inner" style="padding-bottom: 0px!important">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft">
                        <div id="post-content" class="gap row">
                            <div class="col-md-12 gap">
                                <div class="row">   
                                    <img src="<?php echo base_url('logo/objek/'.$objekk['logo_post_tangible'])?>" class="img-post" alt="image" style="width:100%">
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div id="main-sidebar" class="col-md-6 divider-wrapperPost wow fadeInRight">
                        <h4 class="widget-title" style="color:rgb(22, 21, 21)margin:0;margin-left:2em;"><strong>Data Objek</strong></h4>
                        <div class="row">
                            <table class="table1">
                                <tr>
                                    <td><strong>Id Objek</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $objekk['kode_post_tangible']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><strong>Alamat</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $objekk['alamat_post_tangible']; ?></p></td>
                                </tr>
                                <tr>
                                    <td><strong>Nomor Regnas</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $objekk['no_regnas_post_tangible']; ?></p></td>
                                </tr>                      
                                <tr>
                                    <td><strong>Jenis</strong></td>
                                    <td><p style="color:rgb(22, 21, 21)"><?= $objekk['jenis_post_tangible']; ?></p></td>
                                </tr>                        
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="testimonies" class="divider-wrapper opaqued">
        <div class="section-inner" style="padding-top: 10px">
            <div class="container">
                <div>
                    <div class="col-xs-12 item-caption">
                    <p style="font-size:25px">Detail:</p>
                    <p style="text-align: justify"><?= $objekk['detail_post_tangible']; ?></p>
                    </div>
                </div>
                <div>
                    <div class="col-xs-12 item-caption">
                    <div class="post-underline"></div>
                    <p style="font-size:25px">Sejarah:</p>
                    <p style="text-align: justify"><?= $objekk['sejarah_post_tangible']; ?></p>
                    </div>
                </div> 
            </div>
        </div>
    </div>    
</section>