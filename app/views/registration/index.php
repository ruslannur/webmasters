<div class="container">

  <div class="row">
    <div class="col-md-10">

    <form action="<?=ROOT.'/'.Utils::siteLang().'/registration'?>" method="post" enctype="multipart/form-data" id="registration" class="form-horizontal">
    <fieldset>
      <legend><?=Utils::i18('User registration')?></legend>
        <div id="errorMsg" class="alert alert-danger" role="alert" style="<?=empty($data['result'])? 'display: none' : ''?>">
          <div id="msg">
          <?if (isset($data['error']) && !empty($data['error'])) {
              foreach ($data['error'] as $k => $v) {?>            
            <?=Utils::i18($v)?><br>
          <?  }
            }?>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="inputName"><?=Utils::i18('Firstname')?> *</label>
          <div class="col-md-4">
            <div class="input-group">
              <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
              <input type="text" class="form-control" id="inputName" placeholder="<?=Utils::i18('Firstname')?>" name="p_name" value="<?=(!empty($post['p_name'])) ? $post['p_name'] : ''?>" js-txt='<?=Utils::i18('Field "Firstname" is mandatory to fill')?>'>
            </div>
          </div>
        </div>
    
        <div class="form-group">
          <label class="col-md-4 control-label" for="inputEmail"><?=Utils::i18('Email')?> *</label>
          <div class="col-md-4">
            <div class="input-group">
              <div class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></div>
              <input data-validation="email" type="text" class="form-control" id="inputEmail" placeholder="<?=Utils::i18('Email')?>" name="p_email" 
      value="<?=(!empty($post['p_email'])) ? $post['p_email'] : ''?>" js-txt='<?=Utils::i18('Field "Email" is mandatory to fill')?>' js-txt-valid='<?=Utils::i18('Field "Email" contains wrong data')?>'>
            </div>
          </div>
        </div>
    
        <div class="form-group">
          <label class="col-md-4 control-label" for="inputPwd"><?=Utils::i18('Password')?> *</label>
          <div class="col-md-4">
            <input type="password" class="form-control" id="inputPwd" name="p_pwd" js-txt='<?=Utils::i18('Field "Password" must contain at least 8 any characters')?>'><small><i><?=Utils::i18('must contain at least 8 characters')?></i></small>
          </div>
        </div>
    
        <div class="form-group">
          <label class="col-md-4 control-label" for="inputPwdAgain"><?=Utils::i18('Password, again')?> *</label>
          <div class="col-md-4">
            <input type="password" class="form-control" id="inputPwdAgain" name="p_pwd_again" js-txt="<?=Utils::i18('Passwords not equal')?>">
          </div>
        </div>    
    
        <div class="form-group">
          <label class="col-md-4 control-label" for="descriptionId"><?=Utils::i18('Description')?> *</label>
          <div class="col-md-4">
            <textarea class="form-control" id="descriptionId" rows="3" name="p_description" js-txt='<?=Utils::i18('Field "Description" is mandatory to fill')?>'><?=(!empty($post['p_description'])) ? $post['p_description'] : ''?></textarea>
          </div>
        </div>
    
        <div class="form-group">
          <label class="col-md-4 control-label" for="fileUploadId"><?=Utils::i18('Image')?></label>
          <div class="col-md-4">
            <input type="file" name="p_file" id="fileUploadId"><small><i><?=Utils::i18('Image size must not be more than 5 MB')?></i></small>
          </div>
        </div>
    
        <div class="form-group">
          <label class="col-md-4 control-label" for="inputCity"><?=Utils::i18('City')?></label>
          <div class="col-md-4">               
            <input type="text" class="form-control" id="inputCity" placeholder="<?=Utils::i18('City')?>" name="p_city" 
      value="<?=(!empty($post['p_city'])) ? $post['p_city'] : ''?>">        
          </div>
        </div>
    
        <div class="form-group">
          <label class="col-md-4 control-label" for="inputPhone"><?=Utils::i18('Phone')?></label>
          <div class="col-md-4">
            <div class="input-group">
              <div class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></div>
              <input data-validation="email" type="text" class="form-control" id="inputPhone" placeholder="<?=Utils::i18('Phone')?>" name="p_phone" 
      value="<?=(!empty($post['p_phone'])) ? $post['p_phone'] : ''?>">
            </div>
          </div>
        </div>
    
        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4"><i><?=Utils::i18('Fields marked with * mandatory to fill')?></i></div>
        </div>
    
        <div class="form-group">
          <label class="col-md-4 control-label"></label>  
          <div class="col-md-4"><a href="#" class="btn btn-primary" id="submitBut" js-txt="<?=Utils::i18('Saving')?>"><?=Utils::i18('Add')?></a></div>
        </div>   
     
    </fieldset>
    </form>
    </div>
    <div class="col-md-2 hidden-xs"><a href="<?=ROOT.'/'.Utils::siteLang()?>/login" class="btn btn-default"><?=Utils::i18('Sign in')?></a></div>
  </div>
</div> 