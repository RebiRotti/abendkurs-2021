let geschichte = {
    situationen: [
        {
            id: 0,
            auswahlText: "Im Museum",
            "text":
                    "<br> *** Die Mumie des Schreckens ***<br>Ein Textadventure",
            ziele: [1]
        },
        {
            id: 1,
            auswahlText: "Du betrittst das Museum",
            text:
                    "Du bist viel zu spät in das alte Museum gekommen. Dir bleibt nur noch wenig Zeit, bis das Museum schließt.Der erste Gong ist ertönt, Zeit, sich zum Ausgang zu begeben.",
            ziele: [2, 3]
        },
        {
            id: 2,
            auswahlText: "Du schaust dir ganz schnell noch den Nebenraum an?",
            text:
                    "Du gehst noch schnell in den Gang, der von dem Hauptraum abzweigt. Zahlreiche Artefakte einer vergangenen Epoche sind ausgestellt.Du vergisst die Zeit und überhörst sogar den letzten Gong.Plötzlich wird es dunkel, als alle Lichter ausgeschaltet werden.",
            ziele: [4,5]
        },
        {
            id: 3,
            auswahlText: "Du gehst zum Ausgang?",
            text:
                    "Du machst dich schnellen Schrittes auf den Weg zum Ausgang. Du willst dich beeilen, doch durch deine große Hast rutscht du aus und stürzt.Du schlägst mit dem Kopf auf und wirst bewusstlos.",
            ziele: [4,5]
        },
        {
            id: 4,
            auswahlText: "In die Dunkelheit?",
            text:
                    "Es ist vollkommen dunkel. Für einen Moment bist du orientierungslos. Du tastest nach deinem Handy, um Licht zu machen, als du Geräusche hörst.Sie kommen offenbar aus einem Nebenraum.",
            ziele: [7,6]
        },
        {
            id: 5,
            auswahlText: "Du folgst dem Knarren?",
            text: "Du drehst dich im Kreis",
            ziele: [4, 3]
        },
        {
            id: 6,
            auswahlText: "Du folgst dem Klirren?",
            text: "Du drehst dich im Kreis",
            ziele: [4,3,5]
        },
        {
            id: 7,
            auswahlText: "Du folgst den Geräuschen?",
            text: "Das ist das Ende. Erst mal.",
            ziele: []
        }
    ]
};
