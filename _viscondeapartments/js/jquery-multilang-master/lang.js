var langs = ['en', 'it', 'pt'];
var langCode = '';
var langJS = null;


var translate = function (jsdata)
{	
	$("[tkey]").each (function (index)
	{
		var strTr = jsdata [$(this).attr ('tkey')];
	    $(this).html (strTr);
	    console.log("strtr", strTr);
	});
}

console.log("langCode0 " + langCode);
langCode = navigator.language.substr (0, 2);

console.log("langCode1 " + langCode);
console.log("langs " + langs);

if (langCode == 'it') {

//if(langCode in langs) {		
	$.getJSON('lang/'+ langCode +'.json', translate);
	console.log("langCode2 ", langCode);
}
else if(langCode == 'pt'){
$.getJSON('lang/'+ langCode +'.json', translate);
	console.log("langCode2.5 ", langCode);
}
else {
		//(langCode = 'en') {
		$.getJSON('lang/en.json', translate);
		console.log("langCode3-> ", langCode);
}

