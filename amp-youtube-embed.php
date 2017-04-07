<amp-youtube width="480"
  height="270"
  layout="responsive"
  data-videoid="lBTCB7yLs8Y">
</amp-youtube>

<iframe width="960" height="540" src="https://www.youtube.com/embed/RTJvgZ5bgpM?feature=oembed" frameborder="0" allowfullscreen>
</iframe>

add_filter( 'embed_oembed_html', 'amp_youtube_oembed' );
function amp_youtube_oembed( $code ){
    if( stripos( $code, 'youtube.com' ) !== FALSE && stripos( $code, 'iframe' ) !== FALSE )
        $code = str_replace( '<iframe', '<amp-youtube layout="fixed height" ', $code );
        // reperire id video - reach video id
        $code .="</amp-youtube>\n";

    return $code;
}
