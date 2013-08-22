<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - ' . $repo['name'];

$this->breadcrumbs = array(
    'Repo',
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
        <div class="repository-info-line"><span class="repository-info-line-title">Homepage:</span> <a href="<?php echo $repo['homepage']; ?>" target="_blank"><?php echo $repo['homepage']; ?></a></div>
        <div class="repository-info-line"><span class="repository-info-line-title">GitHub repo:</span> <a href="<?php echo $repo['html_url']; ?>" target="_blank"><?php echo $repo['html_url']; ?></a></div>
        <div class="repository-info-line"><span class="repository-info-line-title">Created at:</span> <?php echo $repo['created_at']; ?></div>
    </div>

    <div class="repository-info-right-column">
        <div class="repository-info-right-column-container">
            <div class="repository-info-title">Contributors</div>

            <table class="repository-info-contributors">
                <?php if (count($contributors) > 0) { ?>
                    <?php foreach ($contributors as $contributor) { ?>
                        <tr>
                            <td><a href="#"><?php echo $contributor['login']; ?></a></td>
                            <td><a href="#" class="repository-info-contributor-like">Like</a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>

    <div class="clear"></div>
</div>
