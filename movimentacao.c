#include <stdio.h>
#include <conio.h>
#include <string.h>
#define MAX 2

/* Estrutra para armazenar a ficha do funcionario*/

struct cadastro
{
     int cod; /* Código do funcionario*/ 
     char nome[50]; /* Nome do funcionario*/ 
     float salario; /* Salario do funcionario*/      
     char cargo[30]; /* Cargo do funcionario*/
     int idade; /* idade do funcionario*/
     char sexo[2]; /* Sexo do funcionario (M)- Masculino e (F)- Feminino*/
};

struct cadastro funcionario[MAX];
int topo;
void inserir();
void excluir();
void listar();
void pesquisar();
void alterar();

int main()
{
      int opcao;
      char seguir = 's';
      
      topo = 0;
      
      while(seguir == 's')
      {
      printf(" - Cadastro de Funcionários - \n\n");
      printf(" 1) NOVO \n");
      printf(" 2) REMOVER \n");
      printf(" 3) LISTAR \n");
      printf(" 4) PESQUISAR \n");
      printf(" 5) ALTERAR \n\n");
      printf(" Digite sua opcao: ");
      scanf("%d%*c",&opcao);
      printf("\n");
      
      switch(opcao)
      {
        case 1:
             {
               printf(" INSERINDO NOVO REGISTRO \n\n");
               if(topo < MAX)
               {
                 inserir();
                 printf(" DADO INSERIDO COM SUCESSO!\n\n");
               }
               else
               {
                 printf(" Desculpe, Sitema de Cadastro esta no limite!\n\n");
               }
               break;
             }
               
        case 2:
             {
               if(topo == 0)
               {
                 printf("não há dados para serem excluidos!\n\n");
               }
               else
               {
                 excluir();
                 printf(" DADO EXCLUIDO COM SUCESSO!\n\n");
               }
               break;
             }
        case 3:
             {
               if(topo == 0)
               {
                 printf("Não há registros no sistema!\n\n");
               }
               else
               {
                 printf(" Listando os Funcionarios cadastrados\n\n");
                 listar();
               }
               break;
             }
        case 4:
             {
               if(topo == 0)
               {
                 printf("Não há registros no sistema!\n\n");
               }
               else
               {   
                 printf(" PESQUIZANDO DADOS\n\n");
                 pesquisar();
               }
               break;
             }
        case 5:
             {
               if(topo == 0)
               {
                 printf("Não há registros no sistema!\n\n");
               }
               else
               {
                 printf(" ALTERARANDO DADOS!\n\n");
                 alterar();
                 printf(" DADOS ALTERADOS COM SUCESSO!\n\n");
               }
               break;
             }
        default:
               printf(" ( OPCAO INVALIDA! )\n\n");
                             
        
      }
      printf(" CONTINUAR?(S/N) ");
      scanf("%c",&seguir);
      
      printf("\n");
      }

getchar();
return 0;

}

/* Funcao para inserir registros*/

void inserir()
{    
     funcionario[topo].cod = topo+1;
     printf(" CODIGO : %d\n",funcionario[topo].cod);
     
     printf(" NOME: ");
     fgets(funcionario[topo].nome,50,stdin);
     funcionario[topo].nome[strlen(funcionario[topo].nome)-1];
    
          
     printf(" CARGO: ");
     fgets(funcionario[topo].cargo,30,stdin);
     funcionario[topo].cargo[strlen(funcionario[topo].cargo)-1];

     printf(" SALARIO: ");
     scanf("%f", &funcionario[topo].salario);
    
     printf(" IDADE: ");
     scanf("%d", &funcionario[topo].idade);
          
     printf(" SEXO: ");
     fgets(funcionario[topo].sexo,2,stdin);
     funcionario[topo].sexo[strlen(funcionario[topo].sexo)-1];
              
     printf("\n");
     
     topo = topo + 1;
}

/*Excluir um funcionario do Sistema*/

void excluir()
{
     topo  = topo - 1;
}

/*Listar os funcionarios cadastrados no Sistema*/

void listar()
{
     int i;
     
     for(i = 0;i < topo; i++)
     {
           printf(" ARQUIVO %d\n",(i+1));
           printf(" CODIGO: %d",funcionario[i].cod);
           printf(" NOME: %s",funcionario[i].nome);
           printf(" SALARIO: %f",funcionario[i].salario);           
           printf(" CARGO: %s",funcionario[i].cargo);
           printf(" IDADE: %d",funcionario[i].idade);
           printf(" SEXO: %s",funcionario[i].sexo);
           printf("\n\n");
     }
}

/*Alterar os funcionarios cadastrados no Sistema*/

void alterar()
{
     int i,dado,cont = 0;

     printf(" EFETUE UMA PESQUIZA PELO SEU CODIGO. \n\n");
     printf(" CODIGO DO REGISTRO: ");
     scanf("%d",&dado);
     for(i = 0;i < topo; i++)
     {
       if(dado == funcionario[i].cod)
       {
         cont = cont + 1;
                  
          printf(" NOME: ");
          fgets(funcionario[topo].nome,50,stdin);
          funcionario[topo].nome[strlen(funcionario[topo].nome)-1];
    
          printf(" CARGO: ");
          fgets(funcionario[topo].cargo,30,stdin);
          funcionario[topo].cargo[strlen(funcionario[topo].cargo)-1];
    
          printf(" SALARIO: ");
          scanf("%f", &funcionario[topo].salario);

          printf(" IDADE: ");
          scanf("%d", &funcionario[topo].idade);
     
          printf(" SEXO: ");
          fgets(funcionario[topo].sexo,2,stdin);
          funcionario[topo].sexo[strlen(funcionario[topo].sexo)-1];
         
       }
     }
     if(cont == 0)
     {
       printf(" DADO não ENCONTRADO!\n\n"); 
     }
}

/*Pesquisar dados cadastrados no Sistema*/
void pesquisar()
{
     int i,dado,cont = 0;
     printf(" PESQUIZA POR CODIGO: ");
     scanf("%d",&dado);
     for(i = 0;i < topo; i++)
     {
       if(dado == funcionario[i].cod)
       {
          printf("Dado Encontrado \n\n");
          printf(" CODIGO: %d",funcionario[i].cod);
          printf(" NOME: %s",funcionario[i].nome);
          printf(" SALARIO: %f",funcionario[i].salario);           
          printf(" CARGO: %s",funcionario[i].cargo);
          printf(" IDADE: %d",funcionario[i].idade);
          printf(" SEXO: %s",funcionario[i].sexo);
          printf("\n");
         cont = cont + 1;
       }
     }
     if(cont == 0)
     {
       printf(" Registro não Encontrado!\n\n");
     }
}

// -> Crie o executável:
// gcc programa.c -o executavel

// -> Atribua permissão de execução:
// chmod +x executavel

// -> Execute:
// ./executavel