// Search Menu
const searchInput = document.getElementById("searchMenu");

if (searchInput) {

    searchInput.addEventListener("keyup", function () {

        let value = this.value.toLowerCase();

        let cards =
            document.querySelectorAll(".menu-card");

        cards.forEach(card => {

            let text =
                card.innerText.toLowerCase();

            card.style.display =
                text.includes(value)
                    ? "block"
                    : "none";

        });

    });

}

// AI Assistant
function kirimAI() {

    let input =
        document.getElementById(
            "chat-input"
        );

    let pesan = input.value.trim();

    if (pesan === "") return;

    fetch("api/ai_chat.php", {

        method: "POST",

        headers: {
            "Content-Type":
                "application/x-www-form-urlencoded"
        },

        body:
            "message=" +
            encodeURIComponent(pesan)

    })

    .then(res => res.json())

    .then(data => {

        let chat =
            document.getElementById(
                "chat-content"
            );

        chat.innerHTML += `
        <div class="user-msg">
            <b>Anda:</b> ${pesan}
        </div>

        <div class="ai-msg">
            <b>Aroma AI:</b>
            ${data.response}
        </div>
        `;

        input.value = "";

        chat.scrollTop =
            chat.scrollHeight;

    })

    .catch(error => {

        console.log(error);

        Swal.fire(
            "Error",
            "AI gagal merespon",
            "error"
        );

    });

}