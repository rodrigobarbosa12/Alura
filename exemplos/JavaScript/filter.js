const animais = [
    {
      nome: 'Fumaça',
      idade: 3,
      especie: 'Cão'
    },
    {
      nome: 'Pé de pano',
      idade: 5,
      especie: 'Cavalo'
    },
    {
      nome: 'Tobby',
      idade: 6,
      especie: 'Cão'
    },
    {
      nome: 'Laminha',
      idade: 1,
      especie: 'Gato'
    },
    {
      nome: 'Xablau',
      idade: 3,
      especie: 'Cão'
    },
];

const cachorro = animais.filter(animal => animal.especie === 'Cão');

console.log(cachorro);