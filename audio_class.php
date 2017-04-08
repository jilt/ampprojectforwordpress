
function amp-audio-player( $html, $attr ) {
    if ( ! empty( $attr['player'] ) && $attr['player'] === 'default' )
        $html = '{audio player:default}';
    else
        $html = '{audio player:other}';

    return "<p>$html</p>";
}

add_filter( 'wp_audio_shortcode_override', 'amp-audio-player', 10, 2 );
