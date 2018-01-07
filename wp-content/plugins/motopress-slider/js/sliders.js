jQuery(function(b){var f=b(".mpsl-sliders-table"),c=b("#mpsl-import-export-wrapper"),k=c.find(".mpsl-export-table"),e=b(".mpsl-slider-preview"),g=e.find("iframe"),l=e.find(".mpsl-preloader"),d=MPSL.Vars.menu_url,m=null,p=e.find(".mpsl-resolution-buttons-wrapper"),n=e.find(".desktop"),d=MPSL.Functions.addParamToUrl(d,"view","preview"),d=MPSL.Functions.addParamToUrl(d,"type","sliders");e.dialog({resizable:!1,draggable:!1,autoOpen:!1,modal:!0,width:b(window).width()-100,height:b(window).height()-100,
title:MPSL.Vars.lang.preview_dialog_title,closeText:"",dialogClass:"mpsl-preview-dialog",close:function(){(g[0].contentDocument||g[0].contentWindow.document).documentElement.innerHTML=""},open:function(){l.show();d=MPSL.Functions.removeParamFromUrl(d,"slider_id");d=MPSL.Functions.addParamToUrl(d,"slider_id",m);g.attr("src",d);g.width("100%");n.siblings().removeClass("active");n.addClass("active")},create:function(){p.removeClass("hidden")}});[{type:"desktop",resolution:"100%"},{type:"tablet",resolution:"768px"},
{type:"mobile",resolution:"480px"}].forEach(function(a){e.on("click","."+a.type,function(){g.width(a.resolution);b(this).siblings().removeClass("active");b(this).addClass("active")})});g.on("load",function(){l.hide()});f.on("click",".mpsl-delete-slider-btn",function(a){a.preventDefault();var c=b(this),h=b(this).attr("data-mpsl-slider-id");if(0==confirm(MPSL.Vars.lang.slider_want_delete_single.replace("%d",h)))return!0;c.attr("disabled","disabled");b.ajax({type:"POST",url:MPSL.Vars.ajax_url,data:{action:"mpsl_delete_slider",
nonce:MPSL.Vars.nonces.delete_slider,id:h},success:function(a){c.removeAttr("disabled");a.result&&!0===a.result?(c.closest("tr").remove(),f.find("tbody>tr").length||f.hide(),window.location.reload(!0),MPSL.Functions.showMessage(MPSL.Vars.lang.slider_deleted_id.replace("%d",h),MPSL.Functions.MSG_SUCCESS_TYPE)):MPSL.Functions.showMessage(a.error,MPSL.Functions.MSG_ERROR_TYPE)},error:function(a){console.error(a)},dataType:"JSON"})});f.on("click",".mpsl-duplicate-slider-btn",function(a){a.preventDefault();
var c=b(this);c.attr("disabled","disabled");a=b(this).attr("data-mpsl-slider-id");b.ajax({type:"POST",url:MPSL.Vars.ajax_url,data:{action:"mpsl_duplicate_slider",nonce:MPSL.Vars.nonces.duplicate_slider,id:a},success:function(a){c.removeAttr("disabled");a.hasOwnProperty("result")&&!0===a.result?(f.append(a.html),MPSL.Functions.showMessage(MPSL.Vars.lang.slider_duplicated,MPSL.Functions.MSG_SUCCESS_TYPE),window.location.reload(!0)):MPSL.Functions.showMessage(a.error,MPSL.Functions.MSG_ERROR_TYPE)},
error:function(a){console.error(a)},dataType:"JSON"})});f.on("click",".mpsl-preview-slider-btn",function(a){a.preventDefault();m=b(a.target).attr("data-mpsl-slider-id");e.dialog("open")});var q=c.find("#mpsl-import-form"),r=c.find("#mpsl-export-form");c.dialog({resizable:!1,draggable:!1,autoOpen:!1,modal:!0,width:800,height:b(window).height()-85,title:MPSL.Vars.lang.import_export_dialog_title,closeText:"",dialogClass:"mpsl-import-export-dialog",close:function(a,b){},open:function(){q[0].reset();r[0].reset()}});
b(".ui-widget-overlay").on("click",function(){c.dialog("isOpen")&&c.dialog("close")});b("#import-export-btn").on("click",function(){c.dialog("open")});c.on("click",".export-check-all",function(a){a=b(a.target).prop("checked");k.find(".mpsl-export-id-checkbox").prop("checked",a)});c.on("click","#mpsl-export-btn",function(a){k.find(".mpsl-export-id-checkbox:checked").length||(a.preventDefault(),a.stopPropagation(),MPSL.Functions.showMessage(MPSL.Vars.lang.no_sliders_selected_to_export,MPSL.Functions.MSG_ERROR_TYPE))});
c.on("change","input[name=mpsl_http_auth]",function(a){var d=c.find("input[name=mpsl_http_auth_login], input[name=mpsl_http_auth_password]"),e=c.find(".need-mpsl_http_auth");b(a.target).is(":checked")?(d.removeAttr("disabled").attr("required","required"),e.show()):(d.removeAttr("required").attr("disabled","disabled"),e.hide())})});
