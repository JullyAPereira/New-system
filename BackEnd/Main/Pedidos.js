class OperacaoCompra {
    constructor(numero, data, cliente, vendedor, veiculo, valor) {
        this.numero = numero; 
        this.data = data; 
        this.cliente = cliente; 
        this.vendedor = vendedor; 
        this.veiculo = veiculo;
        this.valor = valor; 
    }
}


const operacoesCompra = [];


function adicionarOperacaoCompra(cliente, veiculo, valor) {
    const operacao = { cliente, veiculo, valor, tipo: 'compra' };
    operacoesCompra.push(operacao);
    salvarDados();
}


function salvarDados() {
    const dados = JSON.stringify(operacoesCompra);
    console.log('Dados salvos:', dados);
}


adicionarOperacaoCompra('João Silva', 'Toyota Corolla 2020', 75000);

class OperacaoVenda {
    constructor(numero, data, cliente, vendedor, veiculo, valorEntrada, valorFinanciado, valorTotal) {
        this.numero = numero;
        this.data = data; 
        this.cliente = cliente; 
        this.vendedor = vendedor;
        this.veiculo = veiculo;
        this.valorEntrada = valorEntrada;
        this.valorFinanciado = valorFinanciado;
        this.valorTotal = valorTotal;
    }
}




const operacoesVenda = [];

function adicionarOperacaoVenda(vendedor, veiculo, valor) {
    const operacao = { vendedor, veiculo, valor, tipo: 'venda' };
    operacoesVenda.push(operacao);
    salvarDados();
}


function salvarDados() {
    const dados = JSON.stringify(operacoesVenda);
    console.log('Dados salvos:', dados);
}


adicionarOperacaoVenda('Maria Souza', 'Toyota Corolla 2020', 80000);


class Pedido {
    constructor(numero, data, cliente, vendedor, montadora, modelo, ano, cor, acessorios, valor) {
        this.numero = numero; 
        this.data = data; 
        this.cliente = cliente;
        this.vendedor = vendedor; 
        this.montadora = montadora; 
        this.modelo = modelo; 
        this.ano = ano; 
        this.cor = cor; 
        this.acessorios = acessorios; 
        this.valor = valor; 
    }
}


const pedidos = [];


function adicionarPedido(cliente, veiculo, status) {
    const pedido = { cliente, veiculo, status };
    pedidos.push(pedido);
    salvarDados();
}


function salvarDados() {
    const dados = JSON.stringify(pedidos);
    console.log('Dados salvos:', dados);
}


adicionarPedido('João Silva', 'Toyota Corolla 2020', 'Pendente');
