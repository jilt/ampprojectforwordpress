add_filter( 'embed_oembed_html', 'amp_youtube_oembed' );
function amp_youtube_oembed( $code ){
    if( stripos( $code, 'youtube.com' ) !== FALSE && stripos( $code, 'iframe' ) !== FALSE )
        $url = urldecode(rawurldecode( $code ));
            preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
            $amp_y_id = echo $matches[1];
        $code = str_replace( '<iframe', '<amp-youtube layout="fixed height" data-videoid="'. $amp_y_id .'"', $code );
        $code = str_replace( '</iframe>', '</amp-youtube>', $code);
    return $code;
}
//oembed_result alternative
//function my_plugin_enable_js_api( $html, $url, $args ) {
 
	/* Modify video parameters. */
//	if ( strstr( $html,'youtube.com/embed/' ) ) {
//		$html = str_replace( '?feature=oembed', '?feature=oembed&enablejsapi=1', $html );
//	}
	
//    return $html;
//}
//add_filter( 'oembed_result', 'my_plugin_enable_js_api', 10, 3 );
