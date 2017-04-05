
function amp_img_html_template($html, $id, $caption, $title, $align, $url, $size, $alt) {
	/*
	$html - default HTML, you can use regular expressions to operate with it
	$id - attachment ID
	$caption - image Caption
	$title - image Title
	$align - image Alignment
	$url - link to media file or to the attachment page (depends on what you selected in media uploader)
	$size - image size (Thumbnail, Medium, Large etc)
	$alt - image Alt Text
	*/
 
	/*
	 * First of all lets operate with image sizes
	 */
	list( $img_src, $width, $height ) = image_downsize($id, $size);
	$hwstring = image_hwstring($width, $height);
 
	/*
 	 * Second thing - get the image URL $image_thumb[0]
	 */
	$image_thumb = wp_get_attachment_image_src( $id, $size );
  $img_srcset = wp_get_attachment_image_srcset( $id, $size );
 
	$out = '<div class="img-wrapper">'; // I want to wrap image into this div element
	if($url){ // if user wants to print the link with image
		$out .= '<a href="' . $url . '" class="ampstart-btn" on="tap:img-lightbox" role="button" tabindex="0"';
	}
	$out .= '<amp-img src="'. $image_thumb[0] .'" alt="'.$alt.'" '.$hwstring.' '.$img_srcset[0].' layout="responsive"></amp-img>';
	if($url){
		$out .= '</a>';
	}
	$out .= '</div><amp-lightbox id="img-lightbox"
  layout="nodisplay">
  <div class="lightbox"
    on="tap:img-lightbox.close"
    role="button"
    tabindex="0">
    <amp-img src="'. $image_thumb[0] .'" alt="'.$alt.'" '.$hwstring.' '.$img_srcset[0].' layout="responsive"></amp-img>
  </div>
</amp-lightbox>';
	return $out; // the result HTML
}
 
add_filter('image_send_to_editor', 'amp_img_html_template', 1, 8);
