<div class="container">

  <div class="row">
    <div class="col-md-10">
        <fieldset>
        <legend><?=Utils::i18('please login')?></legend>

        <? if ($data['result'] == -1) { ?>
          <div class="alert alert-danger" role="alert">
            <?foreach ($data['error'] as $k=>$v) {?>
            <?=Utils::i18($v)?><br>
            <?}?>
          </div>
        <? } ?>

        <form action="<?=ROOT.'/'.Utils::siteLang()?>/login" method="post"  class="form-horizontal" id="authForm">   

        <div class="form-group">          
          <label for="inputEmail" class="col-md-4 control-label"></label>
          <div class="col-md-4">        
            <input name="p_email" type="text" id="inputEmail" class="form-control" placeholder="<?=Utils::i18('Email')?>">
          </div>
        </div>

        <div class="form-group">
          <label for="inputPassword" class="col-md-4 control-label"></label>
          <div class="col-md-4">
            <input name="p_pwd" type="password" id="inputPassword" class="form-control" placeholder="<?=Utils::i18('Password')?>">    
          </div>
        </div>
    
        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <div class="col-md-4" align="center">
          <a href="#" class="btn btn-primary" id="authButton" js-txt="<?=Utils::i18('wait')?>..."><?=Utils::i18('Sign in')?></a>
          </div>
        </div>
        </form>

        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <div class="col-md-4" align="center">
            <p><?=Utils::i18('or')?> <br><br><a href="<?=ROOT.'/'.Utils::sitelang()?>/registration"><?=Utils::i18('make registration')?></a></p>
          </div>
        </div>
        </fieldset>
    </div>

  </div>

</div> <!-- /container -->