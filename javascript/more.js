document.addEventListener("DOMContentLoaded", function() {
    const button = document.getElementById("toggle-button");
    const moreContent = document.getElementById("more-content");

    button.addEventListener("click", function() {
        if (moreContent.classList.contains("hidden")) {
            moreContent.classList.remove("hidden");
        } else {
            moreContent.classList.add("hidden");
          
          
        }
    });
});
