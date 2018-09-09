<div class="container">
  <div class="row">
    <div class="col-md-10 ">
	  <fieldset>
        <legend><?=Utils::i18('User profile')?></legend>
        <div class="col-sm-2 col-md-3">
            <img src="<?=ROOT?>/public/<?=(!empty($data['u_image'])) ? $data['u_image'] : 'uploads/noimage.jpg'?>"
            alt="" class="img-rounded img-responsive" />
        </div>
        <div class="col-sm-4 col-md-6">
            <blockquote>
                <p><?=$data['u_name']?></p>
                <small><cite><?=(!empty($data['u_city'])) ? $data['u_city'] : Utils::i18('city is not specified')?><i class="glyphicon glyphicon-map-marker"></i></cite></small>
            </blockquote>
            <p><i class="glyphicon glyphicon-envelope"></i> <?=$data['u_email']?><br>
            <i class="glyphicon glyphicon-phone"></i> <?=(!empty($data['u_phone'])) ? $data['u_phone'] : Utils::i18('is not specified')?></p>
            <p><?=$data['u_dsc']?></p>
        </div>
      </fieldset>
    </div>
    <div class="col-md-2 hidden-xs"><a href="<?=ROOT.'/'.Utils::siteLang()?>/login/signout" class="btn btn-default"><?=Utils::i18('Sign out')?></a></div>
  </div>
</div>