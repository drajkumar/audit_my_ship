var overallscore = 99;
if(overallscore <= 19) document.getElementById('demo').innerHTML = 'UNSATISFACTORY';
else if(overallscore <= 22) document.getElementById('demo').innerHTML = 'POOR';
else if(overallscore <= 59) document.getElementById('demo').innerHTML = 'FAIR';
else if(overallscore <= 80) document.getElementById('demo').innerHTML = 'GOOD';
else document.getElementById('demo').innerHTML = 'VERY GOOD';
window.onload = function onLoad() {
  var score = overallscore/100;
  var c;
  if(score <= 0.19) c = '#FF0400';
  else if(score <= 0.22) c = '#DF5320';
  else if(score <= 0.59) c = '#DFB620';
  else if(score <= 0.8) c = '#4A8641';
  else c = '#12470A';
  var progressBar = 
    new ProgressBar.Circle('#progress', {
      color: c,
      strokeWidth: 15,
      duration: 2000, // milliseconds
      easing: 'easeInOut'
    });

  progressBar.animate(score); // percent
};