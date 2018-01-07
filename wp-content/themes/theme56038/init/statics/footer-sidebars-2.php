<?php
/**
 * @package    Cherry_Framework
 * @subpackage Class
 * @author     Cherry Team <support@cherryframework.com>
 * @copyright  Copyright (c) 2012 - 2015, Cherry Team
 * @link       http://www.cherryframework.com/
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Footer Sidebars static.
 */
class cherry_footer_sidebars_2_static extends cherry_register_static {

	/**
	 * Callback-method for registered static.
	 * @since 4.0.0
	 */
	public function callback() {
		$options = func_get_args();
		$row     = empty( $options[0] ) ? false : $this->need_row( $options[0] );

		$classes   = array();
		$classes[] = 'col-xs-12';
		$classes[] = 'col-sm-12';
        $classes[] = 'col-md-4';
		$classes   = apply_filters( 'cherry_footer_sidebars_2_static_class', $classes );
		$classes   = array_map( 'esc_attr', $classes );
		$classes   = array_unique( $classes );

		if ( true === $row ) {
			echo "<div class='row'>";
		}

		for ( $i = 1; $i <= 3; $i++ ) {
			echo '<div class="' . join( ' ', $classes ) . '">';
				cherry_get_sidebar( "sidebar-2-footer-{$i}" );
			echo '</div>';
		}

		if ( true === $row ) {
			echo "</div>";
		}
	}

	public function need_row( $options ) {
		$cols = apply_filters( 'cherry_static_options_cols', array( 'col-xs', 'col-sm', 'col-md', 'col-lg' ) );

		foreach ( $cols as $col ) {
			if ( ! empty( $options[ $col ] ) && ( 'none' != $options[ $col ] ) ) {
				return true;
			}
		}

		return false;
	}
}

/**
 * Registration for Footer Sidebars static.
 */
new cherry_footer_sidebars_2_static(
	array(
		'name'    => __( 'Footer 2 Sidebars', 'cherry' ),
		'id'      => 'footer_sidebars_2',
		'options' => array(
			'position' => 1,
			'area'     => 'footer-top',
		)
	)
);