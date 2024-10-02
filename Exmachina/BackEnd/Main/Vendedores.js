class Vendedor {
    constructor(codigo, usuario) {
        this.codigo = codigo; 
        this.usuario = usuario; 
       
    }
}

const vendedores = [];


function adicionarVendedor(nome, idade, email) {
    const vendedor = { nome, idade, email };
    vendedores.push(vendedor);
    salvarDados();
}


function salvarDados() {
    const dados = JSON.stringify(vendedores);

    console.log('Dados salvos:', dados);
}


adicionarVendedor('Maria Souza', 28, 'maria@gmail.com');
