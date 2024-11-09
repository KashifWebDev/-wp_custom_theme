<?php
    $post_data = get_post_meta($post->ID);
    $slider_text = get_post_meta($post->ID, 'mv_slider_link_text', true);
    $slider_url = get_post_meta($post->ID, 'mv_slider_link_url', true);
?>
<table>
    <input type="hidden" name="mv_slider_nonce" value="<?= wp_create_nonce('mv_slider_nonce') ?>">
    <tr>
        <th><label for="mv_slider_link_text">Link Text</label></th>
        <td>
            <input type="text" name="mv_slider_link_text" id="mv_slider_link_text" value="<?= isset($slider_text) ? $slider_text:  '' ?>" required>
        </td>
    </tr>
    <tr>
        <th><label for="mv_slider_link_url">Link URL</label></th>
        <td>
            <input type="text" name="mv_slider_link_url" id="mv_slider_link_url" value="<?= isset($slider_url) ? $slider_url:  '' ?>" required>
        </td>
    </tr>
</table>