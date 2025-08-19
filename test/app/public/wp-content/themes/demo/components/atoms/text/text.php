<?php
extract($args);

$content = empty($content) ? '' : $content;
$lead = empty($lead) ? false : $lead;
$transitionType = empty($transitionType) ? '' : $transitionType;
$tag = empty($tag) ? 'div' : $tag;
$extraClasses = empty($extraClasses) ? [] : $extraClasses;
$extraAttributes = empty($extraAttributes) ? [] : $extraAttributes;

$defaultClasses = [
  'text',
  $lead ? 'text--lead' : false,
  $transitionType ? 'text--transition-' . $transitionType : false,
];
$defaultAttributes = [];

$classes = array_merge($defaultClasses, $extraClasses);
$attributes = array_merge($defaultAttributes, $extraAttributes);
?>

<<?= $tag ?>
  class="<?= html_classes($classes) ?>"
  <?= html_attributes($attributes) ?>
><?= $content ?></<?= $tag ?>>
