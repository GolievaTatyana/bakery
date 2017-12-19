<?php $templateUri = get_template_directory_uri();?>

<?php
$args = array(
  'sort_column' => 'menu_order',
  'hierarchical' => 0,
  'meta_key' => 'add_to',
);
$pagesForSections = get_pages($args);

$banner = [];
$menu_1 = [];
$menu_2 = [];
$menu_3 = [];
$menu_4 = [];
// $counter  = 0;

foreach ($pagesForSections as $page) {
  switch ($page->meta_value) {
    case 'banner':
		$banner[] = $page;
		break;
    case 'menu_1':
		$menu_1[] = $page;
		break;
    case 'menu_2':
		$menu_2[] = $page;
		break;
    case 'menu_3':
		$menu_3[] = $page;
		break;
    case 'menu_4':
		$menu_4[] = $page;
		break;
	}
}
?>
<?php get_header(); ?>

<?php $section_banner = $banner[0];?>
<?php if ($section_banner): ?>
  <div id="banner">
    <div class="container-fluid">
      <div class="row">
        <div class="banner-items">
          <div class="items"></div>
          <div class="items"></div>
          <div class="items"></div>
          <div class="items"></div>
        </div>
        <div class="welcome">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <div class="slogan">
                  <h1><?php echo $section_banner->post_title; ?></h1>
                  <?php echo apply_filters('the_content', $section_banner->post_content);  ?>
                  <a href="#menu-1">our menu</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<?php endif; ?>

<?php get_header(); ?>
