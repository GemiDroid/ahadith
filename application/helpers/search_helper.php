<?php
  function search_results($str, $keywords = ''){
    $keywords = preg_replace('/\s\s+/', ' ', strip_tags(trim($keywords))); // filter
     
    $style = 'highlight';
    $style_i = 'highlight_important';
     
    /* Apply Style */
     
    $var = '';
     
    foreach(explode(' ', $keywords) as $keyword)
    {
    $replacement = "<span class='".$style."'>".$keyword."</span>";
    $var .= $replacement." ";
     
    $str = str_ireplace($keyword, $replacement, $str);
    }
     
    /* Apply Important Style */
     
    $str = str_ireplace(rtrim($var), "<span class='".$style_i."'>".$keywords."</span>", $str);
     
    return $str;
  }
                        