
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["inicio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fim" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cor_fundo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cor_fonte" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["inicio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inicio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fim" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fim" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cor_fundo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cor_fundo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cor_fonte" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cor_fonte" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_inicio' + iSeqRow).bind('blur', function() { sc_form_configuracao_cores_inicio_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_configuracao_cores_inicio_onfocus(this, iSeqRow) });
  $('#id_sc_field_fim' + iSeqRow).bind('blur', function() { sc_form_configuracao_cores_fim_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_configuracao_cores_fim_onfocus(this, iSeqRow) });
  $('#id_sc_field_cor_fundo' + iSeqRow).bind('blur', function() { sc_form_configuracao_cores_cor_fundo_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_configuracao_cores_cor_fundo_onfocus(this, iSeqRow) });
  $('#id_sc_field_cor_fonte' + iSeqRow).bind('blur', function() { sc_form_configuracao_cores_cor_fonte_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_configuracao_cores_cor_fonte_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_configuracao_cores_inicio_onblur(oThis, iSeqRow) {
  do_ajax_form_configuracao_cores_validate_inicio();
  scCssBlur(oThis);
}

function sc_form_configuracao_cores_inicio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuracao_cores_fim_onblur(oThis, iSeqRow) {
  do_ajax_form_configuracao_cores_validate_fim();
  scCssBlur(oThis);
}

function sc_form_configuracao_cores_fim_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuracao_cores_cor_fundo_onblur(oThis, iSeqRow) {
  do_ajax_form_configuracao_cores_validate_cor_fundo();
  scCssBlur(oThis);
}

function sc_form_configuracao_cores_cor_fundo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuracao_cores_cor_fonte_onblur(oThis, iSeqRow) {
  do_ajax_form_configuracao_cores_validate_cor_fonte();
  scCssBlur(oThis);
}

function sc_form_configuracao_cores_cor_fonte_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("inicio", "", status);
	displayChange_field("fim", "", status);
	displayChange_field("cor_fundo", "", status);
	displayChange_field("cor_fonte", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_inicio(row, status);
	displayChange_field_fim(row, status);
	displayChange_field_cor_fundo(row, status);
	displayChange_field_cor_fonte(row, status);
}

function displayChange_field(field, row, status) {
	if ("inicio" == field) {
		displayChange_field_inicio(row, status);
	}
	if ("fim" == field) {
		displayChange_field_fim(row, status);
	}
	if ("cor_fundo" == field) {
		displayChange_field_cor_fundo(row, status);
	}
	if ("cor_fonte" == field) {
		displayChange_field_cor_fonte(row, status);
	}
}

function displayChange_field_inicio(row, status) {
}

function displayChange_field_fim(row, status) {
}

function displayChange_field_cor_fundo(row, status) {
}

function displayChange_field_cor_fonte(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_configuracao_cores_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(31);
		}
	}
}
function scJQColorPickerAdd(iSeqRow) {
  $("#cor_fundo" + iSeqRow + "_cor").ColorPicker({
    onShow: function(colpkr) {
      $(colpkr).fadeIn(500);
      return false;
    },
    onHide: function(colpkr) {
      $(colpkr).fadeOut(500);
      return false;
    },
    onChange: function(hsb, hex, rgb) {
      $("#id_sc_field_cor_fundo" + iSeqRow).val("#" + hex);
    },
    onSubmit: function(hsb, hex, rgb, el) {
      $("#id_sc_field_cor_fundo" + iSeqRow).val("#" + hex);
      $(el).ColorPickerHide();
    },
    onBeforeShow: function() {
      var origVal = $("#id_sc_field_cor_fundo" + iSeqRow).val();
      if ("#" == origVal.substr(0, 1)) {
        origVal = origVal.substr(1);
      }
      $(this).ColorPickerSetColor(origVal);
    }
  });
  $("#cor_fonte" + iSeqRow + "_cor").ColorPicker({
    onShow: function(colpkr) {
      $(colpkr).fadeIn(500);
      return false;
    },
    onHide: function(colpkr) {
      $(colpkr).fadeOut(500);
      return false;
    },
    onChange: function(hsb, hex, rgb) {
      $("#id_sc_field_cor_fonte" + iSeqRow).val("#" + hex);
    },
    onSubmit: function(hsb, hex, rgb, el) {
      $("#id_sc_field_cor_fonte" + iSeqRow).val("#" + hex);
      $(el).ColorPickerHide();
    },
    onBeforeShow: function() {
      var origVal = $("#id_sc_field_cor_fonte" + iSeqRow).val();
      if ("#" == origVal.substr(0, 1)) {
        origVal = origVal.substr(1);
      }
      $(this).ColorPickerSetColor(origVal);
    }
  });
} // scJQColorPickerAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQColorPickerAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

