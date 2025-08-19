<?php
extract($args);

$title = empty($title) ? '' : $title;
$titleTag = empty($titleTag) ? '' : $titleTag;
$description = empty($description) ? '' : $description;
$timestamp = empty($timestamp) ? null : $timestamp;
$image = empty($image) ? [] : $image;
$imageLoading = empty($imageLoading) ? 'eager' : $imageLoading;
$url = empty($url) ? '' : $url;
$urlLabel = empty($urlLabel) ? '' : $urlLabel;
$tag = empty($tag) ? 'div' : $tag;
$extraClasses = empty($extraClasses) ? [] : $extraClasses;
$extraAttributes = empty($extraAttributes) ? [] : $extraAttributes;

$defaultClasses = [
  'card',
  'group',
];
$defaultAttributes = [];

$classes = array_merge($defaultClasses, $extraClasses);
$attributes = array_merge($defaultAttributes, $extraAttributes);
?>

<<?= $tag ?>
  class="<?= html_classes($classes) ?>"
  <?= html_attributes($attributes) ?>
>
  <div class="card__image">
    <img
      class="w-full h-full object-cover"
      src="<?= $image['src'] ?>"
      alt="<?= $image['alt'] ?>"
      loading="<?= $imageLoading ?>"
    >
  </div>
  <div class="card__body">
    <div class="card__meta">
      <?php if ($timestamp): ?>
        <date class="card__date" datetime="<?= date('Y-m-d', $timestamp) ?>"><?= date('j F Y', $timestamp) ?></date>
      <?php endif; ?>
    </div>
    <div class="card__title">
      <?php get_template_part('components/atoms/heading/heading', null, [
        'content' => $title,
        'type' => 't5',
        'tag' => $titleTag,
      ]) ?>
    </div>
    <div class="card__description">
      <?php get_template_part('components/atoms/text/text', null, [
        'content' => $description,
        'transitionType' => 'opacity',
      ]) ?>
    </div>
  </div>
  <a class="card__footer" href="<?= $url ?>">
    <span class="card__footer__label"><?= $urlLabel ?></span>
  </a>
</<?= $tag ?>>
