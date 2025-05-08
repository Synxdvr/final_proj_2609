<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Booksyte Auth</title>
  <link rel="stylesheet" href="signup.css"/>
</head>
<body>
  <div class="container" id="container">
    
    <!-- SIGN UP -->
    <div class="form-container sign-up-container">
      <form>
        <img src="resources\BOOKSYTE IMG (1).png" class="small-logo" alt="Booksyte Logo" />
        <h1>Create Account</h1>
        <div class="parasanames">
          <input type="text" placeholder="First Name" />
          <input type="text" placeholder="Last Name" />
        </div>
        <input type="text" placeholder="Student ID" />
        <input type="password" placeholder="Password" />
        <button type="submit">Create</button>
      </form>
    </div>

    <!-- SIGN IN -->
    <div class="form-container sign-in-container">
      <form>
        <img src="resources\BOOKSYTE IMG (1).png" class="small-logo" alt="Booksyte Logo" />
        <h1>Login</h1>
        <input type="text" placeholder="ID" />
        <input type="password" placeholder="Password" />
        <button type="submit">Login</button>
      </form>
    </div>

    <!-- OVERLAY PANEL -->
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>To stay connected, please login with your account</p>
          <button class="ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, User!</h1>
          <p>Enter your details and start your journey with Booksyte</p>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    const container = document.getElementById('container');
    document.getElementById('signUp').addEventListener('click', () => {
      container.classList.add('right-panel-active');
    });
    document.getElementById('signIn').addEventListener('click', () => {
      container.classList.remove('right-panel-active');
    });
  </script>
</body>
</html>