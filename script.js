
function searchcontent() {
    let input = document.getElementById("search-input").value.toLowerCase();
    let sections = document.querySelectorAll("section");

    sections.forEach(section => {
        let text = section.textContent.toLowerCase();
        if (text.includes(input)) {
            section.style.display = "block";
        } else {
            section.style.display = "none";
        }
    });
}

