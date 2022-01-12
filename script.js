    function setDescriptions(){
        document.getElementById("infoBox-race").innerText = raceDesc[0];
        document.getElementById("infoBox-class").innerText = classDesc[0];
        document.getElementById("infoBox-profession").innerText = profDesc[0];
        document.getElementById("infoBox-faction").innerText = facDesc[0];
        document.getElementById("infoBox-zone").innerText = zoneDesc[0];
    }
    function raceSelected() {
        var selected = document.getElementById("raceSelection").value;
        var image = document.getElementById("raceImage");
        var descText = document.getElementById("infoBox-race");

        descText.innerText = raceDesc[selected - 1];
        if (selected == 1) {
            image.src = "images/races/human.png";
            image.alt = "Human Race";
        } else if (selected == 2) {
            image.src = "images/races/orc.png";
            image.alt = "Orc Race";
        } else if (selected == 3) {
            image.src = "images/races/elf.png";
            image.alt = "Elf Race";
        } else if (selected == 4) {
            image.src = "images/races/snyr.png";
            image.alt = "Snyr Race";
        } else if (selected == 5) {
            image.src = "images/races/khaldium.png";
            image.alt = "Khaldium Race";
        } else if (selected == 6) {
            image.src = "images/races/darkelf.png";
            image.alt = "Dark Elf Race";
        } else if (selected == 7) {
            image.src = "images/races/troll.png";
            image.alt = "Troll Race";
        } else if (selected == 8) {
            image.src = "images/races/demon.png";
            image.alt = "Demon Race";
        } else if (selected == 9) {
            image.src = "images/races/torga.png";
            image.alt = "Torga Race";
        } else if (selected == 10) {
            image.src = "images/races/ancient.png";
            image.alt = "Ancient Race";
        }

    }
    function classSelected() {
        var selected = document.getElementById("classSelection").value;
        var image = document.getElementById("classImage");
        var descText = document.getElementById("infoBox-class");

        descText.innerText = classDesc [selected - 1];
        if (selected == 1) {
            image.src = "images/classes/battleaxe.png";
            image.alt = "Warrior Class";
        } else if (selected == 2) {
            image.src = "images/classes/bow.png";
            image.alt = "Hunter Class";
        } else if (selected == 3) {
            image.src = "images/classes/daggers.png";
            image.alt = "Rogue Class";
        } else if (selected == 4) {
            image.src = "images/classes/wand.png";
            image.alt = "Trickster Class";
        } else if (selected == 5) {
            image.src = "images/classes/wand.png";
            image.alt = "Mage Class";
        } else if (selected == 6) {
            image.src = "images/classes/bookoflight.png";
            image.alt = "Cleric Class";
        } else if (selected == 7) {
            image.src = "images/classes/flute.png";
            image.alt = "Bard Class";
        } else if (selected == 8) {
            image.src = "images/classes/wand.png";
            image.alt = "Warlock Class";
        } else if (selected == 9) {
            image.src = "images/classes/shield.png";
            image.alt = "Brute Class";
        } else if (selected == 10) {
            image.src = "images/classes/dice.png";
            image.alt = "Gambler Class";
        }
    }
    function professionSelected() {
        var selected = document.getElementById("professionSelection").value;
        var descText = document.getElementById("infoBox-profession");

        descText.innerText = profDesc [selected - 1];
        
    }
    function factionSelected() {
        var selected = document.getElementById("factionSelection").value;
        var descText = document.getElementById("infoBox-faction");

        descText.innerText = facDesc [selected - 1];
        
    }
    function zoneSelected() {
        var selected = document.getElementById("startingZoneSelection").value;
        var descText = document.getElementById("infoBox-zone");

        descText.innerText = zoneDesc [selected - 1];
        
    }
    function nameChange() {
        var name = document.getElementById("charImgName");

        name.innerText = document.getElementById("characterName").value;
    }

