<?php
extract($args);

$content = empty($content) ? '' : $content;
$type = empty($type) ? 't1' : $type;
$tag = empty($tag) ? 'h1' : $tag;
$extraClasses = empty($extraClasses) ? [] : $extraClasses;
$extraAttributes = empty($extraAttributes) ? [] : $extraAttributes;

$defaultClasses = [
  'heading',
  'heading--' . $type,
];
$defaultAttributes = [];

$classes = array_merge($defaultClasses, $extraClasses);
$attributes = array_merge($defaultAttributes, $extraAttributes);
?>

<<?= $tag ?>
  class="<?= html_classes($classes) ?>"
  <?= html_attributes($attributes) ?>
><?= $content ?></<?= $tag ?>>
