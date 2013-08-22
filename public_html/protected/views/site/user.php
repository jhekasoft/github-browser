<?php
/* @var $this SiteController */

$this->breadcrumbs = array(
    'User',
);
?>
<div class="user-info">
    <div class="user-info-left-column">
        <div class="user-info-avatar">
            <img class="user-info-avatar-image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/samples/avatar.jpeg" alt="">
        </div>

        <a href="#" class="user-info-like">Like</a>
        <!--<a href="#" class="user-info-unlike">Unlike</a>
        <img class="user-info-like-loading" src="images/load-icon.gif" alt="Please wait...">-->

    </div>
    <div class="user-info-right-column">
        <h1>Yevgeniy Yefremov</h1>

        <div class="user-info-block">
            <div class="user-info-block-line">jhekasoft</div>
            <div class="user-info-block-line"><span class="user-info-block-line-title">Company:</span> test</div>
            <div class="user-info-block-line"><span class="user-info-block-line-title">Blog:</span> <a href="http://framework.zend.com/">http://framework.zend.com/</a></div>
            <div class="user-info-block-line"><span class="user-info-block-line-title">Followers:</span> 87</div>
        </div>
    </div>
</div>
