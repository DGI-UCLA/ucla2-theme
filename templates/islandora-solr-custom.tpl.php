<?php

/**
 * @file islandora-solr-custom.tpl.php
 * Islandora solr search results template
 *
 * Variables available:
 * - $variables: all array elements of $variables can be used as a variable. e.g. $base_url equals $variables['base_url']
 * - $base_url: The base url of the current website. eg: http://example.com .
 * - $user: The user object.
 *
 * - $style: the style of the display ('div' or 'table'). Set in admin page by default. Overridden by the query value: ?display=foo
 * - $results: the array containing the solr search results
 * - $table_rendered: If the display style is set to 'table', this will contain the rendered table.
 *    For theme overriding, see: theme_islandora_solr_custom_table()
 * - $switch_rendered: The rendered switch to toggle between display styles
 *    For theme overriding, see: theme_islandora_solr_custom_switch()
 *
 */
?>

<!--mods_title_s ~ Title-->
<!--mods_topic_s ~ Topic-->
<!--mods_geographic_s ~ Location-->
<!--mods_publisher_s ~ Publisher-->
<!--mods_genre_s ~ Genre-->
<!--mods_subjectName_s ~ Subject-->
<!--mods_dateIssued_dt ~ Issued-->
<!--PID -> image-->

<?php print $switch_rendered; ?>

<?php if ($style == 'div'): ?>

<ol class="islandora_solr_results" start="<?php print $record_start; ?>">
  <?php if ($results == ''): print '<p>' . t('Your search yielded no results') . '</p>'; ?>
  <?php else: ?>
  <?php $z = 0; ?>
  <?php $zebra = 'even'; ?>
  <?php foreach ($results as $id => $result): ?>
    <?php $zebra = (($z % 2) ? 'odd' : 'even' ); ?>
    <?php $z++;?>
    <li class="islandora_solr_result <?php print $zebra ?>">

      <div class="solr-left">
        <div class="solr-field <?php print $result['mods_title_s']['class']; ?>">
          <div class="label"><label><?php print t('Title'); ?></label></div>
          <div class="value">
            <a href="http://164.67.30.146/drupal/fedora/repository/<?php print $result['PID']['value'] ?>" title="<?php print $result['mods_title_s']['value']; ?>">
            <?php print $result['mods_title_s']['value']; ?></div>
          </a>
        </div>
        <?php if($result['mods_topic_s']['value']): ?>
        <div class="solr-field <?php print $result['mods_topic_s']['class']; ?>">
          <div class="label"><label><?php print t('Topic'); ?></label></div>
          <div class="value"><?php print $result['mods_topic_s']['value']; ?></div>
        </div>
        <?php endif; ?>

        <?php if($result['mods_geographic_s']['value']): ?>
        <div class="solr-field <?php print $result['mods_geographic_s']['class']; ?>">
          <div class="label"><label><?php print t('Location'); ?></label></div>
          <div class="value"><?php print $result['mods_geographic_s']['value']; ?></div>
        </div>
        <?php endif; ?>

        <?php if($result['mods_publisher_s']['value']): ?>
        <div class="solr-field <?php print $result['mods_publisher_s']['class']; ?>">
          <div class="label"><label><?php print t('Publisher'); ?></label></div>
          <div class="value"><?php print $result['mods_publisher_s']['value']; ?></div>
        </div>
        <?php endif; ?>

        <?php if($result['mods_genre_s']['value']): ?>
        <div class="solr-field <?php print $result['mods_genre_s']['class']; ?>">
          <div class="label"><label><?php print t('Genre'); ?></label></div>
          <div class="value"><?php print $result['mods_genre_s']['value']; ?></div>
        </div>
        <?php endif; ?>
        
        <?php if($result['mods_subjectName_s']['value']): ?>
        <div class="solr-field <?php print $result['mods_subjectName_s']['class']; ?>">
          <div class="label"><label><?php print t('Subject'); ?></label></div>
          <div class="value"><?php print $result['mods_subjectName_s']['value']; ?></div>
        </div>
        <?php endif; ?>
        
        <?php if($result['mods_dateIssued_dt']['value']): ?>
        <div class="solr-field <?php print $result['mods_dateIssued_dt']['class']; ?>">
          <div class="label"><label><?php print t('Date Issued'); ?></label></div>
          <div class="value"><?php print date('l, F j Y', strtotime($result['mods_dateIssued_dt']['value'])); ?></div>
        </div>
        <?php endif; ?>

      </div>
      <div class="solr-right">
        <a href="http://164.67.30.146/drupal/fedora/repository/<?php print $result['PID']['value'] ?>">
          <img src="http://164.67.30.146/drupal/fedora/repository/<?php print $result['PID']['value']; ?>/TN/TN" title="<?php print $result['mods_title_s']['value']; ?>" alt="<?php print $result['mods_title_s']['value']; ?>" />
        </a>
      </div>
    </li>
    <?php endforeach; ?>
  <?php endif; ?>
</ol>

<?php elseif ($style == 'table'): ?>

<?php print $table_rendered; ?>

<?php endif;