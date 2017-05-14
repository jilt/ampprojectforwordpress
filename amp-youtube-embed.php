add_filter( 'embed_oembed_html', 'amp_youtube_oembed' );
function amp_youtube_oembed( $code ){
    if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false):
        $url = urldecode(rawurldecode( $code ));
            preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
            $amp_y_id = echo $matches[1];
        $code = str_replace( '<iframe', '<amp-youtube layout="fixed height" data-videoid="'. $amp_y_id .'"', $code );
        $code = str_replace( '</iframe>', '</amp-youtube>', $code);
    return $code;
    endif;
}
