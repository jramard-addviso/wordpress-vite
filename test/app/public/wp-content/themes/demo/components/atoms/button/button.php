<?php
extract($args);

$label = empty($label) ? '' : $label;
$type = empty($type) ? 'primary' : $type;
$url = empty($url) ? '' : $url;
$tag = empty($tag) ? 'span' : $tag;
$extraClasses = empty($extraClasses) ? [] : $extraClasses;
$extraAttributes = empty($extraAttributes) ? [] : $extraAttributes;

$defaultClasses = [
  'button',
  'button--' . $type,
];
$defaultAttributes = [];

if ($url) {
  $tag = 'a';
  $defaultAttributes = array_merge($defaultAttributes, [
    'href' => $url,
  ]);
}

$classes = array_merge($defaultClasses, $extraClasses);
$attributes = array_merge($defaultAttributes, $extraAttributes);
?>

<<?= $tag ?>
  class="<?= html_classes($classes) ?>"
  <?= html_attributes($attributes) ?>
><?= $label ?></<?= $tag ?>>
