function confirmDelete(username) {
    return confirm("Are you sure to delete " + username + "?");
}

// var loader = document.getElementById("preloader");
// // Set the timeout to 500 milliseconds (0.5 seconds)
// setTimeout(function () {
//     loader.style.display = "none";
// }, 500);


// Get the element with the id "preloader" and assign it to the variable loader
var loader = document.getElementById("preloader");

// Set the loader to be initially visible

// Add an event listener for the 'load' event on the window
window.addEventListener('load', function() {
    // Inside the event listener, set the "display" style property of the loader element to "none"
    loader.style.display = "none";
});
