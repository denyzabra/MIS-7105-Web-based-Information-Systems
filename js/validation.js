// validate the comment form
function validateCommentForm() {
    const comment = document.getElementById('text').value.trim();
    
    if (comment === "") {
        alert("Comment cannot be empty.");
        return false; // prevent form submission
    }
    
    return true; // allow form submission
}

// validate the registration form
function validateRegistrationForm() {
    const firstName = document.getElementById('first_name').value.trim();
    const lastName = document.getElementById('last_name').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;

    if (firstName === "" || lastName === "" || email === "" || password === "" || confirmPassword === "") {
        alert("All fields must be filled out.");
        return false; // prevent form submission
    }

    // validate email format (simple check)
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false; // prevent form submission
    }

    // validate password match
    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false; // prevent form submission
    }

    return true; // allow form submission
}
