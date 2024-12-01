<!---DATABASE --->
CREATE DATABASE student_db;
USE student_db;
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(15),
    gender VARCHAR(10),
    course VARCHAR(100)
);

<!---register.php--->
<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
    <form method="POST">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="phone" placeholder="Phone" required><br>
        <select name="gender"><option>Male</option><option>Female</option></select><br>
        <input type="text" name="course" placeholder="Course" required><br>
        <input type="submit" value="Register">
    </form>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'student_db');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name']; $email = $_POST['email']; $phone = $_POST['phone'];
        $gender = $_POST['gender']; $course = $_POST['course'];
        if ($conn->query("SELECT * FROM students WHERE email='$email'")->num_rows > 0) {
            echo "Email exists."; 
        } else {
            $conn->query("INSERT INTO students (name, email, phone, gender, course) VALUES ('$name', '$email', '$phone', '$gender', '$course')");
            echo "Registration successful!";
        }
    }
    $conn->close();
    ?>
</body>
</html>

<!--index.html-->
<!DOCTYPE html>
<html>
<head><title>Login & Register</title></head>
<body>
    <h2>Login</h2>
    <form onsubmit="return validate('login')">
        <input type="email" id="loginEmail" placeholder="Email" required>
        <input type="password" id="loginPassword" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <h2>Register</h2>
    <form onsubmit="return validate('register')">
        <input type="text" id="regName" placeholder="Name" required>
        <input type="email" id="regEmail" placeholder="Email" required>
        <input type="password" id="regPassword" placeholder="Password (6+ chars)" required>
        <button type="submit">Register</button>
    </form>

    <script>
        function validate(type) {
            const email = document.getElementById(${type}Email).value;
            const password = document.getElementById(${type}Password).value;
            if (!email || password.length < 6) {
                alert("Complete fields, password must be 6+ chars.");
                return false;
            }
            alert(${type === 'login' ? 'Login' : 'Registration'} successful!);
            return true;
        }
    </script>
</body>
</html>