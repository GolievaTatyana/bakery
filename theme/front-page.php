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

<?php if ($banner): ?>
  <div id="banner">
    <div class="container-fluid">
      <div class="row">
        <div class="banner-items">
          <?php foreach ($banner as $key => $item): ?>
            <?php if ($key < 4): ?>
              <?php echo $item->post_excerpt; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <?php foreach ($banner as $key => $item): ?>
          <?php if ($key == 4): ?>
            <div class="welcome">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-10 col-sm-offset-1">
                    <div class="slogan">
                      <h1><?php echo $item->post_title; ?></h1>
                      <?php echo apply_filters('the_content', $item->post_content);?>
                      <a href="#menu-1">our menu</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</header>
<?php endif; ?>

<?php if ($menu_1): ?>
  <section id="menu-1">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="round-wrapper"></div>
          <div class="row text-center">
            <?php foreach ($menu_1 as $key => $item): ?>
            <?php $conent_classMeta = get_post_meta( $item->ID, 'conent_class', true ); ?>
              <div class="col-sm-12 col-md-6 <?php echo $conent_classMeta ?>">
                <?php if ($key == 0): ?>
                  <h2><?php echo $item->post_title;?></h2>
                  <?php echo $item->post_excerpt;?>
                <?php elseif($key !== 0 ): ?>
                  <div class="row">
                    <?php
                    $args = array(
                      'post_parent' => $item->ID,
                      'post_type' => 'page',
                      'post_status' => 'publish',
                    );
                    $children = get_children( $args );
                    ?>
                    <?php foreach ($children as $child): ?>
                      <?php $img_nMeta = get_post_meta( $child->ID, 'img_n', true ); ?>
                      <div class="col-sm-6">
                        <div class="bg-img" style="background-image: url(<?php echo $templateUri ?>/img/pg1-img<?php echo $img_nMeta ?>.png)">
                          <a href="#" class="border"></a>
                        </div>
                      </div>
                    <?php endforeach; ?>
                    <div class="center-img">
                      <p>tastes so good!</p>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php if ($menu_2): ?>
  <section id="menu-2">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
          <div class="slider-container">
            <div class="height">
              <div class="slider-for">
                <?php foreach ($menu_2 as $key => $item): ?>
                  <?php $thumbnailUrl = get_the_post_thumbnail_url($item, full);?>
                  <div class="slide">
                    <div class="row flex">
                      <div class="col-sm-7 col-sm-push-5 col-md-8 col-md-push-4 description">
                        <div class="wrapp">
                          <h2><?php echo $item->post_title; ?></h2>
                          <?php echo apply_filters('the_content',$item->post_content); ?>
                          <div class="time">
                            <?php echo $item->post_excerpt; ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5 col-sm-pull-7 col-md-4 col-md-pull-8 preview">
                        <img src="<?php echo $thumbnailUrl; ?>" alt="<?php echo $item->post_title; ?>" class="img-responsive">
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="absolute">
              <div class="slider-nav">
                <?php foreach ($menu_2 as $key => $item): ?>
                <?php $thumbnailUrl = get_the_post_thumbnail_url($item, full);?>
                  <img src="<?php echo $thumbnailUrl; ?>" alt="<?php echo $item->post_title; ?>" class="img-responsive">
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php if ($menu_3): ?>
  <section id="menu-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="cn_wrapper">
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-sm-push-6 col-md-5 col-md-push-7">
                <div id="cn_list" class="cn_list">
                  <?php foreach ($menu_3 as $key => $item): ?>
                    <?php $itemNumber = get_post_meta($item->ID, 'item_numbers', true); ?>
                    <?php $brdrImg = get_post_meta($item->ID, 'brdr_img', true); ?>
                    <?php if ($key == 0): ?>
                      <div class="cn_page" style="display:block;">
                    <?php else: ?>
                      <div class="cn_page">
                    <?php endif; ?>
                      <div class="cn_item item<?php echo $itemNumber ?> text-center">
                        <div class="brdr" style="background-image: url(<?php echo $templateUri ?>/img/pg3-read-img<?php echo $brdrImg ?>.png)">
                          <?php echo $item->post_excerpt; ?>
                          <h2><?php echo $item->post_title; ?></h2>
                          <p><?php echo $item->post_content; ?></p>
                          <a href="#" class="md-trigger" data-modal="menu-modal-<?php echo $itemNumber ?>">read</a>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                  <div class="cn_nav">
                    <a id="cn_prev" class="cn_prev disabled"></a>
                    <a id="cn_next" class="cn_next"></a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-sm-pull-6 col-md-7 col-md-pull-5 hidden-xs">
                <div id="cn_preview" class="cn_preview">
                  <?php foreach ($menu_3 as $key => $item): ?>
                    <?php
                    $args = array(
                      'post_parent' => $item->ID,
                      'post_type' => 'page',
                      'post_status' => 'publish',
                    );
                    $children = get_children( $args );
                    ?>
                    <?php foreach ($children as $child): ?>
                      <?php if ($key == 0): ?>
                      <div class="cn_content text-center" style="top: 0px;">
                      <?php else: ?>
                      <div class="cn_content text-center">
                      <?php endif; ?>
                        <h2><?php echo $child->post_title; ?></h2>
                        <?php echo $child->post_excerpt; ?>
                      </div>
                    <?php endforeach; ?>
                  <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php if ($menu_4): ?>
  <section id="menu-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <?php foreach ($menu_4 as $key => $item): ?>
            <?php if ($key == 0): ?>
              <div class="row text-center capt">
                <h2><?php echo $item->post_title; ?></h2>
                <h4><?php echo $item->post_content; ?></h4>
              </div>
            <?php elseif($key !== 0 && $key == 1): ?>
            <div class="row parent">
              <div class="col-md-3 col-md-offset-0 col-sm-10 col-sm-offset-1 products">
                <div class="row text-center">
                  <?php
                  $args = array(
                    'post_parent' => $item->ID,
                    'post_type' => 'page',
                    'post_status' => 'publish',
                  );
                  $children = get_children( $args );
                  ?>
                  <?php $counter = 0; ?>
                  <?php foreach ($children as $child): ?>
                  <?php $meta_img_numb = get_post_meta( $child->ID, 'img_numb', true ); ?>
                    <div class="col-sm-4 col-md-12">
                      <?php if ($counter == 0): ?>
                        <div class="imag first img-responsive center-block" style="background-image: url(<?php echo $templateUri ?>/img/pg4-img<?php echo $meta_img_numb ?>.png)"></div>
                      <?php else: ?>
                        <div class="imag img-responsive center-block" style="background-image: url(<?php echo $templateUri ?>/img/pg4-img<?php echo $meta_img_numb ?>.png)"></div>
                      <?php endif; ?>
                      <h3><?php echo $child->post_title; ?></h3>
                      <p><?php echo $child->post_content; ?></p>
                    </div>
                  <?php $counter++; ?>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php else: ?>
              <div class="col-sm-12 col-sm-offset-0 col-md-9 col-md-offset-0 col-lg-8 col-lg-offset-1 item-parent">
                <div class="item-child">
                  <div class="recipe-slider">
                    <?php
                    $args = array(
                      'post_parent' => $item->ID,
                      'post_type' => 'page',
                      'post_status' => 'publish',
                    );
                    $children = get_children( $args );
                    ?>
                    <?php foreach ($children as $child): ?>
                    <?php $meta_img_n = get_post_meta( $child->ID, 'img_n', true ); ?>
                    <?php $meta_modal = get_post_meta( $child->ID, 'modal', true ); ?>
                      <div class="recipe-item">
                        <div class="wrapper">
                          <div class="recipe-img" style="background-image: url(<?php echo $templateUri ?>/img/pg4-big-img<?php echo $meta_img_n ?>.png)"></div>
                          <div class="recipe-info">
                            <?php echo $child->post_excerpt; ?>
                          </div>
                          <a href="#" class="md-trigger" data-modal="modal-<?php echo $meta_img_n ?>"><h4>full recipe</h4></a>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php get_footer(); ?>
