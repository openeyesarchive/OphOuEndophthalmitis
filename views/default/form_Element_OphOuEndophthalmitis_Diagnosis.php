<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>




<div class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<h4 class="elementTypeName"><?php echo $element->elementType->name; ?></h4>

	<?php echo $form->dropDownList($element, 'clinical_id', CHtml::listData(Element_OphOuEndophthalmitis_Diagnosis_Clinical::model()->notDeletedOrPk($element->clinical_id)->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
	
	<div id="mdAlert" class="eventDetail" style="display:none">
		<div class="label"></div>
		<div class="data" style="color:rgb(200, 34, 34);">NB: The Medical Director must be informed about all infectious cases</div>
	</div>
	
	<?php echo $form->dropDownList($element, 'culture_id', CHtml::listData(Element_OphOuEndophthalmitis_Diagnosis_Culture::model()->notDeletedOrPk($element->culture_id)->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
	<?php echo $form->textField($element, 'growth', array('size' => '50','maxlength' => '50'))?>
</div>

<script type="text/javascript">

	// Add event handler to first select
	$("#Element_OphOuEndophthalmitis_Diagnosis_clinical_id").change(function() {showOrHideAlert('mdAlert');});
	
	// Shows div if infection but not otherwise
	function showOrHideAlert(_divId)
	{
		var sel = document.getElementById("Element_OphOuEndophthalmitis_Diagnosis_clinical_id");
		if (sel.value == 3)
		{
			$("#" + _divId).slideDown(200);
		}
		else
		{
			$("#" + _divId).slideUp(200);
		}
	}
	
	// Add event handler to second select
	$("#Element_OphOuEndophthalmitis_Diagnosis_culture_id").change(function() {showOrHideGrowth('div_Element_OphOuEndophthalmitis_Diagnosis_growth');});
	
	// Hide growth div
	$("#div_Element_OphOuEndophthalmitis_Diagnosis_growth").hide();
	
	// Shows div if infection but not otherwise
	function showOrHideGrowth(_divId)
	{
		var sel = document.getElementById("Element_OphOuEndophthalmitis_Diagnosis_culture_id");
		if (sel.value == 3)
		{
			$("#" + _divId).slideDown(200);
		}
		else
		{
			$("#" + _divId).slideUp(200);
		}
	}
	
</script>
