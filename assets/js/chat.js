document.addEventListener("DOMContentLoaded", function () {
  const input = document.getElementById("chat-input");
  const sendBtn = document.getElementById("chat-send");
  const messagesDiv = document.getElementById("chat-messages");

  async function fetchMessages() {
    const res = await fetch("/wp-json/workcity/v1/messages");
    const msgs = await res.json();
    messagesDiv.innerHTML = msgs.map((m) => `<p>${m.content}</p>`).join("");
  }

  sendBtn.addEventListener("click", async () => {
    const message = input.value;
    if (!message) return;

    await fetch("/wp-json/workcity/v1/messages", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ message }),
    });

    input.value = "";
    fetchMessages();
  });

  fetchMessages();
  setInterval(fetchMessages, 3000); // refresh every 3s
});
