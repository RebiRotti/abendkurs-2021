let text;
function findeAuswahl(gesuchteId) {
    for (let i = 0; i < geschichte.situationen.length; i++) {
        if (geschichte.situationen[i].id == gesuchteId) {
            return geschichte.situationen[i].auswahlText;
        }
    }
}
function eineSituation(gesucht) {
    for (let j = 0; j < geschichte.situationen.length; j++) {
        if (geschichte.situationen[j].id == gesucht) {
            text = geschichte.situationen[j].text + "<br><br>";
            anzahlElemente = geschichte.situationen[j].ziele.length;
            for (let i = 0; i < anzahlElemente; i++) {
                let geheZu = geschichte.situationen[j].ziele[i];
                let geheZuText = findeAuswahl(geheZu);
                text = text +
                        "<div onclick=\"eineSituation(" + geheZu + ");\"" +
                        ">&gt; " +
                        geheZuText + "</div>";
            }
            break;
        }
    }
    monitor.innerHTML = '<br>&gt;' + text + '<br>';
}
