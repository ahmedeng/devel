<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Devel_mcp {

    /**
     * Constructor
     *
     * @access    public
     */
    function __construct()
    {
        // Make a local reference to the ExpressionEngine super object
        $this->EE =& get_instance();
        // $this->index();
        
    }

    // --------------------------------------------------------------------

    /**
     * Main Page
     *
     * @access    public
     */
    function index()
    {
	$php_field_path = str_replace($_SERVER['DOCUMENT_ROOT'], '',PATH_THIRD.'php_field' );
        $this->EE->load->library('javascript');
        $this->EE->cp->add_to_head('<script type="text/javascript" src="'.$php_field_path.'/CodeMirror-2.2/lib/codemirror.js"></script>');
        $this->EE->cp->add_to_head('<script src='.$php_field_path.'/CodeMirror-2.2/mode/xml/xml.js></script>');
        $this->EE->cp->add_to_head('<script src='.$php_field_path.'/CodeMirror-2.2/mode/php/php.js></script>');
        $this->EE->cp->add_to_head('<script src='.$php_field_path.'/CodeMirror-2.2/mode/clike/clike.js></script>');
        $this->EE->cp->add_to_head('<script src='.$php_field_path.'/CodeMirror-2.2/mode/htmlmixed/htmlmixed.js></script>');
        $this->EE->cp->add_to_head('<script src='.$php_field_path.'/CodeMirror-2.2/mode/css/css.js></script>');
        $this->EE->cp->add_to_head('<script type="text/javascript" src="'.PATH_JQUERY.'jquery.js"></script>');
         
        $this->EE->cp->add_to_head('<script src="'.$php_field_path.'/CodeMirror-2.2/lib/util/simple-hint.js"></script>');
        $this->EE->cp->add_to_head('<link rel="stylesheet" href="'.$php_field_path.'/CodeMirror-2.2/lib/util/simple-hint.css">');
        $this->EE->cp->add_to_head('<script src="'.$php_field_path.'/CodeMirror-2.2/lib/util/javascript-hint.js"></script>');
        $this->EE->cp->add_to_head('<script type="text/javascript" src="'.$php_field_path.'/CodeMirror-2.2/mode/javascript/javascript.js"></script>');
        $this->EE->cp->add_to_head('<link rel="stylesheet" href="'.$php_field_path.'/CodeMirror-2.2/lib/codemirror.css">');
        
        $m=str_replace("amp;","",BASE);        
        $this->EE->javascript->output(array(
'
$(function() {
        $( "#tabs" ).tabs();
    });
    
    var html_delay;
      // Initialize CodeMirror editor with a nice html5 canvas demo.
      var html_editor = CodeMirror.fromTextArea(document.getElementById("html_code"), {
        lineNumbers: true,
        mode: "text/html",
        tabMode: "indent",
        extraKeys: {"Ctrl-Space": function(cm) {CodeMirror.simpleHint(cm, CodeMirror.javascriptHint);}},
        onChange: function() {
          clearTimeout(php_delay);
          html_delay = setTimeout(html_updatePreview, 300);
        }
      });
      
      function html_updatePreview() {
        var html_previewFrame = document.getElementById("html_preview");
        var html_preview =  html_previewFrame.contentDocument ||  html_previewFrame.contentWindow.document;
        html_preview.open();
        html_preview.write(html_editor.getValue());
        html_preview.close();
      }
      setTimeout(html_updatePreview, 300);
      var previewFrame;
      

              
        $("#tabs-php").ajaxComplete(function(event, req, ajaxOptions)  {
            if(req.statusText="OK")  
            {
                var preview =  previewFrame.contentDocument ||  previewFrame.contentWindow.document;
                preview.open();
                preview.write(req.responseText);
                preview.close();
                
            }
        });

      function execute_php(value)
        { 
        sSource="'.$m.'&C=addons_modules&M=show_module_cp&module=devel&method=execute_php";
        value=escape(value);
        $.getJSON( sSource,
                    {    
                        value: value
                    },
                    function(result) 
                    {             
                        //alert(result);
                    }
                ); 
        }


var php_delay;
      // Initialize CodeMirror editor with a nice html5 canvas demo.
      $("#php_code").text("<?php\r\n\r\n?>");
      var php_editor = CodeMirror.fromTextArea(document.getElementById("php_code"), {
        lineNumbers: true,
        matchBrackets: true,
        mode: "application/x-httpd-php",
        indentUnit: 4,
        indentWithTabs: true,
        enterMode: "keep",
        tabMode: "shift",
        value: "XXXXXXXXXXXXXXXXXXXX",
        onChange: function() {
          clearTimeout(php_delay);
          php_delay = setTimeout(php_updatePreview, 300);
        }
      });
      
      function php_updatePreview() {
        previewFrame = document.getElementById("php_preview");
        execute_php(php_editor.getValue());        
      }
      setTimeout(php_updatePreview, 300);
      
      
      function execute_ee(value)
        { 
        sSource="'.$m.'&C=addons_modules&M=show_module_cp&module=devel&method=execute_ee";
        value=escape(value);
        $.getJSON( sSource,
                    {    
                        value: value
                    },
                    function(result) 
                    {             
                        //alert(result);
                    }
                ); 
        }


var ee_delay;
      // Initialize CodeMirror editor with a nice html5 canvas demo.
      
      var ee_editor = CodeMirror.fromTextArea(document.getElementById("ee_code"), {
        lineNumbers: true,
        matchBrackets: true,
        mode: "text/html",
        indentUnit: 4,
        indentWithTabs: true,
        enterMode: "keep",
        tabMode: "shift",
        onChange: function() {
          clearTimeout(ee_delay);
          ee_delay = setTimeout(ee_updatePreview, 300);
        }
      });
      
      function ee_updatePreview() {
        previewFrame = document.getElementById("ee_preview");
        execute_ee(ee_editor.getValue());        
      }
      setTimeout(ee_updatePreview, 300);'
));
        $this->EE->cp->set_variable('cp_page_title', $this->EE->lang->line('devel_module_name'));

        
        return $this->EE->load->view('index',null, TRUE);
    }    
    
    function execute_php()
    {   
      exit($this->EE->load->view('ajax_execute_php',null,TRUE));      
    }
    
    function execute_ee()
    {   
      exit($this->EE->load->view('ajax_execute_ee',null,TRUE));      
    }
}
// END CLASS

/* End of file mcp.Devel.php */
/* Location: ./system/expressionengine/third_party/modules/download/mcp.download.php */