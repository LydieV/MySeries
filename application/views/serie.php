<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper(['url','html','image_cache']);?>
<div class="container">
   <div class="columns col-oneline col-gapless">
      <div class="column col-8 p-2">
        <div class="panel bg-secondary">
          <div class="columns col-gapless">
          <div class="panel-image column col-5 p-2">
            <img <?php cache_src($serie->urlImage);?> class="img-responsive p-centered">
          </div>
          <div class="panel-body column p-2 col-7">
            <div class="bg-gray p-1 m-1">
            <div class="panel-title h5 text-center text-primary">
              <?php if (isset($id)): ?>
                <form action="<?php echo site_url('serie/'.$serie->id.'/'.$saison); ?>" method="post">
                  <button action="submit" name="follow" value="<?= $serie->follow ? 'false' : 'true' ?>"
                       class="btn btn-action s-circle">
                    <i class="icon <?= $serie->follow ? 'icon-cross' : 'icon-plus' ?>"></i></button>
                  <?php echo $serie->nom.' <span class="h6 text-gray">('.substr($serie->premiere,0,4).')</span>'; ?></div>
                </form>
              <?php else:?>
                <?php echo $serie->nom.' <span class="h6 text-gray">('.substr($serie->premiere,0,4).')</span>'; ?></div>
              <?php endif;?>

            <p class="text-dark text-justify bg-gray">
              <?php echo $serie->resume; ?>
            </p>
          </div>
          </div>
  </div>
    <div class="panel-nav p-centered">
    <ul class="pagination">
  <li class="page-item <?php $previous=$saison-1; if ($previous<1) echo 'disabled';?>">
    <a href="<?php echo site_url('serie/'.$serie->id.'/'.$previous); ?>">Précédente</a>
  </li>
    <?php $previous=0; ?>
   <?php foreach($season as $element): ?>
     <?php $delta = $element->saison-$saison;?>
  <?php if($element->saison <2 || ($delta>= -2 && $delta<=2) || $element->saison>count($season)-2): ?>
    <?php if ($previous+1 != $element->saison) echo '<li class="page-item">...</li>';
          $previous = $element->saison;?>
  <li class="page-item <?php echo ($delta==0) ? 'active':'';?>">
    <a href="<?php echo site_url('serie/'.$serie->id.'/'.$element->saison); ?>"><?php echo $element->saison; ?></a>
  </li>
<?php endif; ?>
  <?php endforeach; ?>
  <li class="page-item <?php $next=$saison+1; if ($next>count($season)) echo 'disabled'?>">
    <a href="<?php echo site_url('serie/'.$serie->id.'/'.$next); ?>">Suivante</a>
  </li>
</ul>
</div>
<div class="panel-title label h5 label-rounded label-primary p-2 m-2"> Saison <?=$saison?> <span class="h6 text-gray">
  <?=substr($episode[0]->premiere,0,4) ?>  (<?=count($episode)?> episodes)</span></div>
   <div class="timeline panel-body text-dark py-2">
       <?php foreach($episode as $element): ?>
                  <div class="timeline-item">
                    <div class="timeline-left">
                      <a class="timeline-icon icon-lg" href="#<?=$element->numero?>"><?=$element->numero?></a></div>
                    <div class="timeline-content">
                      <div class="tile" id="<?=$element->numero?>">
                        <div class="tile-content">
                          <p class="tile-title">
                            <span class="h5 text-primary">
                            <?php echo $element->nom;?> </span>
                            <span class="h6 text-gray">
                            <?php echo "Diffusion le " . date("d/m/Y",strtotime($element->premiere)) ;?>
                            </span>
                          </p>
                          <div class="tile-subtitle columns bg-gray">
                          <div class="col-7 p-2">
                            <p class="text-justify"><?php echo $element->resume ?></p>
                          </div>
                          <div class="col-5 flex-centered">
                             <img <?php cache_src($element->urlImage); ?> class="img-responsive p-2">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        <?php endforeach; ?>
</div>
</div>
</div>
  <div class="column col-4 p-2">
    <div class="panel container bg-secondary my-2">
     <div class="columns">
      <?php foreach ($cast as $element): ?>
          <div class="panel-image column col-3 col-xs-12 col-sm-6 col-md-4 col-lg-3 my-2">
          <div class="popover popover-left">
            <a href="<?=site_url('personne/'.$element->a_id)?>">
              <img <?php cache_src($element->p_image); ?> class="img-responsive p-centered">
            </a>
          <div class="popover-container">
          <div class="btn-group float-right">
            <a class="btn btn-primary" href="<?php echo site_url('personne/'.$element->a_id); ?>">
              <?php echo $element->p_nom; ?></a>
            <a class="btn " href="<?=site_url('personne/'.$element->a_id)?>"><?php echo $element->a_nom; ?></a>
    </div>
  </div>
</div>
</div>
    <?php endforeach; ?>
</div>
<div class="panel-action py-2">
    <?php foreach ($crew as $element): ?>
      <div class="btn-group btn-group my-2 col-12">
        <a href="#" class="btn btn-primary disabled"><?=$element->titre?></a>
        <a href="<?=site_url('personne/'.$element->id)?>"" class="btn btn-secondary"><?=$element->nom?></a>
      </div>
    <?php endforeach; ?>

</div>
</div>
  </div></div>
