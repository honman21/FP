<!DOCTYPE html>
<html>
<head>
  <title>Contact Page</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Contact Us</h1>
    <form>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
      </div>
      <button type="submit">Send Message</button>
    </form>
  </div>
</body>
</html>
