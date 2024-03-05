import CryptoJS from 'crypto-js';

const algoritmo = 'AES-256-CBC'; 
const masterKey = "claveMaestraSegura";


const password = "miContraseña123";
const encryptedPassword = CryptoJS.AES.encrypt(password, masterKey).toString();
console.log("Contraseña encriptada:", encryptedPassword);


function decryptPassword(password) {
    const bytes = CryptoJS.AES.decrypt(password, masterKey);
    return bytes.toString(CryptoJS.enc.Utf8);
}

const decrip= decryptPassword(encryptedPassword)

console.log(decrip)