/*global jQuery*/
/*
 *
 * Themonic_Options_radio_img function
 * Changes the radio select option, and changes class on images
 *
 */
function themonic_radio_img_select(relid, labelclass) {
    jQuery(this).prev('input[type="radio"]').prop('checked');
    jQuery('.themonic-radio-img-' + labelclass).removeClass('themonic-radio-img-selected');
    jQuery('label[for="' + relid + '"]').addClass('themonic-radio-img-selected');
}
