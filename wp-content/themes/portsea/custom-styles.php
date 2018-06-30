

/*  Top Header Tab
--------------------------*/

.header-top, .menu li li ,.menu li li li ,
#nav-container,
.widget_match_center,
#sidebar .widget-title
	{
		background: <?php the_field('header_background_color','option');?>;
	}

.menu li li:hover
	{
		background:<?php the_field('social_links_bg','option');?>;
	}
.social-links li
 {
    
    background: <?php the_field('social_links_bg','option');?>;
}
.sb-icon-search
 {
	
	color:<?php the_field('social_links_bg','option');?>!important;

}
.home #nav-container .main-nav li a:hover,
.home #nav-container .main-nav .current_page_item a,
.home #menu-panel .top-nav li a:hover,
.news-title span, .page-title span,
.page-title
 {
	
	color:<?php the_field('header_background_color','option');?>;
}
.menu li li a:hover,
.page-title

 {
	
	color:<?php the_field('header_background_color','option');?>!important;

}
a, h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 , a:hover{
	color:<?php the_field('header_background_color','option');?>;

}
.social-links li a{
	
	color:<?php the_field('social_links_anchor','option');?>;
}
.social-links li:hover {
	
	background:<?php the_field('social_links_hover','option');?>;
}

li.slick-active {
	
	background: <?php the_field('active_slider','option');?>;
}

.sb-search.sb-search-open .sb-icon-search, .no-js .sb-search .sb-icon-search , .header-top .sub-main-nav li a:hover , .home #nav-container .main-nav li li:hover  a {
	
	color:<?php the_field('social_links_hover','option');?>; 
}

.home #nav-container .main-nav li li a:hover {
	
   color:<?php the_field('social_links_hover','option');?>!important;
}
#nav-container .main-nav li a:hover, 
#nav-container .main-nav .current_page_item a, 
#menu-panel .top-nav li a:hover
 {
	 
    color:<?php the_field('social_links_hover','option');?>!important;
}
/*  Match Center Tab
--------------------------*/

#match-centre-panel {
	
background: <?php the_field('match_center_background','option');?>!important;
}


.home .widget_match_center .spdate,
.home .widget_match_center .sp-match-link a,
.home .widget_match_center .spteam1, 
.home .widget_match_center .spteam2,
.home .widget_match_center .spscore {
	
	color:<?php the_field('match_text_color','option');?>;
}

#menu-panel .top-nav li a {
	
	color:<?php the_field('menu_color','option');?>;
}

*  Menu Tab
--------------------------*/


#menu-panel .top-nav li a {
	
	color:<?php the_field('menu_color','option');?>;
}

#menu-panel {

background: <?php the_field('background_color','option');?>!important;
	
}


*  News Tab
--------------------------*/


.event_widget_row,
.rpwe-block a,
.acf-rpw-excerpt a
{
	
	color:<?php the_field('anchor_color','option');?>!important;
	
}

.event_widget_row,
.rpwe-block a,
.acf-rpw-excerpt a
 {
	
	color:<?php the_field('anchor_color','option');?>!important;
	
}

/* NPL  Color
--------------------------*/

.fixtures_box table th,
#npl-panel .col-md-3 .statleader-block .leader-txt,
#npl-panel .col-md-3 .statleader-table th,
#npl-panel .more a ,
#npl-panel .golden,
#fixtures_lg_wrapper .col-md-3 .statleader-block .leader-txt

{

    background:<?php the_field('header_color','option');?>!important;

}
#npl-panel .col-md-3 .statleader-block .statleader-nameblock .playerlink,
#npl-panel .col-md-3 .statleader-table .sl-player a {
	
	color:<?php the_field('text_color','option');?>;
}


/* Club Finder
--------------------------*/

#find-assoc {
	
	color:<?php the_field('search_icon','option');?>;
}

@media only screen and (max-width: 992px) and (min-width: 200px)   {

.js .main-nav .menu ,
.js .main-nav .menu li 
{
 
    background-color: <?php the_field('header_background_color','option');?>;
  }
.js .main-nav .menu li a {

  border-bottom: 1px solid <?php the_field('social_links_bg','option');?>;
 }
 .js .main-nav .menu li a:hover {

    color:<?php the_field('social_links_hover','option');?>!important;
    background:<?php the_field('social_links_bg','option');?>!important;
  }
  .main-nav .menu li.current_page_item,
		.menu .current_page_item a,
		.menu .current-menu-item a {
			background-color:<?php the_field('social_links_bg','option');?>;
			color:<?php the_field('header_background_color','option');?>!important;
		}
.home .js .main-nav .menu li a:hover {
	
	color: <?php the_field('social_links_hover','option');?>!important;
}
}
<?php the_field('site_specific_css','option');?>










