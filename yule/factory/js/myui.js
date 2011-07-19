/**
 * 
 */
// var make_place_locus=new Array();//创建位置的轨迹 里面存放id 和内容
// var make_div_locus=new Array();//创建元素的轨迹
// var make_place_locus = new Map();// 创建位置的轨迹 里面存放id 和内容
// var make_div_locus = new Map();// 创建元素的轨迹
var settings = "";
var framesettings = "";
var target;
$(function() {
	makeFrame();
	makeDiv();// 打开创建元素窗体
	// 这个是选项卡的js
	target = jQuery('div#ixedit-makeDIV-tabs');
	target.tabs({
		event : 'click',
		selected : 0
	});
	// 开始移动吧
	$.get("ajax.php", {
		action : "widget-setting"
	}, function(data) {
		settings = data;
		// 下面这两个 似乎不兼容widget-place-header
		startMoveFrame();
		startMove();
		editDiv();
	});
	// 给那些东东添加一个编辑
	$(".widget").bind('mouseover', function() {
		// alert("惹我干嘛");
	});
	// 加载模块的数据
	getModules();
	getModuleTemplates();
	// 保存页面设置
	saveSettings();
	// 初始化加载广告位
	getAdPlace();
	//初始化网站的模板
	getTemplates();
	//加载其他功能
	getOtherFunc();
});
//div-other-func
function getOtherFunc(){
	$("#div-other-func").dialog({
		autoOpen : false,
		width : 430,
		buttons : {
			"保存" : function() {
//				getHTML();
			},
			"取消" : function() {
				$(this).dialog("close");
			}
		}
	});
}
/**
 * 加载广告类型和广告位
 * 
 * @param tid
 *            类型编号
 */
function getAdPlace(tid) {
	$.get("ajax.php", {
		action : "get-ad",
		typeid : tid
	}, function(data) {
		if (tid) {
			$("#ad_place").html(data);
		} else {
			$("#ad_type").html(data);
		}
	});
}
/**
 * 自动生成div的id
 * 
 * @param id
 *            div编号
 * @param pre
 *            id前缀
 */
function makeId(id, pre) {
	var myDate = new Date();
	$("#" + id).val(pre + "_" + myDate.getTime());
}
/**
 * 保存页面设置
 */
function saveSettings() {
	$("#save-settings").dialog({
		autoOpen : false,
		width : 430,
		buttons : {
			"保存" : function() {
				getHTML();
			},
			"取消" : function() {
				$(this).dialog("close");
			}
		}
	});
}
function makeFrame() {
	makeId("frame_id", "frame");
	$('#makeFrame')
			.dialog(
					{
						autoOpen : false,
						width : 530,
						buttons : {
							"创建" : function() {
								// 在这里创建框架
								// 创建完之后，让所有的模块都动起来吧
								var frame_parent_id = $("#frame_parent_id")
										.val();// 父级元素
								var frame_place = "";// 插入位置 after before
								// append
								var frame_layout = "";// 插入布局 1-8
								// myDate = new Date();
								var frame_id = $("#frame_id").val();// 插入框架的id,大框架的编号
								// 如果布局为1:2 则会产生3个id---------这个是里面元素的id
								var frame_class = $("#frame_class").val();// 插入框架的class
								var frame_place_class = $("#frame_place_class")
										.val();// 插入位置的class
								var frame_func_class = "";
								$(".frame_func")
										.each(
												function() {
													if ($(this).attr("checked")
															&& $(this).attr(
																	"name") == "frame_func") {
														frame_func_class += " "
																+ $(this).val();
													}
												});
								frame_class += frame_func_class;
								$(":radio")
										.each(
												function() {
													if ($(this).attr("checked")
															&& $(this).attr(
																	"name") == "frame-place") {
														frame_place = $(this)
																.val();
													}
												});
								frame_layout = $(".frame-layout-checked").attr(
										"value");
								if (frame_parent_id == "") {
									jAlert("请选择父级元素");//
									// $("#frame_parent_id").focus();
									return;
								}
								var frame_code = "";
								// 首先创建一个大div
								frame_code = "<div class='" + frame_class
										+ "' id='" + frame_id + "'>";
								// 再给位置弄一个可以拖动的头,这里就是那个标题
								// alert($("#frame_title").attr('disabled'));
								var frame_title = $("#frame_title");
								if (!frame_title.attr('disabled')) {
									frame_code += "<div class='widget-frame-header'>"
											+ $("#frame_title").val()
											+ "</div>";
								}
								if (frame_layout == 1) {
									myDate = new Date();
									frame_code += "<div class='"
											+ frame_place_class + " layout_"
											+ frame_layout + "' id='place_"
											+ myDate.getTime() + "'" + ">";
									frame_code += "</div>";
								} else if (frame_layout == 2
										|| frame_layout == 3
										|| frame_layout == 4
										|| frame_layout == 6
										|| frame_layout == 7) {
									for ( var i = 1; i <= 2; i++) {
										myDate = new Date();
										frame_code += "<div class='"
												+ frame_place_class
												+ " layout_" + frame_layout
												+ "_" + i + "' id='place_"
												+ myDate.getTime() + i + "'"
												+ ">";
										// 再给位置弄一个可以拖动的头
										// frame_code+="<div
										// class='widget-place-header'>位置"+myDate.getTime()+i+"</div>";
										frame_code += "</div>";
									}
								} else if (frame_layout == 5) {
									for ( var i = 1; i <= 3; i++) {
										myDate = new Date();
										frame_code += "<div class='"
												+ frame_place_class
												+ " layout_" + frame_layout
												+ "_" + i + "' id='place_"
												+ myDate.getTime() + i + "'"
												+ ">";
										// 再给位置弄一个可以拖动的头
										// frame_code+="<div
										// class='widget-place-header'>位置"+myDate.getTime()+i+"</div>";
										frame_code += "</div>";
									}
								} else {
									// 这里是创建tab的，想想看，该啷个搞
								}

								frame_code += "<div class='clear'></div>";
								frame_code += "</div>";
								// 这里可以保存轨迹啦~~~~没有用啦，已经可以保存页面内容
								// make_place_locus.put(frame_id, frame_code);
								// alert(make_place_locus);
								// 判定选择的父级元素是否为最大的那个ui-sortable main
								if (frame_place == "after") {
									$(frame_parent_id).after(frame_code);
								} else if (frame_place == "before") {
									$(frame_parent_id).before(frame_code);
								} else if (frame_place == "append") {
									$(frame_parent_id).append(frame_code);
								}
								// 让那个id更新一下
								makeId("frame_id", "frame");
								// 大家动起来吧
								// 框架先动哈
								startMoveFrame();
								// place再动
								startMove();
							},
							"取消" : function() {
								$(this).dialog("close");
							}
						}
					});
	// 给frame-layout 绑定一个事件
	$(".frame-layout").bind('click', function(event) {
		$(".frame-layout").removeClass("frame-layout-checked");
		$(this).toggleClass("frame-layout-checked");
		// 改变一下那个标题
		$("#frame_title").val($(this).attr("title") + "框架");
	});
	// 给div_layout绑定一个事件
	$(".div_layout li").bind('click', function(event) {
		$(".div_layout li").removeClass("div-layout-checked");
		$(this).toggleClass("div-layout-checked");
		// 然后跳转选项卡，设置具体的信息
		target.tabs('select', 3);
		// 设置哪些显示，哪些隐藏
		$(".options-setting").hide();
		$(".s-" + $(this).attr("value")).show();
	});
}
function makeDiv() {
	makeId("div_id", "place");
	var div_more = false;
	$('#ixedit-makeDIV-main').dialog(
			{
				autoOpen : false,
				width : 530,
				buttons : {
					"创建" : function() {
						var div_module_id = $("#div_module_id").val();
						var div_layout = $(".div_layout .div-layout-checked")
								.attr("value");// 得到div数据布局
						div_more = $("#div_more").attr("checked");
						if (div_module_id > 0 || div_layout == 4) {
							// 得到模块布局
							if (div_layout == 4) {// 广告模块
								div_more = false;
								var ad_place_val = $("#ad_place_val").val();
								if (ad_place_val && ad_place_val > 0) {
									makeDiv_func(7788, "广告模块", div_layout,
											div_more);
								} else {
									jAlert("请选择广告位");
								}
								// alert(ad_place_val);
							} else {
								makeDiv_func(div_module_id, $("#div_title")
										.val(), div_layout, div_more);
							}
						} else {
							jAlert("模块编号未找到");
						}
					},
					"一键生成" : function() {
						// 读取所有的分类
						var div_module_length = $("#div_module_id").length;
						div_more = $("#div_more").attr("checked");
						if (div_module_length > 0) {
							var div_layout = $(
									".div_layout .div-layout-checked").attr(
									"value");
							if (div_layout >= 4) {
								jAlert("该模块不允许这样操作");
								return;
							}
							// 循环在第一个place创建模块，配置一样
							var someFalse = true;
							$("#div_module_id option").each(
									function() {
										if (someFalse) {
											var div_module_id = $(this).val();
											if (div_module_id > 0) {
												someFalse = makeDiv_func(
														$(this).val(), $(this)
																.text(),
														div_layout, div_more);
											}
										}
									});
						} else {
							jAlert("模块编号未找到");
						}
					},
					"取消" : function() {
						$(this).dialog("close");
					}
				}
			});
}
/**
 * 初始化编辑框
 */
function editDiv() {
	$('#ixedit-editDIV-main').dialog({
		autoOpen : false,
		width : 530,
		buttons : {
			"保存" : function() {
				jAlert("保存");
			},
			"取消" : function() {
				$(this).dialog("close");
			}
		},
		beforeclose : function(event, ui) {
			// jAlert("准备关闭啦");
			// return false;
		}
	});
}
function readLocus() {
}
function startMoveFrame() {
	$.fn.EasyWidgets({
		selectors : {
			container : 'div',
			widget : '.widget-frame',
			places : '.main',
			header : '.widget-frame-header',
			widgetMenu : '.widget-frame-menu',
			editbox : '.widget-frame-editbox',// #ixedit-editDIV-main
			content : '.widget-frame-content',
			closeEdit : '.widget-frame-close-editbox',
			editLink : '.widget-frame-editlink',
			closeLink : '.widget-frame-closelink',
			placeHolder : 'widget-frame-placeholder',// 当拖动的时候，预留的区域
			collapseLink : '.widget-frame-collapselink'
		},
		options : {
			movable : 'movable',
			editable : 'editable',
			collapse : 'collapse',
			removable : 'removable',
			collapsable : 'collapsable',
			closeConfirm : 'closeconfirm'
		},
		i18n : {
			editText : '编辑',
			closeText : '关闭',
			extendText : '扩展',
			collapseText : '关闭',
			cancelEditText : '取消',
			editTitle : '编辑',
			closeTitle : '关闭',
			confirmMsg : '是否删除?',
			cancelEditTitle : '取消编辑',
			extendTitle : '扩展',
			collapseTitle : '关闭',
			closeEdit : "关闭编辑"
		},
		callbacks : {
			onChangePositions : function(str) {
				framesettings = str;
				$("#easywidgets_id").html(framesettings);
			},
			onRefreshPositions : function() {
				return framesettings;
			}
		}
	});
}
function startMove() {
	$.fn.EasyWidgets({
		selectors : {
			container : 'div',
			widget : '.widget',
			places : '.widget-place',
			header : '.widget-header',
			widgetMenu : '.widget-menu',
			editbox : '.widget-editbox',
			content : '.widget-content',
			closeEdit : '.widget-close-editbox',
			editLink : '.widget-editlink',
			closeLink : '.widget-closelink',
			placeHolder : 'widget-placeholder',
			collapseLink : '.widget-collapselink'
		},
		effects : {
			effectDuration : 100,
			widgetShow : 'fade',
			widgetHide : 'slide',
			widgetClose : 'slide',
			widgetExtend : 'slide',
			widgetCollapse : 'slide',
			widgetOpenEdit : 'slide',
			widgetCloseEdit : 'slide',
			widgetCancelEdit : 'slide'
		},
		i18n : {
			editText : '编辑',
			closeText : '关闭',
			extendText : '扩展',
			collapseText : '关闭',
			cancelEditText : '取消',
			editTitle : '编辑',
			closeTitle : '关闭',
			confirmMsg : '是否删除?',
			cancelEditTitle : '取消编辑',
			extendTitle : '扩展',
			collapseTitle : '关闭',
			closeEdit : "关闭编辑"
		},
		options : {
			movable : 'movable',
			editable : 'editable',
			collapse : 'collapse',
			removable : 'removable',
			collapsable : 'collapsable',
			closeConfirm : 'closeconfirm'
		},
		callbacks : {
			onChangePositions : function(str) {
				settings = str;
			},
			onRefreshPositions : function() {
				return settings;
			},
			onEdit : function(link, widget) {
				// var widget_id = $(link).attr("id");
				// $('#ixedit-editDIV-main').dialog('open');
				// jAlert(widget.attr("id"));//这样就可以获取到这个东东的id
			},
			onCancelEdit : function() {
				// $('#ixedit-editDIV-main').dialog('close');
			},
			onEditQuery : function(link, widget) {
				// link.attr('isEdit', 'true');
				return true;
			},
			onCancelEditQuery : function(link, widget) {
				// $(".widget-editlink").removeAttr('isEdit');
				return true;
			},
			onClose : function(link, widget) {
				// jAlert(widget.html());
			}
		// ,
		// onCloseQuery : function(link, widget) {
		//				
		// jAlert("想关闭吗？"+link.parents().html());
		// }
		}

	});
}
function makeDiv_func(div_module_id, div_title, div_layout, div_more) {
	// 判定父级是不是place，如果是，则创建一下内容，如果不是，则提示创建place
	var parent_id = $("#div_parent_id").val();
	var isPass = false;
	if (parent_id == "") {
		// 寻找第一个place
		// $(".widget-place");
		if ($(".widget-place").attr("id")) {// 这个是得到最后一个place的id
			// jAlert($(".widget-place").attr("id"));
			$(".widget-place").each(function() {
				var p_id = $(this).attr("id");
				if (p_id.indexOf("place_") != -1) {
					parent_id = p_id;
					$("#div_parent_id").val("div#" + p_id);
					isPass = true;
				}
			});
		} else {
			jAlert("请选择正确的创建区域");
		}
		if (!isPass) {
			return false;
		}
		// jAlert("找到了，也逃不过我的法眼 ,哈哈......");
	}
	if ($(parent_id).attr("class").indexOf("widget-place") == -1) {
		jAlert("请选择正确的创建区域");
		return false;
	}
	// var div_layout = $(".div_layout .div-layout-checked").attr("value");//
	// 得到div数据布局
	var widget_class = $("#div_class").val();// 元素的class
	var div_func_class = "";
	$(".div_func").each(function() {
		if ($(this).attr("checked") && $(this).attr("name") == "div_func") {
			div_func_class += " " + $(this).val();
		}
	});
	widget_class += div_func_class;
	var widget_id = $("#div_id").val();// 元素的id

	var widget_div = "<div class='" + widget_class + "' id='" + widget_id
			+ "'>";
	var widget_title = "<div class='" + $("#div_title_class").val() + "'>";
	widget_title += "<div><a href='{$MODULE[" + div_module_id
			+ "][linkurl]}'><strong>" + div_title + "</strong></a>";
	if (div_more) {
		widget_title += "<span class='f_r more'><a href='{$MODULE["
				+ div_module_id + "][linkurl]}'>更多&gt;&gt;</a></span>";
	}
	widget_title += "</div>";
	widget_title += "</div>";
	widget_div += widget_title;

	var widget_content = "<div class='" + $("#div_content_class").val() + "'>";
	var div_module_cat_id = $("#div_module_cat_id").val();
	var div_module_rule = $("#div_module_rule").val();
	var div_content_level = $("#div_content_level").val();
	var div_content_rows = $("#div_content_rows").val();
	var div_module_sort = $("#div_module_sort").val();
	var module_template = $("#module_template").val();
	var img_width = $("#img_width").val();
	var img_height = $("#img_height").val();
	var content = "";
	// 创建数据
	if (div_layout == 1) {
		content = makeTag(div_module_id, div_module_cat_id, div_module_rule,
				div_content_level, div_content_rows, div_module_sort,
				module_template, 0, 0);
	} else if (div_layout == 2) {
		// 这个是上面的那个
		content = makeTag(div_module_id, div_module_cat_id,
				"status=3 and thumb<>''", div_content_level, div_content_rows,
				div_module_sort, "list-one-list", img_width, img_height);
		content += "<div class='clear'></div>";
		content += "<div class='li_s9'>";
		// 下面的列表
		content += makeTag(div_module_id, div_module_cat_id, div_module_rule,
				div_content_level, div_content_rows, div_module_sort,
				module_template, 0, 0);
		content += "</div>";
	} else if (div_layout == 3) {
		content += makeTag(div_module_id, div_module_cat_id, div_module_rule,
				div_content_level, div_content_rows, div_module_sort,
				module_template, 0, 0);
	} else if (div_layout == 4) {// 创建广告
		widget_content="<div>";
		content = "{ad(" + $("#ad_place_val").val() + ")}";
	} else {

	}
	widget_content += content;
	widget_content += "</div>";

	widget_div += widget_content;
	widget_div += "</div>";
	// if (div_layout == 4) {// 创建广告
	// widget_div = "{ad(" + $("#ad_place_val").val() + ")}";
	// }
	// jAlert(widget_div);
	$(parent_id).append(widget_div);
	// 重新让他们动起来
	startMove();
	// 重新生成一个place的id
	makeId("div_id", "place");
	// 这个是保存轨迹的,不过没有用啦，我已经可以直接保存页面内容
	// make_div_locus.put(widget_id, widget_div);
	return true;
}
/**
 * destoon 调用数据标签
 * 
 * @param div_module_id
 *            模块编号
 * @param div_module_cat_id
 *            分类编号
 * @param div_module_rule
 *            规则
 * @param div_content_level
 *            显示等级
 * @param div_content_rows
 *            显示条数
 * @param div_module_sort
 *            排序方式
 * @param module_template
 *            选择的模板
 * @returns {构造好的数据调用标签}
 */
function makeTag(div_module_id, div_module_cat_id, div_module_rule,
		div_content_level, div_content_rows, div_module_sort, module_template,
		img_width, img_height) {
	var content = "<!--{tag(\"";
	content += "moduleid=" + div_module_id;
	if (div_module_cat_id > 0) {
		content += "&catid=" + div_module_cat_id;
	}
	content += "&condition=";
	if (div_module_rule != "") {
		content += " " + div_module_rule;
	}
	if (div_content_level > 0) {
		content += " and level>=" + div_content_level;
	}
	content += "&pagesize=" + div_content_rows;
	content += "&order=" + div_module_sort;
	if (img_width > 0) {
		content += "&width=" + img_width;
	}
	if (img_height > 0) {
		content += "&height=" + img_height;
	}
	if (module_template != "") {
		content += "&template=" + module_template;
	}
	content += "\")}-->";
	return content;
}
function check_find_frame(ele) {
	var frame_parent_id = $(ele).val();
	// jAlert(frame_parent_id.indexOf("main"));
	var showRadio = new Array();
	if (frame_parent_id.indexOf("main") != -1) {
		// 选择的是main
		showRadio = new Array("append");
		// showRadio[0]="append";
	} else if (frame_parent_id.indexOf("#frame") != -1) {
		// 选择的是widget-frame
		showRadio = new Array("after", "before");
		// showRadio[0]="after";
		// showRadio[1]="before";
	} else {
		jAlert("选择出错啦");
		$(ele).val("");
	}
	// jAlert(showRadio);
	$(":radio").each(function() {
		if ($(this).attr("name") == "frame-place") {
			var isOk = false;
			for ( var i = 0; i < showRadio.length; i++) {
				if ($(this).val() == showRadio[i]) {
					isOk = true;
				}
			}
			// jAlert(isOk);
			if (isOk) {
				$(this).attr("disabled", "");
				$(this).attr("checked", "checked");
			} else {
				$(this).attr("disabled", "disabled");

			}
		}
	});
	// jAlert($(ele).val());
}
function saveWidget() {
	$.get("ajax.php", {
		action : "widget-setting",
		tuotuo : "1",
		settings : settings
	}, function(data) {
		jAlert(data);
	});
}
/**
 * 保存main中的代码
 */
function getHTML() {
	var html_vals = $(".main").html();
	// 读取保存配置
	var frame_title_check = $("#frame_title_check").attr("checked");
	var is_ad_check = $("#is_ad_check").attr("checked");
	$.post("ajax.php", {
		action : "widget-save",
		h_val : html_vals,
		f_che : frame_title_check,
		a_che : is_ad_check
	}, function(data) {
		jAlert(data);
	});
}
function getModules() {
	$.get("ajax.php", {
		action : "ixedit-module"
	}, function(data) {
		var options_list = data.split(",");
		document.getElementById("div_module_id").options.length = 1;
		for ( var i = 0; i < options_list.length; i++) {
			if (options_list[i]) {
				var op = options_list[i].split("-");
				var options = document.createElement("option");
				options.value = op[0];
				options.text = op[1];
				$("#div_module_id").append(options);
			}
		}
	});
}
function getCats(ele) {
	document.getElementById("div_module_cat_id").options.length = 1;
	if (ele.value > 0) {
		$.get("ajax.php", {
			action : "ixedit-module-catlist",
			moduleid : ele.value
		}, function(data) {
			var options_list = data.split(",");
			for ( var i = 0; i < options_list.length; i++) {
				if (options_list[i]) {
					var op = options_list[i].split("-");
					var options = document.createElement("option");
					options.value = op[0];
					options.text = op[1];
					$("#div_module_cat_id").append(options);
				}
			}
		});
		$("#div_title").val(ele.options[ele.selectedIndex].text);// 修改标题为模块的名字
	}
	// div_title [object HTMLSelectElement]
}
function getModuleTemplates() {
	$.get("ajax.php", {
		action : "ixedit-templates"
	}, function(data) {
		$("#module_template").remove();
		$("#templates_span").after(data);
		
	});
}
function getTemplates() {
	$.get("ajax.php", {
		action : "get-template"
	}, function(data) {
//		jAlert(data);
		$("#web_template_addr").html(data);
	});
}
function myGetValue(id, value) {
	$("#" + id).html(value);
}