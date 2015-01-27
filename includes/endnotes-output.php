<?php
add_action( 'the_content', 'ef_endnotes_output', 1 );

/**
 * Endnotes Output
 *
 * Render endnotes.
 *
 * @package Endnotes
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford <@okayerik>
 *
 */

function ef_endnotes_output( $content ) {

	$options    = get_option( '_ef_endnotes_settings' );
	$header     = ( isset( $options['endnotes_header'] ) ) ? $options['endnotes_header'] : '';
	$single     = ( isset( $options['endnotes_template'] ) ) ? $options['endnotes_template'] : '';
	$collapse   = ( isset( $options['endnotes_collapse'] ) ) ? $options['endnotes_collapse'] : '';
	$linksingle = false;
	$singleurl  = '';

	if ( !is_page() && !is_single() && $single ) $linksingle = true;

	$post_id = get_the_ID();

	$n = 1;
	$notes = array();
	if ( preg_match_all('/\[(\d+\. .*?)\]/s', $content, $matches ) ) {
		foreach( $matches[0] as $fn ) {
			$note = preg_replace( '/\[\d+\. (.*?)\]/s', '\1', $fn );
			$notes[$n] = $note;

			if ( $linksingle ) $singleurl = get_permalink();

			$content = str_replace( $fn, "<sup class='footnote'><a href='$singleurl#fn-$post_id-$n' id='fnref-$post_id-$n' onclick='return fdfootnote_show($post_id)'>$n</a></sup>", $content );
			$n++;
		}

		// *****************************************************************************************************
		// Workaround for wpautop() bug. Otherwise it sometimes inserts an opening <p> but not the closing </p>.
		// There are a bunch of open wpautop tickets. See 4298 and 7988 in particular.
		$content .= "\n\n";
		// *****************************************************************************************************

		if ( !$linksingle ) {
			$content .= "<div class='footnotes' id='footnotes-$post_id'>";

			if ( $header ) {
				$content .= "<h3>" . esc_html( $header ) . "</h3>";
			}

			if ( $collapse ) {
				$content .= "<a href='#' onclick='return fdfootnote_togglevisible($post_id)' class='footnotetoggle'>";
				$content .= "<span class='footnoteshow'>" . sprintf( _n( 'Show %d footnote', 'Show %d footnotes', $n - 1, 'endnotes' ), $n - 1 ) . "</span>";
				$content .= "</a>";
				
				$content .= "<ol style='display: none'>";
			} else {
				$content .= "<ol>";
			}
			for( $i = 1; $i < $n; $i++ ) {
				$content .= "<li id='fn-$post_id-$i'>$notes[$i] <span class='footnotereverse'><a href='#fnref-$post_id-$i'>&#8617;</a></span></li>";
			}
			$content .= "</ol>";
			$content .= "</div>";

		}

	}

	return( $content );
}