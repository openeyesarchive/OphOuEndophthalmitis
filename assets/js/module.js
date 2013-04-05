
/* Module-specific javascript can be placed here */

$(document).ready(function() {
	$('#et_save').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();

			
			return true;
		}
		return false;
	});

	$('#et_cancel').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();

			if (m = window.location.href.match(/\/update\/[0-9]+/)) {
				window.location.href = window.location.href.replace('/update/','/view/');
			} else {
				window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
			}
		}
		return false;
	});

	$('#et_deleteevent').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();
			return true;
		}
		return false;
	});

	$('#et_canceldelete').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();

			if (m = window.location.href.match(/\/delete\/[0-9]+/)) {
				window.location.href = window.location.href.replace('/delete/','/view/');
			} else {
				window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
			}
		} 
		return false;
	});

	$('select.populate_textarea').unbind('change').change(function() {
		if ($(this).val() != '') {
			var cLass = $(this).parent().parent().parent().attr('class').match(/Element.*/);
			var el = $('#'+cLass+'_'+$(this).attr('id'));
			var currentText = el.text();
			var newText = $(this).children('option:selected').text();

			if (currentText.length == 0) {
				el.text(ucfirst(newText));
			} else {
				el.text(currentText+', '+newText);
			}
		}
	});
	
	// Edit mode
	var sel = document.getElementById("Element_OphOuEndophthalmitis_Diagnosis_clinical_id");
	if (sel != null)
	{
		// Get reference to Outcome div
		var divId = "outcomeId";
		
		// If this value is 3, it means we are editing a saved event, and the saved value was 'infection'
		if (sel.value == 3)
		{
			$("#" + divId).show();
		}
		else
		{
			console.log('hiding');
			$("#" + divId).hide();
		}
	}

	// View mode
	var span = document.getElementById("vaspan");
	if (span != null)
	{
		// Get reference to Outcome div
		var divId = "outcomeId";
		
		// Horrible hack to make demo work in time available (assumes outcome will not be that good...)
		if (span.innerHTML != '6/5')
		{
			$("#" + divId).show();
		}
		else
		{
			$("#" + divId).hide();
		}
	}
});

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}

function showAlertBanner()
{
	alert('Hello!');
}
