document.querySelector('#userinput').focus();

var input = document.querySelector("#userinput");
var ol = document.querySelector("ol");
var enter = document.querySelector("#enterButton");
var li = document.querySelectorAll('li');

//function for insert
function insertIntoList(){
	if(input.value.length > 0){
		var li = document.createElement("li");
		var button = document.createElement("button");
		button.textContent = "Delete";
		li.textContent = input.value;
		ol.appendChild(li);
		li.appendChild(button);
		button.classList.add('todobutton');
		input.value = "";
	}
}

//enter button entry
enter.addEventListener('click', insertIntoList)
input.addEventListener('keypress', function(event){
	if(event.keyCode === 13){
		insertIntoList();
	}
})

//strikethrough for li items
ol.addEventListener('click', function(event){
	event.target.classList.toggle('done');
})

//delete button
document.addEventListener('click', function(event){
	if(event.target.classList.contains('todobutton')){
		ol.removeChild(event.target.parentElement);
	}
})