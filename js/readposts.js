function GetPosts(){
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET", "../res/news.xml", false);
	xmlhttp.send();

	xmlDoc = xmlhttp.responseXML;
	
	rootElement = xmlDoc.getElementsByTagName("posts")[0];
	posts = rootElement.getElementsByTagName("post");
	
	for(i = 0; i < posts.length; i++){
		title = posts[i].getAttribute("title");
		date = posts[i].getAttribute("date");
		text = posts[i].childNodes[0].nodeValue;
		
		newPost = document.createElement("div");
		newPost.className = "post"
		newTitle = document.createElement("h3");
		newText = document.createElement("p");
		newDate = document.createElement("span");
		
		titleText = document.createTextNode(title);
		dateText = document.createTextNode(date);
		newTitle.appendChild(titleText);
		newDate.appendChild(dateText);
		
		postText = document.createTextNode(text);
		newText.appendChild(postText);
		
		newPost.appendChild(newTitle);
		newPost.appendChild(newText);
		newPost.appendChild(newDate);
		
		content = document.getElementById("content");
		content.appendChild(newPost);
	}
};