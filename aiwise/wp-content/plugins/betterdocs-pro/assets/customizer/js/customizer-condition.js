!function(t){"use strict";function _(_,o,e){wp.customize.control(o,(function(o){var r=e.split(","),a=function(){t.inArray(_.get(),r)>-1?o.container.slideDown(180):o.container.slideUp(180)};a(),_.bind(a)}))}function o(_,o,e){wp.customize.control(o,(function(o){var r=e.split(","),a=function(){t.inArray(_.get(),r)>-1?o.container.slideUp(180):o.container.slideDown(180)};a(),_.bind(a)}))}function e(t,_,o){wp.customize.control(_,(function(_){var o=function(){1==t.get()?_.container.slideDown(180):_.container.slideUp(180)};o(),t.bind(o)}))}wp.customize.bind("ready",(function(){wp.customize("betterdocs_mkb_desc",(function(t){e(t,"betterdocs_mkb_desc_color")})),wp.customize("betterdocs_multikb_layout_select",(function(t){_(t,"betterdocs_mkb_desc","layout-1,layout-3"),_(t,"betterdocs_mkb_desc_color","layout-1,layout-3"),_(t,"betterdocs_doc_page_cat_icon_size_layout2","layout-1"),_(t,"betterdocs_doc_page_item_count_color_layout2","layout-1,layout-2"),_(t,"betterdocs_doc_page_cat_desc","layout-1"),_(t,"betterdocs_doc_page_column_bg_color2","layout-1,layout-2"),_(t,"betterdocs_doc_page_column_content_space","layout-1,layout-2"),_(t,"betterdocs_doc_page_column_content_space_image","layout-1,layout-2"),_(t,"betterdocs_doc_page_column_content_space_title","layout-1,layout-2"),_(t,"betterdocs_doc_page_column_content_space_desc","layout-1,layout-2"),_(t,"betterdocs_doc_page_column_content_space_counter","layout-1,layout-2"),_(t,"betterdocs_mkb_popular_list_settings","layout-3"),_(t,"betterdocs_mkb_popular_list_bg_color","layout-3"),_(t,"betterdocs_mkb_popular_docs_switch","layout-3"),_(t,"betterdocs_mkb_popular_title_font_size","layout-3"),_(t,"betterdocs_mkb_popular_list_color","layout-3"),_(t,"betterdocs_mkb_popular_list_hover_color","layout-3"),_(t,"betterdocs_mkb_popular_list_font_size","layout-3"),_(t,"betterdocs_mkb_popular_list_icon_color","layout-3"),_(t,"betterdocs_mkb_popular_list_icon_font_size","layout-3"),_(t,"betterdocs_mkb_popular_list_margin","layout-3"),_(t,"betterdocs_mkb_popular_list_margin_top","layout-3"),_(t,"betterdocs_mkb_popular_list_margin_right","layout-3"),_(t,"betterdocs_mkb_popular_list_margin_bottom","layout-3"),_(t,"betterdocs_mkb_popular_list_margin_left","layout-3"),_(t,"betterdocs_mkb_list_separator","layout-4"),_(t,"betterdocs_mkb_list_bg_color","layout-4"),_(t,"betterdocs_mkb_tab_list_back_color_active","layout-4"),_(t,"betterdocs_mkb_list_bg_hover_color","layout-4"),_(t,"betterdocs_mkb_tab_list_font_color","layout-4"),_(t,"betterdocs_mkb_tab_list_font_color_active","layout-4"),_(t,"betterdocs_mkb_list_font_size","layout-4"),_(t,"betterdocs_mkb_list_column_padding","layout-4"),_(t,"betterdocs_mkb_list_column_padding_top","layout-4"),_(t,"betterdocs_mkb_list_column_padding_right","layout-4"),_(t,"betterdocs_mkb_list_column_padding_bottom","layout-4"),_(t,"betterdocs_mkb_list_column_padding_left","layout-4"),_(t,"betterdocs_mkb_tab_list_margin","layout-4"),_(t,"betterdocs_mkb_tab_list_margin_top","layout-4"),_(t,"betterdocs_mkb_tab_list_margin_right","layout-4"),_(t,"betterdocs_mkb_tab_list_margin_bottom","layout-4"),_(t,"betterdocs_mkb_tab_list_margin_left","layout-4"),_(t,"betterdocs_mkb_tab_list_border","layout-4"),_(t,"betterdocs_mkb_tab_list_border_topleft","layout-4"),_(t,"betterdocs_mkb_tab_list_border_topright","layout-4"),_(t,"betterdocs_mkb_tab_list_border_bottomright","layout-4"),_(t,"betterdocs_mkb_tab_list_border_bottomleft","layout-4"),_(t,"betterdocs_mkb_tab_list_box_content_width","layout-4"),_(t,"betterdocs_mkb_tab_list_box_gap","layout-4"),_(t,"betterdocs_mkb_tab_list_box_content_padding_top","layout-4"),_(t,"betterdocs_mkb_tab_list_box_content_padding_right","layout-4"),_(t,"betterdocs_mkb_tab_list_box_content_padding_bottom","layout-4"),_(t,"betterdocs_mkb_tab_list_box_content_padding_left","layout-4"),_(t,"betterdocs_mkb_tab_list_box_content_margin_top","layout-4"),_(t,"betterdocs_mkb_tab_list_box_content_margin_right","layout-4"),_(t,"betterdocs_mkb_tab_list_box_content_margin_bottom","layout-4"),_(t,"betterdocs_mkb_tab_list_box_content_margin_left","layout-4"),_(t,"betterdocs_mkb_column_list_heading","layout-4"),_(t,"betterdocs_mkb_column_list_color","layout-4"),_(t,"betterdocs_mkb_column_list_hover_color","layout-4"),_(t,"betterdocs_mkb_column_list_font_size","layout-4"),_(t,"betterdocs_mkb_column_list_margin_top","layout-4"),_(t,"betterdocs_mkb_column_list_margin","layout-4"),_(t,"betterdocs_mkb_column_list_margin_right","layout-4"),_(t,"betterdocs_mkb_list_margin_bottom","layout-4"),_(t,"betterdocs_mkb_list_margin_left","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_bg_color","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_color","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_border_color","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_hover_bg_color","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_hover_color","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_hover_border_color","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_font_size","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_padding","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_padding_top","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_padding_right","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_padding_bottom","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_padding_left","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_borderr","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_borderr_topleft","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_borderr_topright","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_borderr_bottomright","layout-4"),_(t,"betterdocs_mkb_tab_list_explore_btn_borderr_bottomleft","layout-4"),_(t,"betterdocs_mkb_popular_docs_padding","layout-3"),_(t,"betterdocs_mkb_popular_docs_padding_right","layout-3"),_(t,"betterdocs_mkb_popular_docs_padding_bottom","layout-3"),_(t,"betterdocs_mkb_popular_docs_padding_top","layout-3"),_(t,"betterdocs_mkb_popular_docs_padding_left","layout-3"),_(t,"betterdocs_mkb_popular_title_color","layout-3"),_(t,"betterdocs_mkb_popular_title_color_hover","layout-3"),_(t,"betterdocs_mkb_popular_title_margin","layout-3"),_(t,"betterdocs_mkb_popular_title_margin_top","layout-3"),_(t,"betterdocs_mkb_popular_title_margin_right","layout-3"),_(t,"betterdocs_mkb_popular_title_margin_bottom","layout-3"),_(t,"betterdocs_mkb_popular_title_margin_left","layout-3"),o(t,"betterdocs_mkb_column_content_space","layout-4"),o(t,"betterdocs_mkb_column_content_space_image","layout-4"),o(t,"betterdocs_mkb_column_content_space_title","layout-4"),o(t,"betterdocs_mkb_column_content_space_desc","layout-4"),o(t,"betterdocs_mkb_column_content_space_counter","layout-4")})),wp.customize("betterdocs_docs_layout_select",(function(t){_(t,"betterdocs_doc_list_img_width_layout6","layout-6"),_(t,"betterdocs_doc_list_border_style_layout6","layout-6"),_(t,"betterdocs_doc_list_border_color_hover_layout6","layout-6"),_(t,"betterdocs_doc_list_font_color_hover_layout6","layout-6"),_(t,"betterdocs_doc_list_img_switch_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_separator","layout-6"),_(t,"betterdocs_doc_page_item_count_font_size_layout6","layout-6"),_(t,"betterdocs_doc_page_cat_title_font_size_layout6","layout-6"),_(t,"betterdocs_doc_page_cat_title_padding_bottom_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_color_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_back_color_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_border_type_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_border_color_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_border_width_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_border_width_top_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_border_width_right_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_border_width_bottom_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_border_width_left_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_border_radius_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_border_radius_top_left_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_border_radius_top_right_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_border_radius_bottom_right_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_border_radius_bottom_left_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_margin_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_margin_top_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_margin_right_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_margin_bottom_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_margin_left_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_padding_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_padding_top_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_padding_right_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_padding_bottom_layout6","layout-6"),_(t,"betterdocs_doc_page_item_count_padding_left_layout6","layout-6"),_(t,"betterdocs_doc_list_layout6_separator","layout-6"),_(t,"betterdocs_doc_list_font_size_layout6","layout-6"),_(t,"betterdocs_doc_list_font_weight_layout6","layout-6"),_(t,"betterdocs_doc_list_font_line_height_layout6","layout-6"),_(t,"betterdocs_doc_list_desc_switch_layout6","layout-6"),_(t,"betterdocs_doc_list_desc_color_layout6","layout-6"),_(t,"betterdocs_doc_list_desc_font_size_layout6","layout-6"),_(t,"betterdocs_doc_list_desc_font_weight_layout6","layout-6"),_(t,"betterdocs_doc_list_desc_line_height_layout6","layout-6"),_(t,"betterdocs_doc_list_desc_margin_layout6","layout-6"),_(t,"betterdocs_doc_list_desc_margin_top_layout6","layout-6"),_(t,"betterdocs_doc_list_desc_margin_right_layout6","layout-6"),_(t,"betterdocs_doc_list_desc_margin_bottom_layout6","layout-6"),_(t,"betterdocs_doc_list_desc_margin_left_layout6","layout-6"),_(t,"betterdocs_doc_list_font_color_layout6","layout-6"),_(t,"betterdocs_doc_list_margin_layout6","layout-6"),_(t,"betterdocs_doc_list_margin_top_layout6","layout-6"),_(t,"betterdocs_doc_list_margin_right_layout6","layout-6"),_(t,"betterdocs_doc_list_margin_bottom_layout6","layout-6"),_(t,"betterdocs_doc_list_margin_left_layout6","layout-6"),_(t,"betterdocs_doc_list_padding_layout6","layout-6"),_(t,"betterdocs_doc_list_padding_top_layout6","layout-6"),_(t,"betterdocs_doc_list_padding_right_layout6","layout-6"),_(t,"betterdocs_doc_list_padding_bottom_layout6","layout-6"),_(t,"betterdocs_doc_list_padding_left_layout6","layout-6"),_(t,"betterdocs_doc_list_border_layout6","layout-6"),_(t,"betterdocs_doc_list_border_top_layout6","layout-6"),_(t,"betterdocs_doc_list_border_right_layout6","layout-6"),_(t,"betterdocs_doc_list_border_bottom_layout6","layout-6"),_(t,"betterdocs_doc_list_border_left_layout6","layout-6"),_(t,"betterdocs_doc_list_back_color_hover_layout6","layout-6"),_(t,"betterdocs_doc_list_border_hover_layout6","layout-6"),_(t,"betterdocs_doc_list_border_hover_top_layout6","layout-6"),_(t,"betterdocs_doc_list_border_hover_right_layout6","layout-6"),_(t,"betterdocs_doc_list_border_hover_bottom_layout6","layout-6"),_(t,"betterdocs_doc_list_border_hover_left_layout6","layout-6"),_(t,"betterdocs_doc_list_border_color_top_layout6","layout-6"),_(t,"betterdocs_doc_list_border_color_right_layout6","layout-6"),_(t,"betterdocs_doc_list_border_color_bottom_layout6","layout-6"),_(t,"betterdocs_doc_list_border_color_left_layout6","layout-6"),_(t,"betterdocs_doc_list_arrow_height_layout6","layout-6"),_(t,"betterdocs_doc_list_arrow_width_layout6","layout-6"),_(t,"betterdocs_doc_list_arrow_color_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_font_size_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_font_color_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_font_weight_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_font_line_height_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_padding_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_padding_top_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_padding_right_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_padding_bottom_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_padding_left_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_margin_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_margin_top_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_margin_right_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_margin_bottom_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_margin_left_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_arrow_height_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_arrow_width_layout6","layout-6"),_(t,"betterdocs_doc_list_explore_more_arrow_color_layout6","layout-6"),_(t,"betterdocs_doc_page_cat_title_font_size2","layout-4"),_(t,"betterdocs_doc_page_cat_icon_size_l_3_4","layout-3,layout-4,layout-5"),_(t,"betterdocs_doc_page_content_overlap","layout-4"),_(t,"betterdocs_docs_page_popular_docs_switch","layout-5"),_(t,"betterdocs_doc_page_article_list_bg_color_2","layout-5"),_(t,"betterdocs_doc_page_article_list_color_2","layout-5"),_(t,"betterdocs_doc_page_article_list_hover_color_2","layout-5"),_(t,"betterdocs_doc_page_article_list_font_size_2","layout-5"),_(t,"betterdocs_doc_page_article_title_font_size_2","layout-5"),_(t,"betterdocs_doc_page_article_title_color_2","layout-5"),_(t,"betterdocs_doc_page_article_title_color_hover_2","layout-5"),_(t,"betterdocs_doc_page_article_list_icon_color_2","layout-5"),_(t,"betterdocs_doc_page_article_list_icon_font_size_2","layout-5"),_(t,"betterdocs_doc_page_article_list_margin_2","layout-5"),_(t,"betterdocs_doc_page_article_list_margin_top_2","layout-5"),_(t,"betterdocs_doc_page_article_list_margin_right_2","layout-5"),_(t,"betterdocs_doc_page_article_list_margin_bottom_2","layout-5"),_(t,"betterdocs_doc_page_article_list_margin_left_2","layout-5"),_(t,"betterdocs_doc_page_popular_docs_padding","layout-5"),_(t,"betterdocs_doc_page_popular_docs_padding_top","layout-5"),_(t,"betterdocs_doc_page_popular_docs_padding_right","layout-5"),_(t,"betterdocs_doc_page_popular_docs_padding_bottom","layout-5"),_(t,"betterdocs_doc_page_popular_docs_padding_left","layout-5"),_(t,"betterdocs_doc_page_popular_title_margin","layout-5"),_(t,"betterdocs_doc_page_popular_title_margin_top","layout-5"),_(t,"betterdocs_doc_page_popular_title_margin_right","layout-5"),_(t,"betterdocs_doc_page_popular_title_margin_bottom","layout-5"),_(t,"betterdocs_doc_page_popular_title_margin_left","layout-5")})),wp.customize("betterdocs_archive_layout_select",(function(t){o(t,"betterdocs_archive_content_area_width","layout-6"),o(t,"betterdocs_archive_content_area_max_width","layout-6"),o(t,"betterdocs_archive_page_background_color","layout-6"),o(t,"betterdocs_archive_page_background_image","layout-6"),o(t,"betterdocs_archive_page_background_property","layout-6"),o(t,"betterdocs_archive_page_background_size","layout-6"),o(t,"betterdocs_archive_page_background_repeat","layout-6"),o(t,"betterdocs_archive_page_background_position","layout-6"),o(t,"betterdocs_archive_page_background_attachment","layout-6"),_(t,"betterdocs_archive_title_tag_layout2","layout-6"),_(t,"betterdocs_archive_title_color_layout2","layout-6"),_(t,"betterdocs_archive_title_font_size_layout2","layout-6"),_(t,"betterdocs_archive_title_margin_layout2","layout-6"),_(t,"betterdocs_archive_title_margin_top_layout2","layout-6"),_(t,"betterdocs_archive_title_margin_right_layout2","layout-6"),_(t,"betterdocs_archive_title_margin_bottom_layout2","layout-6"),_(t,"betterdocs_archive_title_margin_left_layout2","layout-6"),_(t,"betterdocs_archive_description_color_layout2","layout-6"),_(t,"betterdocs_archive_description_font_size_layout2","layout-6"),_(t,"betterdocs_archive_description_margin_layout2","layout-6"),_(t,"betterdocs_archive_description_margin_top_layout2","layout-6"),_(t,"betterdocs_archive_description_margin_right_layout2","layout-6"),_(t,"betterdocs_archive_description_margin_bottom_layout2","layout-6"),_(t,"betterdocs_archive_description_margin_left_layout2","layout-6"),_(t,"betterdocs_archive_list_item_color_layout2","layout-6"),_(t,"betterdocs_archive_list_item_color_hover_layout2","layout-6"),_(t,"betterdocs_archive_list_back_color_hover_layout2","layout-6"),_(t,"betterdocs_archive_list_border_color_hover_layout2","layout-6"),_(t,"betterdocs_archive_list_border_width_hover_layout2","layout-6"),_(t,"betterdocs_archive_list_border_width_top_hover_layout2","layout-6"),_(t,"betterdocs_archive_list_border_width_right_hover_layout2","layout-6"),_(t,"betterdocs_archive_list_border_width_bottom_hover_layout2","layout-6"),_(t,"betterdocs_archive_list_border_width_left_hover_layout2","layout-6"),_(t,"betterdocs_archive_list_border_style_layout2","layout-6"),_(t,"betterdocs_archive_list_border_width_layout2","layout-6"),_(t,"betterdocs_archive_list_border_width_top_layout2","layout-6"),_(t,"betterdocs_archive_list_border_width_right_layout2","layout-6"),_(t,"betterdocs_archive_list_border_width_bottom_layout2","layout-6"),_(t,"betterdocs_archive_list_border_width_left_layout2","layout-6"),_(t,"betterdocs_archive_list_border_width_color_top_layout2","layout-6"),_(t,"betterdocs_archive_list_border_width_color_bottom_layout2","layout-6"),_(t,"betterdocs_archive_list_border_width_color_left_layout2","layout-6"),_(t,"betterdocs_archive_list_border_width_color_right_layout2","layout-6"),_(t,"betterdocs_archive_list_item_font_size_layout2","layout-6"),_(t,"betterdocs_archive_article_list_margin_layout2","layout-6"),_(t,"betterdocs_archive_article_list_margin_top_layout2","layout-6"),_(t,"betterdocs_archive_article_list_margin_right_layout2","layout-6"),_(t,"betterdocs_archive_article_list_margin_bottom_layout2","layout-6"),_(t,"betterdocs_archive_article_list_margin_left_layout2","layout-6"),_(t,"betterdocs_archive_article_list_font_weight_layout2","layout-6"),_(t,"betterdocs_archive_list_item_line_height_layout2","layout-6"),_(t,"betterdocs_archive_list_item_arrow_height_layout2","layout-6"),_(t,"betterdocs_archive_list_item_arrow_width_layout2","layout-6"),_(t,"betterdocs_archive_list_item_arrow_color_layout2","layout-6"),_(t,"betterdocs_archive_article_list_arrow_margin_layout2","layout-6"),_(t,"betterdocs_archive_article_list_arrow_margin_top_layout2","layout-6"),_(t,"betterdocs_archive_article_list_arrow_margin_right_layout2","layout-6"),_(t,"betterdocs_archive_article_list_arrow_margin_bottom_layout2","layout-6"),_(t,"betterdocs_archive_article_list_arrow_margin_left_layout2","layout-6"),_(t,"betterdocs_archive_article_list_excerpt_font_weight_layout2","layout-6"),_(t,"betterdocs_archive_article_list_excerpt_font_size_layout2","layout-6"),_(t,"betterdocs_archive_article_list_excerpt_font_line_height_layout2","layout-6"),_(t,"betterdocs_archive_article_list_excerpt_font_color_layout2","layout-6"),_(t,"betterdocs_archive_article_list_excerpt_margin_layout2","layout-6"),_(t,"betterdocs_archive_article_list_excerpt_margin_top_layout2","layout-6"),_(t,"betterdocs_archive_article_list_excerpt_margin_right_layout2","layout-6"),_(t,"betterdocs_archive_article_list_excerpt_margin_left_layout2","layout-6"),_(t,"betterdocs_archive_article_list_excerpt_margin_bottom_layout2","layout-6"),_(t,"betterdocs_archive_article_list_excerpt_padding_layout2","layout-6"),_(t,"betterdocs_archive_article_list_excerpt_padding_top_layout2","layout-6"),_(t,"betterdocs_archive_article_list_excerpt_padding_right_layout2","layout-6"),_(t,"betterdocs_archive_article_list_excerpt_padding_bottom_layout2","layout-6"),_(t,"betterdocs_archive_article_list_excerpt_padding_left_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_seperator","layout-6"),_(t,"betterdocs_archive_article_list_counter_font_weight_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_font_size_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_font_line_height_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_font_color_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_border_radius_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_border_radius_top_left_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_border_radius_top_right_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_border_radius_bottom_right_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_border_radius_bottom_left_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_margin_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_margin_top_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_margin_right_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_margin_bottom_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_margin_left_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_padding_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_padding_top_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_padding_right_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_padding_bottom_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_padding_left_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_border_color_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_back_color_layout2","layout-6"),_(t,"betterdocs_archive_article_list_counter_seperator_layout2","layout-6"),_(t,"betterdocs_archive_inner_content_back_color_layout2","layout-6"),_(t,"betterdocs_archive_inner_content_image_padding_layout2","layout-6"),_(t,"betterdocs_archive_inner_content_image_padding_top_layout2","layout-6"),_(t,"betterdocs_archive_inner_content_image_padding_right_layout2","layout-6"),_(t,"betterdocs_archive_inner_content_image_padding_bottom_layout2","layout-6"),_(t,"betterdocs_archive_inner_content_image_padding_left_layout2","layout-6"),_(t,"betterdocs_archive_inner_content_image_margin_layout2","layout-6"),_(t,"betterdocs_archive_inner_content_image_margin_top_layout2","layout-6"),_(t,"betterdocs_archive_inner_content_image_margin_right_layout2","layout-6"),_(t,"betterdocs_archive_inner_content_image_margin_bottom_layout2","layout-6"),_(t,"betterdocs_archive_inner_content_image_margin_left_layout2","layout-6"),_(t,"betterdocs_archive_other_categories_seperator","layout-6"),_(t,"betterdocs_archive_other_categories_title_color","layout-6"),_(t,"betterdocs_archive_other_categories_heading_text","layout-6"),_(t,"betterdocs_archive_inner_content_image_size_layout2","layout-6"),_(t,"betterdocs_archive_other_categories_image_size","layout-6"),_(t,"betterdocs_archive_other_categories_title_font_weight","layout-6"),_(t,"betterdocs_archive_other_categories_title_font_size","layout-6"),_(t,"betterdocs_archive_other_categories_title_line_height","layout-6"),_(t,"betterdocs_archive_other_categories_title_padding","layout-6"),_(t,"betterdocs_archive_other_categories_title_padding_top","layout-6"),_(t,"betterdocs_archive_other_categories_title_padding_right","layout-6"),_(t,"betterdocs_archive_other_categories_title_padding_bottom","layout-6"),_(t,"betterdocs_archive_other_categories_title_padding_left","layout-6"),_(t,"betterdocs_archive_other_categories_title_margin","layout-6"),_(t,"betterdocs_archive_other_categories_title_margin_top","layout-6"),_(t,"betterdocs_archive_other_categories_title_margin_right","layout-6"),_(t,"betterdocs_archive_other_categories_title_margin_bottom","layout-6"),_(t,"betterdocs_archive_other_categories_title_margin_left","layout-6"),_(t,"betterdocs_archive_other_categories_count_color","layout-6"),_(t,"betterdocs_archive_other_categories_count_back_color","layout-6"),_(t,"betterdocs_archive_other_categories_count_back_color_hover","layout-6"),_(t,"betterdocs_archive_other_categories_count_line_height","layout-6"),_(t,"betterdocs_archive_other_categories_count_font_weight","layout-6"),_(t,"betterdocs_archive_other_categories_count_font_size","layout-6"),_(t,"betterdocs_archive_other_categories_count_border_radius","layout-6"),_(t,"betterdocs_archive_other_categories_count_border_radius_topleft","layout-6"),_(t,"betterdocs_archive_other_categories_count_border_radius_topright","layout-6"),_(t,"betterdocs_archive_other_categories_count_border_radius_bottomright","layout-6"),_(t,"betterdocs_archive_other_categories_count_border_radius_bottomleft","layout-6"),_(t,"betterdocs_archive_other_categories_count_padding","layout-6"),_(t,"betterdocs_archive_other_categories_count_padding_top","layout-6"),_(t,"betterdocs_archive_other_categories_count_padding_right","layout-6"),_(t,"betterdocs_archive_other_categories_count_padding_bottom","layout-6"),_(t,"betterdocs_archive_other_categories_count_padding_left","layout-6"),_(t,"betterdocs_archive_other_categories_count_margin","layout-6"),_(t,"betterdocs_archive_other_categories_count_margin_top","layout-6"),_(t,"betterdocs_archive_other_categories_count_margin_right","layout-6"),_(t,"betterdocs_archive_other_categories_count_margin_bottom","layout-6"),_(t,"betterdocs_archive_other_categories_count_margin_left","layout-6"),_(t,"betterdocs_archive_other_categories_description_color","layout-6"),_(t,"betterdocs_archive_other_categories_description_font_weight","layout-6"),_(t,"betterdocs_archive_other_categories_description_font_size","layout-6"),_(t,"betterdocs_archive_other_categories_description_line_height","layout-6"),_(t,"betterdocs_archive_other_categories_description_padding","layout-6"),_(t,"betterdocs_archive_other_categories_description_padding_top","layout-6"),_(t,"betterdocs_archive_other_categories_description_padding_right","layout-6"),_(t,"betterdocs_archive_other_categories_description_padding_bottom","layout-6"),_(t,"betterdocs_archive_other_categories_description_padding_left","layout-6"),_(t,"betterdocs_archive_other_categories_button_color","layout-6"),_(t,"betterdocs_archive_other_categories_button_back_color","layout-6"),_(t,"betterdocs_archive_other_categories_button_font_weight","layout-6"),_(t,"betterdocs_archive_other_categories_button_font_size","layout-6"),_(t,"betterdocs_archive_other_categories_button_font_line_height","layout-6"),_(t,"betterdocs_archive_other_categories_button_border_radius","layout-6"),_(t,"betterdocs_archive_other_categories_button_border_radius_top_left","layout-6"),_(t,"betterdocs_archive_other_categories_button_border_radius_top_right","layout-6"),_(t,"betterdocs_archive_other_categories_button_border_radius_bottom_left","layout-6"),_(t,"betterdocs_archive_other_categories_button_border_radius_bottom_right","layout-6"),_(t,"betterdocs_archive_other_categories_button_padding","layout-6"),_(t,"betterdocs_archive_other_categories_button_padding_top","layout-6"),_(t,"betterdocs_archive_other_categories_button_padding_right","layout-6"),_(t,"betterdocs_archive_other_categories_button_padding_bottom","layout-6"),_(t,"betterdocs_archive_other_categories_button_padding_left","layout-6"),_(t,"betterdocs_archive_other_categories_button_back_color_hover","layout-6"),_(t,"betterdocs_archive_other_categories_load_more_text","layout-6")})),wp.customize("betterdocs_single_layout_select",(function(t){o(t,"betterdocs_doc_single_content_area_padding_top","layout-2,layout-3"),o(t,"betterdocs_doc_single_content_area_padding_bottom","layout-2,layout-3")})),wp.customize("betterdocs_category_search_toggle",(function(t){e(t,"betterdocs_category_select_search_section"),e(t,"betterdocs_category_select_font_size"),e(t,"betterdocs_category_select_font_weight"),e(t,"betterdocs_category_select_text_transform"),e(t,"betterdocs_category_select_text_color")})),wp.customize("betterdocs_search_button_toggle",(function(t){e(t,"betterdocs_search_button_section"),e(t,"betterdocs_new_search_button_font_size"),e(t,"betterdocs_new_search_button_letter_spacing"),e(t,"betterdocs_new_search_button_font_weight"),e(t,"betterdocs_new_search_button_text_transform"),e(t,"betterdocs_search_button_text_color"),e(t,"betterdocs_search_button_background_color"),e(t,"betterdocs_search_button_background_color_hover"),e(t,"betterdocs_search_button_borderr_radius"),e(t,"betterdocs_search_button_borderr_left_top"),e(t,"betterdocs_search_button_borderr_right_top"),e(t,"betterdocs_search_button_borderr_left_bottom"),e(t,"betterdocs_search_button_borderr_right_bottom"),e(t,"betterdocs_search_button_padding"),e(t,"betterdocs_search_button_padding_top"),e(t,"betterdocs_search_button_padding_right"),e(t,"betterdocs_search_button_padding_bottom"),e(t,"betterdocs_search_button_padding_left")})),wp.customize("betterdocs_popular_search_toggle",(function(t){e(t,"betterdocs_popular_search_section"),e(t,"betterdocs_popular_search_margin"),e(t,"betterdocs_popular_search_margin_top"),e(t,"betterdocs_popular_search_margin_right"),e(t,"betterdocs_popular_search_margin_bottom"),e(t,"betterdocs_popular_search_margin_left"),e(t,"betterdocs_popular_search_title_text_color"),e(t,"betterdocs_popular_search_title_font_size"),e(t,"betterdocs_popular_search_font_size"),e(t,"betterdocs_popular_search_background_color"),e(t,"betterdocs_popular_keyword_text_color"),e(t,"betterdocs_popular_search_padding"),e(t,"betterdocs_popular_search_padding_top"),e(t,"betterdocs_popular_search_padding_right"),e(t,"betterdocs_popular_search_padding_bottom"),e(t,"betterdocs_popular_search_padding_left"),e(t,"betterdocs_popular_search_keyword_margin"),e(t,"betterdocs_popular_search_keyword_margin_top"),e(t,"betterdocs_popular_search_keyword_margin_right"),e(t,"betterdocs_popular_search_keyword_margin_bottom"),e(t,"betterdocs_popular_search_keyword_margin_left"),e(t,"betterdocs_popular_search_keyword_border"),e(t,"betterdocs_popular_search_keyword_border_color"),e(t,"betterdocs_popular_search_keyword_border_width_top"),e(t,"betterdocs_popular_search_keyword_border_width_right"),e(t,"betterdocs_popular_search_keyword_border_width_bottom"),e(t,"betterdocs_popular_search_keyword_border_width_left"),e(t,"betterdocs_popular_search_keyword_border_width"),e(t,"betterdocs_popular_keyword_border_radius"),e(t,"betterdocs_popular_keyword_border_radius_left_top"),e(t,"betterdocs_popular_keyword_border_radius_right_top"),e(t,"betterdocs_popular_keyword_border_radius_left_bottom"),e(t,"betterdocs_popular_keyword_border_radius_right_bottom")})),wp.customize("betterdocs_doc_list_desc_switch_layout6",(function(t){e(t,"betterdocs_doc_list_desc_color_layout6"),e(t,"betterdocs_doc_list_desc_font_size_layout6"),e(t,"betterdocs_doc_list_desc_font_weight_layout6"),e(t,"betterdocs_doc_list_desc_line_height_layout6"),e(t,"betterdocs_doc_list_desc_margin_layout6"),e(t,"betterdocs_doc_list_desc_margin_top_layout6"),e(t,"betterdocs_doc_list_desc_margin_right_layout6"),e(t,"betterdocs_doc_list_desc_margin_bottom_layout6"),e(t,"betterdocs_doc_list_desc_margin_left_layout6")})),wp.customize("betterdocs_faq_switch_mkb",(function(t){e(t,"betterdocs_select_specific_faq_mkb"),e(t,"betterdocs_select_faq_template_mkb"),e(t,"betterdocs_faq_title_text_mkb"),e(t,"betterdocs_faq_title_margin_mkb_layout_1"),e(t,"betterdocs_faq_title_color_mkb_layout_1"),e(t,"betterdocs_faq_title_font_size_mkb_layout_1"),e(t,"betterdocs_faq_category_title_color_mkb_layout_1"),e(t,"betterdocs_faq_category_name_font_size_mkb_layout_1"),e(t,"betterdocs_faq_category_name_padding_mkb_layout_1"),e(t,"betterdocs_faq_list_color_mkb_layout_1"),e(t,"betterdocs_faq_list_background_color_mkb_layout_1"),e(t,"betterdocs_faq_list_content_background_color_mkb_layout_1"),e(t,"betterdocs_faq_list_font_size_mkb_layout_1"),e(t,"betterdocs_faq_list_padding_mkb_layout_1"),e(t,"betterdocs_faq_list_content_font_size_mkb_layout_1"),e(t,"betterdocs_faq_list_content_font_size_mkb_layout_2"),e(t,"betterdocs_faq_list_content_color_mkb_layout_1"),e(t,"betterdocs_faq_list_content_color_mkb_layout_2"),e(t,"betterdocs_faq_category_title_color_mkb_layout_2"),e(t,"betterdocs_faq_category_name_font_size_mkb_layout_2"),e(t,"betterdocs_faq_category_name_padding_mkb_layout_2"),e(t,"betterdocs_faq_list_color_mkb_layout_2"),e(t,"betterdocs_faq_list_background_color_mkb_layout_2"),e(t,"betterdocs_faq_list_content_background_color_mkb_layout_2"),e(t,"betterdocs_faq_list_font_size_mkb_layout_2"),e(t,"betterdocs_faq_list_padding_mkb_layout_2")})),wp.customize("betterdocs_select_faq_template_mkb",(function(t){_(t,"betterdocs_faq_title_margin_mkb_layout_1","layout-1,layout-2"),_(t,"betterdocs_faq_title_color_mkb_layout_1","layout-1,layout-2"),_(t,"betterdocs_faq_title_font_size_mkb_layout_1","layout-1,layout-2"),_(t,"betterdocs_faq_category_title_color_mkb_layout_1","layout-1"),_(t,"betterdocs_faq_category_name_font_size_mkb_layout_1","layout-1"),_(t,"betterdocs_faq_category_name_padding_mkb_layout_1","layout-1"),_(t,"betterdocs_faq_list_color_mkb_layout_1","layout-1"),_(t,"betterdocs_faq_list_background_color_mkb_layout_1","layout-1"),_(t,"betterdocs_faq_list_content_background_color_mkb_layout_1","layout-1"),_(t,"betterdocs_faq_list_content_font_size_mkb_layout_1","layout-1"),_(t,"betterdocs_faq_list_font_size_mkb_layout_1","layout-1"),_(t,"betterdocs_faq_list_padding_mkb_layout_1","layout-1"),_(t,"betterdocs_faq_title_text_mkb","layout-1,layout-2"),_(t,"betterdocs_faq_category_title_color_mkb_layout_2","layout-2"),_(t,"betterdocs_faq_category_name_font_size_mkb_layout_2","layout-2"),_(t,"betterdocs_faq_category_name_padding_mkb_layout_2","layout-2"),_(t,"betterdocs_faq_list_color_mkb_layout_2","layout-2"),_(t,"betterdocs_faq_list_background_color_mkb_layout_2","layout-2"),_(t,"betterdocs_faq_list_content_background_color_mkb_layout_2","layout-2"),_(t,"betterdocs_faq_list_font_size_mkb_layout_2","layout-2"),_(t,"betterdocs_faq_list_padding_mkb_layout_2","layout-2"),_(t,"betterdocs_faq_list_content_font_size_mkb_layout_2","layout-2"),_(t,"betterdocs_faq_list_content_color_mkb_layout_1","layout-1"),_(t,"betterdocs_faq_list_content_color_mkb_layout_2","layout-2")}))}))}(jQuery);