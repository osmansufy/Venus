<?php
namespace VenusCompanion\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use WP_Query;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Portfolio extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'portfolio';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Portfolio', 'venus-companion' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		// return [ 'venus-companion' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'venus-companion' ),
			]
		);

		$this->add_control(
			'show_tags',
			[
				'label' => __( 'Show Tags', 'venus-companion' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'venus-companion' ),
				'label_off' => __( 'Hide', 'venus-companion' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
        );
        $this->add_control(
			'portfolio_style',
			[
				'label' => __( 'Portfolio Style', 'venus-companion' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'masonry',
				'options' => [
					'masonry' => __( 'Masonry', 'venus-companion' ),
					'square'  => __( 'Square', 'venus-companion' ),
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'venus-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
        $settings = $this->get_settings_for_display();
        if($settings['show_tags']=='yes'){
            $tags=get_terms(array(
                'taxonomy'=>'ptags',
                'hide_empty'=>true,
            ));

        
		?>
		  <div class="text-center">
                <ul class="portfolio-filter">
                    <li class="active"><a href="#" data-filter="*"> All</a></li>
                    <?php 
		foreach($tags as $tag){
            printf('<li><a href="#" data-filter=".%s">%s</a></li>',esc_attr($tag->slug),esc_html($tag->name));

        }
?>
                </ul>
		  </div>
<?php

$portfolios = new WP_Query([
    'posts_per_page'=>-1,
    'post_type'=>'portfolio',
    'post_status'=>'publish'
]);

echo '<div class="portfolio-grid portfolio-gallery grid-4 gutter">';
while($portfolios->have_posts()){
    $portfolios->the_post();

    $portfolios_tags=$this->get_portfolio_tags(get_the_ID());
    $image_url=get_the_post_thumbnail_url( get_the_ID(  ), 'large' );
    
    ?>
        <div class="portfolio-item <?php echo esc_attr($portfolios_tags) ;?>">
                    <a href="<?php echo esc_url($image_url)  ;?>" class="portfolio-image popup-gallery"
                        title="Venus Product">
                        <img src="<?php echo esc_url($image_url)  ;?>" alt="" />
                        <div class="portfolio-hover-title">
                            <div class="portfolio-content">
                                <h6><?php the_title() ;?></h6>
                                <div class="portfolio-category">
                                    <span><?php the_excerpt() ;?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
    <?php
    echo "</div>";
}

        }
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	/*protected function _content_template() {
		?>
		<div class="title">
			{{{ settings.title }}}
		</div>
		<?php
	}
    */
    
    private function get_portfolio_tags($post_id){
		$p_tags = get_the_terms($post_id,'ptags');
        $_tags = [];
        foreach($p_tags as $tag){
            $_tags[$tag->term_id] = $tag->slug;
        }

        return join(' ',$_tags);
    }
}
