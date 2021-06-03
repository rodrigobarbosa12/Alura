const animais = [
    {
      nome: 'Fumaça',
      idade: 3,
      especie: 'cao'
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
      nome: 'Nutella',
      idade: 3,
      especie: 'cao'
    },
];

const dogsAgeSum = animais
    .filter((animal) => animal.especie === 'cao')
    .map((cao) => cao.idade *= 7)
    .reduce((total, cao) => total += cao);

    console.log(dogsAgeSum);

    // OU

// const dogsAgeSum2 = animais.reduce((total, elemento) => {
//     if (elemento.especie === 'cao') return total += (elemento.idade *=7);
//     else return total;
// }, 0);

// console.log(dogsAgeSum2);
