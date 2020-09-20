  function añadirIdioma(){
   jQuery(document).ready(function () {
                var doc = $(document);
                jQuery('a.add-type').die('click').live('click', function (e) {
                    e.preventDefault();
                    var content = jQuery('#type-containe .type-row'),
                        element = null;
                    for (var i = 0; i < 1; i++) {
                        element = content.clone();
                        var type_div = 'teams_' + jQuery.now();
                        element.attr('id', type_div);
                        element.find('.remove-type').attr('targetDiv', type_div);
                        element.appendTo('#type_containe');

                    }
                });

                jQuery(".remove-type").die('click').live('click', function (e) {
                    
                        var id = jQuery(this).attr('data-id');
                        var targetDiv = jQuery(this).attr('targetDiv');
                        
                        jQuery('#' + targetDiv).remove();
                       
                    
                });

            }); 
  }


  
  function añadirEstudio(){
     jQuery(document).ready(function () {
                var doc = $(document);
                jQuery('a.add-est').die('click').live('click', function (e) {
                    e.preventDefault();
                    var content = jQuery('#type-container1 .type-row'),
                        element = null;
                    for (var i = 0; i < 1; i++) {
                        element = content.clone();
                        var type_div = 'teams_' + jQuery.now();
                        element.attr('id', type_div);
                        element.find('.remove-est').attr('targetDiv', type_div);
                        element.appendTo('#type_container1');

                    }
                });

                jQuery(".remove-est").die('click').live('click', function (e) {
                    
                        var id = jQuery(this).attr('data-id');
                        var targetDiv = jQuery(this).attr('targetDiv');
                        
                        jQuery('#' + targetDiv).remove();
                       
                    
                });

            });
  }




  function añadirCurso(){
     jQuery(document).ready(function () {
                var doc = $(document);
                jQuery('a.add-curso').die('click').live('click', function (e) {
                    e.preventDefault();
                    var content = jQuery('#type-container2 .type-row'),
                        element = null;
                    for (var i = 0; i < 1; i++) {
                        element = content.clone();
                        var type_div = 'teams_' + jQuery.now();
                        element.attr('id', type_div);
                        element.find('.remove-curso').attr('targetDiv', type_div);
                        element.appendTo('#type_container2');

                    }
                });

                jQuery(".remove-curso").die('click').live('click', function (e) {
                    
                        var id = jQuery(this).attr('data-id');
                        var targetDiv = jQuery(this).attr('targetDiv');
                        
                        jQuery('#' + targetDiv).remove();
                       
                    
                });

            });
  }


