import sqlite3

conn = sqlite3.connect('usuarios.db')
cursor = conn.cursor()

# Crear tabla de usuarios
cursor.execute('''
    CREATE TABLE IF NOT EXISTS usuarios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL,
        password TEXT NOT NULL,
        privilegios TEXT
    )
''')

conn.commit()
conn.close()
