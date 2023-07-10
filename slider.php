<?php
/*
Plugin Name: follower slider
Plugin URI: https://your-website.com
Description: set follower range.
Version: 1.0
Author: Dev Emman
Author URI: https://your-website.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Enqueue plugin scripts and styles
function range_slider_enqueue_scripts() {
	// Enqueue the jQuery library
  wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), null, true);
  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins&display=swap' );
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    wp_enqueue_style( 'range-slider-style', plugin_dir_url( __FILE__ ) . 'slider-plugin.css' );
    wp_enqueue_script( 'range-slider-script', plugin_dir_url( __FILE__ ) . 'slider-plugin.js', array( 'jquery' ), '', true );
    wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true);
}
add_action( 'wp_enqueue_scripts', 'range_slider_enqueue_scripts' );

// Add shortcode for the slider
function range_slider_shortcode() {
    ob_start();
    ?>
      <div class="container-unique">
      <div class="row">
        <div class="col-sm-8 input-wrapper-unique">  
          <input type="range" min="100" max="1000000" value="100" class="slider-unique" id="slider" >
          <div class="slider-output-unique" id="sliderOutput">
            <p id="slider-text" class="slider-text-unique">
              100 Followers
            </p>
          </div>
        </div>
        <div class="col-sm-4 wrapper-unique">
          <p class="text-content-unique">Insert total # of follower(s)</p>
          <input type="number" class="follower-input" placeholder="Followers" required id="follower-input" min="100" max="1000000" value="100">
        </div>
      </div>
      <div class="row usd-wrapper-outer-unique">
        <div class="col-sm"></div>
        <div class="col-sm-8">
          <div class="usd-wrapper-inner-unique">
            <div class="text-unique">
              <p class="usd" id="usd">$ 8</p>
              <p class="month-unique">/follower</p>
            </div>
          </div>
        </div>
        <div class="col-sm"></div>
      </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'range_slider', 'range_slider_shortcode' );
