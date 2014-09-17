<?php
      $value = ee()->input->get_post('value');          
      $value=urldecode($value);
      ee()->load->library('template');
      ee()->TMPL=ee()->template;
      ee()->TMPL->parse($value);
      $out = ee()->TMPL->parse_globals(ee()->TMPL->final_template);
      echo $out;
?>