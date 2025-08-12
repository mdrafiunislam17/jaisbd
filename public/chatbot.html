<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Simple Chatbot</title>
  <!-- Bootstrap CDN -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <style>
    body {
      background-color: #f8f9fa;
    }
    #chatbox {
      max-width: 600px;
      margin: 50px auto;
      border: 1px solid #ddd;
      border-radius: 8px;
      background: white;
      padding: 20px;
      height: 400px;
      overflow-y: auto;
    }
    .message {
      padding: 8px 15px;
      margin-bottom: 10px;
      border-radius: 20px;
      max-width: 70%;
      clear: both;
    }
    .user-message {
      background-color: #0d6efd;
      color: white;
      float: right;
      text-align: right;
    }
    .bot-message {
      background-color: #e9ecef;
      color: black;
      float: left;
      text-align: left;
    }
    #input-area {
      max-width: 600px;
      margin: 0 auto;
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }
  </style>
</head>
<body>

  <div id="chatbox"></div>

  <div id="input-area" class="container">
    <input
      id="userInput"
      type="text"
      class="form-control"
      placeholder="Type your message..."
    />
    <button id="sendBtn" class="btn btn-primary">Send</button>
  </div>

  <script>
    const chatbox = document.getElementById('chatbox');
    const userInput = document.getElementById('userInput');
    const sendBtn = document.getElementById('sendBtn');

    function appendMessage(text, sender) {
      const msgDiv = document.createElement('div');
      msgDiv.classList.add('message');
      if (sender === 'user') {
        msgDiv.classList.add('user-message');
      } else {
        msgDiv.classList.add('bot-message');
      }
      msgDiv.textContent = text;
      chatbox.appendChild(msgDiv);
      chatbox.scrollTop = chatbox.scrollHeight; // Scroll down
    }

    async function sendMessage() {
      const message = userInput.value.trim();
      if (!message) return;

      // Show user message
      appendMessage(message, 'user');
      userInput.value = '';
      userInput.disabled = true;
      sendBtn.disabled = true;

      try {
        const response = await fetch('/api/chatbot', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ message }),
        });

        const data = await response.json();
        appendMessage(data.reply || 'Sorry, no response', 'bot');
      } catch (error) {
        appendMessage('Error: Could not get response from server.', 'bot');
      } finally {
        userInput.disabled = false;
        sendBtn.disabled = false;
        userInput.focus();
      }
    }

    sendBtn.addEventListener('click', sendMessage);
    userInput.addEventListener('keypress', function (e) {
      if (e.key === 'Enter') {
        sendMessage();
      }
    });
  </script>

</body>
</html>
