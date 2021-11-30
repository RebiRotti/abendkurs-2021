"use strict";

// ToDo Variablen Deklarieren
let a, b, c, sum, question, userResult;
let level = 1;

// ToDo Buttons ausblenden und deaktivieren
// $('.game button').prop('disabled', true);
$('#start').hide();

// ToDo 
function username() {
  // Namen des Spielers abfragen und in eine Variable speichern
  $('.user').append(' ' + prompt('Gibt deinen Spielernamen ein'));
  // Funktion aufrufen um den richtigen Button zu aktivieren
  activeButton(level);
  // Play Button verstecken
  $('#user').hide();
  // Restart Button einblenden
  $('#start').show();
}

// ToDo 
function activeButton(id) {
  // Button die Klasse active zufügen
  $('#btn-' + id).addClass('active'); 
  // vorherigen Button Klasse active entfernen
  $('#btn-' + id).prev().removeClass('active');
  // Game mit Level aufrufen
  game(id);
}

// ToDo 
function start() {
  // input leeren
  $('#result').val('');
  // Seite neu laden
  location.reload();
}

// ToDo 
function checkResult() {
  // Input auslesen
  userResult = Number($('#result').val());
  // Überprüfen ob Userergebnis richtig ist
  if(sum == userResult) {
    // wenn ja dann Ausgabe gut
    $('#output').prepend(
      "<div class='right'>Seht gut! Antwort ist richtig!<br>" + question +
      "<br>" + userResult + "</div>"
    );
    // Input Feld wieder leeren
      $('#result').val('');
    // Level rauf zählen
      level++;
    // nächsten Button aktivieren
      activeButton(level);
  } else {
  // ansonsten
    // Ausgabe falsch
    $('#output').prepend(
      "<div class='wrong'>Antwort Falsch<br>" + question +
      "<br>" + userResult + "</div>"
    );
    $('#result').val('');
    activeButton(level);
  }
  // Wenn level 10 erreicht
  if(level == 10) {
    // FadeOut
    $('.fade').fadeOut(1500);
  }
}

// Die Aufgaben in den Runden
function game(num) {
  switch (num) {
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
  // ToDo Ausgabe der Frage 
  $('.question').text(question);
}