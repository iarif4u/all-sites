<div class="betterdocs-tabs-nav-wrapper betterdocs-tab-list tabs-nav">
    <?php
        foreach ( $kb_terms as $term ) {
            if ( $term->count <= 0 ) {
                continue;
            }

            echo '<a href="#" class="icon-wrap" data-toggle-target="' . $term->term_id . '">' . $term->name . '</a>';
        }
    ?>
</div>
