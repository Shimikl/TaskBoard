
//This function push all existing notes from loca storage to the board .
function notesOnLoad() {

    if (localStorage.getItem("notestr") != null) {

        var previewsNotes = JSON.parse(localStorage.getItem("notestr"));
        console.log(previewsNotes);
        for (let i = 0; i < previewsNotes.length; i++) {

            var catchnote = document.getElementsByClassName("notes")[0];

            var adddiv = document.createElement("div");
            //debugger;
            adddiv.setAttribute("class", "divnote fade-in");

            var h3 = document.createElement("h3");
            h3.setAttribute("class", "mynote")
            h3.innerText = previewsNotes[i].text;
            var h2 = document.createElement("h2");
            h2.setAttribute("class", "glyphicon glyphicon-trash glif")
            h2.setAttribute("slot", [i])
            h2.setAttribute("onclick", "del(this)")
            var inputdate = document.createElement("input");
            inputdate.setAttribute("class", "recivedate")
            inputdate.value = previewsNotes[i].date;
            var inputtime = document.createElement("input");
            inputtime.setAttribute("class", "recivetime")
            inputtime.value = previewsNotes[i].time;

            catchnote.appendChild(adddiv);
            adddiv.appendChild(h3);
            adddiv.appendChild(h2);
            adddiv.appendChild(inputdate);
            adddiv.appendChild(inputtime);

        }
    }

}

//this function get the values from the user input and check if there is correct values and set each note.

var allnotes = [];
var currentStored = "";
var testnote = [];
function see(e) {

    var msg = document.getElementById("msg");
    msg.style.display = "inline";

    if (document.getElementById("mytext").value.length < 1) {
        msg.innerHTML = "No Text !"
    }
    else if (document.getElementById("mydate").value == "") {
        msg.innerHTML = "No Date !"
    }
    else {
        msg.style.display = "none";





        var texti = document.getElementById("mytext").value;
        var timey = document.getElementById("mytime").value;
        var datey = document.getElementById("mydate").value;
        var id = 0;
        var currentElement = {
            text: texti,
            date: datey,
            time: timey,
        }

        document.getElementById("mytext").value = '';
        document.getElementById("mytime").value = '';
        document.getElementById("mydate").value = '';

        allnotes.push(currentElement);
        currentStored = JSON.parse(localStorage.getItem("notestr"));

        if (currentStored == null) {
            localStorage.setItem("notestr", JSON.stringify(allnotes));
        }

        else {
            var tempnotes = [];
            currentStored = JSON.parse(localStorage.getItem("notestr"));

            debugger;
            for (let i = 0; i < currentStored.length; i++) {

                tempnotes.push(currentStored[i]);
            }
            tempnotes.push(currentElement);

            console.log(tempnotes);

            localStorage.setItem("notestr", JSON.stringify(tempnotes));
        }





        var thisnote = [];
        thisnote.push(currentElement);
        //   testnote.push(currentElement);
        for (key in thisnote) {

            var newElement = {
                text: thisnote[key].text,
                date: thisnote[key].date,
                time: thisnote[key].time
            }
            var currentElement = {
                text: "",
                date: "",
                time: ""
            };

            var catchnote = document.getElementsByClassName("notes")[0];

            var adddiv = document.createElement("div");
            //debugger;
            adddiv.setAttribute("class", "divnote fade-in");

            var h3 = document.createElement("h3");
            h3.setAttribute("class", "mynote")
            h3.innerText = thisnote[key].text;
            var h2 = document.createElement("h2");
            h2.setAttribute("class", "glyphicon glyphicon-trash glif")

            h2.setAttribute("onclick", "del(this)")
            var inputdate = document.createElement("input");
            inputdate.setAttribute("class", "recivedate")
            inputdate.value = thisnote[key].date;
            var inputtime = document.createElement("input");
            inputtime.setAttribute("class", "recivetime")
            inputtime.value = thisnote[key].time;

            catchnote.appendChild(adddiv);
            adddiv.appendChild(h3);
            adddiv.appendChild(h2);
            adddiv.appendChild(inputdate);
            adddiv.appendChild(inputtime);
            location.reload();
        }
    }

}



//Thit function delete specific note .
function del(elementToDelete) {
    var txt;
    var r = confirm("Are You Sure");
    if (r == true) {
        txt = "You pressed OK!";
        var currentSaved = JSON.parse(localStorage.getItem("notestr"));
        if (currentSaved.length == 1) {
            localStorage.removeItem("notestr");
        }
        else {
            // debugger;
            currentSaved.splice(elementToDelete.slot, 1);
            var newCleanArr = JSON.stringify(currentSaved);
            localStorage.setItem("notestr", newCleanArr);

        }

        elementToDelete.parentNode.style.opacity = "0";

        setTimeout(function () {
            location.reload();
        }, 1000);
    }

 else {
    txt = "You pressed Cancel!";
}

}

