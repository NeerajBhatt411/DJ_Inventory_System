function login() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    fetch("php/login.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `username=${username}&password=${password}`
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === "success") {
            window.location.href = "stock.html";
        } else {
            alert(data);
        }
    })
    .catch(error => console.error("Error:", error));
}
