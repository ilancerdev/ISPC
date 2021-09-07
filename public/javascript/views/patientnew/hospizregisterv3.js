/*------ ISPC-1994--------------------*/
$(document).ready(function(){
	$('#save_form').bind('click', function(e) {
		e.preventDefault();
		//check required textarea filled if renew is checked
		
		$('#frmuser').submit();
		setTimeout(function () {$('#save_form').attr('disabled', true);}, 150);
		setTimeout(function () {$('#save_form').attr('disabled', false);}, 22000);
	});
	
	
	$('.medication_info').live('click', function() {
		
		var dlist = '<div class="loadingdiv" align="center" style="width: 100%;float: left;"><img src="'+res_path +'/images/pageloading.gif"><br />	Loading... please wait</div>';
		$('.medication_content').html(dlist );
		
		
			var url = appbase + 'patientnew/medicationinfo?modal=1&id=' + idpd;     //TODO-2643 Lore 12.11.2019
			xhr = $.ajax({
				url : url,
				success : function(response) {
					$('.medication_content').html(response);
				}
			});
		
		$('#medication-modal')
		.dialog('open');
	});

	
	$("#medication-modal").dialog({
		autoOpen: false,
		resizable: false,
		height: 500,
		scroll: true,
		width: 1000,
		modal: true,
 
		buttons: {
 
			"Abbrechen": function() {
				$('#medication-modal').dialog('close');

			}
		}
	});
	
	$('.insert_texts').live('click', function() {
		
		$('.content').html("");
		 
		 var field_name  = $(this).data('id');
		 var form_name  = $(this).data('form_name');
		 
		 if(field_name){
//			 var url = appbase + 'ajax/registertexts?field_name=' + field_value;
			var url = appbase + 'ajax/formstexts';
			xhr = $.ajax({
				url : url,
				data : {
					field_name : field_name,
					form_name : form_name
				},
				success : function(response) {
					$('.content').html(response);
				}
			});
		 }
		 
		$('#option-modal')
		.data('options',field_name)
		.dialog('open');
	});
	
	$("#option-modal").dialog({
		autoOpen: false,
		resizable: false,
		height: 500,
		scroll: true,
		width: 1000,
//		draggable : false,
		modal: true,
		buttons: [{
			text: translate('cancel'),
			click: function() {
				$(this).dialog("close");
			}
		},
		{
			text: translate('save'),
			click: function() {
				var field_value  = $(this).data('options');
				var new_txt  = "";
				$('.vals_'+field_value+':checked').each(function(index) {
					new_txt +=$(this).val();
					new_txt  += ', ';
					$(this).attr('checked', false);
				});

				var $txt = $('.'+field_value+'');
				var cur_txt = $txt.val();
				var txt  = cur_txt + new_txt ;

				$txt.val(txt);
				$(this).dialog("close");
			}
		}]
	});
	
}); /* $(document).ready END  */