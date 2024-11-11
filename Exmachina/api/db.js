import mysql from "mysql"

export const db = mysql.createConnection({
    host: "localhost",
    user: "jully",
    password: "1030",
    database: "crud"
})