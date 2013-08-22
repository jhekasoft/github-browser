<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" type="text/css" media="screen, projection" />
    <!--[if lte IE 6]><link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style_ie.css" type="text/css" media="screen, projection" /><![endif]-->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.placeholder.js"></script>
    <script>
        $(document).ready(function() {
            $('.search-input').placeholder();
        });
    </script>
</head>

<body>

    <div id="wrapper">

        <header id="header">
            <div class="container">
                <nav class="breadcrumbs">
                    <?php if(isset($this->breadcrumbs)):?>
                        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                            'separator' => ' &rarr; ',
                            'homeLink'=>CHtml::link(CHtml::encode(Yii::app()->name), array('/site/index')),
                            'links'=>$this->breadcrumbs,
                        )); ?><!-- breadcrumbs -->
                    <?php endif?>
                </nav>

                <?php echo CHtml::beginForm('/search', 'get', array('class' => 'search')); ?>
                    <div class="search-block">
                        <?php echo CHtml::textField('search', $this->searchKeyword, array('class' => 'search-input', 'placeholder'=>'Search')); ?>
                        <?php echo CHtml::submitButton('', array('class' => 'search-submit', 'name' => '')); ?>
                    </div>
                <?php echo CHtml::endForm(); ?>

                <div class="clear"></div>
            </div>
        </header><!-- #header-->

        <div id="content">
            <div class="container">
                <?php echo $content; ?>
            </div>
        </div><!-- #content-->

        <!--<footer id="footer">
        </footer>--><!-- #footer -->

    </div><!-- #wrapper -->

</body>
</html>
