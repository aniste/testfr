function wrapwithhyphen() {
	$("div").css("word-wrap", "break-word");
	$("div").css("padding-top", "5px");
	$("div").each(function () {
	var text = $(this).text();
	$(this).html("<span id='wordCheck' style='display:none;'></span>");
	var currentDiv = $(this);
	var altstring = "";
	var textchar = "";
	var wordtext = text.split(" ");
	$.each(wordtext, function (m, element) {
		if (element != "") {
			$("#wordCheck").html(element);
			if (parseInt($("#wordCheck").width()) + 4 > parseInt($(currentDiv).width())) {
				textchar = element.split("");
				$.each(textchar, function (n, elem) {
					if (elem != textchar.length - 1) {
						if (n != 0) {
							altstring += elem + "&shy;";
						}
						else {
							altstring += elem;
						}
					}
				});
			altstring += " ";
			}
			else {
				altstring += element + " ";
			}
		}
	});
	$(this).html(altstring);
	});
$("div.wordwrap").css("padding-top", "0px");
}