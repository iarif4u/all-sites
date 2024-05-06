/*global $, jQuery, document, tabid:true, themonic_opts, confirm, relid:true*/

jQuery(document).ready(function () {

    if (jQuery('#last_tab').val() === '') {
        jQuery('.themonic-opts-group-tab:first').slideDown('fast');
        jQuery('#themonic-opts-group-menu li:first').addClass('active');
    } else {
        tabid = jQuery('#last_tab').val();
        jQuery('#' + tabid + '_section_group').slideDown('fast');
        jQuery('#' + tabid + '_section_group_li').addClass('active');
    }

    jQuery('input[name="' + themonic_opts.opt_name + '[defaults]"]').click(function () {
        if (!confirm(themonic_opts.reset_confirm)) {
            return false;
        }
    });

    jQuery('.themonic-opts-group-tab-link-a').click(function () {
        relid = jQuery(this).attr('data-rel');

        jQuery('#last_tab').val(relid);

        jQuery('.themonic-opts-group-tab').each(function () {
            if (jQuery(this).attr('id') === relid + '_section_group') {
                jQuery(this).delay(00).fadeIn(0);
            } else {
                jQuery(this).fadeOut('fast');
            }
        });

        jQuery('.themonic-opts-group-tab-link-li').each(function () {
            if (jQuery(this).attr('id') !== relid + '_section_group_li' && jQuery(this).hasClass('active')) {
                jQuery(this).removeClass('active');
            }
            if (jQuery(this).attr('id') === relid + '_section_group_li') {
                jQuery(this).addClass('active');
            }
        });
    });

    if (jQuery('#themonic-opts-save').is(':visible')) {
        jQuery('#themonic-opts-save').delay(2000).slideUp('slow');
    }

    if (jQuery('#themonic-opts-imported').is(':visible')) {
        jQuery('#themonic-opts-imported').delay(2000).slideUp('slow');
    }

    jQuery('#themonic-opts-form-wrapper').on('change', ':input', function () {
        if(this.id === 'google_webfonts' && this.value === '') return;
        jQuery('#themonic-opts-save-warn').slideDown('slow');
    });

    jQuery('#themonic-opts-import-code-button').click(function () {
        if (jQuery('#themonic-opts-import-link-wrapper').is(':visible')) {
            jQuery('#themonic-opts-import-link-wrapper').fadeOut('fast');
            jQuery('#import-link-value').val('');
        }
        jQuery('#themonic-opts-import-code-wrapper').fadeIn('slow');
    });

    jQuery('#themonic-opts-import-link-button').click(function () {
        if (jQuery('#themonic-opts-import-code-wrapper').is(':visible')) {
            jQuery('#themonic-opts-import-code-wrapper').fadeOut('fast');
            jQuery('#import-code-value').val('');
        }
        jQuery('#themonic-opts-import-link-wrapper').fadeIn('slow');
    });

    jQuery('#themonic-opts-export-code-copy').click(function () {
        if (jQuery('#themonic-opts-export-link-value').is(':visible')) {jQuery('#themonic-opts-export-link-value').fadeOut('slow'); }
        jQuery('#themonic-opts-export-code').toggle('fade');
    });

    jQuery('#themonic-opts-export-link').click(function () {
        if (jQuery('#themonic-opts-export-code').is(':visible')) {jQuery('#themonic-opts-export-code').fadeOut('slow'); }
        jQuery('#themonic-opts-export-link-value').toggle('fade');
    });

});
