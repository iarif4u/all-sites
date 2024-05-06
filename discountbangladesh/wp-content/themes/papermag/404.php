<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package PaperMag
 */

get_header();
?>
	<div class="papermag-erro-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php papermag_error_info();?>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
