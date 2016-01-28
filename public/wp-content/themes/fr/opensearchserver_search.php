<?php
/*
 *Template Name: OpenSearchServer Search Page
*/
get_header(); ?>
<main role="main" class="contentfield">


<section id="primary" class="content-area fly">
<div id="content" class="site-content" role="main">
<?php
/*
<!--    <div id="oss-search-form">
        <form method="get" id="f-oss-searchform" action=<?php print home_url('/');?> >
            <input type="text" value="<?php print get_search_query();?>" name="s"
                id="f-oss-keyword" style="width:70%;"
                autocomplete="off" /> 
            <input type="submit" id="f-oss-submit" value="<?php _e("Search", 'opensearchserver'); ?>" />
            <div style="position: absolute">
                <div id="oss-autocomplete"></div>
            </div>
        </form>
    </div> -->
    */
?>
    <?php
    
    // Localization of monthnames in search results
    $months['en'] = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $months['nb'] = array('januar', 'februar', 'mars', 'april', 'mai', 'juni', 'juli', 'august', 'september', 'oktober', 'november', 'desember');
    
    $displayUser = get_option('oss_display_user') == 1;
    $displayCategory = get_option('oss_display_category') == 1;
    $displayType = get_option('oss_display_type') == 1;
    $displayDate = get_option('oss_display_date') == 1;
    
    $query_fq_parm = isset($_REQUEST['fq']) ? $_REQUEST['fq'] : null;
    $query = get_search_query();
    $oss_result = opensearchserver_getsearchresult($query, false, true);
    $oss_result_facet = opensearchserver_getsearchresult($query, false, false);
    
    $oss_sp = isset($_REQUEST['sp']) ? $_REQUEST['sp'] : null;
    if (isset($oss_result) && $oss_result instanceof SimpleXMLElement && isset($oss_result_facet) && $oss_result_facet instanceof SimpleXMLElement) {
      $oss_results = opensearchserver_getresult_instance($oss_result);
      $oss_result_facets = opensearchserver_getresult_instance($oss_result_facet);
      //if first query does not return results try a spellcheck query to get a new suggestion
      if($oss_results->getResultFound() <= 0 && $oss_sp != 1 && get_option('oss_spell')!='none') {
        $oss_spell_result = opensearchserver_getsearchresult($query, true, null);
        $first_query = $query;
        $query = $spellcheck_query = opensearchserver_getspellcheck($oss_spell_result);
        $oss_result = opensearchserver_getsearchresult($query, false, true);
        if (isset($oss_result) && $oss_result instanceof SimpleXMLElement && isset($oss_result_facet) && $oss_result_facet instanceof SimpleXMLElement) {
          $oss_results = opensearchserver_getresult_instance($oss_result);
          $oss_result_facet = opensearchserver_getsearchresult($query, false, false);
          $oss_result_facets = opensearchserver_getresult_instance($oss_result_facet);
        }
      }
      
      $oss_resultTime = isset($oss_result) ? (float)$oss_result->result['time'] / 1000 : null;
      $max = opensearchserver_get_max($oss_results);
      ?>
    <div class="oss-search" style="margin-left: 1em;width: auto;margin-bottom: 5em;">
    <?php if($oss_result_facets->getResultFound()>0) {?>
    <!--
    <div id="oss-filter" style="float: right;padding-left: 3em;">
 
        <?php 
        $maxValueToDisplay = get_option('oss_facet_max_display', null);
        
    //advanced facets
    if(get_option('oss_advanced_facets')) :
        $facets_option_hierarchical = get_option('oss_facets_option_hierarchical');
		if(!is_array($facets_option_hierarchical)) {
			$facets_option_hierarchical = array();
		}
		$facets_option_hierarchical_taxonomy = get_option('oss_facets_option_hierarchical_taxonomy');
		if(!is_array($facets_option_hierarchical_taxonomy)) {
			$facets_option_hierarchical_taxonomy = array();
		}
        $fields = opensearchserver_get_fields();

        //compute facets
        $facets = opensearchserver_build_facets_to_display($query, $oss_results, $oss_result_facets);

        //display active facets
        $activeFacets = opensearchserver_get_active_facets();
        if(!empty($activeFacets)) {
             echo '<div id="oss-active-filters">';
             // echo '<h3>Filtre</h3>';
             // echo '<h3>'.__('Active filters', 'opensearchserver').'</h3>';
             echo '<p>'.__('Click on a filter to remove it.', 'opensearchserver').'</p>';  
        }
        foreach($activeFacets as $field => $facetInfo) {
            echo '<div class="oss-active-filter">';
            echo '<div class="oss-filter-title oss-active-filter-title">'.opensearchserver_get_facet_label($field).'</div>';
            echo '<ul class="oss-nav oss-nav-radio oss-active-filters-values">';
            foreach ((array)$facetInfo as $key => $facetValue) {
                $link = "?s=".$query.'&'. opensearchserver_get_facet_url_without_one_facet_value($field, $facetValue);
                echo '<li class="oss-facetactive oss-active-filter-value"><input onclick=\'window.location.href = "'.$link.'"\' checked="checked" 
                  type="checkbox" id="'.urlencode($field.'_'.$facetValue).'_delete"/>';
                echo '<label for="'.urlencode($field.'_'.$facetValue).'_delete">
                  <a class="opensearchserver_display_use_radio_buttons" href="'.$link.'">'.
                    opensearchserver_get_facet_value($field, $facetValue).'</a>';
                echo '</label></li>'; 
            }
            echo '</ul>';
            echo '</div>';
        }
        if(!empty($activeFacets)) {
            echo '</div>';
        }
        
        
        // echo '<h3>'.__('Filters', 'opensearchserver').'</h3>';
        // echo '<h3>Filtre</h3>';
        
        foreach ($facets as $facet => $facet_results) :
            $facetStringId = urlencode($facet);
            $isHierarchical = in_array($facet, $facets_option_hierarchical);
            
            //loop through facets and build an array with active facets first, each item
            //is a sub array containing url, number of values, whether facet is active or not, ...
            $facetValues = array();
            $tempFacetsActive = array();
            foreach ($facet_results as $value => $count) {
                $active = opensearchserver_is_facet_active($facet, $value);
                $newValue = array(
                        'link' => (!$active) ?
                                    "?s=".$query.'&'. opensearchserver_get_facet_url($facet, $value, opensearchserver_facet_is_exclusive($facet)) :                  
                        			"?s=".$query.'&'. opensearchserver_get_facet_url_without_one_facet_value($facet, $value),
                        'css_class' => (!$active) ? 'oss-link' : 'oss-bold',
                        'count' => $count,
                        'active' => $active
                    );
                if($isHierarchical) {
                    $facetValues[$value] = $newValue;
                    $countValues = count($facetValues);
                } else {
                    ($active) ? 
                        $tempFacetsActive[$value] = $newValue:
                        $facetValues[$value] = $newValue;
                }
            }
            
            //hierarchical facets need more work
            if($isHierarchical) {
                //build an array of taxonomy objects
                $cats = array();
                foreach($facetValues as $name => $obj) {
                    $cats[] = get_term_by('name', $name, $facets_option_hierarchical_taxonomy[$facet]);
                }
                //sort hierarchically this array of taxonomy objects
                $categoryHierarchy = array();
                sort_terms_hierarchicaly($cats, $categoryHierarchy, 'name');
                //finally sort the array of facets in the same way than the array of taxonomies,
                //with sub arrays if needed            
                $finalFacets = array();
                sort_facets_hierarchicaly($categoryHierarchy, $facetValues, $finalFacets);
            } else {
                $finalFacets = $facetValues;
                //facets that are not hierarchical well have selected values on top of the list
                if(!empty($tempFacetsActive)) {
                    $finalFacets = $tempFacetsActive + $finalFacets;
                }
                $countValues = count($finalFacets);
            } 
        ?>
               <div class="oss-filter-title">
                    <?php
                    print opensearchserver_get_facet_label($facet);
                    ?>
               </div>
               <?php if(opensearchserver_facet_do_add_searchform($facet)) : ?>
                  <input class="oss-facetfilter" type="text" rel="<?php echo $facetStringId; ?>" id="oss-facetfilter-<?php echo $facetStringId; ?>" value="" placeholder="<?php _e("Filter values", 'opensearchserver'); ?>" />
               <?php endif; ?>
               <ul class="oss-nav oss-nav-radio" id="oss-facetvalues-<?php echo $facetStringId; ?>">               
                    <?php if(opensearchserver_facet_do_add_link_all($facet)) : ?>
                        <li class="oss-top-nav">
                            <a href="<?php print '?s='.urlencode($query).'&'.opensearchserver_get_facet_url_without_one_facet($facet);?>">
                                <?php _e("Alle", 'opensearchserver'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php
                      $countDisplayed = 1;
                      $previousActive = null;
                      
                      //display facets
					  $countHidden = 0;
                      echo opensearchserver_get_facets_html($facet, $finalFacets, 0, $countDisplayed, null, $isHierarchical, null, $countHidden);

                      //display a link to toggle hidden values 
                      if($countHidden > 0) {
                         echo '<li class="oss-seeall"><a href="#" class="oss-link-seeall">'.sprintf( _n( 'See one more value', 'See %d other values', $remaining, 'opensearchserver' ), $countHidden).'</a></li>';   
                      }
                    ?>
            </ul>
            <?php
    		endforeach;
    //if "standard" facets
    // no complex behaviour here
    else:
        $facets = opensearchserver_build_facets_array($oss_results);
        foreach ($facets as $facet => $facet_results) :
        ?>
           <div class="oss-filter-title">
                <?php
                print opensearchserver_get_facet_label($facet);
                ?>
           </div>
           <ul class="oss-nav">			   
			<li class="oss-top-nav">
				<a href="<?php print '?s='.urlencode($query).'&'.opensearchserver_get_facet_url_without_one_facet($facet);?>">
					<?php _e("Alle", 'opensearchserver'); ?>
				</a>
			</li>
            <?php
            if(count($facet_results) > 0 ) :
              foreach ($facet_results as $value => $count) :
                $css_class = 'oss-link';
                $link = "?s=".$query.'&'. opensearchserver_get_facet_url($facet, $value)
                ?>
                <li>
                    <?php 
                    if (opensearchserver_is_facet_active($facet, $value)) {
                        $css_class .= ' oss-bold';
                    }
                    ?>
                    <label for="<?php print urlencode($facet.'_'.$value); ?>">
                        <a class="<?php echo $css_class; ?>" href="<?php print $link; ?>">
                            <?php print opensearchserver_get_facet_value($facet, $value); ?><?php if(get_option('oss_facet_display_count', 0) == 1) { print ' <span class="oss-facet-number-docs">('.$count.')</span>'; }?>
                        </a>
                    </label> 
                </li>
            <?php 
                endforeach;
            endif;
        endforeach;
        ?>
        </ul>
    <?php 
    //end "if advanced facets"
    endif;  	
        ?>
    
    </div> -->
    <?php }?>
    <?php if($oss_sp == 1 || $oss_results->getResultFound() <= 0) {
      ?>
    <div>
         
        <p><?php // _e("No documents containing all your search terms were found.", 'opensearchserver'); ?></p>
        <p><?php printf("Søket på <b>'%s'</b> ga ingen resultater.", $first_query); ?>
        <?php // printf( ( "Your searched keywords <b>'%s'</b> did not match any document.", 'opensearchserver' ), $first_query); ?>
        </p>
        <p><strong>Forslag:</strong><?php //_e("Suggestions:"); ?></p>
        <ul>
            <!-- <li>Forsikre deg om at alle ordene er stavet riktig<?php // _e("Make sure all words are spelled correctly.", 'opensearchserver'); ?></li> -->
            <li>Prøv et annet søk<?php // _e("Try different keywords.", 'opensearchserver'); ?></li>
            <li>Prøv mer generelle søkeord<?php // _e("Try more general keywords.", 'opensearchserver'); ?></li>
        </ul>
    </div>
    <?php
    }else {
        ?>
    <div id="oss-no-of-doc" class="oss-<?php echo $oss_results->getResultFound() ?>-results">
        <?php printf(__('<strong>%1$d</strong> artikler funnet:', 'opensearchserver'), $oss_results->getResultFound(), $oss_resultTime); ?>
        <?php if(get_option('oss_sort_timestamp') == 1 ) :?>
            <div id="oss-sort">
	            <span class="oss-sort-label"><?php _e('Sort results by: ', 'opensearchserver'); ?>
	            <a class="<?php if(!get_query_var('sort')) { print 'oss-bold'; } ?>" href="<?php print opensearchserver_build_sort_url(''); ?>"><?php _e('relevancy', 'opensearchserver'); ?></a> -
	            <a class="<?php if(get_query_var('sort') == '-date') { print 'oss-bold'; } ?>" href="<?php print opensearchserver_build_sort_url('-date'); ?>"><?php _e('date (desc)', 'opensearchserver'); ?></a> -
	            <a class="<?php if(get_query_var('sort') == '+date') { print 'oss-bold'; } ?>" href="<?php print opensearchserver_build_sort_url('+date'); ?>"><?php _e('date (asc)', 'opensearchserver'); ?></a>
	        </div>
        <?php endif;?>
        <div id="oss-did-you-mean">
            <?php 
            	if(isset($spellcheck_query)) { 
					$originalQueryText = '<a href="?s='.$first_query.'&sp=1"><b>'.$first_query.'</b></a>';		
            		printf(__('Viser resultater for <strong>%1$s</strong> i stedet for %2$s.', 'opensearchserver'), $spellcheck_query, $originalQueryText);
            	}
            ?>
        </div>
        <?php }?>
    </div>
    <div id="oss-results">
        <?php
        for ($i = $oss_results->getResultStart(); $i < $max; $i++) {
          $category  = stripslashes($oss_results->getField($i, 'type', true));
          $title     = stripslashes($oss_results->getField($i, 'title', true));
          $content = stripslashes($oss_results->getField($i, 'content', true, true));
          if ($content == null) {
            $content = stripslashes($oss_results->getField($i, 'contentPhonetic', true, true));
            if ($content == null) {
              $content = stripslashes($oss_results->getField($i, 'content', true, false));
            }
          }
          if(strlen($content) < 5) {
              $content = stripslashes($oss_results->getField($i, 'custom_field_ingress', true, false));
          }

          $user = stripslashes($oss_results->getField($i, 'user_name', true));
          $user_url = stripslashes($oss_results->getField($i, 'user_url', true));
          $type = stripslashes($oss_results->getField($i, 'type', true));
          $url = stripslashes($oss_results->getField($i, 'url', false));
          $date = stripslashes($oss_results->getField($i, 'timestamp', false));
          $categories = array();
          $taxonomy_field = get_option('oss_taxonomy_display');
          $taxonomy_data = array();
          $taxonomies = $oss_results->getField($i, 'taxonomy_'.$taxonomy_field, false, false, null, true);
          if(!is_array($taxonomies)) {
              $categories = (string)$taxonomies[0];
          }else {
            foreach ($taxonomies as $taxonomy) {
  			       $taxonomy_data[] = (string)$taxonomy;
  		      }
            $categories = implode(', ', $taxonomy_data);
         }

          if(strstr($content,'ninja_forms') !== FALSE) {
              // Setting the dialect
              $prop_lang = '';
              if(strpos($url, 'klagebrev/') !== FALSE) {
                  if ( strpos( $url, 'bokmal/' ) !== FALSE ) {
                      $prop_lang = ' (Bokmål)';
                  } else if ( strpos( $url, 'nynorsk/' ) !== FALSE ) {
                      $prop_lang = ' (Nynorsk)';
                  }
              }
              $content = preg_replace('/\[ninja.*?forms.*?id\=([0-9]+)\]/U', '<em>Skjema: Klagebrev til selger'.$prop_lang .'</em>', $content);
          } else {
              $content = preg_replace('/\[ninja.*?forms.*?id\=([0-9]+)\]/U', '<em>Skjema</em>', $content);
          }

          ?>

        <div class="oss-result">
            <?php
                if ($title) {?>
            <h2>
                <a href="<?php print $url;?>"><?php print $title;?></a>
            </h2>
            <?php }else { ?>
            <h2>
            <a href="<?php print $url;?>"><?php print "Un-titled";?></a>
            </h2>
            <?php }
            ?>
            <div class="oss-content">
                <?php if ($content) {
                  print $content.'<br/>';
                }
                ?>
            </div>
            <div class="oss-url">
                <?php
			     if($url) :
			     ?>
                    <!-- <a href="<?php print $url;?>"><?php print $url;?> </a> -->
                <?php 
        		endif;
                if ($displayDate || $displayType || $displayUser || $displayCategory) {
                  print '<br/>';
                }
                print '<span class="oss-result-info">';

                setlocale( LC_ALL, 'no_NO' );
                if($displayDate) {
					print '<span class="entry-date"><time datetime="'.$date.'">'.str_replace($months['en'], $months['nb'], date('j. F Y', strtotime($date)) ).'<time>';
					if (($displayType && !empty($type)) || ($displayUser && !empty($user)) || ($displayCategory && !empty($categories))) {
						print ', ';
					}
					print '</span>';
        		}
        		
                //type, user, categories
        		if ( ($type && $displayType) && ($user && $displayUser) && ($categories != null && $categories != '' && $categories != 'Uncategorized' && $displayCategory)) {
                  printf(__('%1$s by %2$s in %3$s', 'opensearchserver'), $type, $user, $categories);
                //type and user
        		} elseif ( ($type && $displayType) && ($user && $displayUser)) {
                  printf(__('%1$s by %2$s', 'opensearchserver'), $type, $user);
                //type and categories
        		} elseif ( ($type && $displayType) && ($categories != null && $categories != '' && $categories != 'Uncategorized' && $displayCategory)) {
                  printf(__('%1$s in %2$s', 'opensearchserver'), $type, $categories);
                //user and categories
        		} elseif ( ($user && $displayUser) && ($categories != null && $categories != '' && $categories != 'Uncategorized' && $displayCategory)) {
                  printf(__('by %1$s in %2$s', 'opensearchserver'), $user, $categories);
                //type only
        		} elseif ( ($type && $displayType)) {
                  // printf(__('type: %1$s', 'opensearchserver'), $type);
                //user only
        		}  elseif ( ($user && $displayUser)) {
                  printf(__('by %1$s', 'opensearchserver'), $user);
                //categories only
        		}   elseif ( ($categories != null && $categories != '' && $categories != 'Uncategorized' && $displayCategory)) {
                  printf(__('categories: %1$s', 'opensearchserver'), $categories);
        		} 
        		
        		print '</span>';
                ?>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <?php $oss_paging = opensearchserver_getpaging($oss_result);

    if($oss_paging) { ?>
    <div id="oss-paging">
        <?php   foreach($oss_paging as $page)  {
                if($page['url']) {
                    if(stripos($page['label'], 'next') !== false) $label = 'Neste';
                    elseif(stripos($page['label'], 'last') !== false) $label = 'Siste';
                    elseif(stripos($page['label'], 'previous') !== false) $label = 'Forrige';
                    elseif(stripos($page['label'], 'first') !== false) $label = 'Første';
                    else $label = $page['label'];

                    ?>
        <a id="oss-page" href="<?php print $page['url']; ?>"><?php print $label; ?>
        </a>
        <?php }
        else {
          print '<span id="oss-page">'.$page['label'].'</span>';
        }
            } ?>
    </div>
    </div>
    <?php }

      }
    ?>

  </div>
</section>
</main>
<?php
//get_sidebar( 'content' );
//get_sidebar();
?>
<?php get_footer();

