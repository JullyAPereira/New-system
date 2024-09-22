class OperacaoCompra {
    constructor(numero, data, cliente, vendedor, veiculo, valor) {
        this.numero = numero; // Número da operação
        this.data = data; // Data
        this.cliente = cliente; // Cliente (instância da classe Cliente)
        this.vendedor = vendedor; // Vendedor (instância da classe Vendedor)
        this.veiculo = veiculo; // Veículo (instância da classe Veiculo)
        this.valor = valor; // Valor da compra
    }
}
class OperacaoVenda {
    constructor(numero, data, cliente, vendedor, veiculo, valorEntrada, valorFinanciado, valorTotal) {
        this.numero = numero; // Número da operação
        this.data = data; // Data
        this.cliente = cliente; // Cliente (instância da classe Cliente)
        this.vendedor = vendedor; // Vendedor (instância da classe Vendedor)
        this.veiculo = veiculo; // Veículo (instância da classe Veiculo)
        this.valorEntrada = valorEntrada; // Valor de entrada
        this.valorFinanciado = valorFinanciado; // Valor financiado
        this.valorTotal = valorTotal; // Valor total
    }
}
class Pedido {
    constructor(numero, data, cliente, vendedor, montadora, modelo, ano, cor, acessorios, valor) {
        this.numero = numero; // Número do pedido
        this.data = data; // Data
        this.cliente = cliente; // Cliente (instância da classe Cliente)
        this.vendedor = vendedor; // Vendedor (instância da classe Vendedor)
        this.montadora = montadora; // Montadora
        this.modelo = modelo; // Modelo
        this.ano = ano; // Ano
        this.cor = cor; // Cor
        this.acessorios = acessorios; // Acessórios
        this.valor = valor; // Valor
    }
}