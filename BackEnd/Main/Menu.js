
const menuDiv = document.createElement('div');
menuDiv.style.margin = '20px';
document.body.appendChild(menuDiv);


const modulos = [
    'Clientes',
    'Vendedores',
    'Veículos',
    'Operação de compra',
    'Operação de venda',
    'Pedidos',
    'Montadoras'
];


modulos.forEach(modulo => {
    const button = document.createElement('button');
    button.textContent = modulo;
    button.style.display = 'block';
    button.style.margin = '10px 0';
    button.style.padding = '10px';
    button.style.width = '200px';
    button.style.fontSize = '16px';
    button.onclick = () => carregarModulo(modulo);
    menuDiv.appendChild(button);
});

function preencheCPF(){
   document.getElementById('cpf').value = new Cliente().cpf;
   Cliente.prototype.cpf = '12345678909';
   alert('CPF: ' + new Cliente().cpf);
}

function carregarModulo(modulo) {
    alert('Você selecionou o módulo: ' + modulo);
    preencheCPF();
    const script = document.createElement('script');
    script.src = modulo.toLowerCase() + '.js';
    document.body.appendChild(script);
   
}
