let task_id = 0;
let arr = [];

function setCookie(name,value,days) {
	var expires = "";
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days*24*60*60*1000));
		expires = "; expires=" + date.toUTCString();
	}
	document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function saveTasksToCookie() {
	const cookieValue = encodeURIComponent(JSON.stringify(arr));
	setCookie("tasks", cookieValue, 10);
}

function remove(event) {
	functionConfirm("Sure you wanna delete this task?", function() {
		event.target.remove();
		for (let i = 0; i < arr.length; i++) {
			if (arr[i].id === Number(event.target.id)) {
				arr.splice(i, 1);
			}
		}
		saveTasksToCookie();
	});
}

function add() {
	var task = prompt("New task");
	task_id += 1;
	add_task(task, task_id);
	arr.unshift({"task": task, "id": task_id});
	saveTasksToCookie();
}

window.onload = function(){

const cookieValue = getCookie("tasks");
if (cookieValue) {
	arr = JSON.parse(decodeURIComponent(cookieValue));
	for (let i = arr.length - 1; i >= 0; i--) {
		console.log(arr[i].id);
		add_task(arr[i].task, arr[i].id);
		if (arr[i].id > task_id) {
			task_id = arr[i].id;
		}
	}
}
};

function add_task(task, id) {
	if (task !== null && task !== "") {
		var list = document.getElementById("ft_list");
		var record = document.createElement('div');
		record.innerHTML = task;
		record.id = id;
		record.onclick = remove;
		console.log(list);
		list.prepend(record);
	}
}

function functionConfirm(msg, confirm) {
	const confirmBox = document.getElementById("confirm");
	const message = confirmBox.querySelector('.message');
	message.textContent = msg;
	let yes = confirmBox.querySelector('.yes');
	let no = confirmBox.querySelector('.no');
	yes.replaceWith(yes.cloneNode(true));
	no.replaceWith(no.cloneNode(true));
	yes = confirmBox.querySelector('.yes');
	no = confirmBox.querySelector('.no');
	confirmBox.style.display = "block";
	yes.addEventListener("click", confirm);
	yes.addEventListener("click", function () {
		confirmBox.style.display = "none";
	});
	no.addEventListener("click", function () {
		confirmBox.style.display = "none";
	});
	// python3 -m http.server 8000
}
