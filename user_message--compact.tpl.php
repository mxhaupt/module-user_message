<?php

/**
 * @file
 * Theme implementation for user_message entities being rendered in view_mode compact.
 *
 *  Available variables:
 * - $user_message: The current user_message object.
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) entity label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-{ENTITY_TYPE}
 *   - {ENTITY_TYPE}-{BUNDLE}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
?>
<div id="user-message-<?php print $user_message->umid ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <div class="user-message-created-by">
    <span>
      Von <?php print format_username($created_by) . ' am ' . format_date($user_message->stamp); ?>
    </span>
  </div>
  
  <h3<?php print $title_attributes; ?>>
    <?php if ($url): ?>
      <a href="<?php print $url; ?>"><?php print $title; ?></a>
    <?php else: ?>
      Betreff: <?php print $title; ?>
    <?php endif; ?>
  </h3>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      print render($content);
    ?>
  </div>
  
  <?php if (!$answer_page): ?>
    <div class="user-message-answer">
      <a href="<?php print $url ?>/answer">Antworten</a>
    </div>
  <?php endif; ?>
  
  <?php if ($replies): ?>
    <div class="user-message-replies">
      <?php print render($replies); ?>
    </div>
  <?php endif; ?>
</div>
