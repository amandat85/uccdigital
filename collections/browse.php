<?php
    $pageTitle = __('Browse collections');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>
<div class="container">
<h1><?php echo $pageTitle ?></h1>

    <div class="container browse-collections">
        <?php if ($total_results > 0): ?>
            <?php foreach (loop('collections') as $collection): ?>
                <?php $title = metadata($collection, array('Dublin Core', 'Title')); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h2><?php echo link_to_collection(array(), array('title' => 'View Collection'), 'show', $collection); ?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                      <?php if ($collectionImage = record_image($collection, null, array('class' => 'image', 'alt' => $title, 'title' => 'View Collection'))): ?>

                        <?php echo link_to_collection($collectionImage, array('class' => 'image', 'title' => 'View Collection'), 'show', $collection); ?>
                      <?php endif; ?>
                    </div>
                    <div class="col-sm-9">
                      <?php if (metadata($collection, array('Dublin Core', 'Description'))): ?>
                          <div class="collection-description">
                            <?php echo text_to_paragraphs(metadata($collection, array('Dublin Core', 'Description'), array('snippet' => 250))); ?>
                          </div>
                          <div class="ui-button-text"><?php echo link_to_collection('View Collection', array('alt' => 'View Collection', 'title' => 'View Collection'), 'show', $collection) ?></div>
                      <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p><?php echo 'No collections added, yet.'; ?></p>
        <?php endif; ?>
    </div>
    <?php echo pagination_links(); ?>        

<?php fire_plugin_hook('public_collections_browse', array('collections'=> $collections, 'view' => $this)); ?>
</div>
<?php echo foot(); ?>
