function toggleCustomInput() {
    let dropdown = document.getElementById("transport");
    let customInput = document.getElementById("custom_input");
    if (dropdown.value == "other") {
        customInput.style.display = "inline";
    } else {
        customInput.style.display = "none";
    }
}