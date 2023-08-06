function register___SLUG_TAX___examinadoras() {
    $labels = array(
        'name'                       => '__PLURAL_TAX__',
        'singular_name'              => '__SINGULAR_TAX__',
        'search_items'               => 'Buscar __PLURAL_TAX__',
        'popular_items'              => '__PLURAL_TAX__ Populares',
        'all_items'                  => 'Todas as __PLURAL_TAX__',
        'edit_item'                  => 'Editar __SINGULAR_TAX__',
        'update_item'                => 'Atualizar __SINGULAR_TAX__',
        'add_new_item'               => 'Adicionar Nova __SINGULAR_TAX__',
        'new_item_name'              => 'Novo Nome da __SINGULAR_TAX__',
        'separate_items_with_commas' => 'Separe as __PLURAL_TAX__ com vírgulas',
        'add_or_remove_items'        => 'Adicionar ou Remover __PLURAL_TAX__',
        'choose_from_most_used'      => 'Escolher entre as mais usadas',
        'menu_name'                  => '__PLURAL_TAX__'
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => __HIERARCHICAL__,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
        'has_archive'       => false,
    );

    register_taxonomy( '__SLUG_TAX__', '__SLUG__', $args );
}
add_action( 'init', 'register___SLUG_TAX___examinadoras' );