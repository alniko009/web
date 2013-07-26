<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/eTabsScript.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js"></script>
	
	<link rel="Stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
	<link rel="Stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Supplier.css" />
	
	<link rel="Stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/SparePartsPriceList.css" />
	
	<!-- <msdropdown> -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/dropdownCss/dd.css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/dropdownJs/jquery.dd.min.js"></script>
	<!-- </msdropdown> -->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
		<!-----------------------------------------HEADER-->
		<div class="HeaderCover">
			<div class="Header">
				<div class="HeaderTop">
					<div class="TopMenu">
						<ul>
							<li><a href="http://eliamran.webxp.org.il/Portals/0/ContactHandler/About.html">אודות</a></li>
							<li class="Sep">|</li>
							<li><a href="http://eliamran.webxp.org.il/Portals/0/ContactHandler/Regulations.html">תקנון</a></li>
							<li class="Sep">|</li>
							<li><a href="http://eliamran.webxp.org.il/Portals/0/ContactHandler/ContactUs.html">צור קשר</a></li>
						</ul>
					</div>
				</div>
				<div class="HeaderLogo"></div>
				<div class="SummeryText">זירת מסחר, מחירוני חלפים, מחירון תוספות 4*4 שיפורי רכב, רכב אספנות, שמאות רכב</div>
				<div class="MainMenu">
						<div class="MenuRightBg">
							<div class="MenuLeftBg">
								<div class="MenuMiddleBg">
									<a href="http://eliamran.webxp.org.il/Portals/0/ContactHandler/HomePage.html">זירת מסחר</a>
								</div>
							</div>
						</div>
						<div class="MenuRightBg">
							<div class="MenuLeftBg">
								<div class="MenuMiddleBg">
									<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/login">כניסת שמאים</a>
								</div>
							</div>
						</div>
						<div class="MenuRightBg">
							<div class="MenuLeftBg">
								<div class="MenuMiddleBg">
									<a href="#">מחירון חלפים</a>
								</div>
							</div>
						</div>
						<div class="MenuRightBg">
							<div class="MenuLeftBg">
								<div class="MenuMiddleBg">
									<a href="http://eliamran.webxp.org.il/Portals/0/ContactHandler/SupplierLogin.html">כניסת ספקים</a>
								</div>
							</div>
						</div>
						<div class="MenuRightBg">
							<div class="MenuLeftBg">
								<div class="MenuMiddleBg">
									<a href="http://eliamran.webxp.org.il/Portals/0/ContactHandler/SuppliersList.html">רשימת ספקים</a>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<!-----------------------------------------END OF HEADER-->
		<!-----------------------------------------MAIN-->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<!-----------------------------------------END OF MAIN-->
		
		<!-----------------------------------------FOOTER-->
		<div class="FooterCover">
			<div class="Footer">
				© כל הזכויות שמורות לאלי אמרן - שמאי רכב | 054-69992233 | eli@hamovil.net | עיצוב ובניית האתר: Allbiz
			</div>
		</div>
		<!-----------------------------------------END OF FOOTER-->
		
	</body>
</html>