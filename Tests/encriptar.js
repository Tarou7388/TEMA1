const bcrypt = require('bcryptjs');

const plainPassword = 'contraseña123';
const saltRounds = 10;

bcrypt.hash(plainPassword, saltRounds, (err, hash) => {
    if (err) {
        console.error(err);
        return;
    }
    console.log('Contraseña encriptada:', hash);
    // Guarda el hash en tu base de datos o en cualquier otro lugar seguro
});