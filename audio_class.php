//remember to add <script async custom-element="amp-audio" src="https://cdn.ampproject.org/v0/amp-audio-0.1.js"></script>

function wp_amp_audio( $html, $atts, $audio, $post_id, $library ) {
    $html .='<amp-audio width="auto"\n';
    $html .='height="50"\n';
    $html .='src="'.$atts['src'].'">\n';
    $html .='<div fallback>\n';
    $html .='<p>Your browser doesn’t support HTML5 audio</p>\n';
    $html .='</div>\n';
    $html .='</amp-audio>';

    return $html;

}
add_filter( 'wp_audio_shortcode','wp_amp_audio',5,10);
