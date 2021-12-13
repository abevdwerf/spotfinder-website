// Imports
const { default: axios } = require("axios");

// Finder variables
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

// Finder - submit
finderSearch.addEventListener("click", function (e) {
    e.preventDefault();

    const finderParams = {
        location: formLocationNumber.value,
        numberOfPeople: document.getElementById("finder-people-amount").value,
        filterDeskPlace: (formTypes[0].parentElement.getElementsByTagName("input")[0].checked ? 1 : 0),
        filterSilentRoom: (formTypes[1].parentElement.getElementsByTagName("input")[0].checked ? 2 : 0),
        filterMeetingRoom: (formTypes[2].parentElement.getElementsByTagName("input")[0].checked ? 3 : 0)
    };

    searchRooms(finderParams);
});

// Get and show search history
const searchHistory = JSON.parse(window.localStorage.getItem("search-history"));
if (searchHistory != null) {
    let historyWrapper = document.getElementsByClassName("history")[0];
    const historyTemplate = document.getElementsByClassName("history__item")[0];

    var newHistoryItem = historyTemplate.cloneNode(true);
    newHistoryItem.addEventListener("click", function () {
        searchRooms(searchHistory);
    });
    axios.get("location/" + searchHistory.location)
        .then((response) => { newHistoryItem.getElementsByClassName("history__location")[0].innerHTML = response.data; newHistoryItem.removeAttribute("style"); })
        .catch((error) => { console.error(error) });
    newHistoryItem.getElementsByClassName("h4")[0].innerHTML = String(Boolean(searchHistory.filterDeskPlace) ? "Desk - " : "") + String(Boolean(searchHistory.filterSilentRoom) ? "Silent room - " : "") + String(Boolean(searchHistory.filterMeetingRoom) ? "Meeting room - " : "") + String(searchHistory.numberOfPeople + " people");

    historyWrapper.append(newHistoryItem);
} else document.getElementsByClassName("history__wrapper")[0].style.display = "none";

// Functions

function searchRooms (finderParams) {
    // Send ajax and make active search or print error in console
    axios.get('rooms' , { params: finderParams })
    .then((response) => activeSearch(response.data, finderParams))
    .catch((error) => { console.error(error) });
}

function activeSearch (data, finderParams) {
    // Remove first-view element
    if (!firstView.classList.contains("dashboard__first-view--hide")) firstView.classList.add("dashboard__first-view--hide");

    // Append rooms
    document.getElementsByClassName("dashboard__search-inner")[0].innerHTML = data;

    // Make all rooms appended rooms clickable
    var roomItems = document.getElementsByClassName("rooms__item");
    for (let index = 0; index < roomItems.length; index++) roomItems[index].addEventListener("click", detailedRoom);

    // Set search history in localstorage
    window.localStorage.setItem("search-history", JSON.stringify(finderParams));

    finderCollapse();
}

function detailedRoom (event) {
    event.preventDefault();

    for (let index = 0; index < event.target.parentElement.children.length; index++) event.target.parentElement.children[index].classList.remove("rooms__item--selected");
    event.target.classList.add("rooms__item--selected");

    const id = event.target.dataset.id;
    axios.get("room/" + id).then(function (response) {
        var searchDetailed = document.getElementsByClassName("dashboard__search-detailed")[0];
        searchDetailed.innerHTML = response.data;
        searchDetailed.removeAttribute("style")
        document.getElementsByClassName("dashboard__search-inner")[0].style.width = "initial";
        initCanvas(searchDetailed.getElementsByClassName("rooms__placing")[0], JSON.parse(searchDetailed.getElementsByClassName("rooms__placing")[0].dataset.gridtemplate));
    }).catch(function (error) { console.error(error); });
}

// Initializing the grid
function initCanvas (canvasObject, data) {
    let ctx = canvasObject.getContext('2d');
    ctx.fillStyle= "#a200ff";

    // drawGrid(ctx);
    drawSquares(ctx, data);
}

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

// Function that loops trough data to draw squares
function drawSquares (ctx, data) {
    data.forEach(obj => drawSquare(ctx, obj.x * 10, obj.y * 10));
}

// Function that draws squares
function drawSquare (ctx, x, y) {
    ctx.fillRect(x, y, 10, 10);
}

// Search history fills in finder
// Search history text into labels
// When searching results acros full screen
// Reuse code in Reservation page

// Search history clickable
// Search results room type label
// When searching back down the menu