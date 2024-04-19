document.addEventListener("DOMContentLoaded", function() {
    var toggleStudy = document.getElementById("toggleStudy");
    var studySubmenu = document.getElementById("studySubmenu");

    toggleStudy.addEventListener("click", function(event) {
        event.preventDefault();

        if (studySubmenu.style.display === "block") {
            studySubmenu.style.display = "none";
        } else {
            studySubmenu.style.display = "block";
        }
    });
});