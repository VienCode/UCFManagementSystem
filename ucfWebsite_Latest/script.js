document.addEventListener("DOMContentLoaded", function() {
    const scrollBtn = document.getElementById("aboutus_btn");
    const target = document.getElementById("aboutus_section");

    scrollBtn.addEventListener("click", function() {
        target.scrollIntoView({behavior: "smooth"});
    })
})