<?php
$cache_file = "manufacturer.json";
    header('Content-Type: text/javascript; charset=utf8');
?>
var manufacturerList = <?php echo file_get_contents($cache_file); ?> ; 

APchange = function(event, ui){
	$(this).data("autocomplete").menu.activeMenu.children(":first-child").trigger("click");
}
    $(function() {
      
        $( ".manufacturerSelection" ).autocomplete(
		{
            source:manufacturerList,
			delay:300,
			focus: function(event, ui) {
				$(this).parent().find(".manufacturer_hidden_value").val(ui.item.value);
				$(this).val(ui.item.label);
				return false;
			},
			select: function(event, ui) {
				$(this).parent().find(".manufacturer_hidden_value").val(ui.item.value);
				$(this).val(ui.item.label);
				$(this).unbind("change");
				return false;
			}
		});
			$( ".manufacturerSelection" ).focus(function(){
				$(this).change(APchange);
			
			});
    });
