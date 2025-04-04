document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("login-form");
  const messageBox = document.getElementById("login-message");
  const button = form?.querySelector("button");

  form?.addEventListener("submit", function (e) {
    e.preventDefault();

    const user_login = document.getElementById("user_login").value.trim();
    const user_pass = document.getElementById("user_pass").value.trim();

    if (!user_login || !user_pass) {
      messageBox.textContent = "Veuillez remplir tous les champs.";
      messageBox.className = "login-message error visible";
      return;
    }

    // État de chargement
    button.classList.add("loading");
    button.disabled = true;
    messageBox.textContent = "Connexion en cours...";
    messageBox.className = "login-message visible";

    fetch(ameliaLogin.ajax_url, {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: new URLSearchParams({
        action: "custom_director_login",
        user_login,
        user_pass,
      }),
    })
        .then((response) => response.json())
        .then((data) => {
          button.classList.remove("loading");
          button.disabled = false;

          if (data.success) {
            messageBox.textContent = "Connexion réussie. Redirection...";
            messageBox.className = "login-message success visible";
            setTimeout(() => {
              window.location.href = "/espace-club";
            }, 1000);
          } else {
            messageBox.textContent = data.data.message;
            messageBox.className = "login-message error visible";
          }
        })
        .catch((error) => {
          button.classList.remove("loading");
          button.disabled = false;
          messageBox.textContent = "Une erreur est survenue.";
          messageBox.className = "login-message error visible";
          console.error(error);
        });
  });
});
