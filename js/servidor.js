const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');
const jwt = require('jsonwebtoken');

const app = express();
app.use(bodyParser.json());

const db = mysql.createPool({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'gases'
});

const secret = 'my_secret_key'; // Clave secreta para JWT

app.post('/login', (req, res) => {
    const { username, password } = req.body;

    db.query(
        'SELECT * FROM usuarios WHERE nombre_usuario = ? AND password = ?',
        [username, password],
        (err, results) => {
            if (err) throw err;

            if (results.length === 0) {
                res.status(401).json({ message: 'Invalid credentials' });
            } else {
                const user = results[0];
                const token = jwt.sign(
                    { id: user.id, tipo_usuario: user.tipo_usuario },
                    secret,
                    { expiresIn: '1h' }
                );
                res.json({ token });
            }
        }
    );
});

app.listen(3000, () => {
    console.log('Server running on port 3000');
});