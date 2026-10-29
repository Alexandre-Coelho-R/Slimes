document.querySelector("textarea").addEventListener("input", () => {
    textarea.style.height = "auto";
    textarea.style.height = textarea.scrollHeight + 10 + "px"; 
})