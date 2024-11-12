class Veiculo {
    constructor(chassi, placa, marca, modelo, anoFabricacao, anoModelo, cor, valor) {
        this.chassi = chassi; 
        this.placa = placa; 
        this.marca = marca; 
        this.modelo = modelo; 
        this.anoFabricacao = anoFabricacao; 
        this.anoModelo = anoModelo;
        this.cor = cor; 
        this.valor = valor; 
    }
}

const carro1 = new Veiculo(
    "1HGCM82633A123456", "ABC-1234", "Ferrari", "F40", 1990, 1991, "Vermelho", 4000000    
);

const carro2 = new Veiculo(
    "2HGCM82633A123456", "XYZ-5678", "Porsche", "911 Carrera RS", 1973, 1973, "Cinza", 3200000              
);

const carro3 = new Veiculo(
    "3HGCM82633A123456", "DEF-9876", "Chevrolet", "Corvette Stingray", 1967,  1967, "Azul", 2500000              
)

console.log(carro1);
console.log(carro2);
console.log(carro3);