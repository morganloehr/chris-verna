<?php  
require_once vc_path_dir('SHORTCODES_DIR', 'vc-posts-grid.php');
class WPBakeryShortCode_Wpo_Products extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_All_Products extends WPBakeryShortCode {

		public function getListQuery($atts){
			$list_query = array();
			$types = explode(',', $atts['show_tab']);
			foreach ($types as $type) {
				$list_query[$type] = $this->getTabTitle($type);
			}
			return $list_query;
		}

		public function getTabTitle($type){
			switch ($type) {
				case 'recent':
					return array('title'=>esc_html__('Latest Products','training'),'title_tab'=>esc_html__('Latest','training'));
				case 'featured_product':
					return array('title'=>esc_html__('Featured Products','training'),'title_tab'=>esc_html__('Featured','training'));
				case 'top_rate':
					return array('title'=> esc_html__('Top Rated Products','training'),'title_tab'=>esc_html__('Top Rated', 'training'));
				case 'best_selling':
					return array('title'=>esc_html__('BestSeller Products','training'),'title_tab'=>esc_html__('BestSeller','training'));
				case 'on_sale':
					return array('title'=>esc_html__('Special Products','training'),'title_tab'=>esc_html__('Special','training'));
			}
		}
	}

class WPBakeryShortCode_Wpo_Product_Deals extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Productcategory extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Category_Filter extends WPBakeryShortCode_VC_Posts_Grid {

}

class WPBakeryShortCode_Wpo_Category_List extends WPBakeryShortCode_VC_Posts_Grid {

}