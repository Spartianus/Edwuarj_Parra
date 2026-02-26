import sqlite3
import hashlib
import cgi

# Función para hashear contraseñas
def hash_password(password):
    return hashlib.sha256(password.encode()).hexdigest()

# Conectar a la base de datos
conn = sqlite3.connect('usuarios.db')
cursor = conn.cursor()

# Obtener los datos del formulario
form = cgi.FieldStorage()
username = form.getvalue('username')
password = form.getvalue('password')

# Hashear la contraseña antes de verificarla
hashed_password = hash_password(password)

# Verificar si el usuario existe en la base de datos
cursor.execute("SELECT * FROM usuarios WHERE username = ? AND password = ?", (username, hashed_password))
user = cursor.fetchone()

if user is not None:
    # El usuario existe, redirigir al menú principal
    print("Location: index.html\r\n\r\n")
else:
    # El usuario no existe, mostrar un mensaje de error o redirigir a una página de inicio de sesión fallida
    print("Content-Type: text/html\r\n\r\n")
    print("<h1>Error: Usuario o contraseña incorrectos</h1>")

conn.close()
