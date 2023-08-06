function adicionar_metaboxs___SINGULAR_NAME__() {
    //add_meta_boxes
}

//render_metaboxes

function salvar_metaboxs____SINGULAR_NAME__( $post_id ) {
    //save_postmetas
}

add_action( 'add_meta_boxes', 'adicionar_metaboxs___SINGULAR_NAME__' );
add_action( 'save_post', 'salvar_metaboxs____SINGULAR_NAME__' );