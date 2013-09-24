<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - ' . $repo['name'];

$this->breadcrumbs = array(
    isset($mainPage)?'Main':'Repo',
);
?>

<div class="repository-info">
    <div class="repository-info-left-column">
        <h1><?php echo $repo['full_name']; ?></h1>

        <div class="repository-info-description">
            <span class="repository-info-description-title">Description:</span>
            <?php echo $repo['description']; ?>
        </div>
        <div class="repository-info-line"><span class="repository-info-line-title">Watchers:</span> <?php echo $repo['watchers_count']; ?></div>
        <div class="repository-info-line"><span class="repository-info-line-title">Forks:</span> <?php echo $repo['forks_count']; ?></div>
        <div class="repository-info-line"><span class="repository-info-line-title">Open issues:</span> <?php echo $repo['open_issues_count']; ?></div>
        <div class="repository-info-line"><span class="repository-info-line-title">Homepage:</span> <?php echo CHtml::link($repo['homepage'], $repo['homepage'], array('target' => '_blank')); ?></div>
        <div class="repository-info-line"><span class="repository-info-line-title">GitHub repo:</span> <?php echo CHtml::link($repo['html_url'], $repo['html_url'], array('target' => '_blank')); ?></div>
        <div class="repository-info-line"><span class="repository-info-line-title">Created at:</span> <?php echo $repo['created_at']; ?></div>
    </div>

    <div class="repository-info-right-column">
        <div class="repository-info-right-column-container">
            <div class="repository-info-title">Contributors</div>

            <table class="repository-info-contributors">
                <?php if (count($contributors) > 0) { ?>
                    <?php foreach ($contributors as $contributor) { ?>
                        <tr>
                            <td><?php echo CHtml::link($contributor['login'], '/user/' . $contributor['login']); ?></td>
                            <td>
                                <?php $this->widget('LikeWidget', array(
                                        'likeClass' => 'repository-info-contributor',
                                        'type' => 'user',
                                        'user' => $contributor['login'],
                                        'name' => null,
                                        'liked' => $contributor['like']
                                    )); ?>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>

                <?php if (count($additionalContributors) > 0) { ?>
                    <tr>
                        <td colspan="2">
                            <a class="repository-info-contributors-additional-link pseudolink" href="javascript: void(0);" onclick="$('.repository-info-contributors-additional').fadeToggle();">Show other</a>
                        </td>
                    </tr>
                    <tbody class="repository-info-contributors-additional" style="display: none;">
                        <?php foreach ($additionalContributors as $additionalContributor) { ?>
                            <tr>
                                <td><?php echo CHtml::link($additionalContributor['login'], '/user/' . $additionalContributor['login']); ?></td>
                                <td>
                                    <a style="<?php if ($additionalContributor['like']) { ?>display:none;<?php } ?>" href="javascript: void(0);" onclick="Likes.like('repository-info-contributor', 'user', '<?php echo $additionalContributor['login'] ?>');" class="repository-info-contributor-like repository-info-contributor-like_<?php echo $additionalContributor['login'] ?>">Like</a>
                                    <a style="<?php if (!$additionalContributor['like']) { ?>display:none;<?php } ?>" href="javascript: void(0);" onclick="Likes.unlike('repository-info-contributor', 'user', '<?php echo $additionalContributor['login'] ?>');" class="repository-info-contributor-unlike repository-info-contributor-unlike_<?php echo $additionalContributor['login'] ?>">Unlike</a>
                                    <img class="repository-info-contributor-like-loading repository-info-contributor-like-loading_<?php echo $additionalContributor['login'] ?>" style="display: none;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/load-icon.gif" alt="Please wait...">
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>

    <div class="clear"></div>
</div>
