/**
 * @author egs
 */
	function createXHRobject() {
		try {
			XHRobject = new XMLHttpRequest();
		} catch(err1) {
			try {
				XHRobject = new ActiveXObject("Microsoft.XMLHTTP");
			} catch(err2) {
				try {
					XHRobject = new AciveXObject("Msxml2.XMLHTTP");
				} catch(err3) {
					XHRobject = false;
				}
			}
		}
		return XHRobject;
	}

	function getData(url) {
		myXHRobject = createXHRobject();
		if (myXHRobject) {
			myXHRobject.onreadystatechange = function () {
				if (myXHRobject.readyState == 4) 
				{
					if(url=='read.php') document.getElementById('curProj').innerHTML=myXHRobject.responseText;
					else document.getElementById('report').innerHTML=myXHRobject.responseText;
					}
			}
			myXHRobject.open("GET", url);
			myXHRobject.send(null);
		}
	}
	
		function getDate(url) {
		myXHRobject2 = createXHRobject();

		if (myXHRobject2) {
			myXHRobject2.onreadystatechange = function () {
				if (myXHRobject2.readyState == 4) {
					var dates = myXHRobject2.responseXML.getElementsByTagName("date");

					for (i=0; i < dates.length; i++) {
						document.forms[0].curDate.options[i] = new Option(dates[i].firstChild.data);
					}
				}
			};
			myXHRobject2.open("GET", url, true);
			myXHRobject2.overrideMimeType('text/xml');
			myXHRobject2.send(null);
		}

	}
	
	function onKeyPressed(ev) {
		var e = ev || event;
		if(e.keyCode == 13) {
			//Enter was pressed
			return false; //prevents form from being submitted.
		}
	}

function action1(url) {
location.href=url;
}

