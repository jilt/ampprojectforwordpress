
add_filter( 'image_send_to_editor', 'amp_img_editor', 10, 7);
       function amp_img_editor($html, $id, $alt, $title, $align, $url, $size ) {
           $url = wp_get_attachment_url($id); // Grab the current image URL
           $html = '<amp-img src="' . $url .  '" layout="responsive" width="620" height="280"></amp-img>';
           return $html;
       }
