add_filter( 'embed_oembed_html', 'besyar_embed_oembed_html', 99, 4 );
function besyar_embed_oembed_html( $cache, $url, $attr, $post_ID ) {
	if ( false !== strpos( $url, 'youtube.com' ) || false !== strpos( $url, 'youtu.be' ) ) {
		    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
	return '<amp-youtube layout="responsive" width="480" height="270" data-videoid="' . esc_attr( $matches[1] ) . '"></amp-youtube>';
	}
}
