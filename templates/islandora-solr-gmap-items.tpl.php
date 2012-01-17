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
<ul id="islandora-solr-gmap-items">
  <?php $zebra = 'odd'; ?>
  <?php $i = 0; ?>
  <?php foreach($marker_items as $item): ?>
     <li class="islandora-solr-gmap-item <?php print $zebra; ?>">
     <?php $zebra = ($zebra == 'odd'? 'even' : 'odd' ); ?>
     <div class="img-wrap">
       <?php if($i == 0): ?>
         <img src="http://164.67.30.146/drupal/fedora/repository/<?php print $item['PID']; ?>/JPG/JPG" class="first-image" />
       <?php $i++ ?>
       <?php else: ?>
         <img path="http://164.67.30.146/drupal/fedora/repository/<?php print $item['PID']; ?>/JPG/JPG" />
       <?php endif; ?>
     </div>
       
     <div class="solr-field-title">
       <?php $url = 'http://164.67.30.146/drupal/fedora/repository/' . $item['PID']; // @TODO: update this later to base url  ?>
       <?php $value = (is_array($item['mods_title_s'])? implode(', ', $item['mods_title_s']) : $item['mods_title_s']) ?>
       <?php print l($value, $url ); ?>
     </div>  
   
   </li>
  <?php endforeach; ?>
</ul>
<?php else: ?>
  <?php print t('No data found'); ?>
<?php endif; ?>