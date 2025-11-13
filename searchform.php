<?php
/**
 * Modèle pour afficher le formulaire de recherche personnalisé.
 * Ce fichier est appelé par la fonction get_search_form().
 */
?>
<form role="search" method="get" class="search-form-box" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Rechercher pour:', 'label', 'textdomain' ); ?></span>
        <input 
            type="search" 
            class="search-field" 
            placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'textdomain' ); ?>" 
            value="<?php echo get_search_query(); ?>" 
            name="s" 
        />
    </label>
    <button type="submit" class="search-submit">
        <!-- Votre icône de recherche SVG -->
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
            <path d="M784-120 532-372q-37 31-86.5 46.5T360-320q-119 0-201.5-82.5T80-600q0-119 82.5-201.5T360-880q119 0 201.5 82.5T644-600q0 49-15.5 98.5T582-372l252 252-48 48ZM360-400q74 0 127-53t53-127q0-74-53-127t-127-53q-74 0-127 53t-53 127q0 74 53 127t127 53Z"/>
        </svg>
    </button>
</form>