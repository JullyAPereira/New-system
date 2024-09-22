class Cliente {
    constructor(cpf, nome, endereco, telefoneResidencial, celular, renda) {
        this.cpf = cpf; // CPF
        this.nome = nome; // Nome
        this.endereco = {
            bairro: endereco.bairro, // Bairro
            cidade: endereco.cidade, // Cidade
            estado: endereco.estado // Estado
        };
        this.telefoneResidencial = telefoneResidencial; // Telefone residencial
        this.celular = celular; // Telefone celular
        this.renda = renda; // Renda
    }
}