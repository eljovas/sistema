<!-- Form area -->
<div class="admin-form">
  <div class="container-fluid">

    <div class="row-fluid">
      <div class="span12">
        <!-- Widget starts -->
            <div class="widget wlightblue">
              <!-- Widget head -->
              <div class="widget-head">
                <i class="icon-lock"></i> Entrar 
              </div>

              <div class="widget-content">
                <div class="padd">
                  <!-- Login form -->
                  <?php echo form_open('members/login'); ?>
                    <!-- Email -->
                    <div class="control-group">
                      <label class="control-label" for="inputEmail">Usuario</label>
                      <div class="controls">
						<?php $username_input = array('name' => 'username', 'id' => 'username', 'value' => set_value('username')); ?>
						<?php echo form_input($username_input); ?>
                      </div>
                    </div>
                    <!-- Password -->
                    <div class="control-group">
                      <label class="control-label" for="inputPassword">Contraseña</label>
                      <div class="controls">
							<?php $password_input = array('name' => 'password', 'id' => 'password', 'value' => set_value('password')); ?>
							<?php echo form_password($password_input); ?>
                      </div>
                    </div>
                    <!-- Remember me checkbox and sign in button -->
                    <div class="control-group">
                      <div class="controls">
                        <button type="submit" class="btn">Entrar</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>  
      </div>
    </div>
  </div> 
</div>

