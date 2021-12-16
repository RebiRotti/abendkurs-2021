"use strict";
let a, b, c, sum, question, user, userResult, level;
$('#start').hide();
if(localStorage.getItem('level')) {
  level = localStorage.getItem('level');
  $('.user').append(' ' + localStorage.getItem('user'));
  activeButton(level);
  $('#user').hide();
  $('#start').show();
} else {
  level = 1;
  localStorage.setItem('level', 1);
}

function username() {
  let username = prompt('username');
  $('.user').append(' ' + username);
  localStorage.setItem('user', username);
  localStorage.setItem('level', level);
  activeButton(level);
  $('#user').hide();
  $('#start').show();
}


function activeButton(id) {
  $('#btn-' + id).removeClass('btn-secondary');
  $('#btn-' + id).removeClass('disabled');
  $('#btn-' + id).addClass('btn-info');
  let lastItem = id - 1;
  for(let i = 1; i <= lastItem; i++ ){
    $('#btn-' + i).removeClass('btn-info');
    $('#btn-' + i).addClass('disabled');
    $('#btn-' + i).addClass('btn-success');
  }
  game(id);
}

function start() {
  $('#result').val('');
  localStorage.clear();
  location.reload();
}

function checkResult() {
  userResult = Number($('#result').val());
  save();
  if(sum == userResult) {
    $('#output').prepend(
      "<div class='alert alert-success'>Sehr gut! Antwort ist richtig!<br>" + question +
      "<br>" + userResult + "</div>"
    );
    $('#result').val('');
    level++;
    activeButton(level);
  } else {
    $('#output').prepend(
      "<div class='alert alert-danger'>Falsches Ergebnis<br>" + question +
      "<br>" + userResult + "</div>"
    );
  }
  localStorage.setItem('level', level);
  if(level == 9) {
    $('.fadeCustom').fadeOut(1500);
  }
}

function game(num) {
  switch (Number(num)) {
    case 1:
      a = Math.floor(Math.random() * 49 + 1);
      b = Math.floor(Math.random() * 49 + 1);
      question = "Was ist das Ergebnis aus " + a + " + " + b + "?";
      sum = a + b;
      break;
    case 2:
      a = Math.floor(Math.random() * 49 + 51);
      b = Math.floor(Math.random() * 49 + 1);
      question = "Was ist das Ergebnis aus " + a + " - " + b + "?";
      sum = a - b;
      break;
    case 3:
      a = Math.floor(Math.random() * 19 + 1);
      b = Math.floor(Math.random() * 19 + 1);
      question = "Was ist das Ergebnis aus " + a + " * " + b + "?";
      sum = a * b;
      break;
    case 4:
      a = Math.floor(Math.random() * 9 + 1); // der Divisor
      b = Math.floor(Math.random() * 49 + 1); // sum des Divisor
      question = "Was ist das Ergebnis aus " + a + "*" + b + " / " + a + "?";
      sum = a * b / a;
      break;
    case 5:
      a = Math.floor(Math.random() * 49 + 1);
      b = Math.floor(Math.random() * 49 + 1);
      c = Math.floor(Math.random() * 9 + 1);
      question = "Was ist das Ergebnis aus " + a + " + " + b + " * " + c + "?";
      sum = a + b * c;
      break;
    case 6:
      a = Math.floor(Math.random() * 49 + 1);
      b = Math.floor(Math.random() * 49 + 1);
      c = Math.floor(Math.random() * 9 + 1);
      question = "Was ist das Ergebnis aus (" + a + " + " + b + ") * " + c + "?";
      sum = (a + b) * c;
      break;
    case 7:
      a = Math.floor(Math.random() * 9 + 1);
      b = Math.floor(Math.random() * 49 + 1);
      c = Math.floor(Math.random() * 49 + 1);
      question = "Was ist das Ergebnis aus " + a + "*" + b + " / " + a + " - " + c + "?";
      sum = a * b / a - c;
      break;
    case 8:
      a = Math.floor(Math.random() * 19 + 1); //das sum
      question = "Was ist die Quadratwurzel von " + a * a + "?";
      sum = Math.sqrt(a*a);
      break;
    case 9:
      a = Math.floor(Math.random() * 9 + 2); //die Basis
      b = Math.floor(Math.random() * 9 + 1); //das sum
      question = "Was ist der Logarithmus von " + Math.pow(a, b) + " zur Basis " + a + "?";
      sum = Math.pow(a, b);
      break;
  }
  console.log(sum);
  $('.question').text(question);
}

