<?php
$category = get_category( get_query_var( 'cat' ) );
$cat_layout = newseqo_cat_layout($category->cat_ID);
get_template_part( 'template-parts/blog/category/style/content', $cat_layout );