<a style="<?php if ($liked) { ?>display:none;<?php } ?>"
   href="javascript: void(0);"
   onclick="Likes.like('<?php echo $likeClass; ?>', '<?php echo $type ?>', '<?php echo $user ?>', '<?php echo $name ?>');"
   class="<?php echo $likeClass; ?>-like <?php echo $likeClass; ?>-like_<?php echo $user ?><?php echo !empty($name)?'_'.$name:'' ?>">Like</a>

<a style="<?php if (!$liked) { ?>display:none;<?php } ?>"
   href="javascript: void(0);"
   onclick="Likes.unlike('<?php echo $likeClass; ?>', '<?php echo $type ?>', '<?php echo $user ?>', '<?php echo $name ?>');"
   class="<?php echo $likeClass; ?>-unlike <?php echo $likeClass; ?>-unlike_<?php echo $user ?><?php echo !empty($name)?'_'.$name:'' ?>">Unlike</a>

<img class="<?php echo $likeClass; ?>-like-loading <?php echo $likeClass; ?>-like-loading_<?php echo $user ?><?php echo !empty($name)?'_'.$name:'' ?>"
	 style="display: none;"
	 src="<?php echo Yii::app()->request->baseUrl; ?>/images/load-icon.gif" alt="Please wait...">
