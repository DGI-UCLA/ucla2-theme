<?php

/**
 * @file islandora-solr-gmap-items.tpl.php
 * Islandora solr search marker items template
 *
 * Variables available:
 * - $variables: all array elements of $variables can be used as a variable. e.g. $base_url equals $variables['base_url']
 * - $base_url: The base url of the current website. eg: http://example.com .
 * - $user: The user object.
 *
 */
?>
<?php if($marker_items): ?>
<div id="islandora-solr-gmap-items-hover">
  <img src="http://164.67.30.146/drupal/fedora/repository/<?php print $marker_items[0]['PID']; ?>/TN/TN"/>
</div>
<?php else: ?>
  <?php print t('No data found'); ?>
<?php endif; ?>