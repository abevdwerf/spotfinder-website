const formLocation = document.getElementById("finder-location");
const formLocationNumber = document.getElementById("finder-location-value");
const locationDropdown = formLocation.parentElement.getElementsByClassName("form__dropdown")[0];
const locationDropdownOptions = locationDropdown.getElementsByClassName("form__dropdown-option");

const formAmountOfPersons = document.getElementsByClassName("form__selection-item");
const formTypes = document.getElementsByClassName("form__check-button");
const finderSearch = document.getElementById("finder-search");

// Content variables
const firstView = document.getElementsByClassName("dashboard__first-view")[0];

// Finder - location
formLocation.addEventListener("click", () => locationDropdown.classList.add("form__dropdown--active"));

formLocation.addEventListener("input", function (e) {
    locationDropdown.classList.add("form__dropdown--active");

    for (let removeIndex = 0; removeIndex < locationDropdownOptions.length; removeIndex++) locationDropdownOptions[removeIndex].classList.remove("form__dropdown-option--selected");
    for (var i = 0; i < locationDropdownOptions.length; i++) {
        const locationDropdownOption = locationDropdownOptions[i];
        if (locationDropdownOption.innerHTML.toLowerCase().indexOf(e.target.value.toLowerCase()) > -1) locationDropdownOption.style.display = "block";
        else locationDropdownOption.style.display = "none";
    }
});

for (let index = 0; index < locationDropdownOptions.length; index++) {
    const locationDropdownOption = locationDropdownOptions[index];
    locationDropdownOption.addEventListener("click", function (e) {
        for (let removeIndex = 0; removeIndex < locationDropdownOptions.length; removeIndex++) locationDropdownOptions[removeIndex].classList.remove("form__dropdown-option--selected");

        locationDropdown.classList.remove("form__dropdown--active");
        formLocation.value = e.target.innerHTML;
        formLocationNumber.value = e.target.dataset.id;
        e.target.classList.add("form__dropdown-option--selected");
    });
}

// Finder - form options
for (let index = 0; index < formAmountOfPersons.length; index++) {
    const formOption = formAmountOfPersons[index];
    formOption.addEventListener("click", function () {
        for (let removeIndex = 0; removeIndex < formAmountOfPersons.length; removeIndex++) formAmountOfPersons[removeIndex].classList.remove("form__selection-item--active");
        formOption.classList.add("form__selection-item--active");
        document.getElementById("finder-people-amount").value = parseInt(formOption.innerHTML);
    });
}

// Finder - room types
for (let index = 0; index < formTypes.length; index++) {
    const formType = formTypes[index];
    formType.addEventListener("click", function () {
        if (formType.classList.contains("form__check-button--active")) formType.classList.remove("form__check-button--active");
        else formType.classList.add("form__check-button--active");
    });
}

var ctx = document.getElementsByClassName("rooms__placing")[0].getContext('2d');

// Drawing grid with an SVG-image for faster implementation
function drawGrid (context) {
    const gridData = ' \
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"> \
            <defs> \
                <pattern id="smallGrid" width="10" height="10" patternUnits="userSpaceOnUse"> \
                    <path d="M 10 0 L 0 0 0 10" fill="none" stroke="gray" stroke-width="0.5" /> \
                </pattern> \
            </defs> \
            <rect width="100%" height="100%" fill="url(#smallGrid)" /> \
        </svg> \
    ';

    var DOMURL = window.URL || window.webkitURL || window;
    var img = new Image();
    var svg = new Blob([gridData], {type: 'image/svg+xml;charset=utf-8'});
    var url = DOMURL.createObjectURL(svg);
    img.onload = function () {
        context.drawImage(img, 0, 0);
        DOMURL.revokeObjectURL(url);
    }
    img.src = url;
}

function drawSquare (x, y) {
    ctx.fillRect(x, y, 10, 10);
}

drawGrid(ctx);
ctx.fillStyle= "#a200ff";
drawSquare(10, 10);

// Keep the version down below for documentation purposes

// // Draw custom grid with lines
// for (let index = 0; index < 600; index += 10) {
//     ctx.beginPath();

//     // Horizontal lines
//     ctx.moveTo(index, 0);
//     ctx.lineTo(index, 600);

//     // Horizontal lines
//     ctx.moveTo(0, index);
//     ctx.lineTo(600, index);

//     ctx.lineWidth = .5;
//     ctx.strokeStyle = "#666666";
//     ctx.stroke();
// }
