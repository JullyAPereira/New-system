class Cliente {
    constructor(cpf, nome, endereco, telefoneResidencial, celular, renda) {
        this.cpf = cpf; 
        this.nome = nome; 
        this.endereco = {
            bairro: endereco.bairro, 
            cidade: endereco.cidade, 
            estado: endereco.estado 
        };
        this.telefoneResidencial = telefoneResidencial; 
        this.celular = celular; 
        this.renda = renda; 
    }
}


const clientes = [];


function adicionarCliente(nome, idade, email) {
    const cliente = { nome, idade, email };
    clientes.push(cliente);
    salvarDados();
}


function salvarDados() {
    const dados = JSON.stringify(clientes);

    console.log('Dados salvos:', dados);
}


adicionarCliente('João Silva', 30, 'joao@example.com');
