<?php

/**
 * Template: Table XLS (ACF Block)
 * Ścieżka: /wp-content/themes/your-theme/blocks/table-xls/table-xls.php
 */

/** @var array $block */
$id    = 'table-xls-' . ($block['id'] ?? uniqid());
$class = 'table-xls ' . ($block['className'] ?? '');

$file_id     = (int) get_field('xls_file') ?: 0;
$sheet_name  = (string) (get_field('sheet_name') ?: '');
$page_length = (int) (get_field('page_length') ?: 25);
$cache_ttl   = (int) (get_field('cache_ttl') ?: 3600);
$order_col   = (int) (get_field('order_column') ?? 0);
$order_dir   = (string) (get_field('order_dir') ?: 'asc');

// Fallback w edytorze, jeśli nie podano pliku
if (is_admin() && !$file_id) {
    echo '<div class="notice notice-warning">Wybierz plik XLS/XLSX w ustawieniach bloku.</div>';
    return;
}
?>
<div class="<?php echo esc_attr($class); ?>">
    <table id="<?php echo esc_attr($id); ?>" class="display" style="width:100%"
        data-file-id="<?php echo esc_attr($file_id); ?>" data-sheet="<?php echo esc_attr($sheet_name); ?>"
        data-ttl="<?php echo esc_attr($cache_ttl); ?>" data-page-length="<?php echo esc_attr($page_length); ?>"
        data-order-col="<?php echo esc_attr($order_col); ?>" data-order-dir="<?php echo esc_attr($order_dir); ?>">
        <thead></thead>
        <tbody></tbody>
    </table>
</div>