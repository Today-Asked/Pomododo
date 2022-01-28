var timeSpan = 25;
var min;
var sec;
var current_time;
///document.write("<script src = 'finish.js'></script>");
//var a;
var status = 1;
var focusMin, focusSec;
var tag;

function startCountdown() {
	min = timeSpan;
	if (min) sec = 0;
	else sec = 3;

	document.getElementById("beforeCounting").hidden = "true";
	document.getElementById("greet").hidden = "true";
	document.getElementById("Counting").removeAttribute("hidden");

	current_time = Date.now();
	if (!window.setInterval(checkStatus, 1000)) { //好笨 要執行的函式後面不用加括號啦
		event.stopPropagation(); //啊不然他結束之後會一直叫(?)		
	}
}

function checkStatus() {
	if (status == 1) culTime();
	else console.log(status);
}

function culTime() {
	if (sec == 0 && min == 0) { //結束
		end();
		//status = 0;
		//return 0;
	} else if (sec != 0) {
		sec--;
	} else {
		sec = 59;
		min--;
	}

	//console.log(sec);
	if (min < 10)
		document.getElementById("min").innerHTML = '0' + min.toString();
	else
		document.getElementById("min").innerHTML = min.toString();

	if (sec < 10)
		document.getElementById("sec").innerHTML = '0' + sec.toString();
	else
		document.getElementById("sec").innerHTML = sec.toString();
}

function setTag(){
    tag = prompt("請輸入您想要設定的標籤");
    console.log(tag);
	document.getElementById("currentTag").innerHTML = tag;
}

function setTimespan() {
	var time = prompt("請輸入您想要設定的時長(分鐘)\n請勿輸入非整數的文字");
	//過濾掉使用者輸入非整數的情況?
	timeSpan = time;
	document.getElementById("sec").innerHTML = '00';
	if (timeSpan < 10)
		document.getElementById("min").innerHTML = '0' + timeSpan.toString();
	else
		document.getElementById("min").innerHTML = timeSpan.toString();
}

function end() {
	clearInterval();
	var x = document.getElementById("end");
	x.src = "coin01.mp3";
	x.play();
	x.id = "finish"; //好像有點毒但是我顧不了那麼多了
	document.getElementById("header").style = "background-color:rgb(40, 184, 228);";
	document.getElementById("afterCounting").removeAttribute("hidden");
	document.getElementById("Counting").hidden = "true";
	if (sec != 0) {
		focusSec = 60 - sec;
		focusMin = timeSpan - 1 - min;
	}
	else {
		focusSec = 0;
		focusMin = timeSpan - min;
	}
	document.getElementById("focusMin").innerHTML = focusMin.toString();
	document.getElementById("focusSec").innerHTML = focusSec.toString();
	if (min || sec) {
		min = 0;
		sec = 0;
		document.getElementById("min").innerHTML = '0' + min.toString();
		document.getElementById("sec").innerHTML = '0' + sec.toString();
	}
}

function pause() {
	status = 0;
	//clearInterval();
	document.getElementById("pause").onclick = restart;
	document.getElementById("pause").innerHTML = "繼續";
	document.getElementById("pause").id = "restart";
}

function restart() {
	status = 1;
	document.getElementById("restart").onclick = pause;
	document.getElementById("restart").innerHTML = "暫停";
	document.getElementById("restart").id = "pause";
}

function test() {
	timeSpan = 0;
    min = 0;
    sec = 3;
	document.getElementById("min").innerHTML = '00';
	document.getElementById("sec").innerHTML = '03';
    /*current_time = Date.now();
    if (!window.setInterval(checkStatus, 1000)) { //好笨 要執行的函式後面不用加括號啦
		event.stopPropagation(); //啊不然他結束之後會一直叫(?)		
	}*/
}

function changeTag(){
	var Tag = document.getElementsById(dropdownMenuButton1);
	
}
//next station => dropdown + modal + 增加清單

function save(){
	console.log(current_time);
    //因為不註解的話會直接跳轉到那個php, 所以先註解起來
	//網址後半段有問題
	var millisec_total = (focusMin * 60 + focusSec) * 1000;
    //console.log(typeof(tag));
    //console.log(encodeURIComponent(tag));
	//location.href = "index.php?timeSpan=" + millisec_total.toString() + "&startTime=" + current_time.toString() + "&tag=" + encodeURIComponent(tag);
	
}