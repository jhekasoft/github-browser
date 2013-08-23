<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - ' . $user['name'];

$this->breadcrumbs = array(
    'User',
);

?>
<div class="user-info">
    <div class="user-info-left-column">
        <div class="user-info-avatar">
            <img class="user-info-avatar-image" src="<?php echo $user['avatar_url']; ?>" alt="">
        </div>

		<a style="<?php if ($isLiked) { ?>display:none;<?php } ?>" href="javascript: void(0);" onclick="Likes.like('user-info', 'user', '<?php echo $user['login'] ?>');" class="user-info-like user-info-like_<?php echo $user['login'] ?>">Like</a>
		<a style="<?php if (!$isLiked) { ?>display:none;<?php } ?>" href="javascript: void(0);" onclick="Likes.unlike('user-info', 'user', '<?php echo $user['login'] ?>');" class="user-info-unlike user-info-unlike_<?php echo $user['login'] ?>">Unlike</a>
		<img class="user-info-like-loading user-info-like-loading_<?php echo $user['login'] ?>" style="display: none;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/load-icon.gif" alt="Please wait...">

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
