var timerHours;
var startHours;

function startH() {
  startHours = parseInt(localStorage.getItem('startHours') || Date.now());
  localStorage.setItem('startHours', startHours);
  timerHours = setInterval(clockTickHours, 100);
}


function clockTickHours() {
  var currentTime = Date.now(),
    timeElapsed = new Date(currentTime - startHours),
    hours = timeElapsed.getUTCHours(),
    mins = timeElapsed.getUTCMinutes(),
    secs = timeElapsed.getUTCSeconds(),
    ms = timeElapsed.getUTCMilliseconds(),
    display = document.getElementById("display-hours");

  display.innerHTML =
    (hours > 9 ? hours : "0" + hours)
};

startH();






var timer;
var startTime;

function start() {
  startTime = parseInt(sessionStorage.getItem('startTime') || Date.now());
  sessionStorage.setItem('startTime', startTime);
  timer = setInterval(clockTick, 100);
}


function clockTick() {
  var currentTime = Date.now(),
    timeElapsed = new Date(currentTime - startTime),
    hours = timeElapsed.getUTCHours(),
    mins = timeElapsed.getUTCMinutes(),
    secs = timeElapsed.getUTCSeconds(),
    ms = timeElapsed.getUTCMilliseconds(),
    display = document.getElementById("display-area");

  display.innerHTML =
    (hours > 9 ? hours : "0" + hours) + ":" +
    (mins > 9 ? mins : "0" + mins) + ":" +
    (secs > 9 ? secs : "0" + secs) ;
};

start();


