<?php

$wybierz_kategorie = get_field('wybierz_kategorie');
$style = get_field('style');

$id = 'news-tab-content-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$className = 'news-tab-content';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
?>
<div id="<?php echo esc_attr($id); ?>"
    class=" <?php echo esc_attr($className); ?> <?php echo $style == 2 ?  'news-tab-content--rev' : false; ?> ">
    <div class="news_tab__wrap">
        <?php
        if ($wybierz_kategorie):
            echo '<div class="news_news_tab-item">';
            echo '<ul class="news_tab-list">';
            echo '<li class="news_tab-item" data-category="wszystkie">Wszystkie</li>';
            foreach ($wybierz_kategorie as $kategoria):
                echo '<li class="news_tab-item" data-category="' . $kategoria->term_id . '">' . $kategoria->name . '</li>';
            endforeach;
            echo '</ul>';
            echo '<div class="news_tab-content">';
            // Wszystkie
            $all = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 8,
            ));
            echo '<div class="news_tab-pane" id="category-wszystkie">';
            if ($all->have_posts()):
                echo '<div class="news_tab-row">';
                while ($all->have_posts()): $all->the_post();
                    echo '<div class="news_tab-item">';
                    echo '<a href="' . get_permalink() . '">';
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('large');
                    }
                    echo '<p>' . get_the_date('d.m.Y') . ' - ' . get_the_date('l') . '</p>';
                    echo '<h3>' . get_the_title() . '</h3>';
                    echo '</a>';
                    echo '</div>';
                endwhile;
                echo '</div>';
                wp_reset_postdata();
            endif;
            echo '</div>';
            // end Wszystkie
            foreach ($wybierz_kategorie as $kategoria):
                $query = new WP_Query(array(
                    'cat' => $kategoria->term_id,
                    'posts_per_page' => 8
                ));
                echo '<div class="news_tab-pane" id="category-' . $kategoria->term_id . '">';
                if ($query->have_posts()):
                    echo '<div class="news_tab-row">';
                    while ($query->have_posts()): $query->the_post();
                        echo '<div class="news_tab-item">';
                        echo '<a href="' . get_permalink() . '">';
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('large');
                        }
                        echo '<p>' . get_the_date('d.m.Y') . ' - ' . get_the_date('l') . '</p>';
                        echo '<h3>' . get_the_title() . '</h3>';
                        echo '</a>';
                        echo '</div>';
                    endwhile;
                    echo '</div>';
                    wp_reset_postdata();
                endif;
                echo '</div>';
            endforeach;
            echo '</div>';
            echo '</div>';
        endif;
        ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('li.news_tab-item');
        const panes = document.querySelectorAll('.news_tab-pane');
        tabs.forEach(tab => {
            tab.addEventListener('click', function(event) {
                event.preventDefault();
                tabs.forEach(item => item.classList.remove('active'));
                panes.forEach(pane => pane.style.display = 'none');
                tab.classList.add('active');
                const categoryId = tab.getAttribute('data-category');
                document.getElementById('category-' + categoryId).style.display = 'block';
            });
        });
        if (tabs.length > 0) {
            tabs[0].classList.add('active');
            panes[0].style.display = 'block';
        }
    });
</script>