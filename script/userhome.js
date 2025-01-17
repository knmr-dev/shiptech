var modal = document.getElementById("myModal");
var modal1 = document.getElementById("myModal1");

var btn = document.getElementById("bookNowBtn");
var close = document.getElementsByClassName("close")[0];
var close1 = document.getElementsByClassName("close1")[0];
var backButton = document.getElementsByClassName("backButton")[0];
var continueButton = document.getElementsByClassName("continueButton")[0];
var backFormButton = document.getElementsByClassName("backFormButton")[0];

// Input fields
var fullnameInput = document.getElementById("fullname");
var emailInput = document.getElementById("email");
var addressInput = document.getElementById("address");
var contactInput = document.getElementById("contact");

var ageInput = document.getElementById("age");
var genderInput = document.getElementById("gender");
var availtripInput = document.getElementById("availtrip");
var typeInput = document.getElementById("type");
var priceInput = document.getElementById("price");
// Add more inputs as necessary

btn.onclick = function() {
    modal.style.display = "block";
}

close.onclick = function() {
    modal.style.display = "none";
}

close1.onclick = function() {
    modal1.style.display = "none";
}

backButton.onclick = function() {
    modal.style.display = "none";
}

continueButton.onclick = function() {
    // Get values from the first modal
    var fullname = fullnameInput.value;
    var email = emailInput.value;
    var address = addressInput.value;
    var contact = contactInput.value;
    var age = ageInput.value;
    var gender = genderInput.value;
    var availtrip = availtripInput.value;
    var type = typeInput.value;
    var price = priceInput.value;

    // Set the values to spans and hidden inputs
    document.getElementById("passengerName").textContent = fullname;
    document.getElementById("hiddenFullname").value = fullname;
    
    document.getElementById("passengerEmail").textContent = email;
    document.getElementById("hiddenEmail").value = email;

    document.getElementById("passengerAddress").textContent = address;
    document.getElementById("hiddenAddress").value = address;

    document.getElementById("passengerContact").textContent = contact;
    document.getElementById("hiddenContact").value = contact;

    document.getElementById("passengerAge").textContent = age;
    document.getElementById("hiddenAge").value = age;

    document.getElementById("passengerGender").textContent = gender;
    document.getElementById("hiddenGender").value = gender;

    document.getElementById("passengerType").textContent = type;
    document.getElementById("hiddenType").value = type;

    document.getElementById("passengerPrice").textContent = price;
    document.getElementById("hiddenPrice").value = price;

    document.getElementById("passengerAvailTrip").textContent = availtrip;
    document.getElementById("hiddenAvailableTrip").value = availtrip;

    modal.style.display = "none";
    modal1.style.display = "block";
}


backFormButton.onclick = function() {
    modal1.style.display = "none";
    modal.style.display = "block"; // Show the first modal again
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}

// Add your submission logic here
document.getElementById("submitBookButton").onclick = function() {
    // Perform data saving logic here, e.g., using AJAX or form submission
    alert("Data submitted!"); // Placeholder for actual submission logic
}