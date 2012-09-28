<?php
/*
 * FlexSlider WordPress Integration
 *
 * Added by J. Aaron Eaton
 */


class AgriLife_FlexSlider {

  public function __construct() {

    $path = get_bloginfo('template_url') . '/inc/flexslider';
    // Queue up the Flexslider JS & CSS
    wp_enqueue_script( 'flexslider', $path . '/js/jquery.flexslider-min.js' );
    wp_enqueue_script( 'flex_init', $path . '/js/flex-init.js' );
    //wp_enqueue_style( 'flexslider_css', $path . '/css/flexslider.css' );

    
  }

  public function make_slider() {

    $slides = $this->query_features();

    $slider = '<div class="feature-container">';
    $slider .= '<ul class="slides">';

    foreach( $slides as $slide ) {
      $slider .= '<li>';
      $slider .= $slide['img'];
      $slider .= '<p class="flex-caption">' . $slide['caption'] . '</p>';
      $slider .= '</li>';
    }

    $slider .= '</ul>';
    $slider .= '</div><!-- end .feature-container -->';

    return $slider;

  }

  private function query_features() {

    global $query;

    // Setup arguments for our query
    $agencies = array(
      'extension' => 'AgriLife Extension',
      'research'  => 'AgriLife Research',
      'college'   => 'College of Agriculture &amp; Life Sciences',
      'tfs'       => 'Texas Forest Service',
      'tvmdl'     => 'TVMDL'
    );

    // Get the category ids from slugs
    $cat_ids = $this->get_cat_id( $agencies );

    $cat_args = array(
      'include' => $cat_ids,
      'orderby' => 'name',
      'order'   => 'ASC'
    );

    $categories = get_categories( $cat_args );

    $slides = array();

    foreach( $categories as $cat ) {
      $args = array(
        'showposts'         => 1,
        'category__in'      => $cat->term_id,
        'caller_get_posts'  => 1
      );
      
      $post = get_posts( $args );


        setup_postdata( $post );

        $slides[] = array(
          'img'     => $this->get_thumb( $post[0]->ID ),
          'caption' => $this->get_title( $post[0]->post_title )
        );

    }

    return $slides;

  }

  /**
   * Gets the category ids of each agency category
   *
   * @param array agencies List of agency category slugs
   * @return array cats List of agency category ids
   */
  private function get_cat_id( $agencies ) {

    foreach( $agencies as $k => $v ) {
      $cat = get_category_by_slug( $k );

      $cats[] = $cat->term_id;
    }

    return $cats;

  }

  private function get_thumb( $id ) {
  
    $img = get_the_post_thumbnail( $id, 'feature-large');

    return $img;
  
  }

  private function get_title( $title ) {
  
    $caption = $title;

    return $caption;
  
  }

}
