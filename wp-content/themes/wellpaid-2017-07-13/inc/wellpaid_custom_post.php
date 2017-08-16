<?php

function wellpaid_custompost(){

	
  
register_post_type('medianews',array(

    'labels'=>array(
      'name'=>'Media',
      'menu_name'=>'Media Menu',
      'all_items'=>'All Media',
      'add_new'=>'Add New Media',
      'add_new_item'=>'Add New Media item'


      ),
    'public'=>true,
    'supports'=>array(
      'title','revisions','page-attributes','thumbnail','editor'
      )




    ));
register_taxonomy(
                   'team_newsmedia',
                     'medianews',
                     array(
                      'labels'=>array(
                        'name'=>'newsmedia Category',
                        'add_new_item'=>'Add new category'


                        ),
                      'hierarchical'=>true,
                      
                      'show_admin_column'=>true

                      )
);
}
add_action('init','wellpaid_custompost');