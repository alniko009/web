<div class="Main">
			<div class="eLoginAndRegTitle">היכנס כשמאי או הרשם:<?php if($error!="")echo "<br><br>".$error;?></div>
			<div class="eLoginAndReg">
				<div class="SupRegister">
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'register-form',
						'action' => array('site/register'),
						'enableClientValidation'=>true,
						'clientOptions'=>array(
							'validateOnSubmit'=>true,
						),
					)); ?>
					<input type="text" name="User[name]" value="שם פרטי" />
					<input type="text" name="User[lname]" value="שם משפחה" />
					<input type="text" name="User[company]" value="שם השמאי" />
					<input type="text" name="User[phone]" value="טלפון" />
					<input type="text" name="User[cellphone]" value="נייד" />
					<input type="text" name="User[email]" value="מייל" />
					<input type="text" name="User[password]" value="סיסמה" />
					<?php echo $form->hiddenField($model,'type',array('value'=>'3')); ?>
					<?php echo $form->hiddenField($model,'created',array('value'=>date('Y-m-d H:i:s'))); ?>
					<div class="SupRegSubmit" onclick="jQuery('#register-form').submit()">הירשם!</div>
					<?php $this->endWidget(); ?>
				</div>
				
				<div class="eLoginAndRegDesc">
					* לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית 
					קולהע צופעט למרקוח איבן איף, ברומץ כלרשט מיחוצים. קלאצי
					סחטיר בלובק. תצטנפל בלינדו למרקל אס לכימפו, דול, צוט ומעיוט - לפת
					יעם ברשג - ולתיעם גדדיש. קוויז דומור ליאמום בלינך רוגצה. לפמעט 
					קולורס מונפרד אדנדום סילקוף, מרגשי ומרגשח. עמחליף
					גולר מונפרר סוברט לורם שבצק יהול, לכנוץ בעריר גק ליץ, 
					נולום ארווס סאפיאן - פוסיליס קוויס, אקווזמן קוואזי במר
					מודוף. אודיפו בלאסטיק מונופץ קליר, בנפת נפקט למסון
				</div>
				
				<div class="SupLogin">
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'login-form',
						'enableClientValidation'=>true,
						'clientOptions'=>array(
							'validateOnSubmit'=>true,
						),
					)); ?>

						<div class="row">
							<?php echo $form->textField($model,'username',array('value'=>'שם משתמש')); ?>
							<?php echo $form->error($model,'username'); ?>
						</div>

						<div class="row">
							<?php echo $form->passwordField($model,'password',array('value'=>'סיסמה')); ?>
							<?php echo $form->error($model,'password'); ?>
							
						</div>
						
						<div class="SupLoginSubmit" onclick="jQuery('#login-form').submit();">כניסה!</div>

					<?php $this->endWidget(); ?>
					<!-- form 
					<input type="text" name="שם משתמש" value="שם משתמש" />
					<input type="password" name="סיסמה"  />
					<div class="SupLoginSubmit">כניסה!</div> -->
				</div>
				
			</div>
			<div class="cleared"></div>
			
			
			<div class="MainBannerRight"><img src="images/MainBanner.jpg" alt="" /><img src="images/MainBanner.jpg" alt="" /></div>
			<div class="MainBannerLeft"><img src="images/MainBanner.jpg" alt="" /><img src="images/MainBanner.jpg" alt="" /></div>
		</div>