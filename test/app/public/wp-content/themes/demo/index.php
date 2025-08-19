<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 */
?>

<!DOCTYPE html>
<html lang="<?= get_bloginfo('language') ?>">
<head>
  <meta charset="<?= get_bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php if (wp_title()): ?>
      <?php wp_title() ?> - <?= get_bloginfo('name') ?>
    <?php else: ?>
      <?= get_bloginfo('name') ?>
    <?php endif; ?>
  </title>
  <meta name="description" content="<?= get_bloginfo('description') ?>">
  <?php wp_head() ?>
</head>
<body class="bg-primary-lighter text-primary-dark">
  <div
    class="container grid place-content-center gap-12 min-w-xs min-h-dvh py-8 overflow-hidden"
    id="app"
  >
    <img
      class="mx-auto"
      src="<?= resolve('assets/images/pikachu-128.png') ?>"
      alt="Pikachu"
    >
    <?php get_template_part('components/atoms/heading/heading', null, [
      'content' => 'Pokem ipsum',
      'extraClasses' => ['text-center'],
    ]) ?>
    <?php get_template_part('components/atoms/text/text', null, [
      'content' => "<p>Squirtle Teddiursa Rufflet Bronzor Sandslash Wooper Heracross. Cerulean City you're not wearing shorts Serperior Vespiquen Garbodor Chimecho they're comfy and easy to wear. Yellow Squirtle Ralts Nidorina Vanillish Parasect Spinarak.</p>",
      'extraClasses' => ['max-w-120', 'mx-auto', 'text-center', 'text-pretty'],
    ]) ?>
    <!-- <?php get_template_part('components/molecules/card/card', null, [
      'title' => 'Pokem ipsum dolor sit amet',
      'titleTag' => 'h2',
      'description' => "<p>Qui officia deserunt mollit Snover Magnemite Hitmonchan Drilbur Skitty Growlithe.</p>",
      'timestamp' => mktime(0, 0, 0, 1, 1, 2000),
      'image' => [
        'src' => resolve('assets/images/placeholder-sheep.webp'),
        'alt' => 'Pokem ipsum',
      ],
      'url' => '#',
      'urlLabel' => 'Pokem ipsum',
      'extraClasses' => ['max-w-120', 'mx-auto'],
    ]) ?> -->
    <?php get_template_part('components/atoms/button/button', null, [
      'label' => 'Pokem ipsum',
      'url' => '#',
    ]) ?>
  </div>
  <?php wp_footer() ?>
</body>
</html>
