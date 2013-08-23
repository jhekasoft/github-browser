<?php
/* @var $this SiteController */

$this->breadcrumbs = array(
    'User',
);

?>
<div class="user-info">
    <div class="user-info-left-column">
        <div class="user-info-avatar">
            <img class="user-info-avatar-image" src="<?php echo $user['avatar_url']; ?>" alt="">
        </div>

        <a href="#" class="user-info-like">Like</a>
        <!--<a href="#" class="user-info-unlike">Unlike</a>
        <img class="user-info-like-loading" src="images/load-icon.gif" alt="Please wait...">-->

    </div>
    <div class="user-info-right-column">
        <h1><?php echo $user['name']; ?></h1>

        <div class="user-info-block">
            <div class="user-info-block-line"><?php echo $user['login']; ?></div>
            <div class="user-info-block-line"><span class="user-info-block-line-title">Email:</span> <?php echo $user['email']; ?></div>
            <div class="user-info-block-line"><span class="user-info-block-line-title">Location:</span> <?php echo $user['location']; ?></div>
            <div class="user-info-block-line"><span class="user-info-block-line-title">Company:</span> <?php echo $user['company']; ?></div>
            <div class="user-info-block-line"><span class="user-info-block-line-title">Blog:</span> <?php echo CHtml::link($user['blog'], $user['blog'], array('target' => '_blank')); ?></div>
            <div class="user-info-block-line"><span class="user-info-block-line-title">Followers:</span> <?php echo $user['followers']; ?></div>
            <div class="user-info-block-line"><span class="user-info-block-line-title">GitHub link:</span> <?php echo CHtml::link($user['html_url'], $user['html_url'], array('target' => '_blank')); ?></div>
        </div>
    </div>
</div>
