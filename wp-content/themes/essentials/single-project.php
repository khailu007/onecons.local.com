<?php
/**
 * The template for displaying all single project
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package essentials
 */

get_header();

$classes = '';
$styles = '';

if(get_post_type()=='project'){
 if(!empty(pix_get_option('blog-bg-color'))){
    if(pix_get_option('blog-bg-color')=='custom'){
        $styles = 'background:'.pix_get_option('custom-blog-bg-color').';';
        $classes = '';
    }else{
        $classes = 'bg-'.pix_get_option('blog-bg-color'). ' ';
    }
 }
}else{
 if(!empty(pix_get_option('pages-bg-color'))){
    if(pix_get_option('pages-bg-color')=='custom'){
        $styles = 'background:'.pix_get_option('custom-pages-bg-color').';';
    }else{
        $classes = 'bg-'.pix_get_option('pages-bg-color'). ' ';
    }
 }
}

$add_intro_placeholder = false;
if(get_post_type()=='project'){
    $post_intro = false;
    if(!empty(pix_get_option('post-with-intro'))&&pix_get_option('post-with-intro')){
        $post_intro = true;
    }

    if(!empty($_GET["post_intro"])){
        switch ($_GET["post_intro"]) {
            case 'true':
                $post_intro = true;
                break;
            case 'false':
                $post_intro = false;
                break;
        }
    }
    if($post_intro){
        get_template_part( 'template-parts/intro' );
    }else{
        $add_intro_placeholder = true;
    }
}else{
    get_template_part( 'template-parts/intro' );
}


if(!get_post_meta( get_the_ID(), 'pix-hide-top-padding', true )){
        $classes .= 'pix-pt-20';
}

$containerClass = 'container';
if(get_post_type()=='project' && !empty(pix_get_option('blog-full-width-layout'))){
    $containerClass = 'container-fluid';
}

?>

<div id="content" class="site-content <?php echo esc_html( $classes );?>" style="<?php echo esc_html( $styles ); ?>" >
    <div class="<?php echo esc_attr($containerClass); ?>">
        <div class="row">

            <?php

            if($add_intro_placeholder){
                ?>
                <div class="pix-main-intro-placeholder"></div>
                <?php
            }

            $blog_layout = 'default';
            if(!empty(pix_get_option('blog-layout'))){
                $blog_layout = pix_get_option('blog-layout');
            }
            if(!empty($_GET["blog_layout"])){
                switch ($_GET["blog_layout"]) {
                    case 'default':
                        $blog_layout = 'default';
                        break;
                    case 'right-sidebar':
                        $blog_layout = 'right-sidebar';
                        break;
                    case 'left-sidebar':
                        $blog_layout = 'left-sidebar';
                        break;
                }
            }
            while ( have_posts() ) :
                the_post();
                if(get_post_type()=='project'){
                    switch ($blog_layout) {
                        case 'left-sidebar':
                            get_template_part( 'template-parts/content', 'post-sidebar' );
                            break;
                        case 'right-sidebar':
                            get_template_part( 'template-parts/content', 'post-sidebar' );
                            break;
                        case 'default-normal':
                            get_template_part( 'template-parts/content', 'post-normal' );
                            break;
                        default:
                            get_template_part( 'template-parts/content', 'project' );
                    }
                }elseif (get_post_type() == 'elementor_library') {
                    // Elementor template page
                    ?>
                    <div class="col-12 col-md-10 offset-md-1">
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <article id="post-<?php the_ID(); ?>">
                                    <?php
                                        get_template_part( 'template-parts/content', 'page' );
                                    ?>
                                </article>
                            </main>
                        </div>
                    </div>
                <?php
            }elseif (get_post_type() == 'search') {
                get_template_part( 'template-parts/content', 'search' );
            }elseif (get_post_type() == 'none') {
                get_template_part( 'template-parts/content', 'none' );
            }else{
                ?>
                <div class="col-12">
                <?php
                    get_template_part( 'template-parts/content', 'page' );
                ?>
                </div>
                <?php
            }
            endwhile;
            ?>
        </div>
        <!-- Begin Project related -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <h2 class="one-project_related_heading">Dự án liên quan</h2>
                </div>
                <?php
                    $html = '';
                    $relatedproducts = new WP_Query( array( 'post_type' => 'project', 'posts_per_page' => '3', 'post__not_in' => array(get_the_ID()) ) );
                    if ( $relatedproducts->have_posts() ) :
                        while ( $relatedproducts->have_posts() ) : 
                            $relatedproducts->the_post();
                            if( $currentProductId != get_the_ID() ) :
                                $html .= '<div class="col-lg-4 col-md-6 col-12 pix-pt-20">';
                                $html .= '<article class="one_project-related-article" >';
                                //
                                $productId = get_the_ID();
                                $productTitle = get_the_title();
                                $productUrl = get_permalink();
                                $productAvatar = get_the_post_thumbnail_url();
                                $productExcerpt = get_the_excerpt();
                                //
                                $featured_image_full = get_the_post_thumbnail($productId, 'full', array('class' => 'attachment-full size-full'));
                                //
                                $html .= '<div class="one-project_related_card">';
                                $html .= '<a class="one-project_related-thumbnail-link" href="'.$productUrl.'">';
                                $html .= '<div class="one-project_related-thumbnail-img">';
                                $html .= $featured_image_full;
                                $html .= '</div>';
                                //
                                // $terms = get_the_terms($productId, 'price_nhom' );
                                // foreach ( $terms as $term ) {
                                //     $html .= '<div class="one_project_related-brand">';
                                //     $html .= $term->name;
                                //     $html .= '</div>';
                                // }
                                $html .= '</a>';
                                //
                                $html .= '<div class="one_project_related-text">';
                                $html .= '<h3 class="one_project_related-title">';
                                $html .= '<a href="'.$productUrl.'" alt="'.$productTitle.'" title="'.$productTitle.'">';
                                $html .= $productTitle;
                                $html .= '</h3>';
                                $html .= '</a>';
                                //
                                $html .= '<div class="one_project_related-excerpt">';
                                $html .= '<p>';
                                $html .= $productExcerpt;
                                $html .= '</p>';
                                $html .= '</div>';
                                $html .= '<a class="one-project_related-read-more" href="'.$productUrl.'" alt="'.$productTitle.'" title="'.$productTitle.'">';
                                $html .= 'Xem tiếp »';
                                $html .= '</a>';
                                $html .= '</div>';
                                //
                                $html .= '</div>';
                                $html .= '</article>';
                                $html .= '</div>';
                            endif;
                        endwhile;
                        wp_reset_query();
                    endif;
                    echo $html;
                ?>
            </div>
        <!-- End Project content -->
    </div>
</div>
<?php
get_footer();