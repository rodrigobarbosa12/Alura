const animais = [
    {
      nome: 'Fumaça',
      idade: 3,
      especie: 'cao'
    },
    {
      nome: 'Pé de pano',
      idade: 5,
      especie: 'Cavalo'
    },
    {
      nome: 'Tobby',
      idade: 6,
      especie: 'cao'
    },
    {
      nome: 'Laminha',
      idade: 1,
      especie: 'gato'
    },
    {
      nome: 'Xablau',
      idade: 3,
      especie: 'cao'
    },
];

const animal =  animais.map(animal => ({
    ...animal,
    tipo: 'Domestico',
    porte: 'Médio'
}));

console.log(animal);
