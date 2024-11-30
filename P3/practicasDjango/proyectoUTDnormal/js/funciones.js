document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.getElementById("loginForm");

    if (loginForm) {
        loginForm.addEventListener("submit", async (event) => {
            event.preventDefault();

            const formData = new FormData(loginForm);

            try {
                const response = await fetch("../controladores/loginUser.php", {
                    method: "POST",
                    body: formData,
                });

                if (!response.ok) {
                    throw new Error("Error en la solicitud: " + response.status);
                }

                const result = await response.json();

                if (result.status === "success") {
                    alert(result.message);
                    location.href = "../index.php"; 
                } else {
                    alert(result.message);
                }
            } catch (error) {
                console.error("Error:", error);
                alert("Ocurrió un error al conectar con el servidor.");
            }
        });
    }
});
