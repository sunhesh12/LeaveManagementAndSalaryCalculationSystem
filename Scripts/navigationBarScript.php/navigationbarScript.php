// Function to toggle sidebar navigation visibility
document.getElementById("toggleNav").addEventListener("click", function() {
    var nav = document.querySelector(".div-nav");
    if (nav.style.display === "none" || nav.style.display === "") {
        nav.style.display = "block";
    } else {
        nav.style.display = "none";
    }
});

// Functionality for dropdowns
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;
for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}