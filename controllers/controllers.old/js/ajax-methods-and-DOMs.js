function getXMLRequest() {
	var xh;
	if (window.XMLHttpRequest) {
		xh = new XMLHttpRequest();
	} else { // THis is IE 
		xh = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	return xh;
}

var requestPlainText = function(callBackMethod) {
	var h = getXMLRequest();
	
	h.onreadystatechange = function() {
		if (h.readyState == XMLHttpRequest.DONE) {
			if (h.status == 200) {
				callBackMethod(h.responseText);
			} else if (h.status == 400) {
				alert("ERROr 400")
			} else {
				alert("Something else happened")
			}
		}
	};
	
	h.open("GET", "plaintext.txt", true);
	h.send();
};

var requestJSON = function(url, callBackMethod) {
	var h = getXMLRequest();
	
	h.onreadystatechange = function() {
		if (h.readyState == XMLHttpRequest.DONE) {
			if (h.status == 200) {
				callBackMethod(eval(h.responseText));
			} else if (h.status == 400) {
				alert("ERROr 400")
			} else {
				alert("Something else happened")
			}
		}
	};
	
	h.open("GET", url, true);
	h.send();
};

var addRowJson = function(tbody_ref, row_num, json_row) {
	var tr = document.createElement('tr');
	var td1 = document.createElement('td');
	var td_name = document.createElement('td');
	var td_assignments = document.createElement('td');
	var td_exam = document.createElement('td');
	
	td1.innerHTML = row_num;
	
	td_name.innerHTML = json_row.name;
	td_assignments.innerHTML = json_row.description;
	td_exam.innerHTML = json_row.calories;
	
	tr.appendChild(td1);
	tr.appendChild(td_name);
	tr.appendChild(td_assignments);
	tr.appendChild(td_exam);
	
	tbody_ref.appendChild(tr);
};













