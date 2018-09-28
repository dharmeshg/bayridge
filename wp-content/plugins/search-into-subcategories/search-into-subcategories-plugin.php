<?php
/*
Plugin Name: Search-into-subcategories
Plugin URI: http://wordpress.org/plugins/search-into-subcategories/
Description: search-into-subcategories Show category heritance with a simple shortcode. http://codescar.eu/projects/search-into-subcategories
Author: lion2486
Version: 1.0.2
Author URI: http://codescar.eu
Contributors: lion2486
Tags: search, subcategories
Requires at least: 3.0.1
Tested up to: 4.7.2
Text Domain: search-into-subcategories
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! class_exists( 'My_Walker_CategoryDropdown' ) ) {
	class My_Walker_CategoryDropdown extends Walker_CategoryDropdown {//extends Walker {

		private $SIS_DATA, $ID;

		public function __construct( &$data, $id, $type = "category" ) {
			$this->SIS_DATA = &$data;
			$this->ID       = $id;
            $this->tree_type = $type;
		}

		/**
		 * @see Walker::$tree_type
		 * @since 2.1.0
		 * @var string
		 */
		var $tree_type = 'category';

		/**
		 * @see Walker::$db_fields
		 * @since 2.1.0
		 * @todo Decouple this
		 * @var array
		 */
		var $db_fields = array( 'parent' => 'parent', 'id' => 'term_id' );

		//static var $data;

		/**
		 * Start the element output.
		 *
		 * @see Walker::start_el()
		 * @since 2.1.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $category Category data object.
		 * @param int $depth Depth of category. Used for padding.
		 * @param array $args Uses 'selected' and 'show_count' keys, if they exist. @see wp_dropdown_categories()
		 */
		function start_el( &$output, $category, $depth = 0, $args = array() ) {

			$pad = str_repeat( '&nbsp;', $depth * 3 );

			$cat_name = apply_filters( 'list_cats', $category->name, $category );
			if ( $depth != 0 ) {
				if ( array_key_exists( $category->parent, $this->SIS_DATA ) && is_array( $this->SIS_DATA[ $category->parent ] ) ) {
					$this->SIS_DATA[ $category->parent ] = array_merge( $this->SIS_DATA[ $category->parent ], array( $category->term_id => $cat_name ) );
				} else {
					$this->SIS_DATA[ $category->parent ] = array( $category->term_id => $cat_name );
				}
			} else {
				$output .= "\t<option class=\"level-{$this->ID}-$depth\" value=\"" . $category->term_id . "\"";
				if ( $category->term_id == $args[ 'selected' ] ) {
					$output .= ' selected="selected"';
				}
				$output .= '>';
				$output .= $pad . $cat_name;
				if ( $args[ 'show_count' ] ) {
					$output .= '&nbsp;&nbsp;(' . $category->count . ')';
				}
				$output .= "</option>\n";
			}

		}

		/*function start_el(&$output, $category, $depth, $args) {
			$pad = str_repeat('&nbsp;', $depth * 3);
			$cat_name = apply_filters('list_cats', $category->name, $category);

			if( !isset($args['value']) ){
				$args['value'] = ( $category->taxonomy != 'category' ? 'slug' : 'id' );
			}

			$value = ($args['value']=='slug' ? $category->slug : $category->term_id );

			$output .= "\t<option class=\"level-$depth\" value=\"".$value."\"";
			if ( $value === (string) $args['selected'] ){
				$output .= ' selected="selected"';
			}
			$output .= '>';
			$output .= $pad.$cat_name;
			if ( $args['show_count'] )
				$output .= '&nbsp;&nbsp;('. $category->count .')';

			$output .= "</option>\n";
		}*/

		function end_lvl( &$output, $depth = 0, $args = array() ) {
			//$output .= print_r($SELF::data, true);
		}
	}
}

if ( ! class_exists( 'SIS' ) ) {
	class SIS {
		public $SIS_DATA;
		private $id;
		private $max_depth;
		private static $DEBUG = "true";
		private static $inc = 0;
		private static $text_domain = "sis_domain";
		private static $JSON_DATA = array();

		public function __construct() {
			$langDir = dirname( plugin_basename( __FILE__ ) ) . '/lang';

			load_plugin_textdomain( self::$text_domain, false, $langDir );

			add_action( 'init', array( $this, 'check' ) );
			add_shortcode( 'search-into-subcategories', array( $this, 'SIS_shortcode' ) );
		}

		public function pre_get_posts( $query ) {
			if ( ! empty( $query->is_search ) ) {

				////////////////////////////
				//Filter selected category
				if ( ! empty( $_GET[ 'cat' ] ) ) {

					$query->set( 'cat', intval( $_GET['cat'] ) );
				}

				///////////////////////////
				//Filter date ranges
				$date_ranges = array();
				//remove and add one day on each query in order to include it in results
				if ( ! empty( $_GET['start_date'] ) ) {
					$date_ranges = array_merge( $date_ranges, array(
						'after' =>date('Y-m-d', strtotime($_GET['start_date'] . ' -1 day'))
					));
				}
				if ( ! empty( $_GET['end_date'] ) ) {
					$date_ranges = array_merge( $date_ranges, array(
						'before' => date('Y-m-d', strtotime($_GET['end_date'] . ' +1 day'))
					));
				}
				if ( count( $date_ranges ) > 0 ){
					$query->set( 'date_query', $date_ranges );
				}

				///////////////////////////////
				//Filter to custom meta_field
				$meta_query = array();
				if( ! empty( $_GET['meta'] ) && $_GET['meta'] > 0 ) {
					for( $i = 0; $i < $_GET['meta']; $i++ ){
						if( ! empty( $_GET['key-'.$i] ) &&  ! empty( $_GET['val-'.$i]) ){
							$meta_query = array_merge( $meta_query, array(
									array(
										'key'     => $_GET['key-'.$i],
										'value'   => $_GET['val-'.$i],
										'compare' => 'LIKE',
									) )
							);
						}
					}

					$query->set( 'meta_query', $meta_query );
				}

				//////////////////////////////
				//add option for posts_per_page
				if ( ! empty( $_GET['posts_per_page'] ) ) {
					$query->set( 'posts_per_page', intval( $_GET['posts_per_page'] ) );
				}

				//////////////////////////////
				//custom post types result
				if( ! empty( $_GET['post_types'] ) ){
					$query->set( 'post_type', $_GET['post_type'] );
				}

			}
//			echo "<div style=\"display:none;\">";
//			print_r($query);
//			echo "</div>";
		}

		public function check() {
			if ( isset( $_GET[ 'search_into_subcategories' ] ) && 1 == $_GET[ 'search_into_subcategories' ] ) {

				/* Action for modify query arguments */
				add_action( 'pre_get_posts' , array( $this, 'pre_get_posts' ), 500);
			}

			return;
		}

		/**
		 * @param $atts
		 *
		 * @return string
		 */
		public function SIS_shortcode( $atts ) {

			/**
			 * Init variables to suspend IDE errors
			 */
			$max_depth         = null;
			$custom_field      = null;
			$custom_field_labels= null;
			$custom_post_types = null;
			$labels            = null;
			$parent_category   = null;
			$hide_empty        = null;
			$exclude           = null;
			$search_input      = null;
			$search_text       = null;
			$show_date_ranges  = null;
			$posts_per_page    = null;
            $custom_taxonomy   = null;

			$this->SIS_DATA = array();
			$this->id       = self::$inc ++;

			$text = "<form onSubmit=\"if(jQuery('#s').val() == '') jQuery('#s').val(' ');\" action=\"" . site_url() . "\" mathod=\"GET\" class=\"sis-form\" name=\"SIS_form\">";


			// extract Attributes
			extract( shortcode_atts( array(
				//the category root of the tree-structure you want to show
				'parent_category'     => '0',
				//max number of childs-categories
				'max_depth'           => '2',
				//use text search or not (0/1)
				'search_input'        => '1',
				//the text labels for the category1|category2|...|text_search ( | seperator)
				'labels'              => '',
				//Search button text
				'search_text'         => __( 'Search', self::$text_domain ),
				//hide or show empty categories (1/0)
				'hide_empty'          => 1,
				//list of categories (ids) to exclude
				'exclude'             => '',
				//show or hide publish_date range (0/1)
				'show_date_ranges'    => false,
				//list of custom fields to search in ( , seperator, example: field1,meta_key,etc )
				'custom_field'        => null,
				//list for labels in custom fields text input ( | seperator, example: name1|name2|etc )
				'custom_field_labels' => null,
				//post type to fetch
				'custom_post_types'   => '',
				//set results posts_per_page
				'posts_per_page'      => null,
                //Set custom taxonomy to walk
                'custom_taxonomy'     => 'category',

			), $atts ) );

			$this->max_depth   = $max_depth;

            if( null !== $custom_field )
			    $custom_field      = explode( ',', $custom_field );

			if ( '' != $custom_field_labels )
				$custom_field_labels= explode( '|', $custom_field_labels );

			if ( '' != $labels ) {
				$labels = explode( '|', $labels );
			}

			$children = get_categories( array(
					'parent' => $parent_category
				)
			);

			$args = array(
				'show_option_all'  => '',
				'show_option_none' => '',
				'orderby'          => 'ID',
				'order'            => 'ASC',
				'show_count'       => 1,
				'hide_empty'       => $hide_empty,
				'child_of'         => $parent_category,
				'exclude'          => $exclude,
				'echo'             => 0,
				'selected'         => 0,
				'hierarchical'     => 1,
				'name'             => 'level-' . $this->id . '-0',
				'id'               => 'level-' . $this->id . '-0',
				'class'            => 'postform',
				'depth'            => $max_depth,
				'tab_index'        => 0,
				'taxonomy'         => $custom_taxonomy,
				'hide_if_empty'    => false,
				'walker'           => new My_Walker_CategoryDropdown( $this->SIS_DATA, $this->id, $custom_taxonomy ),

			);

			if ( count( $labels ) >= 0 ) {
				$text .= "<label class=\"sis-label\" for=\"level-{$this->id}-0\">{$labels[0]}: </label>";
			}
			$text .= wp_dropdown_categories( $args );

			$text .= "";
			for ( $i = 1; $i < $max_depth; $i ++ ) {
				if ( count( $labels ) > $i ) {
					$text .= "<label class=\"sis-label\" for=\"level-{$this->id}-$i\">{$labels[$i]}: </label>";
				}
				$text .= "<select class=\"sis-select\" name=\"level-{$this->id}-$i\" id=\"level-{$this->id}-$i\" disabled=\"disabled\" class=\"postform\"><option>-- SELECT --</option></select>";
			}

			if ( 1 == $search_input ) {
				if ( count( $labels ) > $max_depth ) {
					$text .= "<label class=\"sis-label\" for=\"s\">{$labels[$max_depth]}: </label>";
				}
				$text .= "<input class=\"sis-input\" type=\"text\" name=\"s\" id=\"s\" value=\"\" placeholder=\"". __( "Keywords", self::$text_domain ) ."\" /><br/>";
			}

			if ( 1 == $show_date_ranges ) {
				//TODO maybe use datepicker type field
				$text .= "<label class=\"sis-label\" for=\"start-date-{$this->id}\">" . __( "Date from:", self::$text_domain ) . " </label>";
				$text .= "<input class=\"sis-input\" type=\"text\" id=\"start-date-{$this->id}\" placeholder=\"" . __( "Date from", self::$text_domain ) . "\" name=\"start_date\" onfocus=\"(this.type='date')\"/>";


				$text .= "<label class=\"sis-label\" for=\"end-date-{$this->id}\">" . __( "Date to:", self::$text_domain ) . " </label>";
				$text .= "<input class=\"sis-input\" type=\"text\" id=\"end-date-{$this->id}\" placeholder=\"" . __( "Date to", self::$text_domain ) . "\" name=\"end_date\" onfocus=\"(this.type='date')\"/>";
			}

			//(custom) meta_field search key-word
			if ( null !== $custom_field ) {
				$i = 0;
				foreach( $custom_field as $field ){
					$text .= "<input type=\"hidden\" name=\"key-{$i}\" value=\"{$field}\"/>";
					$text .= "<label class=\"sis-label\" for=\"val-{$this->id}-{$i}\">{$custom_field_labels[$i]}</label>";
					$text .= "<input class=\"sis-input\" type=\"text\" id=\"val-{$this->id}-{$i}\" placeholder=\"{$custom_field_labels[$i]}\" name=\"val-{$i}\"/>";
					$i++;
				}
				$text .= "<input type=\"hidden\" name=\"meta\" value=\"{$i}\"/>";
			}

			$text .= "<input type=\"hidden\" name=\"cat\" id=\"category-{$this->id}\" value=\"0\" />";
			$text .= "<input type=\"hidden\" name=\"search_into_subcategories\" value=\"1\" />";

			$text .= "<input type=\"hidden\" name=\"sis_id\" value=\"{$this->id}\" />";

			if( ! empty( $custom_post_types ) )
				$text .= "<input type=\"hidden\" name=\"post_types\" value=\"{$custom_post_types}\"/>";

			if( $posts_per_page )
				$text .= "<input type=\"hidden\" name=\"posts_per_page\" value=\"{$posts_per_page}\" />";

			$text .= "<br/><input class=\"button button-primary sis-button\" type=\"submit\" value=\"{$search_text}\" />";
			$text .= "</form>";

			self::$JSON_DATA[$this->id] = $this->SIS_DATA;

			add_action( 'wp_footer', array( $this, 'print_scripts' ) );

			return $text;
		}

		public function print_scripts() {

			?>
			<script type="text/javascript">

				<?php
				for ( $i=0 ; $i <= $this->id ; $i++ ) :
				$SIS_D = 'SIS_DATA_' . $i;
				$SIS_L = 'SIS_LEVELS_' . $i;
				?>
				var <?php echo $SIS_D; ?> = <?php echo json_encode(self::$JSON_DATA[$i]); ?>;
				//TODO Here use only the last's instance records!
				//TODO something is going on here, there are not all category array-keys (id)

				var <?php echo $SIS_L; ?> = <?php echo $this->max_depth; ?>;
				var SIS_debug = <?php echo SIS::$DEBUG; ?>;

				function add_SIS_level_<?php echo $i; ?>(level) {
					jQuery("#level-<?php echo $i; ?>-" + level).change(function () {
						jQuery("#level-<?php echo $i; ?>-" + (level + 1))
							.html("<option>-- SELECT --</option>")
							.nextAll("select").prop("disabled", true);

						jQuery("#category-<?php echo $i; ?>").val(jQuery(this).val());

						if (!<?php echo $SIS_D; ?>[jQuery("#level-<?php echo $i; ?>-" + level).val()]) {
							if (SIS_debug)
								console.log("SIS: <?php echo $SIS_D; ?> for level <?php echo $i; ?>-" + level + " was empty.");
							return;
						}
						if (!Object.keys(<?php echo $SIS_D; ?>[jQuery("#level-<?php echo $i; ?>-" + level).val()]).length) {
							if (SIS_debug)
								console.log("SIS: <?php echo $SIS_D; ?> object has no keys");
							return;
						}
						jQuery("#level-<?php echo $i; ?>-" + (level + 1)).prop("disabled", false);

						jQuery.each(<?php echo $SIS_D; ?>[jQuery("#level-<?php echo $i; ?>-" + level).val()], function (key, value) {
							jQuery("#level-<?php echo $i; ?>-" + (level + 1)).append(
								jQuery("<option></option>")
									.attr("value", key)
									.text(value)
							);
						});
					});
				}

				jQuery(function () {
					for (var i = <?php echo $SIS_L; ?> -1; i >= 0; i--) {
						add_SIS_level_<?php echo $i; ?>(i);
					}
					//set the initial value
					jQuery("#category-<?php echo $i; ?>").val(jQuery('#level-<?php echo $i; ?>-0').val());
				});
				<?php endfor; ?>
			</script>
			<?php
		}
	}
}

if ( class_exists( 'SIS' ) ) {
	$SIS = new SIS();
}

