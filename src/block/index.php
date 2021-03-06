<?php

register_block_type(
    'wp-events/shortcode-block-list', array(
      'render_callback' => 'event_block'
    )
  );



  function event_block($attributes) {

    $block_title = esc_html( $attributes['title'] );
    $block_cat = esc_html( $attributes['catSelect'] );
    $block_eventNumbers =  esc_html( $attributes['eventNumber'] ); 
    $block_buttenText = esc_html( $attributes['buttonText'] ); 
    $block_view = esc_html( $attributes['TemplateView'] );
    
    
    if( empty($block_title) ){  $block_title = "Seminars";}
    if( $block_cat == 0 ){   $block_cat = "";  }
    if(empty($block_buttenText)){  $block_buttenText = "Sell All Seminars";}
    if(empty($block_eventNumbers)){  $block_eventNumbers = 3;}
    if(empty($block_view)){  $block_view = 'grid-view';}



    $output .="<div class='wpevents-shortcode ".$block_view."'>";
    $output .= do_shortcode('[wpevents title="'.$block_title.'" category="'.$block_cat.'" button_text="'.$block_buttenText.'" number="'.$block_eventNumbers.'" ]');
    $output .="</div>";


 return $output ;


  } 