<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - Search';
$this->searchKeyword = $searchKeyword;

$this->breadcrumbs = array(
    'Search',
);

?>
<h1>For search item "<?php echo $searchKeyword; ?>" found</h1>

<?php if (count($repositories) > 0) { ?>
    <div class="search-results">
        <?php foreach ($repositories as $repository) { ?>
            <div class="search-result">
                <div class="search-result-header">
                    <?php echo CHtml::link($repository['name'], '/repo/' . $repository['username'] . '/' . $repository['name'], array('class' => 'search-result-title')); ?>

                    <?php if (!empty($repository['homepage'])) { ?>
                        <a class="search-result-homepage" href="<?php echo $repository['homepage']; ?>" target="_blank"><?php echo $repository['homepage']; ?></a>
                    <?php } ?>

                    <?php echo CHtml::link($repository['username'], '/user/' . $repository['username'], array('class' => 'search-result-owner')); ?>
                </div>

                <div class="search-result-description">
                    <?php echo $repository['description']; ?>
                </div>

                <div class="search-result-footer">
                    <span class="search-result-footer-item search-result-footer-watchers">Watchers: <?php echo $repository['watchers']; ?></span>
                    <span class="search-result-footer-item">Forks: <?php echo $repository['forks']; ?></span>
                    <a href="#" class="search-result-like">Like</a>
                    <div class="clear"></div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <p>Nothing</p>
<?php }
