<script>

function ajaxRequest()
{
		try // Non IE Browser?
		{
			var request = new XMLHttpRequest()
		}
		catch(e1)
		{
			try // IE 6+?
			{
				request = new ActiveXObject("Msxml2.XMLHTTP")
			}
			catch(e2)
			{
				try // IE 5?
				{
					request = new ActiveXObject("Microsoft.XMLHTTP")
				}
				catch(e3) // There is no Ajax Support
				{
					request = false
				}
			}
		}
	return request
}

	
	var s;
	function f(a, b)
	{
		
		params = "factId=" + a + "&user=" + b;
		//params = "factId=" + a;
		
		//document.write(params); this is working :)
		request = new ajaxRequest();
		
		//document.write(request.readyState);
		
		
		request.open("POST", "likesServer.php", false)
		
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		request.setRequestHeader("Content-length", params.length)
		request.setRequestHeader("Connection", "close")
		
		//document.write("request.readyState " + request.readyState);
		
		request.onreadystatechange = function()
		{
			//document.write("request.readyState: " + request.readyState + "<br>");
			//document.write("request.status: " + request.status  + "<br>");
			
			if (request.readyState == 4)
			{
				if (request.status == 200)
				{
					if (request.responseText != null)
					{
						s = request.responseText;
					}
					else alert("Ajax error: No data received")
				}
				else alert ( "Ajax error: " + request.statusText)
			}
		}
		
		//document.write(request.readyState);
		//document.write(params)
		request.send(params)
		//request.send("factId=a&user=b");
		//document.write(request.readyState + "here");
		return s;
	}

	function f2(a)
	{
		
		params = "factId=" + a;
		//document.write(params);
		request = new ajaxRequest();
		request.open("POST", "likesServer2.php", false)
		
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		request.setRequestHeader("Content-length", params.length)
		request.setRequestHeader("Connection", "close")
		
		request.onreadystatechange = function()
		{
			if (request.readyState == 4)
			{
				if (request.status == 200)
				{
					if (request.responseText != null)
					{
						s = request.responseText;
					}
					else alert("Ajax error: No data received")
				}
				else alert ( "Ajax error: " + request.statusText)
			}
		}
		
		request.send(params)
		return s;
	}
	
	function f3(a, b)
	{
		
		params = "factId=" + a + "&user=" + b;
		
		request = new ajaxRequest();
		
		request.open("POST", "likesServer3.php", false)
		
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		request.setRequestHeader("Content-length", params.length)
		request.setRequestHeader("Connection", "close")
		
		request.onreadystatechange = function()
		{
			if (request.readyState == 4)
			{
				if (request.status == 200)
				{
					if (request.responseText != null)
					{
						s = request.responseText;
					}
					else alert("Ajax error: No data received")
				}
				else alert ( "Ajax error: " + request.statusText)
			}
		}

		request.send(params)
		//document.write(s);
		return s;
	}
	
	function f4(a, b)
	{
		
		params = "factId=" + a + "&user=" + b;
		request = new ajaxRequest();
		
		request.open("POST", "dislikesServer.php", false)
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		request.setRequestHeader("Content-length", params.length)
		request.setRequestHeader("Connection", "close")
		
		request.onreadystatechange = function()
		{
			if (request.readyState == 4)
			{
				if (request.status == 200)
				{
					if (request.responseText != null)
					{
						s = request.responseText;
					}
					else alert("Ajax error: No data received")
				}
				else alert ( "Ajax error: " + request.statusText)
			}
		}
		
		request.send(params)
		return s;
	}

	function f5(a)
	{
		
		params = "factId=" + a;
		request = new ajaxRequest();
		request.open("POST", "dislikesServer2.php", false)
		
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		request.setRequestHeader("Content-length", params.length)
		request.setRequestHeader("Connection", "close")
		
		request.onreadystatechange = function()
		{
			if (request.readyState == 4)
			{
				if (request.status == 200)
				{
					if (request.responseText != null)
					{
						s = request.responseText;
					}
					else alert("Ajax error: No data received")
				}
				else alert ( "Ajax error: " + request.statusText)
			}
		}
		
		request.send(params)
		return s;
	}
	
	function f6(a, b)
	{
		
		params = "factId=" + a + "&user=" + b;
		
		request = new ajaxRequest();
		
		request.open("POST", "dislikesServer3.php", false)
		
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		request.setRequestHeader("Content-length", params.length)
		request.setRequestHeader("Connection", "close")
		
		request.onreadystatechange = function()
		{
			if (request.readyState == 4)
			{
				if (request.status == 200)
				{
					if (request.responseText != null)
					{
						s = request.responseText;
					}
					else alert("Ajax error: No data received")
				}
				else alert ( "Ajax error: " + request.statusText)
			}
		}

		request.send(params)
		
		return s;
	}
	
	function f7(a, b)
	{
		
		params = "factId=" + a + "&user=" + b;
		
		request = new ajaxRequest();
		
		request.open("POST", "flagServer.php", false)
		
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		request.setRequestHeader("Content-length", params.length)
		request.setRequestHeader("Connection", "close")
		
		request.onreadystatechange = function()
		{
			if (request.readyState == 4)
			{
				if (request.status == 200)
				{
					if (request.responseText != null)
					{
						s = request.responseText;
					}
					else alert("Ajax error: No data received")
				}
				else alert ( "Ajax error: " + request.statusText)
			}
		}

		request.send(params)
		
		//return s;
	}
	
	function setMainPic(currentPic, num)
	{
		params = "filename=" + currentPic + num;
		
		request = new ajaxRequest();
		
		//request.open("POST", "http://127.0.0.1/rename.php", true)
		//request.open("POST", "http://localhost/rename.php", true)
		
		request.open("POST", "rename.php", false)

		/*
		How to know when all ajax calls are complete
		
		Based on your input it seems what your quickest alternative 
		is to use synchronous requests. You can set the property async 
		to false in your $.ajax requests to make them blocking. This 
		will hang your browser until the request is finished though.*/
		
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

		//request.setRequestHeader("Content-type", "text/plain")
		//request.setRequestHeader("Content-length", params.length)
		//request.setRequestHeader("Connection", "close")
		//request.setRequestHeader("Access-Control-Allow-Origin","*")
		
		//document.write(params);
		request.send(params);
		
		request.onreadystatechange = function()
		{
			if (request.readyState == 4)
			{
				if (request.status == 200)
				{
					if (request.responseText != null)
					{
						s = request.responseText;
						//reloadPage();
					}
					else alert("Ajax error: No data received")
				}
				else alert ( "Ajax error: " + request.statusText + request.status)
				/*
				https://stackoverflow.com/questions/872206/http-status-code-0-what-does-this-mean-for-fetch-or-xmlhttprequest
				We've found a status code of "0" usually means the user navigated to 
				a different page before the AJAX call completed.*/
			}
		}
				
		//location.reload();
		//document.write(request.readyState);
		//document.write(request.status);
		//request.send("filename=admin2")
		//request.send(null)
		//request.send(params)
		//request.send(2);
		return s;
	}
	
	function reloadPage()
	{
		window.location.reload(true);
	}
	
	function deletePictures(currentPic, num)
	{
		params = "filename=" + currentPic + num;
		
		request = new ajaxRequest();
		
		request.open("POST", "deletePicture.php", false)
		/*
		How to know when all ajax calls are complete
		
		Based on your input it seems what your quickest alternative 
		is to use synchronous requests. You can set the property async 
		to false in your $.ajax requests to make them blocking. This 
		will hang your browser until the request is finished though.*/
		
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		
		request.send(params);
		
		request.onreadystatechange = function()
		{
			if (request.readyState == 4)
			{
				if (request.status == 200)
				{
					if (request.responseText != null)
					{
						s = request.responseText;
						document.write("here");
						//reloadPage();
					}
					else alert("Ajax error: No data received")
				}
				else alert ( "Ajax error: " + request.statusText + request.status)
			}
		}
				
		
		//document.write(request.readyState);
		//document.write(request.status);
		//request.send("filename=admin2")
		//request.send(null)
		//document.write("here");
		//request.send(params)
		//request.send(2);
		return s;
	}
	
	function setUpTextBox(num, f)
	{
		var factNumber = "var" + num;
		
		var elmnt = document.createElement("textarea");
		elmnt.cols = "60";
		elmnt.rows = "5";
		elmnt.id = "textbox2";
		elmnt.value = f; //elmnt.value is the value inside text are, f is the original fact before being edited
		
		var btn = document.createElement("INPUT");
		btn.id = "uniqueIdentifier";
		btn.setAttribute("type", "button");
		btn.setAttribute("value", "Submit2");
		
		
		
		//append textbox to submit button
		elmnt.appendChild(btn);
		
		//this is actually the paragraph
		var fact = document.getElementById(factNumber);

		
		//replaces the text inside the paragraph with the textbox
		fact.replaceChild(elmnt, fact.childNodes[0]);
		
		
		//the button is inside the span
		/*
		<p>
			text of fact
			<br><span>edit</span>
		</p>
		
		<p>
			textbox
			<br><span>submit2</span>
		</p>
		*/
		
		//this is the span
		var editLinkNum = "editLink" + num;
		var eL = document.getElementById(editLinkNum);
		//replaces the edit inside the span with the button
		eL.replaceChild(btn, eL.childNodes[0]);
		
		
		//btn.onclick = function() { editFact(f, elmnt.value); submitBackToLink(num, elmnt.fact); };
		//btn.onclick = function() { submitBackToLink(num, elmnt.fact); editFact(f, elmnt.value);  };
		//btn.onclick = function() { editFact(f, elmnt.value); window.location.reload(); };
		btn.onclick = function() { eliminateTextBox(); editFact(f, elmnt.value); window.location.reload();}
	}
	
	function eliminateTextBox()
	{
		var textbox = document.getElementById("textbox2");
		var parentOfTextBox = textbox.parentNode; //paragraph
				
		//remove all children inside paragraph
		while (parentOfTextBox.firstChild)
		{
			parentOfTextBox.removeChild(parentOfTextBox.firstChild);
		}
	}
	
	function submitBackToLink(num, fact)
	{
		/*
		var textbox = document.getElementById("textbox2");
		var parentOfTextBox = textbox.parentNode; //paragraph
				
		//remove all children inside paragraph
		while (parentOfTextBox.firstChild)
		{
			parentOfTextBox.removeChild(parentOfTextBox.firstChild);
		}
		
		var text2 = document.createTextNode(textbox.value);
		
		parentOfTextBox.appendChild(text2);
			
		var breakline = document.createElement("br");
		parentOfTextBox.appendChild(breakline);
		
		var span = document.createElement("SPAN");
		span.setAttribute("id", "editLink" + num);
		span.style.color = "blue";
		span.style.textDecoration = "underline"; 
		var text3 = document.createTextNode("edit5");
		span.appendChild(text3);
		//span.onclick = change1;
		parentOfTextBox.appendChild(span);
		*/
		window.location.reload();
		/*
		for (var i = 0; i < parentOfTextBox.childNodes.length; i++)
		{
			document.write(parentOfTextBox.childNodes[i].textContent + "<br>");
		}
		*/
		
		/*
		var btn2 = document.getElementById("uniqueIdentifier");
		
		var eL = document.createElement("span");
		eL.id = "x27";
		var u = document.createTextNode("edit");
		eL.appendChild(u);
		
		var parentOfButton = btn2.parentNode; //parentOfButton is span
		var pElement = parentOfButton.parentNode; //paragraph
		var spanElement = pElement.childNodes[2];
		
		var textbox2 = document.getElementById("textbox2");
		var parentOfTextBox2 = textbox2.parentNode;
		
		var hello9 = document.createElement("span");
		hello9.id = "xxxx";
		var helloText = document.createTextNode("fact goes here");
		hello9.appendChild(helloText);
		
		var br = document.createElement("BR");
		*/
			
	}
	
	function editFact(originalFact, editedFact) 
	{
		/*
		document.write(originalFact);
		document.write("<br>");
		document.write(editedFact);
		*/
		
		params = "originalFact=" + originalFact + "&editedFact=" + editedFact;
		
		request = new ajaxRequest();
		
		request.open("POST", "editFact.php", false);
		
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		//request.setRequestHeader("Content-length", params.length)
		//request.setRequestHeader("Connection", "close")
		
		//document.write(params);
		request.send(params);
		
		request.onreadystatechange = function()
		{
			//document.write("request.readyState: " + request.readyState);
			if (request.readyState == 4)
			{
				//document.write("request.status: " + request.status);
				if (request.status == 200)
				{
					if (request.responseText != null)
					{
						s = request.responseText;
					}
					else alert("Ajax error: No data received")
				}
				else alert ( "Ajax error: " + request.statusText)
			}
		}
		
		
		return s;
	}
	
</script>