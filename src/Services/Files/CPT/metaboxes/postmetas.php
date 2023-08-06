    if ( isset( $_POST['__ID__'] ) ) {
        update_post_meta( $post_id, '__ID__', sanitize_text_field( $_POST['__ID__'] ) );
    }