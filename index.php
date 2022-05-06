<?php 
/*
Plugin Name: Action Guide Checklist
Description: This plugin provides the ability to add todo list to posts / pages / widgets. Use the shortcode [mytodolist] to include it in your posts. 
Author: Anthony Hayes
Author URI: https://leadblasta.com
Version: 1.0.0
*/



// Dashboard Part




if ( is_admin() ){

/* Call the html code */
add_action('admin_menu', 'Bilal_Plugin_XLSX_CPT');

    function Bilal_Plugin_XLSX_CPT() {
            add_options_page('Todo List', 'Todo List', 'administrator',
            'Todo List', 'Bilal_XLSX_to_CPT');
    }

    function Bilal_XLSX_to_CPT(){
		echo "
			<style>
			.grid-container {
        display: grid;
        grid-template-columns: auto auto auto auto auto;
        grid-gap: 5px;
      }
      .grid-item {
        border: 1px solid rgba(0, 0, 0, 0.8);
        padding: 5px;
      }
				th, td {
					padding: 5px;
				}
				table, td, th {
					border: 1px solid black;
					border-collapse: collapse;
				}
				button {
					cursor: pointer;
				}
				.table-responsive {
					width: fit-content;
					margin: auto;
				}
				#add-btn-div {
					text-align: center;
					margin-top: 20px;
				}
				input {
					margin: 5px;
				}
				#edit-div,
				#add-div {
					width: fit-content;
					margin: auto;
				}
				label {
					margin-left: 5px;
					font-weight: bold;
					text-align: left !important;
				}
				th, td {
					text-align: center !important;
				}
				th {
					font-weight: bold;
				}
				td {
					vertical-align: middle !important;
				}
			</style>
		";
		echo '
			<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
     
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
		';
		echo '
			<div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Icons</h5>
            <button
              type="button"
              id="modal-close"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="grid-container">
              <div class="grid-item">
                <span class="dashicons dashicons-menu"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-menu-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-menu-alt2"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-menu-alt3"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-site"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-site-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-site-alt2"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-site-alt3"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-dashboard"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-post"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-media"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-links"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-page"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-comments"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-appearance"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-plugins"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-plugins-checked"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-users"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-tools"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-settings"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-network"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-home"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-generic"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-collapse"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-filter"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-customizer"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-admin-multisite"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-welcome-write-blog"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-welcome-add-page"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-welcome-view-site"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-welcome-widgets-menus"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-welcome-comments"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-welcome-learn-more"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-format-aside"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-format-image"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-format-gallery"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-format-video"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-format-status"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-format-quote"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-format-chat"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-format-audio"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-camera"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-camera-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-images-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-images-alt2"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-video-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-video-alt2"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-video-alt3"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-media-archive"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-media-audio"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-media-code"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-media-default"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-media-document"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-media-interactive"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-media-spreadsheet"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-media-text"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-media-video"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-playlist-audio"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-playlist-video"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-controls-play"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-controls-pause"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-controls-forward"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-controls-skipforward"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-controls-back"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-controls-skipback"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-controls-repeat"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-controls-volumeon"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-controls-volumeoff"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-image-crop"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-image-rotate"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-image-rotate-left"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-image-rotate-right"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-image-flip-vertical"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-image-flip-horizontal"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-image-filter"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-undo"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-redo"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-database-add"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-database"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-database-export"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-database-import"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-database-remove"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-database-view"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-align-full-width"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-align-pull-left"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-align-pull-right"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-align-wide"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-block-default"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-button"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-cloud-saved"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-cloud-upload"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-columns"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-cover-image"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-ellipsis"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-embed-audio"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-embed-generic"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-embed-photo"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-embed-post"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-embed-video"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-exit"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-heading"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-html"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-info-outline"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-insert"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-insert-after"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-insert-before"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-remove"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-saved"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-shortcode"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-table-col-after"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-table-col-before"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-table-col-delete"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-table-row-after"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-table-row-before"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-table-row-delete"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-bold"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-italic"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-ul"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-ol"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-ol-rtl"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-quote"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-alignleft"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-aligncenter"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-alignright"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-insertmore"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-spellcheck"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-expand"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-contract"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-kitchensink"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-underline"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-justify"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-textcolor"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-paste-word"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-paste-text"></span>
              </div>
              <div class="grid-item">
                <span
                  class="dashicons dashicons-editor-removeformatting"
                ></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-video"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-customchar"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-outdent"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-indent"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-help"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-strikethrough"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-unlink"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-rtl"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-ltr"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-break"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-code"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-paragraph"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-editor-table"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-align-left"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-align-right"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-align-center"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-align-none"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-lock"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-unlock"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-calendar"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-calendar-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-visibility"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-hidden"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-post-status"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-edit"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-trash"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-sticky"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-external"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-arrow-up"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-arrow-down"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-arrow-right"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-arrow-left"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-arrow-up-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-arrow-down-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-arrow-right-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-arrow-left-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-arrow-up-alt2"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-arrow-down-alt2"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-arrow-right-alt2"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-arrow-left-alt2"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-sort"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-leftright"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-randomize"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-list-view"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-excerpt-view"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-grid-view"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-move"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-share"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-share-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-share-alt2"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-rss"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-email"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-email-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-email-alt2"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-networking"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-amazon"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-facebook"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-facebook-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-google"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-instagram"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-linkedin"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-pinterest"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-podio"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-reddit"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-spotify"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-twitch"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-twitter"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-twitter-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-whatsapp"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-xing"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-youtube"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-hammer"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-art"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-migrate"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-performance"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-universal-access"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-universal-access-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-tickets"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-nametag"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-clipboard"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-heart"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-megaphone"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-schedule"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-tide"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-rest-api"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-code-standards"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-buddicons-activity"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-buddicons-bbpress-logo"></span>
              </div>
              <div class="grid-item">
                <span
                  class="dashicons dashicons-buddicons-buddypress-logo"
                ></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-buddicons-community"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-buddicons-forums"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-buddicons-friends"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-buddicons-groups"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-buddicons-pm"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-buddicons-replies"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-buddicons-topics"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-buddicons-tracking"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-wordpress"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-wordpress-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-pressthis"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-update"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-update-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-screenoptions"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-info"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-cart"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-feedback"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-cloud"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-translation"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-tag"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-category"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-archive"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-tagcloud"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-text"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-bell"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-yes"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-yes-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-no"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-no-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-plus"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-plus-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-plus-alt2"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-minus"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-dismiss"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-marker"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-star-filled"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-star-half"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-star-empty"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-flag"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-warning"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-location"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-location-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-vault"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-shield"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-shield-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-sos"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-search"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-slides"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-text-page"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-analytics"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-chart-pie"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-chart-bar"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-chart-line"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-chart-area"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-groups"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-businessman"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-businesswoman"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-businessperson"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-id"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-id-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-products"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-awards"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-forms"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-testimonial"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-portfolio"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-book"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-book-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-download"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-upload"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-backup"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-clock"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-lightbulb"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-microphone"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-desktop"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-laptop"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-tablet"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-smartphone"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-phone"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-index-card"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-carrot"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-building"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-store"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-album"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-palmtree"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-tickets-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-money"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-money-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-smiley"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-thumbs-up"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-thumbs-down"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-layout"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-paperclip"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-color-picker"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-edit-large"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-edit-page"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-airplane"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-bank"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-beer"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-calculator"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-car"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-coffee"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-drumstick"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-food"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-fullscreen-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-fullscreen-exit-alt"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-games"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-hourglass"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-open-folder"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-pdf"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-pets"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-printer"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-privacy"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-superhero"></span>
              </div>
              <div class="grid-item">
                <span class="dashicons dashicons-superhero-alt"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
		';
		$dropdown = "
			<div class='table-responsive' style='padding-right: 20px'>
			<table class='table table striped table-bordered wp-list-table widefat fixed striped table-view-list pages'>
			<tr class='thead-light'>
				<th>Post Id</th>
				<th>Actions</th>
				<th style='display: none; border-left: 0; border-bottom: 0' id='third-col'>Preview</th>
			</tr>
		";
		global $wpdb;
		$id = -1;
		echo '<div id="add-btn-div"><button class="btn button btn-primary" onclick="tdlshowAdd()">Add a Todo List</button></div>';
		
		echo "
			<script>
				function tdlshowAdd() {
					document.getElementById('edit-div').style.display = 'none';
					document.getElementById('add-div').style.display = 'block';
				}
			</script>
		";
		
		echo '<h1>Todos:</h1>';
		
    	$table1 = $wpdb->prefix . "todo_list_items";
		
		$query = 'SELECT * FROM '.$table1;
		$rows = $wpdb->get_results($query);
		$max = -1;
		$iterCount = 0;
		$rowCount = 0;
		foreach($rows as $row) {
			$iterCount = 0;
			if($row->post_id != $id or $id == -1) {
			$dropdown .= "<tr style='cursor: pointer' class='lists' data-postid='".$row->post_id."'>";
			$dropdown .= "<td>[mytodolist postid=" . $row->post_id . "]</td>";
			$dropdown .= "<td><button onclick='tdleditTodo(".$row->post_id.")' class='btn button btn-secondary edit-btn'>Edit</button><button style='margin-left: 10px' onclick='tdldeleteTodo(".$row->post_id.")' class='button btn btn-danger'>Delete</button><button class='button' id='show-btn-".$rowCount."' onclick='tdltoggleListContent(".$row->post_id.", ".$rowCount.")' style='margin-left: 10px'>Show</button></td>";
			$dropdown .= "<td style='display: none; border: 0' class='class".$row->post_id."'><table style='border: 0'  class='table table striped table-bordered wp-list-table widefat fixed striped table-view-list pages'>";
				foreach($rows as $r) {
					if($r->post_id == $row->post_id) {
						if($iterCount == 0) {
							$dropdown .= "<tr style='border-left: 0;'>
    <td style='border-left: 0; text-align: left !important; display: flex; align-items: center'>
        <span style='vertical-align: top'>". $r->time_icon ."</span>
        <span style='margin-left: 10px; font-weight: bold; font-size: 22px'>". $r->time_field ."</span>
    </td>
</tr>";
							$dropdown .= "<tr style='border-left: 0;'>
    <td style='border-left: 0; text-align: left !important; display: flex; align-items: center'>
        <span style='vertical-align: top'>". $r->effect_icon ."</span>
        <span style='margin-left: 10px; font-weight: bold; font-size: 22px'>". $r->effect_field ."</span>
    </td>
</tr>";
							
							$dropdown .= "<tr style='border-left: 0;'><td style='border-left: 0; text-align: left !important;'><span style='width: 20px; margin-right: 10px; font-weight: bold'>Heading</span><span style='vertical-align: top'>". $r->todo_heading ."</span></td></tr>";
						}
						$dropdown .= "<tr style='border-left: 0;'><td style='border-left: 0; text-align: left !important;'><input type='checkbox' style='margin-right: 10px' disabled checked />". $r->todo_content ."</td></tr>";
						$iterCount += 1;
						$rowCount += 1;
					}
				}
			$dropdown .= "</table></td></tr>";
			}
			$id = $row->post_id;
			
		}
		$dropdown .= "</table></div>";
		echo $dropdown;
		
		echo "<script>
		
				document.addEventListener('DOMContentLoaded', function() {
					document.querySelectorAll('td .dashicons').forEach(icon => {
						icon.setAttribute('style', 'background: #081108; height: 50px; width: 50px; font-size: 27pt; color: #07ff0f; border-radius: 10005pt; padding-top: 8px; padding-left: 3px;');
					})
				})
			
				function tdltoggleListContent(pid, count) {
					tdltoggleList(pid, count);
				}
			
				function tdldeleteTodo(pid) {
					
					
					var form_data = {'post_id': pid, 'action': 'tdl_delete_content'};
						
						
						jQuery.ajax({
							url: '"  .  admin_url( 'admin-ajax.php' ) .  "',
							type:'POST',
							dataType:'text',
							data : form_data,
							success: function( response ) {
								console.log(response);
								window.location.reload();
							},
							error: function( response ) {
								console.log(response);
							}
						});
					
					
					
				}
				
				function tdleditTodo(pid) {
					
					document.getElementById('add-div').style.display = 'none';
					
					var form_data = {'post_id': pid, 'action': 'tdl_get_content'};
						
						
						jQuery.ajax({
							url: '"  .  admin_url( 'admin-ajax.php' ) .  "',
							type:'POST',
							dataType:'text',
							data : form_data,
							success: function( response ) {
								document.getElementById('edit-div').style.display = 'block';
								document.getElementById('edit-div').style.textAlign = 'center';
							
								let count = 0;
								let obj = JSON.parse(response);
								let name = '';
								let brname = '';
								let label = '';
								let brr = '';
								
								let editTitle = document.createElement('h1');
								let timeIconLabel = document.createElement('label');
								timeIconLabel.innerHTML = 'Icon 1';
								let effectIconLabel = document.createElement('label');
								effectIconLabel.innerHTML = 'Icon 1';
								let todoHeadingLabel = document.createElement('label');
								todoHeadingLabel.innerHTML = 'Todo List Heading';
								let timeIconLabelBr = document.createElement('br');
								let effectIconLabelBr = document.createElement('br');
								let todoHeadingLabelBr = document.createElement('br');
								let timeIconInput = document.createElement('input');
								timeIconInput.setAttribute('type', 'text');
								timeIconInput.value = obj[0]['time_icon'];
								timeIconInput.setAttribute('placeholder', 'Icon 1 Content');
								timeIconInput.setAttribute('class', 'time-icon-edit');
								timeIconInput.setAttribute('id', 'time-icon');
								timeIconInput.setAttribute('style', 'display: none');
								let effectIconInput = document.createElement('input');
								effectIconInput.setAttribute('type', 'text');
								effectIconInput.value = obj[0]['effect_icon'];
								effectIconInput.setAttribute('placeholder', 'Icon 2 Content');
								effectIconInput.setAttribute('id', 'effect-icon');
								effectIconInput.setAttribute('class', 'effect-icon-edit');
								effectIconInput.setAttribute('style', 'display: none');
								let todoHeadingInput = document.createElement('input');
								todoHeadingInput.setAttribute('type', 'text');
								todoHeadingInput.value = obj[0]['todo_heading'];
								todoHeadingInput.setAttribute('placeholder', 'Todo Heading');
								todoHeadingInput.setAttribute('class', 'todo-heading-edit');
								todoHeadingInput.setAttribute('id', 'todo-heading');
								let timeIconBr = document.createElement('br');
								let effectIconBr = document.createElement('br');
								let todoHeadingBr = document.createElement('br');
								let timeIconEditBtn = document.createElement('button');
								timeIconEditBtn.innerHTML = 'Change Icon';
								timeIconEditBtn.setAttribute('type', 'button');
								timeIconEditBtn.setAttribute('class', 'btn btn-primary');
								timeIconEditBtn.setAttribute('data-toggle', 'modal');
								timeIconEditBtn.setAttribute('id', 'clock-icon-edit-btn');
								timeIconEditBtn.setAttribute('data-target', '#exampleModal');
								timeIconEditBtn.setAttribute('style', 'margin-left: 10px;');
								let effectIconEditBtn = document.createElement('button');
								effectIconEditBtn.innerHTML = 'Change Icon';
								effectIconEditBtn.setAttribute('type', 'button');
								effectIconEditBtn.setAttribute('class', 'btn btn-primary');
								effectIconEditBtn.setAttribute('data-toggle', 'modal');
								effectIconEditBtn.setAttribute('id', 'effect-icon-edit-btn');
								effectIconEditBtn.setAttribute('data-target', '#exampleModal');
								effectIconEditBtn.setAttribute('style', 'margin-left: 10px;');
								editTitle.innerHTML = 'Edit Todo List';
								editTitle.setAttribute('style', 'margin-left: 5px');
								let newbr = document.createElement('br');
								let newbr1 = document.createElement('br');
								let newbr2 = document.createElement('br');
								let timeLabel = document.createElement('label');
								timeLabel.innerHTML = 'Icon 1 Field:';
								let effectLabel = document.createElement('label');
								effectLabel.setAttribute('for', 'effect-field');
								effectLabel.innerHTML = 'Icon 2 Field:';
								let timeField = document.createElement('input');
								timeField.value = obj[0]['time_field'];
								timeField.setAttribute('placeholder', 'Icon 1 Field');
								timeField.setAttribute('class', 'time-field');
								timeField.setAttribute('id', 'time-field');
								let effectField = document.createElement('input');
								effectField.setAttribute('class', 'effect-field');
								effectField.setAttribute('id', 'effect-field');
								effectField.setAttribute('placeholder', 'Icon 2 Field');
								effectField.value = obj[0]['effect_field'];
								let br = document.createElement('br');
								let timeEditSpanContainer = document.createElement('span');
								timeEditSpanContainer.setAttribute('id', 'time-edit-icon');
								timeEditSpanContainer.innerHTML = obj[0]['time_icon'];
								let effectEditSpanContainer = document.createElement('span');
								effectEditSpanContainer.setAttribute('id', 'effect-edit-icon');
								effectEditSpanContainer.innerHTML = obj[0]['effect_icon'];
								let timeEditContainer = document.createElement('div');
								timeEditContainer.append(timeEditSpanContainer);
								timeEditContainer.append(timeEditSpanContainer);
								timeEditContainer.append(timeField);
								timeEditContainer.append(timeIconEditBtn);
								timeEditContainer.append(timeIconInput);
								let effectEditContainer = document.createElement('div');
								effectEditContainer.setAttribute('style', 'display: flex; margin-top: 10px;');
								timeEditContainer.setAttribute('style', 'display: flex; margin-top: 10px;');
								effectEditContainer.append(effectEditSpanContainer);
								effectEditContainer.append(effectField);
								effectEditContainer.append(effectIconEditBtn);
								effectEditContainer.append(effectIconInput);
								document.getElementById('edit-div').append(editTitle);
								document.getElementById('edit-div').append(todoHeadingLabel);
								document.getElementById('edit-div').append(todoHeadingLabelBr);
								document.getElementById('edit-div').append(todoHeadingInput);
								document.getElementById('edit-div').append(todoHeadingBr);
								document.getElementById('edit-div').append(timeEditContainer);
								document.getElementById('edit-div').append(effectEditContainer);
								document.getElementById('edit-div').append(newbr2);
								let styles = 'background: #081108; height:50px;width: 50px;font-size: 27pt;color: #07ff0f;border-radius: 10005pt;padding-top: 8px; padding-left: 3px; margin-right: 5px;';
								document.querySelector('#effect-edit-icon span').setAttribute('style', styles);
								document.querySelector('#time-edit-icon span').setAttribute('style', styles);
								
								obj.forEach(o => {
									name = 'input' + count;
									brname = 'br' + count;
									label = 'label' + count;
									brr = 'brr' + count;
									count += 1;
									
									label = document.createElement('label');
									brr = document.createElement('br');
									label.innerHTML = 'Item ' + count + ':';
									name = document.createElement('input');
									brname = document.createElement('br');
									name.setAttribute('placeholder', 'Todo Content');
									name.value = o['todo_content'];
									name.setAttribute('data-id', o['id'])
									document.getElementById('edit-div').append(label);
									document.getElementById('edit-div').append(brr);
									document.getElementById('edit-div').append(name);
									document.getElementById('edit-div').append(brname);
									
									
								})
								
									let div1 = document.createElement('div');
									div1.setAttribute('style', 'text-align: center')
									let button = document.createElement('button');
									button.innerHTML = 'Update';
									button.setAttribute('onclick', 'tdlupdateContent()');
									button.setAttribute('class', 'btn button btn-primary');
									div1.append(button);
									document.getElementById('edit-div').append(div1);
								
								
							},
							error: function( response ) {
								console.log(response);
							}
						});
					
					
					
					
				}
				
				
				function tdlupdateContent() {
					let inputs = document.querySelectorAll('#edit-div input');
					let timeField = '';
					let effectField = '';
					let timeIcon = '';
					let effectIcon = '';
					let todoHeading = '';
					let id, content;
					inputs.forEach(input => {
						if(input.classList.contains('time-field')) {
							timeField = input.value;
						}
						else if(input.classList.contains('effect-field')) {
							effectField = input.value;
						}
						else if(input.classList.contains('time-icon-edit')) {
							timeIcon = input.value;
						}
						else if(input.classList.contains('effect-icon-edit')) {
							effectIcon = input.value;
						}
						else if(input.classList.contains('todo-heading-edit')) {
							todoHeading = input.value;
						}
						else {
							id = input.getAttribute('data-id');
							content = input.value;
							
							var form_data = {'id': id, 'time-field': timeField, 'effect-field': effectField, 'content': content, 'action': 'tdl_update_content', 'todo-heading': todoHeading, 'time-icon': timeIcon, 'effect-icon': effectIcon};
							
							jQuery.ajax({
							url: '"  .  admin_url( 'admin-ajax.php' ) .  "',
							type:'POST',
							dataType:'text',
							data : form_data,
							success: function( response ) {
								console.log(response);
								window.location.reload();
							},
							error: function( response ) {
								console.log(response);
							}
						});
							
							
							
						}
					})
				}
			
			
				function tdltoggleList(pid, count) {
					let className = '.class' + pid;
					document.querySelectorAll(className).forEach(id => {
						if(id.style.display == 'none') {
							document.getElementById('show-btn-' + count).innerHTML = 'Hide';
							id.style.display = 'table-row';
							document.getElementById('third-col').style.display = 'block';
						}
						else {
							document.getElementById('show-btn-' + count).innerHTML = 'Show';
							id.style.display = 'none';
							document.getElementById('third-col').style.display = 'none';
						}
					})
				}
			</script>";
		
		$postIds = array();
		foreach($rows as $row) {
			array_push($postIds, $row->post_id);
		}
		
		if(count($postIds) > 0) {
			$max = max($postIds);
			$max += 1;
		}
		else {
			$max = 1;
		}
		
		
		
		echo "
			<div style='display: none; text-align: center' id='add-div'>
				<br>
				<input onkeyup=tdlcreateFields() type='number' placeholder='Enter Number of Fields' id='field-input' />
				<div id='fields'></div><br>
				<div style='text-align: center'><button onclick='tdladdContent(".$max.")' style='display: none; margin: auto' class='btn button button btn-primary'>Add Todo Content</button></div>
				
				<script>
				
				function tdladdContent(postId) {
					let timeField = '';
					let effectField = '';
					let todoHeading = '';
					let timeIcon = '';
					let effectIcon = '';
					let inputs = document.querySelectorAll('#fields input');
					inputs.forEach(input => {
						if(input.classList.contains('time-fields')) {
							timeField = input.value;
						}
						else if(input.classList.contains('effect-fields')) {
							effectField = input.value
						}
						else if(input.classList.contains('todo-heading-fields')) {
							todoHeading = input.value
						}
						else if(input.classList.contains('time-icon-field')) {
							timeIcon = input.value
						}
						else if(input.classList.contains('effect-icon-field')) {
							effectIcon = input.value
						}
						else {
							
							var form_data = {'post_id': postId, 'content': input.value, 'time-field': timeField, 'effect-field': effectField, 'todo-heading': todoHeading, 'time-icon': timeIcon, 'effect-icon': effectIcon, 'action': 'tdl_insert_content'};


							jQuery.ajax({
								url: '"  .  admin_url( 'admin-ajax.php' ) .  "',
								type:'POST',
								dataType:'text',
								data : form_data,
								success: function( response ) {
									console.log(response);
									window.location.reload();
								},
								error: function( response ) {
									console.log(response);
								}
							});
						}
						
						
						
					})
				}
				
				if(document.getElementById('fields').innerHTML == '') {
					document.querySelector('#add-div button').style.display = 'none';
				}
				else {
					document.querySelector('#add-div button').style.display = 'block';
				}
				
					function tdlcreateFields() {
						if(document.getElementById('fields').innerHTML == '') {
							document.querySelector('#add-div button').style.display = 'block';
						}
						else {
							document.querySelector('#add-div button').style.display = 'none';
						}
						let value = '';
						document.getElementById('fields').innerHTML = '';
						let fieldCount = document.getElementById('field-input').value;
						if(fieldCount > 0) {
						
							let addTitle = document.createElement('h1');
							addTitle.innerHTML = 'Add Todo List';
							addTitle.setAttribute('style', 'margin-left: 5px');
							let newbr2 = document.createElement('br');
							let newbr = document.createElement('br');
							let newbr1 = document.createElement('br');
							let todoHeadingLabel = document.createElement('label');
							todoHeadingLabel.innerHTML = 'Todo Heading';
							let todoHeadingLabelBr = document.createElement('br');
							let todoHeadingInput = document.createElement('input');
							todoHeadingInput.setAttribute('type', 'text');
							todoHeadingInput.setAttribute('class', 'todo-heading-fields');
							todoHeadingInput.setAttribute('placeholder', 'Todo Heading');
							let todoHeadingBr = document.createElement('br');
							let timeLabel = document.createElement('label');
							let effectLabel = document.createElement('label');
							let timeIconLabel = document.createElement('label');
							let effectIconLabel = document.createElement('label');
							let timeContainer = document.createElement('div');
							timeIconLabel.innerHTML = 'Icon 1';
							effectIconLabel.innerHTML = 'Icon 2';
							timeLabel.innerHTML = 'Icon 1 Field:';
							effectLabel.innerHTML = 'Icon 2 Field:';
							let myinput = document.createElement('input');
							let myinput2 = document.createElement('input');
							let timeIconInput = document.createElement('input');
							let effectIconInput = document.createElement('input');
							timeIconInput.setAttribute('placeholder', 'Icon 1');
							effectIconInput.setAttribute('placeholder', 'Icon 2');
							effectIconInput.setAttribute('style', 'display: none');
							effectIconInput.setAttribute('type', 'text');
							timeIconInput.setAttribute('type', 'text');
							timeIconInput.setAttribute('class', 'time-icon-field');
							timeIconInput.setAttribute('style', 'display: none');
							effectIconInput.setAttribute('class', 'effect-icon-field');
							let timeIconBr = document.createElement('br');
							let timeIconLabelBr = document.createElement('br');
							let effectIconLabelBr = document.createElement('br');
							let effectIconBr = document.createElement('br');
							let br = document.createElement('br');
							myinput.setAttribute('placeholder', 'Icon 1 Field');
							myinput.setAttribute('class', 'time-fields');
							myinput2.setAttribute('placeholder', 'Icon 2 Field');
							myinput2.setAttribute('class', 'effect-fields');
							myinput.setAttribute('type', 'text');
							myinput2.setAttribute('type', 'text');
							let clockIconButton = document.createElement('button');
							clockIconButton.setAttribute('type', 'button');
							clockIconButton.setAttribute('class', 'btn btn-primary');
							clockIconButton.setAttribute('data-toggle', 'modal');
							clockIconButton.setAttribute('id', 'clock-icon-btn');
							clockIconButton.setAttribute('data-target', '#exampleModal');
							clockIconButton.innerHTML = 'Change Icon';
							clockIconButton.setAttribute('style', 'margin: 5px;padding:5px');
							let effectIconButton = document.createElement('button');
							effectIconButton.setAttribute('type', 'button');
							effectIconButton.setAttribute('class', 'btn btn-primary');
							effectIconButton.setAttribute('data-toggle', 'modal');
							effectIconButton.setAttribute('data-target', '#exampleModal');
							effectIconButton.setAttribute('id', 'effect-icon-btn');
							effectIconButton.innerHTML = 'Change Icon';
							effectIconButton.setAttribute('style', 'margin: 5px;padding:5px');
							let timeIconSpan = document.createElement('span');
							let effectIconSpan = document.createElement('span');
							let timeIcon = document.createElement('span');
							let effectIcon = document.createElement('span');
							timeIcon.setAttribute('id', 'time-icon')
							effectIcon.setAttribute('id', 'effect-icon')
							timeIcon.setAttribute('class', 'dashicons dashicons-arrow-right-alt');
							effectIcon.setAttribute('class', 'dashicons dashicons-arrow-right-alt');
							timeIcon.setAttribute('style', 'background: #081108; height:50px;width: 50px;font-size: 27pt;color: #07ff0f;border-radius: 10005pt;padding-top: 8px; padding-left: 3px; margin-right: 5px;');
							effectIcon.setAttribute('style', 'background: #081108; height:50px;width: 50px;font-size: 27pt;color: #07ff0f;border-radius: 10005pt;padding-top: 8px; padding-left: 3px; margin-right: 5px;');
							timeIconSpan.append(timeIcon);
							effectIconSpan.append(effectIcon);
							timeIconInput.value = '<span class=\'dashicons dashicons-arrow-right-alt\'></span>';
							effectIconInput.value = '<span class=\'dashicons dashicons-arrow-right-alt\'></span>';
							timeContainer.setAttribute('style', 'margin-top: 10px;');
							let effectContainer = document.createElement('div');
							effectContainer.append(effectIconSpan);
							effectContainer.append(myinput2);
							effectContainer.append(effectIconButton);
							effectContainer.append(effectIconInput);
							timeContainer.append(timeIconSpan);
							timeContainer.append(myinput);
							timeContainer.append(clockIconButton);
							timeContainer.append(timeIconInput);
							document.getElementById('fields').append(addTitle);
							document.getElementById('fields').append(todoHeadingLabel);
							document.getElementById('fields').append(todoHeadingLabelBr);
							document.getElementById('fields').append(todoHeadingInput);
							document.getElementById('fields').append(todoHeadingBr);
							document.getElementById('fields').append(timeContainer);
							document.getElementById('fields').append(timeIconLabelBr);
							document.getElementById('fields').append(effectContainer);
						}
						let brr = '';
						let labell = '';
						for(let i=0; i<fieldCount; i++) {
							var number = parseInt(i) + 1;
							brr = 'brrr' + number;
							brr = document.createElement('br');
							labell = 'Item ' + number;
							labell = document.createElement('label');
							labell.innerHTML = 'Item: ' + number + ':';
							value = 'Todo Content ' + number;
							let input = document.createElement('input');
							let br = document.createElement('br');
							input.setAttribute('placeholder', value);
							input.setAttribute('type', 'text');
							document.getElementById('fields').append(labell);
							document.getElementById('fields').append(brr);
 							document.getElementById('fields').append(input);
							document.getElementById('fields').append(br);
						}
					}
				</script>
				
			</div>
		";
		
		echo "
			<div id='edit-div' style='display: none'>
			<br>
			</div>
		";
		
		echo "
		
			<script>
			let clicked = '';
			jQuery(document).on('click', '#clock-icon-btn', function(event){
    			clicked = 'time';
			});
			jQuery(document).on('click', '#effect-icon-btn', function(event){
    			clicked = 'effect';
			});
			jQuery(document).on('click', '#effect-icon-edit-btn', function(event){
    			clicked = 'effectEdit';
			});
			jQuery(document).on('click', '#clock-icon-edit-btn', function(event){
    			clicked = 'timeEdit';
			});
				let icons = document.querySelectorAll('.grid-container .grid-item');
      var className = '';
      var element = '';
      icons.forEach(icon => {
        icon.onclick = function() {
          className = icon.firstElementChild.getAttribute('class');
          element = '<span class=\"'+className+'\"></span>';
		  if(clicked == 'time') {
		  	document.querySelector('#time-icon').setAttribute('class', className);
		  	document.querySelector('.time-icon-field').value = element;
		  }
		  else if (clicked == 'effect') {
		  	document.querySelector('#effect-icon').setAttribute('class', className);
		  	document.querySelector('.effect-icon-field').value = element;
		  }
		  
		  else if (clicked == 'timeEdit') {
		  	document.querySelector('#time-icon').value = element;
			document.querySelector('#time-edit-icon span').setAttribute('class', className);
		  }
		  
		  else if (clicked == 'effectEdit') {
		  	document.querySelector('#effect-icon').value = element;
			document.querySelector('#effect-edit-icon span').setAttribute('class', className);
		  }
		  document.querySelector('#modal-close').click();
        }
      })
			</script>
		
		";
		
		
		
		
	}
	
}

// Dashboard Part Ends 





add_shortcode('mytodolist', 'my_custom_todo_list_code_MB');
function my_custom_todo_list_code_MB($atts){
	global $post;
setup_postdata( $post );
	$data = "<script>
	var postID = '" .  get_the_ID() . "';
	var userID = '" .  get_current_user_id() . "';
	</script>";
	if(isset($atts["postid"])){
          $data .= data_getter_todo($atts["postid"]);
	}else{
		$data .= "No Todo List Found!";
	}
	$data .=   '</div>';

    return $data;
}

// Including Bootstrap 4
add_action('wp_enqueue_scripts', 'wp_enqueue_myfiles');
function wp_enqueue_myfiles() {
	wp_enqueue_style('new-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css');
	wp_enqueue_script('new-js', 'https://code.jquery.com/jquery-3.2.1.slim.min.js');
	wp_enqueue_script('new-js1', 'https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js');
	wp_enqueue_script('new-js2', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js');
    wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' );
    wp_enqueue_script( 'boot3','//maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array( 'jquery' ),'',true );
	
	wp_enqueue_style('main-styles', plugins_url( 'css/style.css' , __FILE__ ), array(), rand(), false);
    wp_enqueue_style('todostyler');
    wp_register_style('fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
    wp_enqueue_style('fontawesome');
    wp_enqueue_script( 'frontend-ajax', plugins_url( 'js/demo.js?x=' . rand(), __FILE__ ), array('jquery'), null, true );
    wp_localize_script( 'frontend-ajax', 'frontend_ajax_object',
        array( 'ajaxurl' => admin_url( 'admin-ajax.php' ))
    	);
}

// Retrieve Todo Information
add_action( 'wp_ajax_data_getter_todo', 'data_getter_todo' );
function data_getter_todo($nitems){
		global $post;
setup_postdata( $post );
    global $wpdb;
	
	$user = wp_get_current_user();
	$roles = ( array ) $user->roles;
	if(count($roles) > 0) {
		$role = $roles[0];	
	}
	else {
		$role = "";
	}
	
// 	$pid = $_POST['pid'];
// 	$postID = get_the_ID() ;
	$postID = $nitems;
	$userID = get_current_user_id() ;
	$table1 = $wpdb->prefix . "todo_list_items_status";
    $table2 = $wpdb->prefix . "todo_list_items";

	$query = 'SELECT * FROM '.$table1.' t1 JOIN '.$table2.' t2 ON t1.todo_id=t2.id where post_id=' . $postID . ' AND user_id='. $userID;
		$rows = $wpdb->get_results($query);
		
		if($rows) {
			echo "<script>";
			foreach($rows as $row) {				
				if($row->todo_status=='true') {
					echo "	
							jQuery( document ).ready(function() {
								document.getElementById('".$row->todo_id."').checked = true;
								jQuery('#".$row->todo_id."').parent().parent().parent().addClass('completed');
								jQuery('#".$row->todo_id."').parent().parent().parent().find('.status').html('Completed');
							});	
						  ";
				}
			}
			echo "</script>";
		}
	
	
	
	
	$query = 'SELECT * FROM '.$table2.' where post_id=' . $postID . ' ORDER BY id ASC';
	//echo $query;
	$rows = $wpdb->get_results($query);

	if ( $rows ) {
	   $list= json_encode($rows, JSON_FORCE_OBJECT );
		
		
	$list = '<h2 class="card-title">' . $rows[0]->todo_heading . '</h2>';
		$list .= '<div class="metrics">';	
          $list .= '<div class="metric-wrapper" style="justify-content: center; align-items: center">
            '.$rows[0]->time_icon.'
            <div class="metric">' . $rows[0]->time_field . '</div>
          </div>';
	
          $list .= '<div class="metric-wrapper" style="justify-content: center; align-items: center">
             '.$rows[0]->effect_icon.'
            <div class="metric">' . $rows[0]->effect_field . '</div>
          </div>
	
		
		
		
		
		<section class="action-items" style="width: 100%;">

    
    <div class="progress">
      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
        <span class="sr-only">0% Complete</span>
      </div>
    </div>
    <div>
      <ul class="to-do-list">';
			foreach($rows as $key => $row) {
		$list .= '
		
        <li class="to-do-item  d-flex align-items-center">
          <div>
            <label style="margin-bottom: 25px" class="container"><input type="checkbox" onclick="checkMark(this)" id="'.$row->id.'" data-id="' . $row->id . '">
			<span class="checkmark"></span></label>
          </div>
          <p class="text">' . $row->todo_content . '</p>
          <!-- Status Indicators -->
          <p class="status">Pending</p>
          <!-- Replaces p.status node on hover if item is not completed -->
          <p class="status-on-hover">Mark</p>
        </li>';
		}

		$list .= '</ul>
    </div>
      
    </div>
  </section>';
		
		
    } 
    else {
// 		if($role == 'administrator') {
// 			$list = "<p style='width:100%;padding:20px 5px 5px 5px' id='todoform'>Enter Todo List Items: <br>";
// 			for ($x = 1; $x <= $nitems; $x++) {
//   			$list .= "<input type='text' class='form-control' placeholder='Todo Content' name='todo-" . $x . "' id='todo-" . $x . "'  /><br>";
// 			}
// 		$list .= "<button data-post-id='" . $postID . "' data-user-id='". $userID ."' class='btn btn-primary' id='todo-form-btn'>
// 		Add Todo List</button></p>";	
// 		}
// 		else {
// 			$list = "";
// 		}
		$list = "No Todo Data Found!";
	}
	return $list;
}



add_action( 'wp_ajax_tdl_get_content', 'tdl_get_content' );
function tdl_get_content() {
	$content = "";
	global $wpdb;
	$table = $wpdb->prefix . "todo_list_items";
	$post_id = $_POST['post_id'];
	$query = "SELECT * FROM " . $table ." WHERE post_id=" . $post_id;
	$rows = $wpdb->get_results($query);
	echo json_encode($rows);
	die();
}




add_action( 'wp_ajax_tdl_update_content', 'tdl_update_content' );
function tdl_update_content() {
	$content = "";
	global $wpdb;
	$table = $wpdb->prefix . "todo_list_items";
	$id = $_POST['id'];
	$timeField = $_POST['time-field'];
	$effectField = $_POST['effect-field'];
	$content = $_POST['content'];
	$timeIcon = $_POST['time-icon'];
	$effectIcon = $_POST['effect-icon'];
	$todoHeading = $_POST['todo-heading'];
	
	$query = "UPDATE " . $table . " SET todo_content='$content', time_field='$timeField', effect_field='$effectField', time_icon='$timeIcon', effect_icon='$effectIcon', todo_heading='$todoHeading' WHERE id='$id'";
	$content .= $query;
	$success = $wpdb->query($query);

	if($success){
		$content .= 'Content Updated!' ; 
	} else {
		$content .= 'Error Updating Todo. ';
	}
	echo $content;
	die();
}


add_action( 'wp_ajax_tdl_delete_content', 'tdl_delete_content' );
function tdl_delete_content() {
	$content = "";
	global $wpdb;
	$table = $wpdb->prefix . "todo_list_items";
	$post_id = $_POST['post_id'];
	
	$query = "DELETE FROM " . $table ." WHERE post_id=" . $post_id;
	$content .= $query;
	$success = $wpdb->query($query);

	if($success){
		$content .= 'Content Deleted!' ; 
	} else {
		$content .= 'Error Deleting Todo. ';
	}
	echo $content;
	die();
}




add_action( 'wp_ajax_tdl_insert_content', 'tdl_insert_content' );
function tdl_insert_content() {
	$content = "";
	global $wpdb;
	$table = $wpdb->prefix . "todo_list_items";
	$post_id = $_POST['post_id'];
	$content = $_POST['content'];
	$timeField = $_POST['time-field'];
	$effectField = $_POST['effect-field'];
	$todoHeading = $_POST['todo-heading'];
	$timeIcon = $_POST['time-icon'];
	$effectIcon = $_POST['effect-icon'];
	$query = "INSERT INTO " . $table . " (post_id, todo_content, time_field, effect_field, time_icon, effect_icon, todo_heading) VALUES ('".$post_id."', '".$content."', '".$timeField."', '".$effectField."', '".$timeIcon."', '".$effectIcon."', '".$todoHeading."');";
	$content .= $query;
	$success = $wpdb->query($query);
	if($success){
		$content .= 'Content Added!' ; 
	} else {
		$content .= 'Error Adding Content. ';
	}
	echo $content;
	die();
}



// Add Todo Content
add_action( 'wp_ajax_todo_data_handler', 'todo_data_handler' );
function todo_data_handler(){
    global $wpdb;
    $count = 0;
    $table = $wpdb->prefix . "todo_list_items";
	
	

	

    $post_id = $_POST['post-id'];
    $user_id = get_current_user_id();
	
	foreach($_POST as $key => $value) {
    	if (strpos($key, 'todo-') === 0) {
        	$wpdb->replace($table, array(
   			"post_id" => $post_id,
			"todo_content" => $value
			));
    	}
	}
	
    $content .= 'Todo Data added successfully.' ; 
	return  $content;
	die();
}



// Todo Status Changer
// add_action('wp_ajax_nopriv_ajaxlogin','ajax_login');
add_action( 'wp_ajax_change_status', 'change_status' );
function change_status() {
    global $wpdb;
	$table = $wpdb->prefix . "todo_list_items_status";

    $id = $_POST['id'];
    $status = $_POST['status'];
	echo $wpdb->delete( $table, array(   'todo_id' => $id,
									"user_id" => get_current_user_id()
								) );
	$wpdb->replace($table, array(
   "todo_id" => $id,
	"user_id" => get_current_user_id(),
   "todo_status" => $status
	));

	echo $wpdb->insert_id . " " . $status;
	die();
}



// Check initial table 
function SMART_AMR_Table_Check(){
    global $wpdb;
    
    $my_products_db_version = '1.0.0';
    $charset_collate = $wpdb->get_charset_collate();
        
    $table_name = $wpdb->prefix . "todo_list_items";
    if ( $wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name ) {
        $sql = "CREATE TABLE  $table_name ( 
            `id`  int NOT NULL AUTO_INCREMENT,
            `post_id`  varchar(256)   NOT NULL,
            `todo_content`  varchar(256)   NOT NULL,
			`time_field` varchar(256) NOT NULL,
			`effect_field` varchar(256) NOT NULL,
			`time_icon` varchar(256),
			`effect_icon` varchar(256),
			`todo_heading` varchar(256),
            PRIMARY KEY  (id)
            ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        add_option('my_db_version', $my_products_db_version);
        }

    $table_name = $wpdb->prefix . "todo_list_items_status";
    if ( $wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name ) {
        $sql = "CREATE TABLE  $table_name ( 
            `id`  int NOT NULL AUTO_INCREMENT,
            `todo_id`  varchar(256)   NOT NULL,
            `user_id`  varchar(256)   NOT NULL,
            `todo_status`  varchar(256)   NOT NULL,
            PRIMARY KEY  (id)
            ) $charset_collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        add_option('my_db_version', $my_products_db_version);
    }
}

register_activation_hook( __FILE__, 'SMART_AMR_Table_Check' );

?>