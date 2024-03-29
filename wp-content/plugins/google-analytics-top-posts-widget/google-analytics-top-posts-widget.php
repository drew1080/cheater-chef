<?php
/*
Plugin Name:  Google Analytics Top Content Widget
Description: Widget and shortcode to display top content according to Google Analytics. ("Google Analytics Dashboard" plugin required)
Plugin URI: http://j.ustin.co/yWTtmy
Author: Jtsternberg
Author URI: http://about.me/jtsternberg
Donate link: http://j.ustin.co/rYL89n
Version: 1.4.6
*/

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'dsgnwrks_ga_register_required_plugins' );
/**
 * Register the required plugins for The "Google Analytics Top Content" plugin.
 *
 */
function dsgnwrks_ga_register_required_plugins() {

  $plugins = array(

    array(
      'name'    => 'Google Analytics Dashboard',
      'slug'    => 'google-analytics-dashboard',
      'required'  => true,
    ),

  );

  $plugin_text_domain = 'top-google-posts';

  $widgets_url = '<a href="' . get_admin_url( '', 'widgets.php' ) . '" title="' . __( 'Setup Widget', $plugin_text_domain ) . '">' . __( 'Setup Widget', $plugin_text_domain ) . '</a>';


  $config = array(
    'domain'          => $plugin_text_domain,
    'default_path'    => '',
    'parent_menu_slug'  => 'plugins.php',
    'parent_url_slug'   => 'plugins.php',
    'menu'            => 'install-required-plugins',
    'has_notices'       => true,
    'is_automatic'      => true,
    'message'       => '',
    'strings'         => array(
      'page_title'                            => __( 'Install Required Plugins', $plugin_text_domain ),
      'menu_title'                            => __( 'Install Plugins', $plugin_text_domain ),
      'installing'                            => __( 'Installing Plugin: %s', $plugin_text_domain ), // %1$s = plugin name
      'oops'                                  => __( 'Something went wrong with the plugin API.', $plugin_text_domain ),
      'notice_can_install_required'           => _n_noop( 'The "Google Analytics Top Content" plugin requires the following plugin: %1$s.', 'This plugin requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
      'notice_can_install_recommended'      => _n_noop( 'This plugin recommends the following plugin: %1$s.', 'This plugin recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
      'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
      'notice_can_activate_required'          => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
      'notice_can_activate_recommended'     => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
      'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
      'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this plugin: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this plugin: %1$s.' ), // %1$s = plugin name(s)
      'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
      'install_link'                  => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
      'activate_link'                 => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
      'return'                                => __( 'Return to Required Plugins Installer', $plugin_text_domain ),
      'plugin_activated'                      => __( 'Plugin activated successfully.', $plugin_text_domain ),
      'complete'                  => __( 'All plugins installed and activated successfully. %s', $plugin_text_domain ) // %1$s = dashboard link
    )
  );

  tgmpa( $plugins, $config );

}

/**
* Register Top Content widgets
*/
add_action( 'widgets_init', 'dsgnwrks_register_google_top_posts_widgets' );
function dsgnwrks_register_google_top_posts_widgets() {
  register_widget( 'dsgnwrks_google_top_posts_widgets' );
}

/**
 * Top Content widget
 */
class dsgnwrks_google_top_posts_widgets extends WP_Widget {

    //process the new widget
    function dsgnwrks_google_top_posts_widgets() {
        $widget_ops = array(
      'classname' => 'google_top_posts',
      'description' => 'Show top posts from Google Analytics'
      );
        $this->WP_Widget( 'dsgnwrks_google_top_posts_widgets', 'Google Analytics Top Content', $widget_ops );
    }

     //build the widget settings form
    function form($instance) {

        $gad_auth_token = get_option( 'gad_auth_token' );
        if ( isset( $gad_auth_token ) && $gad_auth_token != '' && class_exists( 'GADWidgetData' ) ) {

          $defaults = array(
            'title' => 'Top Viewed Content',
            'pageviews' => 20,
            'number' => 5,
            'timeval' => '1',
            'time' => '2628000',
            'showhome' => 0,
            'titleremove' => '',
            'contentfilter' => '',
            'catlimit' => '',
            'catfilter' => '',
            'postfilter' => ''
          );
          $instance = wp_parse_args( (array) $instance, $defaults );
          extract( $instance, EXTR_SKIP );

          ?>
              <p><label><b>Title:</b><input class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>"  type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>

              <p><label><b>Show pages with at least __ number of page views:</b> <input class="widefat" name="<?php echo $this->get_field_name( 'pageviews' ); ?>"  type="text" value="<?php echo absint( $pageviews ); ?>" /></label></p>

              <p><label><b>Number to Show:</b> <input class="widefat" name="<?php echo $this->get_field_name( 'number' ); ?>"  type="text" value="<?php echo absint( $number ); ?>" /></label></p>

              <p><label><b>Select how far back you would like analytics to pull from:</b>

                  <div class="timestamp-wrap">
                    <?php

                    echo '<select style="margin-right: 5px;" id="'. $this->get_field_name( 'timeval' ) .'" name="'. $this->get_field_name( 'timeval' ) .'">';

                      for ( $i = 1; $i <= 30; $i = $i +1 ) {
                          echo '<option value="'. $i .'"';
                          echo selected( $i, $instance['timeval'], false );
                          echo '>' . $i;
                          echo '</option>';
                      }

                    echo '</select>';

                    echo '<select style="width: 50%;" id="'. $this->get_field_name( 'time' ) .'" name="'. $this->get_field_name( 'time' ) .'">';

                      echo '<option value="3600"'. selected( '3600', $time, false ). '>hour(s)</option>';
                      echo '<option value="86400"'. selected( '86400', $time, false ). '>day(s)</option>';
                      echo '<option value="2628000"'. selected( '2628000', $time, false ). '>month(s)</option>';
                      echo '<option value="31536000"'. selected( '31536000', $time, false ). '>year(s)</option>';

                    echo '</select>';
                    ?>
                  </div>
              </label></p>

              <p><label>
                <span style="width: 80%; float: left; margin-right: 10px;"><b>Remove home page from list:</b> (usually "<i>yoursite.com</i>" is the highest viewed page)<br/></span>
                <input style="margin-top: 15px;" id="<?php echo $this->get_field_id( 'showhome' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'showhome' ); ?>" value="1" <?php checked(1, $showhome); ?>/>
              </label></p>

              <p style="clear: both; padding-top: 15px;"><label><b>Remove Site Title From Listings:</b><br/>Your listings will usually be returned with the page/post name as well as the site title. To remove the site title from the listings, place the exact text you would like removed (i.e. <i>- Site Title</i>) here. If there is more than one phrase to be removed, separate them by commas (i.e. <i>- Site Title, | Site Title</i>). <b>Unless your site doesn't output the site titles, then you will need to add this in order for the filter settings below to work.</b> <input class="widefat" style="margin-top:2px;" name="<?php echo $this->get_field_name( 'titleremove' ); ?>"  type="text" value="<?php echo esc_attr( $titleremove ); ?>" /></label></p>

              <p><label>
              <b>Limit Listings To:</b>
              <select name="<?php echo $this->get_field_name( 'contentfilter' ); ?>">
              <?php
              echo '<option value="allcontent" '. selected( esc_attr( $instance['contentfilter'] ), '' ) .'>Not Limited</option>';

              $content_types = get_post_types( array( 'public' => true ) );
              foreach( $content_types as $key => $value ) {
                if ( $value == 'attachment' ) continue;
                $selected_value = esc_attr( $instance['contentfilter'] ) == $key ? 'selected' : '';
                echo "<option value='$key' $selected_value>$value</option>";
              }
              ?>
              </select>

              </label>
              </p>

              <?php if ( $instance['contentfilter'] == 'allcontent' || $instance['contentfilter'] == 'post' ) { ?>

                <p><label><b>Limit Listings To Category:</b><br/>To limit to specific categories, place comma separated category ID's.<input class="widefat" style="margin-top:2px;" name="<?php echo $this->get_field_name( 'catlimit' ); ?>"  type="text" value="<?php echo esc_attr( $catlimit ); ?>" /></label></p>

                <p><label><b>Filter Out Category:</b><br/>To remove specific categories, place comma separated category ID's.<input class="widefat" style="margin-top:2px;" name="<?php echo $this->get_field_name( 'catfilter' ); ?>"  type="text" value="<?php echo esc_attr( $catfilter ); ?>" /></label></p>

              <?php } ?>

              <p><label><b>Filter Out Post/Page IDs:</b><br/>To remove specific posts/pages, place comma separated post/page ID's.<input class="widefat" style="margin-top:2px;" name="<?php echo $this->get_field_name( 'postfilter' ); ?>"  type="text" value="<?php echo esc_attr( $postfilter ); ?>" /></label></p>
          <?php

        } elseif ( isset( $gad_auth_token ) && $gad_auth_token != '' && !class_exists( 'GADWidgetData' ) ) {
            echo dsgnwrks_gtc_widget_message_one();
            echo '<style type="text/css"> #widget-'. $this->id .'-savewidget { display: none !important; } </style>';
        } elseif ( class_exists( 'GADWidgetData' ) ) {
            if ( !isset( $gad_auth_token ) || $gad_auth_token == '' ) {
                echo dsgnwrks_gtc_widget_message_two();
                echo '<style type="text/css"> #widget-'. $this->id .'-savewidget { display: none !important; } </style>';
            }
        } else {
            echo dsgnwrks_gtc_widget_message_one();
            echo '<style type="text/css"> #widget-'. $this->id .'-savewidget { display: none !important; } </style>';
        }

    }

    //save the widget settings
    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = esc_attr( $new_instance['title'] );
        $instance['pageviews'] = absint( $new_instance['pageviews'] );
        $instance['number'] = absint( $new_instance['number'] );
        $instance['showhome'] = absint( $new_instance['showhome'] );
        $instance['time'] = esc_attr( $new_instance['time'] );
        $instance['timeval'] = absint( $new_instance['timeval'] );
        $instance['titleremove'] = sanitize_text_field( $new_instance['titleremove'] );
        $instance['contentfilter'] = esc_attr( $new_instance['contentfilter'] );
        $instance['catlimit'] = esc_attr( $new_instance['catlimit'] );
        $instance['catfilter'] = esc_attr( $new_instance['catfilter'] );
        $instance['postfilter'] = esc_attr( $new_instance['postfilter'] );
        delete_transient( 'dw-gtc-list' );

        return $instance;
    }

    //display the widget
    function widget($args, $instance) {

        extract($args);

        echo $before_widget;
        $title = apply_filters( 'widget_title', $instance['title'] );
        if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };

        echo dsgnwrks_gtc_top_content_shortcode( $instance, 'widget' );

        echo $after_widget;

    }

}

function dsgnwrks_gtc_widget_message_one() {
  return '<p><strong>The "Google Analytics Top Content" widget requires the plugin, <em>"Google Analytics Dashboard"</em>, to be installed and activated.</strong></p><p><a href="'. admin_url( 'plugins.php?page=install-required-plugins' ) .'" class="thickbox" title="Install Google Analytics Dashboard">Install plugin</a> | <a href="'. admin_url( 'plugins.php' ) .'" class="thickbox" title="Activate Google Analytics Dashboard">Activate plugin</a>.</p>';
}

function dsgnwrks_gtc_widget_message_two() {
  return '<p>You must first login to Google Analytics in the "Google Analytics Dashboard" settings for this widget to work.</p><p><a href="'. admin_url( 'options-general.php?page=google-analytics-dashboard/gad-admin-options.php' ) .'">Go to plugin settings</a>.</p>';
}

add_filter( 'tgmpa_complete_link_text', 'dsgnwrks_change_link_text' );
function dsgnwrks_change_link_text( $complete_link_text ) {
  return 'Go to "Google Analytics Dashboard" plugin settings';
}

add_filter( 'tgmpa_complete_link_url', 'dsgnwrks_change_link_url' );
function dsgnwrks_change_link_url( $complete_link_url ) {
  return admin_url( 'options-general.php?page=google-analytics-dashboard/gad-admin-options.php' );
}

// Writing Prompts Calendar Shortcode
add_shortcode( 'google_top_content', 'dsgnwrks_gtc_top_content_shortcode' );
function dsgnwrks_gtc_top_content_shortcode( $atts, $context ) {

  $defaults = array(
    'title' => 'Top Viewed Content',
    'pageviews' => 20,
    'number' => 5,
    'timeval' => '1',
    'time' => '2628000',
    'showhome' => 0,
    'titleremove' => '',
    'contentfilter' => 'allcontent',
    'catlimit' => '',
    'catfilter' => '',
    'postfilter' => ''
  );
  $atts = shortcode_atts( $defaults, $atts );
  $atts = apply_filters( 'gtc_atts_filter', $atts );

  $gad_auth_token = get_option( 'gad_auth_token' );
  if ( isset( $gad_auth_token ) && $gad_auth_token != '' && class_exists( 'GADWidgetData' ) ) {

      $trans = '';
      // @Dev
      // $atts['update'] = true;
      if ( empty( $atts['update'] ) ) {
        $trans = get_transient( 'dw-gtc-list' );
        $transuse = "\n<!-- using transient -->\n";
      }

      if ( empty( $trans ) ) {
        $transuse = "\n<!-- not using transient -->\n";

        $login = new GADWidgetData();
        $ga = new GALib( $login->auth_type, NULL, $login->oauth_token, $login->oauth_secret, $login->account_id);

        $time = ( $atts['timeval'] * $atts['time'] );
        $time_diff = abs( time() - $time );

        if ( strpos( $atts['time'], 'month' ) ) {
          $time = str_replace( '-month', '', $atts['time'] );
          $month = $time * 60 * 60 * 24 * 30.416666667;
          $time_diff = abs( time() - $month );
        }

        $pages = $ga->complex_report_query(
            date( 'Y-m-d', $time_diff ),
            date( 'Y-m-d' ),
            array( 'ga:pagePath', 'ga:pageTitle' ),
            array( 'ga:pageviews' ),
            array( '-ga:pageviews' ),
            array( 'ga:pageviews>' . $atts['pageviews'] )
          );
        $atts['context'] = ( $context ) ? $context : 'shortcode';
        $pages = apply_filters( 'gtc_pages_filter', $pages, $atts );

        $list = '';
        if ( $pages ) {
          $urlarray = array();
          $list .= '<ol>';
          $counter = 1;
          foreach( $pages as $page ) {
            $url = $page['value'];
            if ( $url == '/' && $atts['showhome'] != '0' ) {
              continue;
            }
            $url = apply_filters( 'gtc_page_url', $url );
            if ( in_array( $url, $urlarray ) ) continue;
            $urlarray[] = $url;

            if ( $atts['contentfilter'] != 'allcontent' || $atts['catlimit'] != '' || $atts['catfilter'] != '' || $atts['postfilter'] != '' ) {
              $path = pathinfo( $url );
              $query_var = strpos( $url, '?' );
              $default_permalink = strpos( $path['filename'], '?p=' );
              $url = ( $query_var !== false && false === $default_permalink )
                ? substr( $url, 0, $query_var )
                : $url;
              $wppost = null;

              if ( false !== $default_permalink ) {
                $wppost = get_post( (int) str_replace( '?p=', '', $path['filename'] ) );
              }
              if ( !$wppost && !empty( $url ) && trim( $url ) != '/' ) {
                $content_types = get_post_types( array( 'public' => true ) );
                foreach( $content_types as $type ) {
                  if ( $type == 'attachment' )
                    continue;
                  $object_name = is_post_type_hierarchical( $type ) ? $url : @end( @array_filter( @explode( '/', $url ) ) );
                  if ( $wppost = get_page_by_path( $object_name, OBJECT, $type ) )
                    break;
                }
              }

              if ( $atts['contentfilter'] != 'allcontent' ) {
                if ( empty( $wppost ) ) continue;
                if ( $wppost->post_type != $atts['contentfilter'] ) continue;
              }

              if ( $atts['contentfilter'] == 'allcontent' || $atts['contentfilter'] == 'post' ) {

                if ( $atts['catlimit'] != '' ) {
                  $limit_array = array();
                  $catlimits = esc_attr( $atts['catlimit'] );
                  $catlimits = explode( ', ', $catlimits );
                  foreach ( $catlimits as $catlimit ) {
                    // if ( is_user_logged_in() ) $list .= '<pre>'. htmlentities( print_r( $wppost->post_name, true ) ) .'</pre>';
                    if ( in_category( $catlimit, $wppost ) ) $limit_array[] = $wppost->ID;
                  }
                  if ( !in_array( $wppost->ID, $limit_array ) ) continue;

                }

                if ( $atts['catfilter'] != '' ) {
                  $filter_array = array();
                  $catfilters = esc_attr( $atts['catfilter'] );
                  $catfilters = explode( ', ', $catfilters );
                  foreach ( $catfilters as $catfilter ) {
                    if ( in_category( $catfilter, $wppost ) ) $filter_array[] = $wppost->ID;
                  }
                  if ( in_array( $wppost->ID, $filter_array ) ) continue;
                }
              }

              if ( $atts['postfilter'] != '' ) {
                $postfilter_array = array();
                $postfilters = esc_attr( $atts['postfilter'] );
                $postfilters = explode( ', ', $postfilters );
                foreach ( $postfilters as $postfilter ) {
                  // if ( is_user_logged_in() ) $list .= '<pre>'. htmlentities( print_r( $wppost->post_name, true ) ) .'</pre>';
                  if ( $postfilter == $wppost->ID ) $postfilter_array[] = $wppost->ID;
                }
                if ( in_array( $wppost->ID, $postfilter_array ) ) continue;
              }
            }

            $title = stripslashes( wp_filter_post_kses( apply_filters( 'gtc_page_title', $page['children']['value'], $page, $wppost ) ) );

            if ( !empty( $atts['titleremove'] ) ) {
              $removes = explode( ',', sanitize_text_field( $atts['titleremove'] ) );
              foreach ( $removes as $remove ) {
                $title = str_ireplace( trim( $remove ), '', $title );
              }
            }

            $list .= apply_filters( 'gtc_list_item', '<li><a href="'. $url .'">' . $title . '</a></li>', $page, $wppost, $counter );
            $counter++;
            if ( $counter > $atts['number'] ) break;
          }
          $list .= '</ol>';

        }
        $list = apply_filters( 'gtc_list_output', $list );
        set_transient( 'dw-gtc-list', $list, 86400 );
        return $transuse . $list . $transuse;
      }
      return $transuse . apply_filters( 'gtc_list_output', $trans ) . $transuse;

  } elseif ( isset( $gad_auth_token ) && $gad_auth_token != '' && !class_exists( 'GADWidgetData' ) ) {
      $list = dsgnwrks_gtc_widget_message_one();
  } elseif ( class_exists( 'GADWidgetData' ) ) {
      if ( !isset( $gad_auth_token ) || $gad_auth_token == '' ) {
          $list = dsgnwrks_gtc_widget_message_two();
      }
  } else {
      $list = dsgnwrks_gtc_widget_message_one();
  }

  return $list;

}
