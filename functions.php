<?php

/*=====================================WP Required============================================*/

/* 
WPCodex. Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts. 
WPКодекс. Устанавливает максимально разрешенную ширину встраиваемого контента (видео, изображения и т.д).
*/
	if ( ! isset( $content_width ) ) { $content_width = 600; }

/* 
Localisation 
Локализация (поддержка переводов на другой язык и путь к файлу локализации)
*/	
	function az_locale(){
        load_theme_textdomain( 'az-theme' , get_template_directory() . '/languages' );    }
	add_action( 'after_setup_theme' , 'az_locale' );

/* 
Style for editor 
Подключает файл стилей css для визуального редактора TinyMCE, что позволяет отображать в редакторе стили темы
Проверяет наличие файла стилей css указанного в параметре $stylesheet. 
Путь к файлу должен быть указан относительно каталога темы.
Если файл найден, то он подключается, если не найден, то функция пытается найти файл по умолчанию editor-style.css в каталоге темы.
*/
	function az_add_editor_styles() {
		add_editor_style( '/css/editor_styles.css' );
	}
	add_action( 'current_screen', 'az_add_editor_styles' );

/*===========================ENQUEUE SCRIPTS AND CSS========================================*/	
	
/* 
Reset.css (Reset style), comment-reply, dashicons, style, font-awesome 
Подключение скриптов (обнуление правил, комментирование, шрифт dashicons, шрифт для сайта, стили)
*/	
	function my_scripts_and_styles() {
		
		if ( is_singular() && get_option( 'thread_comments' ) )	wp_enqueue_script( 'comment-reply' );
			
		wp_enqueue_style('style', get_stylesheet_uri(), array(),null );
			
		wp_register_style( 'my_dashicons' , '/wp-includes/css/dashicons.min.css' , array(), null );	
		wp_enqueue_style( 'my_dashicons' , get_stylesheet_uri() , array( 'my_dashicons' ) , null );
		
		wp_register_style( 'font-awesome', 
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
		wp_enqueue_style('font-awesome');
			
	}
	add_action( 'wp_enqueue_scripts', 'my_scripts_and_styles' );

/*
include dynamic css
Подключение динамических стилей
*/
	require get_template_directory() . '/inc/dynamic_css.php';	


/*=====================================ADD THEME SUPPORT============================================*/
	
/* 
WPCodex. add_theme_support 
WPКодекс. Настройки опций, которые поддерживает тема.
*/
	/* 
	feed-links 
	Добавляет ссылки на RSS фиды постов и комментариев в head
	*/
		add_theme_support( 'automatic-feed-links' );
	
	/* 
	title-tag 
	Позволяет теме изменять метатег <title>
	*/	
		add_theme_support( 'title-tag' );
		
		function az_add_meta(){
			update_post_meta(1, 'az-title','', true);
			update_post_meta(1, 'az-description','', true);
			update_post_meta(1, 'az-keywords','', true);
		}
		add_action( 'after_setup_theme', 'az_add_meta' );

	/*
	custom-background
	Добавляет возможность изменять фон из админки.
	*/
		$defaults = array( 
			'default-color' => '',
			'default-image' => '', 
			'wp-head-callback' => '_custom_background_cb', 
			'admin-head-callback' => '', 
			'admin-preview-callback' => '' 
		 ); 
		add_theme_support( 'custom-background', $defaults ); 
		
	/*
	custom-header
	Добавляет возможность изменять логотип(картинку в шапке) из админки
	*/
		$args = array(
			'uploads' => true,
			'width'   => 360,
			'height'  => 50,
			'flex-height'  => true,
			'flex-width'   => true,
		);
		add_theme_support( 'custom-header', $args );
		
	/* 
	get_header_image compability
	Проверка существования картинки в шапке(возвращает true или false), используется в header.php при отображении логотипа
	*/
		function az_has_header_image() { return (bool) get_header_image(); }
		
	/* 
	post-thumbnails 
	Позволяет устанавливать миниатюру посту
	*/	
		add_theme_support( 'post-thumbnails' );		

	/* 
	html5 
	Включает поддержку html5 разметки для списка комментариев, формы комментариев, формы поиска, галереи и т.д
	*/
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		
	/*
	поддержка шорткодов в виджетах
	*/
	add_filter( 'widget_text', 'do_shortcode' );
		
/*=====================================THEME FEATURES============================================*/
	
/* 
az logo (login page)
Поддержка своего логотипа на странице входа
*/
	function loginLogo() {
		echo '<style type="text/css">
			   .login #login h1 a { 
				   background-image:url('.get_template_directory_uri().'/img/logo.png); 
				   height:150px;
				   width:330px;
				   background-size:330px 150px;
			   }
		</style>';
	}
	add_action( 'login_head', 'loginLogo' );

/*
Thumbnail in admin panel 
Поддержка миниатюр в админпанели
*/
	if ( !function_exists('fb_AddThumbColumn') && function_exists('add_theme_support') ) {
	 
		// for post and page
		add_theme_support('post-thumbnails', array( 'post', 'page' ) );
	 
		function fb_AddThumbColumn($cols) { 
			$cols['thumbnail'] = __('Thumbnail','az-theme'); 
			return $cols;
		}
	 
		function fb_AddThumbValue($column_name, $post_id) { 
				$width = (int) 75;
				$height = (int) 75;
	 
				if ( 'thumbnail' == $column_name ) {
					// thumbnail of WP 2.9
					$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
					// image from gallery
					$attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
					if ($thumbnail_id)
						$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
					elseif ($attachments) {
						foreach ( $attachments as $attachment_id => $attachment ) {
							$thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
						}
					}
						if ( isset($thumb) && $thumb ) {
							echo $thumb;
						} else {
							echo __('None','az-theme');
						}
				}
		}
	 
		// for posts
		add_filter( 'manage_posts_columns', 'fb_AddThumbColumn' );
		add_action( 'manage_posts_custom_column', 'fb_AddThumbValue', 10, 2 );
	 
		// for pages
		add_filter( 'manage_pages_columns', 'fb_AddThumbColumn' );
		add_action( 'manage_pages_custom_column', 'fb_AddThumbValue', 10, 2 );
	}

/*
breadcrumbs Dimox for WordPress - 2015.09.14 
Хлебные крошки (Отображает путь к странице)
*/
	function dimox_breadcrumbs() {

	 /* === OPTIONS === */
	$text['home'] 		= __('Home' , 'az-theme'); 
	$text['category'] 	= __('Category "%s"' , 'az-theme'); 
	$text['search'] 	= __('Search in "%s"' , 'az-theme'); 
	$text['tag'] 		= __('Tag in "%s"' , 'az-theme');
	$text['author'] 	= __('By author %s' , 'az-theme');
	$text['404'] 		= __('Error 404' , 'az-theme'); 
	$text['page'] 		= __('Page %s' , 'az-theme');
	$text['cpage'] 		= __('Page comments %s' , 'az-theme'); 
	 
	$wrap_before = '<div class="az-breadcrumbs">'; 
	$wrap_after = '</div><!-- .breadcrumbs -->'; 
	$sep = '›'; 
	$sep_before = '<span class="sep">'; 
	$sep_after = '</span>'; 
	$show_home_link = 1; 
	$show_on_home = 0; 
	$show_current = 1; 
	$before = '<span class="current">'; 
	$after = '</span>'; 
	 
	global $post;
	$home_link = home_url('/');
	$link_before = '<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
	$link_after = '</span>';
	$link_attr = ' itemprop="url"';
	$link_in_before = '<span itemprop="title">';
	$link_in_after = '</span>';
	$link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
	$frontpage_id = get_option('page_on_front');
	if ($post) $parent_id = $post->post_parent; /* az-fix */
	$sep = ' ' . $sep_before . $sep . $sep_after . ' ';
	
	if (is_home() || is_front_page()) {
		if ($show_on_home) echo $wrap_before . '<a href="' . $home_link . '">' . $text['home'] . '</a>' . $wrap_after;
	}	
	else {	  
		echo $wrap_before;
		if ($show_home_link) echo sprintf($link, $home_link, $text['home']);

		if ( is_category() ) {
			$cat = get_category(get_query_var('cat'), false);
			if ($cat->parent != 0) {
				$cats = get_category_parents($cat->parent, TRUE, $sep);
				$cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				if ($show_home_link) echo $sep;
				echo $cats;
			}
			if ( get_query_var('paged') ) {
				$cat = $cat->cat_ID;
				echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
			}
		} elseif ( is_search() ) {
      if (have_posts()) {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
      } else {
        if ($show_home_link) echo $sep;
        echo $before . sprintf($text['search'], get_search_query()) . $after;
      }

    } elseif ( is_day() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
      echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
      if ($show_current) echo $sep . $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
      if ($show_current) echo $sep . $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ($show_home_link) echo $sep;
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current) echo $sep . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $sep);
        if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
        if ( get_query_var('cpage') ) {
          echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
        } else {
          if ($show_current) echo $before . get_the_title() . $after;
        }
      }

    // custom post type
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      if ( get_query_var('paged') ) {
        echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . $post_type->label . $after;
      }

    } elseif ( is_attachment() ) {
      if ($show_home_link) echo $sep;
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); 
	  
	  /*az fix*/
	  if ($cat) $cat = $cat[0]; 
		  
	   
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $sep);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($show_home_link) echo $sep;
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $sep;
        }
      }
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      if ( get_query_var('paged') ) {
        $tag_id = get_queried_object_id();
        $tag = get_tag($tag_id);
        echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
      }

    } elseif ( is_author() ) {
      global $author;
      $author = get_userdata($author);
      if ( get_query_var('paged') ) {
        if ($show_home_link) echo $sep;
        echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
      }

    } elseif ( is_404() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
      if ($show_home_link) echo $sep;
      echo get_post_format_string( get_post_format() );
    }
    echo $wrap_after;
  }
} // end of dimox_breadcrumbs()

	
/*=========================MENU AND SIDEBAR REGISTER=======================================*/
	
/*
Menu register
Регистрация меню
*/
	add_action( 'after_setup_theme', function(){
		register_nav_menus( array( 
			'az_menu' => __( 'Main menu' , 'az-theme' ),
		) );
	});
	

/*
Header Sidebar register
Регистрация сайдбара в шапке темы
*/
	add_action( 'widgets_init', 'az_base_theme_widgets_init' );
	function az_base_theme_widgets_init(){
		register_sidebar( array(
			'name' => __( 'Header Sidebar', 'az-theme' ),
			'id' => 'header-sidebar',        
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',			
		) );
	}

/*
Sidebar register
Регистрация сайдбара
*/
	add_action( 'widgets_init', 'az_theme_widgets_init1' );
	function az_theme_widgets_init1(){
		register_sidebar( array(
			'name' => __( 'Left Sidebar', 'az-theme' ),
			'id' => 'left-sidebar',        
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="az-widget">',
			'after_title'   => '</div>',
		) );
	}

/*
Sidebar2 register
Регистрация второго сайдбара
*/
	add_action( 'widgets_init', 'az_theme_widgets_init2' );
	function az_theme_widgets_init2(){
		register_sidebar( array(
			'name' => __( 'Right Sidebar', 'az-theme' ),
			'id' => 'right-sidebar',        
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="az-widget">',
			'after_title'   => '</div>',
		) );
	}

/*
Footer Sidebar register
Регистрация сайдбара в подвале темы
*/
	add_action( 'widgets_init', 'az_theme_widgets_init3' );
	function az_theme_widgets_init3(){
		register_sidebar( array(
			'name' => __( 'Footer Sidebar', 'az-theme' ),
			'id' => 'footer-sidebar',        
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',			
		) );
	}

/*
Single Sidebar register
Регистрация сайдбара отдельной страницы
*/
	add_action( 'widgets_init', 'az_theme_widgets_init4' );
	function az_theme_widgets_init4(){
		register_sidebar( array(
			'name' => __( 'Single Left Sidebar', 'az-theme' ),
			'id' => 'single-left-sidebar',        
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="az-widget">',
			'after_title'   => '</div>',
		) );
	}


/*=====================================CUSTOMIZER============================================*/
	
/*--Customizer--*/	

	function az_customizer( $wp_customize ) {		

	/*--replace code--*/
		require 'inc/panel/title-tag.php';
		require 'inc/panel/font.php';	
		require 'inc/panel/single-page.php';
		require 'inc/panel/single-post.php';
		require 'inc/panel/front-page.php';
		//require 'inc/panel/layout.php';
		require 'inc/panel/colors.php';	
		get_template_part( 'inc/panel/header');		
		get_template_part( 'inc/panel/menu');
		get_template_part( 'inc/panel/footer');
		require get_parent_theme_file_path( 'inc/panel/layout.php' );
		require get_parent_theme_file_path( 'inc/panel/archive-page.php' );		

	
/*------------------settings check-----------------------*/
		function az_text_check ($input) {
			return wp_kses_post( force_balance_tags( $input ) );
		}
		
		function az_number_check ($input) {
			return $input*1;
		}
		
		function validate_number($validity , $value){
			$value = intval( $value );
			if ( empty( $value ) || ! is_numeric( $value ) ) {
				$validity->add( 'required', __( 'You must supply a numeric value','az-theme' ) );
			} 
			return $validity;
		}
		

		
		function az_checkbox_check($input){					 
			return ($input == true) ? true : false;
		}
		
		function az_radio_check($input){					 
			return $input;
		}
		
		
	}
	add_action( 'customize_register', 'az_customizer' );

	
	
	// function az_customizer_js() {
		// wp_enqueue_script(
			// 'az_customizer_js',
			// get_template_directory_uri() . '/js/az-customizer-js.js', 
			// array( 'jquery', 'customize-preview' ), null, true
		// );
	// }
	// add_action( 'customize_preview_init', 'az_customizer_js' );
	
/*==================================AZ FEATURES=========================================*/
	
/*
include options in admin panel
Подключение опций темы в админпанели
*/
	include_once('az-options.php');

/*
admin style register
Подключение стилей админки
*/
	function az_admin_css() {
		wp_enqueue_style( 'az_admin_css', get_template_directory_uri() . '/css/az_admin.css' );
		// wp_enqueue_script('az_admin_js',  get_template_directory_uri() . '/js/az-admin-js.js'); 			
	} 
	add_action( 'admin_enqueue_scripts', 'az_admin_css' );
	
		function az_admin_js() {
			wp_enqueue_script('az_admin_js',  get_template_directory_uri() . '/js/az-customize-controls-js.js', array( 'customize-controls', 'jquery' ), null, true );
		}
		 
	add_action( 'customize_controls_enqueue_scripts', 'az_admin_js' );


/*==== AZ WIDGET ====*/
	include_once('widget/requisites.php');

	
?>