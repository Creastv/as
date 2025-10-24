<?php
echo '<article class="news-item">';
echo '<a href="' . get_permalink() . '">';
if (has_post_thumbnail()) {
    the_post_thumbnail('large');
}
echo '</a>';
echo '<p>' . get_the_date('d.m.Y') . ' - ' . get_the_date('l') . '</p>';
echo '<a href="' . get_permalink() . '">';
echo '<h2>' . get_the_title() . '</h2>';
echo '</a>';
echo '<p>' . custom_excerpt(30) . '</p>';

echo '</article>';