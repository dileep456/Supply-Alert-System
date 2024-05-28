function getSemesters() {
    var program = document.getElementById("program").value;
    var semesterContainer = document.getElementById("semesterContainer");
    semesterContainer.innerHTML = "";

    if (program !== "") {
        var semesters = 8; // Assuming 8 semesters for all programs, you can customize this as needed
        for (var i = 1; i <= semesters; i++) {
            var semesterButton = document.createElement("button");
            semesterButton.textContent = "Semester " + i;
            semesterButton.value = i;
            semesterButton.onclick = function() {
                getSubjects(program, this.value);
            };
            semesterContainer.appendChild(semesterButton);
        }
    }
}

function getSubjects(program, semester) {
    var subjectContainer = document.getElementById("subjectContainer");
    subjectContainer.innerHTML = "";

    var subjects = getSubjectsForProgramAndSemester(program, semester);

    if (subjects.length > 0) {
        for (var i = 0; i < subjects.length; i++) {
            var checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.name = "subjects[]";
            checkbox.value = subjects[i];
            checkbox.className = "subject-checkbox"; // Add a class for styling

            var label = document.createElement("label");
            label.textContent = subjects[i];
            label.className = "subject-label"; // Add a class for styling

            var container = document.createElement("div");
            container.appendChild(checkbox);
            container.appendChild(label);

            subjectContainer.appendChild(container);
        }
    } else {
        var noSubjectsMessage = document.createElement("p");
        noSubjectsMessage.textContent = "No subjects found for the selected program and semester.";
        subjectContainer.appendChild(noSubjectsMessage);
    }
}


function getSubjectsForProgramAndSemester(program, semester) {
    var subjects = [];
    semester = parseInt(semester);

    if (program === "cse") {
        if (semester === 1) {
            subjects = ["Mathematics", "Applied Physics", "Chemistry"];
        } else if (semester === 2) {
            subjects = ["PPSC", "MFCS","M-2"];
        } else if (semester === 3) {
            subjects = ["OOPS", "Python", "JAVA"];
        }
    } else if (program === "ece") {
        if (semester === 1) {
            subjects = ["Mathematics", "Applied Physics", "Chemistry"];
        } else if (semester === 2) {
            subjects = ["Digital Electronics", "Signals and Systems", "Electrical Circuits"];
        } else if (semester === 3) {
            subjects = ["VLSI", "Drawing"];
        }
    } else if (program === "eee") {
        if (semester === 1) {
            subjects = ["Mathematics", "Applied Physics", "Chemistry"];
        } else if (semester === 2) {
            subjects = ["Electrical Machines", "Electrical Networks", "Electromagnetic Fields"];
        } else if (semester === 3) {
            subjects = ["Drawing", "BE"];
        }
    } else if (program === "mech") {
        if (semester === 1) {
            subjects = ["Mathematics", "Applied Physics", "Chemistry"];
        } else if (semester === 2) {
            subjects = ["Engineering Mechanics", "Thermodynamics", "Manufacturing Processes"];
        } else if (semester === 3) {
            subjects = ["Drawing", "Robotics"];
        }
    }

    return subjects;
}
