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

    axios.get("rooms?location=" + formLocationNumber.value + "&numberOfPeople=" + document.getElementById("finder-people-amount").value + "&filterDeskPlace=" + (formTypes[0].parentElement.getElementsByTagName("input")[0].checked ? 1 : 0) + "&filterSilentRoom=" + (formTypes[1].parentElement.getElementsByTagName("input")[0].checked ? 1 : 0) + "&filterMeetingRoom=" + (formTypes[2].parentElement.getElementsByTagName("input")[0].checked ? 1 : 0))
    .then(function (response) {
        if (!firstView.classList.contains("dashboard__first-view--hide")) firstView.classList.add("dashboard__first-view--hide");
        document.getElementsByClassName("dashboard__search-inner")[0].innerHTML = response.data;
    })
    .catch(function (error) {
        console.error(error);
    });
})